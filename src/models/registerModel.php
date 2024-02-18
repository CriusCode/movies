<?php

function registerUser($db, $username, $email, $pwd)
{
    // Validation rules for the password
    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

    // Registers the users in the database
    $sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :pwd)';
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pwd', $hashedPassword, PDO::PARAM_STR);

    return $query->execute();
}
