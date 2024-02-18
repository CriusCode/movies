<?php
// Movies
$router->map( 'GET', '/', 'home', 'home');
$router->map( 'GET', '/recherche', 'search');
$router->map( 'GET', '/details/[i:id]', 'movies/movie_details', 'details');
$router->map( 'GET', '/details/', 'movies/movie_details', 'movie_details');
$router->map( 'GET', '/les-classiques/', '/classics', 'classics');
$router->map('GET', '/tous-les-films', 'all_movies', 'all_movies');
// Pages
$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');

// Inscription

$router->map( 'GET|POST', '/inscription','register', 'register');

// Connexion


// Contact 
$router->map( 'GET', '/contact', 'contact', 'contact');

// Rest API
$router->map( 'GET|POST', '/api', 'api', 'api');

// Privacy Policy
$router->map( 'GET', '/privacy-policy', '/privacy_policy', 'privacy_policy');

// CGU 
$router->map( 'GET', '/cgu', '/cgu', 'cgu');

// About
$router->map( 'GET', '/a-propos', '/about', 'about');

// Next movies details
$router->map( 'GET', '/prochaines-sorties-liste', '/next_movies', 'next_movies');
$router->map( 'GET', '/prochaines-sorties', '/next_movie_details', 'prochaines-sorties');
