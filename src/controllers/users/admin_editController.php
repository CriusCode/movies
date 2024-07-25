<?php

function checkEmail (string $email): bool{
    return filter_var ($email, FILTER_VALIDATE_EMAIL);
}

// Checks if the informations are valid, if they're not empty
$errorMessage = [
    'email' => false
];

// E-mail format
if (!empty($_POST)) {
    // Check email format and already exist
    if (!empty($_POST['email'])) {
        if (!checkEmail($_POST['email'])) {
            $errorMessage['email'] = 'Email non valide';
        } else if (!empty(checkAlreadyExistEmail())) {
            $errorMessage['email'] = 'Email existe déjà';
        }
    }
}

// Save user in database
if (!empty($_POST['email'])) {
    if (!$errorMessage['email']) {

        if (!empty($_GET['id'])) {
            updateUser();
            alert('L\'utilisateur a bien été modifié.', 'success');
        } else {
            addUser();
            header('Location: ' . $router->generate('users'));
            die;
        }
    } else {
        alert('Erreur lors de l\'ajout de l\'utilisateur.');
    }
} else if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
    $_POST = (array) getUser();
}
if(isset($_POST['email'])) {
    if (empty($_POST['email'])) {
        alert('Merci de renseigner tous les champs obligatoires');
    }
}

$globalMessage = ['class' => 'd-none', 'message' => 'false'];
