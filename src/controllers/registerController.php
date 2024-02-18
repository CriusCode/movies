<?php

// Allows a user to register himself on the website
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (registerUser($db, $username, $email, $password)) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
} 
