<?php

// Conditions for the captcha to work, also checks if the user informations are correct, 
// displays message if the user doesn't meet any of these conditions, 
// and automatically redirects him if the connexion is a success
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	if (isset($_POST['g-recaptcha-response'])) {
		if (checkGoogleCaptcha($_POST['g-recaptcha-response'])) {
			$accessUser = checkUserAccess();
			if (!empty($accessUser)) {
				$_SESSION['user'] = [
					'id' => $accessUser,
					'lastLogin' => date('Y-m-d H:i:s')
				];

				saveLastLogin($accessUser);
				unset($_SESSION['attemps']);

				alert('Vous êtes connecté', 'success');
				header('Location: ' . $router->generate('users'));
				die;
			} else {
				limitAttemps();
				alert('Identifiants incorrects');
			}
		} else {
			alert('Impossible de valider votre Captcha, réessayer plus tard', 'danger');
		}
	} else {
		alert('Veuillez vérifier votre captcha', 'danger');
	}
}
