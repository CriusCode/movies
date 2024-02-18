<?php global $router; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark bg-body-primary mb-4 data-bs-theme='dark'">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Terrorama | Espace administrateur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="<?php echo ($router->generate('movies')); ?>">Gestion des films</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('categories')); ?>">Gestion des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('comments')); ?>">Gestion des commentaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('users')); ?>">Gestion des utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('articles')); ?>">Gestion des articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('suggestions')); ?>">Suggestions de films</a>
                    </li>
                </ul>
                <div class="navbar-text">
                    <!-- <button class="btn btn-outline-primary" type="button">Connexion</button> -->
                    <a href="?deconnect"><button class="btn btn-danger" type="button">Déconnexion</button></a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mb-4">
        <?php displayAlert(); ?>