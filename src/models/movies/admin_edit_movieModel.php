<?php 

// Function that checks if a movie already exists in the database
function checkAlreadyExistMovie()
{
    global $db;
    $sql = 'SELECT title FROM movies WHERE title = :title';
    $query = $db->prepare($sql);
    $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}

function getAllCategories() {
    global $db;
    $sql = 'SELECT * FROM categories';
    $query = $db->query($sql);
    $query->execute();

    return $query->fetchAll();
}

function getMovieById($idMovie) {
    global $db;
    $sql = 'SELECT * FROM movies WHERE id=:id_movie';
    $query = $db->prepare($sql);
    $query->bindParam(':id_movie', $idMovie, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

// Function that allows to add a new movie to the database
function addMovie($urlImage): bool
{
    global $db;
    $title = $_POST['title'];
    $releaseDate = $_POST['releaseDate'];
    $synopsis = $_POST['synopsis'];
    $category = implode(',', $_POST['categories']);
    $director = $_POST['director'];
    $casting = $_POST['casting'];
    $rating = 0;
    $duration = $_POST['duration'];
    $ageRestriction = (!isset($_POST['age-restriction'])) ? "aucune" : $_POST ['age-restriction'];
    $scareometer = $_POST['scareometer'];
    $trailer = $_POST['ytlink'];
    $coverImage = $urlImage;
    $critique = $_POST['critique'];
    $whysee = $_POST['whysee'];
    $whynotsee = $_POST['whynotsee'];

    $data = [
        'title' => $title,
        'releaseDate' => $releaseDate,
        'duration' => $duration,
        'synopsis' => $synopsis,
        'casting' => $casting,
        'rating' => $rating,
        'director' => $director,
        'category' => $category,
        'trailer' => $trailer,
        'coverImage' => $coverImage,
        'ageRestriction' => $ageRestriction,
        'scareometer' => $scareometer,
        'critique' => $critique,
        'whysee' => $whysee,
        'whynotsee' => $whynotsee
    ];

    $sql = 'INSERT INTO movies (Title, ReleaseDate, Duration, Synopsis, Casting, Category, Director, Rating, Trailer, MoviePoster, ageRestriction, scareometer, critique, whysee, whynotsee) VALUES (:title, :releaseDate, :duration, :synopsis, :casting, :category, :director, :rating, :trailer, :coverImage, :ageRestriction, :scareometer, :critique, :whysee, :whynotsee)';
    $query = $db->prepare($sql);
    $query->execute($data);
    return true;
}

// Update the modified informations of the movie in the movie edit section, in the database
function updateMovie(): bool
{
    global $db;
    $data = [
        'title' => $_POST['title'],
        'releaseDate' => $_POST['releaseDate'],
        'synopsis' => $_POST['synopsis'],
        'category' => join(',', $_POST['categories']),
        'director' => $_POST['director'],
        'rating' => $_POST['scareometer'],
        'id' => $_GET['id'],
        'trailer' => $_POST['ytlink'],
        'age' => $_POST['age-restriction'],
        'critique' => $_POST['critique'],
        'duree' => $_POST['duration']
    ];

    try {
        $sql = 'UPDATE movies SET Title = :title, ReleaseDate = :releaseDate, Synopsis = :synopsis, Category = :category, Director = :director, scareometer = :rating, Trailer = :trailer, ageRestriction=:age, critique = :critique, Duration = :duree  WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    return true;
}
