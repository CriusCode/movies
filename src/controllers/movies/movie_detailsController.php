<?php


// Checks if there is a corresponding movie, by id, in the database, for the recommandation section
// Redirect if it's not the case
if (isset($_GET['id'])) {

    $filmInfo = getFilmById($_GET["id"]);
    if ($filmInfo) {
       $recommandationMovie = getRecommandation($filmInfo[0]->Category, $filmInfo[0]->id);
    } else {
        header('Location: '. $router->generate('home'));
    die;
    }
} else {
    header('Location: '. $router->generate('home'));
    die;
}



