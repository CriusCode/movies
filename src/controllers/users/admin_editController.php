<?php

function checkEmail (string $email): bool{
    return filter_var ($email, FILTER_VALIDATE_EMAIL);
}

// Checks if the informations are valid, if they're not empty
$errorMessage = [
    'email' => false,
    'pwd' => false,
    'pwdConfirm' => false,
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

// Password format

if (!empty($_POST['pwd'])) {
    $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
    if (!preg_match($regex, $_POST['pwd'])) {
        $errorMessage['pwd'] = 'Merci de respecter le format indiqué.';
    } else if ($_POST['pwd'] !== $_POST['pwdConfirm']) {
        $errorMessage['pwdConfirm'] = 'Les mots de passe ne sont pas indentiques.';
    }
}

// Save user in database
if (!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdConfirm'])) {
    if (!$errorMessage['email'] && !$errorMessage['pwd'] && !$errorMessage['pwdConfirm']) {

        if (!empty($_GET['id'])) {
            updateUser();
            alert('Un utilisateur a bien été modifié.', 'success');
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
} else {
    alert('Merci de remplir tous les champs obligatoires.');
}

$globalMessage = ['class' => 'd-none', 'message' => 'false'];
