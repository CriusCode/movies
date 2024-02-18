<?php

function submitSuggestionREST($db, $username, $movieName)
{
    // Send the suggestion into the database
    $sql = 'INSERT INTO suggestions (username, movieName) VALUES (:username, :movieName)';
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':movieName', $movieName, PDO::PARAM_STR);

    return $query->execute();
}
?>