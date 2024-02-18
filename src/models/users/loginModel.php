<?php

// Checks if the user is registered in the database
function checkUserAccess()
{
	global $db;
	$sql = 'SELECT id, pwd FROM users WHERE email = :email';
	$query = $db->prepare($sql);
	$query->execute(['email' => $_POST['email']]);

	$user = $query->fetch();
	if ($user) {
		if (password_verify($_POST['pwd'], $user->pwd)) {
			return $user->id;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

// Function to check the user's last connection 
function saveLastLogin(string $userId)
{
	global $db;
	$sql = 'UPDATE users SET lastLogin = NOW() WHERE id = :id';
	$query = $db->prepare($sql);
	$query->execute(['id' => $userId]);
}


// Function for the Google Captcha API
function checkGoogleCaptcha($token)
{
	$ch = curl_init();
	try {
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array("secret" => "6Lfeq2kpAAAAALDpnV7YzeUXocqD0-XRjoY4ygPn", "response" => $token));
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo curl_error($ch);
			die();
		}

		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($http_code == intval(200)) {
			$responsejson = json_decode($response);
			return $responsejson->success;
		} else {
			return false;
		}
	} catch (\Throwable $th) {
		throw $th;
	} finally {
		curl_close($ch);
	}
}
