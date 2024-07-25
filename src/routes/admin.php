<?php

$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Users (partie qu'on fait en cours)
$router->map( 'GET|POST', '/connexion', 'users/login', 'login'); 
$router->map( 'GET', $admin . '/deconnexion', '', ''); 
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword');
$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index', 'users');
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[i:id]', 'users/admin_edit', 'editUser');
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/', 'users/admin_edit', 'addUser');
$router->map( 'GET', $admin . '/utilisateurs/supprimer/[i:id]', 'users/admin_delete', 'deleteUser');

// Movies
$router->map( 'GET', $admin . '/films', '', ''); 
$router->map( 'GET|POST', $admin . '/films/modifier/', 'movies/admin_edit_movie', '');
$router->map('GET', '/admin/films/editer/[i:id]', 'editMovie', 'editMovie'); // Nouvelle route pour l'édition des films via le bouton "éditer"
$router->map( 'GET|POST', $admin . '/films/modifier/[i:id]', 'movies/admin_edit_movie', 'movies');
$router->map( 'GET|POST', $admin . '/films/supprimer/[i:id]', 'movies/admin_delete_movie', '');
$router->map( 'GET|POST', $admin . '/films/liste/', 'movies/admin_list_movie', 'list-movies');

// Categories
$router->map( 'GET|POST', $admin . '/categories/modifier/', 'categories/admin_edit_categories', 'categories'); // Page permettant de modifier les catégories déjà existantes, d'en supprimer, ou d'en ajouter de nouvelles

// Comments
$router->map( 'GET|POST', $admin. '/commentaires/moderer/[i:id]','comments/admin_check_comments', ''); // Page contenant tous les commentaires à controler
$router->map( 'GET|POST', $admin. '/commentaires/moderer/','comments/admin_check_comments', 'comments'); // Page contenant tous les commentaires à controler


// Suggestions
$router->map( 'GET|POST', $admin. '/suggestions/','suggestions/admin_suggestions', 'suggestions'); // Page contenant toutes les suggestions à controler

// Articles 
$router->map( 'GET|POST', $admin. '/articles/rediger/','articles/admin_articles', 'articles');