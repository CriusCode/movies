<?php global $router; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">

    <script type="module" crossorigin src="public/js/index.3ea0cc48.js"></script>
    <link rel="modulepreload" href="public/js/vendor.3d228fec.js">
    <link rel="stylesheet" href="public/css/index.000c16e0.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-body-primary mb-4 data-bs-theme='dark'" style="background-color: #252525">
        <div class="container">
            <a class="navbar-brand text-white" href="<?php echo $router->generate('home'); ?>"><img src="/public/images/assets/logoterrorama.png" alt="Logo de Terrorama" style="width:100px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarText">
                <ul id="tabs" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('all_movies')); ?>">Tous les films</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('next_movies')); ?>">Les sorties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo ($router->generate('contact')); ?>">Contact</a>
                    </li>
                </ul>
                <nav class="navbar" id="nb">
                    <form class="form" id="searchbar">
                        <input id="sb" class="rounded-pill p-2" type="search" placeholder="Recherchez votre film ici" aria-label="Search">
                    </form>
                </nav>
                <div class="navbar-text">
                    <a href="<?php echo (($router->generate('login'))); ?>"><button class="btn btn-light btn-sm rounded-pill mx-2 nav-btn" type="button">Connexion</button></a>
                    <a href="<?php echo (($router->generate('register'))); ?>"><button class="btn btn-light btn-sm rounded-pill p-1 nav-btn" type="button">Inscription</button></a>
                </div>
            </div>
        </div>
    </nav>