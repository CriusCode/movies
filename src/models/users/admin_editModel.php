<?php

/**
 * Check if the email is already in the database
 */
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


/**
 * Add a user in the database and displays an error message if it didn't worked properly
 */
function addUser()
{
	global $db;
	$data = [
		'email' => $_POST['email'],
		'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
		'role_id' => 1
	];

	try {
		$sql = 'INSERT INTO users (email, pwd, role_id) VALUES (:email, :pwd, :role_id)';
		$query = $db->prepare($sql);
		$query->execute($data);
		alert('Un utilisateur a bien été ajouté.', 'success');
	} catch (PDOException $e) {
		if ($_ENV['DEBUG'] == 'true') {
			dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
		}
	}
}

/**
 * Update a user in the database, displays an error message if it didn't worked properly
 */
function updateUser()
{
	global $db;
	$data = [
		'email' => $_POST['email'],
		'role_id' => $_POST['role_id'],
		'id' => $_GET['id']
	];
	try {
		$sql = 'UPDATE users SET email = :email, role_id=:role_id, modified = NOW() WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute($data);
	} catch (PDOException $e) {
		if ($_ENV['DEBUG'] == 'true') {
			dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue. Merci de réeassayer plus tard');
		}
	}
}

function getUser()
{
	global $db;

	try {
		$sql = 'SELECT email, role_id FROM users WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute(['id' => $_GET['id']]);

		return $query->fetch();
	} catch (PDOException $e) {
		if ($_ENV['DEGUB'] == 'true') {
			dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue. Merci de réeassayer plus tard', 'danger');
		}
	}
}