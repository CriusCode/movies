<?php

// Sends the user's suggestion in the database
// function submitSuggestion($db, $username, $movieName, $created)
// {
//     $sql = 'INSERT INTO suggestions (username, movieName, created) VALUES (:username, :movieName, :created)';
//     $query = $db->prepare($sql);
//     $query->bindParam(':username', $username, PDO::PARAM_STR);
//     $query->bindParam(':movieName', $movieName, PDO::PARAM_STR);
//     $query->bindParam(':created', $created, PDO::PARAM_STR);

//     return $query->execute();
// }

function submitSuggestion($db, $username, $movieName)
{
    if (!preg_match('/^[a-zA-Z0-9\s\p{P}]{1,255}$/u', $movieName)) {
        throw new Exception("Nom de film invalide");
    }

    $username = trim($username);
    $movieName = trim($movieName);
    $movieName = strip_tags($movieName);

    $sql = 'INSERT INTO suggestions (username, movieName) VALUES (:username, :movieName)';
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':movieName', $movieName, PDO::PARAM_STR);

    return $query->execute();
}

// Fetch the list of all the users suggestions from the database
function getAllSuggestions($db)
{
    global $db;
    $sql = 'SELECT * FROM suggestions';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}
