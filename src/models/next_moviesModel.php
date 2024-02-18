<?php

// Fetch the upcoming movies from the database
function getAllFutureMovies() {
    global $db;
    $sql = 'SELECT * FROM movies WHERE ReleaseDate > NOW() ORDER BY id DESC';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}
?>