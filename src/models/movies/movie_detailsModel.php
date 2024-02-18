<?php

// Fetch all the IDs from the movies in the database
function getFilmById($id)
{

    global $db;

    $data = [
        "id" => $id
    ];

    $sql = 'SELECT * FROM movies WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);

    return $query->fetchAll();
}

// In order to make relevant movie recommandations, this function fetch the 
// categories of the film in the database, and checks if it's the same as the displayed movie
// on top of the page. If there's no result, then it gets all the movies in the database,
// and only shows 3 so the section is not empty.

function getRecommandation($categories, $idFilm)
{
    global $db;

    $data = [
        "Category" => $categories,
        "idFilm" => $idFilm
    ];

    $sql = 'SELECT MoviePoster, id FROM movies WHERE Category = :Category AND id != :idFilm';
    $query = $db->prepare($sql);
    $query->execute($data);

    $limitedMovie = $query->fetchAll();

    if ($limitedMovie) {
        return $limitedMovie;
    } else {
        $data = [
            "idFilm" => $idFilm
        ];
        $sql = 'SELECT MoviePoster, id FROM movies WHERE id != :idFilm';
        $query = $db->prepare($sql);
        $query->execute($data);

        return $query->fetchAll();
    }
}
