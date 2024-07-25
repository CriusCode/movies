<?php

function registerUser($db, $username, $email, $pwd, $pwdConfirm, $roleId = 2)
{

    if ($pwd !== $pwdConfirm) {
        throw new Exception("Les mots de passe ne correspondent pas.");
    }

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (username, email, pwd, role_id) VALUES (:username, :email, :pwd, :role_id)';
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pwd', $hashedPassword, PDO::PARAM_STR);
    $query->bindParam(':role_id', $roleId, PDO::PARAM_INT); 

    return $query->execute();
}

function checkAlreadyExistEmail()
{
	global $db;
	if (!empty($_GET['id'])) {
		$email = getUser()->email;

		if ($email === $_POST['email']) {
			return false;
		}
	}

	$sql = 'SELECT email FROM users WHERE email = :email';
	$query = $db->prepare($sql);
	$query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$query->execute();

	return $query->fetch();
}