<?php

function getAllMovies($db)
{
    global $db;
    $sql = 'SELECT Title, MoviePoster, id FROM movies';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}