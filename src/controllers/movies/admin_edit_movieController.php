<?php

// Conditions to store the movie poster, or any images, in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['releaseDate']) && !empty($_POST['duration'])) {

        $movie = new AdminEditMovie();

        if (!$movie->checkAlreadyExistMovie()) {
            if (isset($_POST['age-restriction'])) {
                $ageRestriction = $_POST['age-restriction'];
            }
            if (!empty($_GET['id'])) {

                updateMovie();
                alert('Le film a bien été mis à jour', 'success');
            } else {
                if (isset($_FILES['movieposter'])) {

                    $uploadsDir = str_replace("src\controllers\movies", "public\images\affiches\\", __DIR__);
                    $urlImage = '';
                    $target_dir = $uploadsDir;
                    $target_file = $target_dir . basename($_FILES["movieposter"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    $check = getimagesize($_FILES['movieposter']["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                        // if everything is ok, try to upload file, else, shows an error message
                    } else {
                        if (move_uploaded_file($_FILES['movieposter']["tmp_name"], $target_file)) {
                            $urlImage = '/public/images/affiches/' . basename($_FILES["movieposter"]["name"]);
                            addMovie($urlImage);
                            alert('Le film a bien été ajouté', 'success');
                        }
                    }
                }
            }
        } else {
            alert('Le film existe déjà dans la base de données');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires pour le film');
    }
}


// Attempt to use OOP concept
class AdminEditMovieController
{
    function processMovieForm()
    {
    }
}

function escapeString($string) {
    return (empty($string)) ? " " : htmlspecialchars($string);
}

class AdminEditMovie
{
    function checkAlreadyExistMovie()
    {
        // code to check if the movie already exists
    }

    function addMovie()
    {
        // code to add a movie
    }

    function updateMovie()
    {
        // code to update a movie
    }
}


