<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $pwdConfirm = $_POST['pwdConfirm'];

    try {
        if (checkAlreadyExistEmail()) {
            echo "Erreur : Cette adresse e-mail est déjà utilisée.";
        } else {
            if (registerUser($db, $username, $email, $password, $pwdConfirm, 1)) {
                header('Location: /'); 
                exit(); 
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage(); 
    }
}
// Ajouter confirm password
// Table de jointure sur la categorie pour l'éditer
// Line height en CSS sur les textes
// HTMLEntities sur forEach en homeView => exposé sur le OWASP Failles de sécurité