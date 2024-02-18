<?php

// Sends the user's suggestion in the database
function submitSuggestion($db, $username, $movieName, $created)
{
    $sql = 'INSERT INTO suggestions (username, movieName, created) VALUES (:username, :movieName, :created)';
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':movieName', $movieName, PDO::PARAM_STR);
    $query->bindParam(':created', $created, PDO::PARAM_STR);

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
