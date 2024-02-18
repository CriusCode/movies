<?php

// Fetch all the movies and their informations from the database
function getAllMovies() {
    global $db;
    $sql = 'SELECT * FROM movies WHERE ReleaseDate < NOW() ORDER BY id DESC';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}
?>