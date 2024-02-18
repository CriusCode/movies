<?php
require '../vendor/autoload.php';

// Constants
define('SRC', '../src/');
// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();
$URLbanniere = 'images/bannieres';
$URLsticker = 'images/stickers';
$URLaffiche = 'images/affiches';
$URLstreaming = 'images/streaming';

session_start();
require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

$router = new AltoRouter();
//$router->setBasePath('/movies');

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';



$match = $router->match();
// $_GET['id'] = $match['params']['id'];
require SRC . 'includes/functions.php';

if (isset($_GET['deconnect'])) {

    globalDeconnect();
    header('Location: ' . $router->generate('login'));
}

logoutTimer();

// Twig 
// $loader = new \Twig\Loader\FilesystemLoader(SRC . 'views');
// $twig = new \Twig\Environment($loader, ['cache' => false, 'debug' => true]);

if (!empty($match['target'])) {
    checkAdmin($match, $router);
    $_GET = array_merge($_GET, $match['params']);
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';


    // Load twig template or classic view
    if (file_exists(SRC . 'views/' . $match['target'] . '.twig')) {
        echo $twig->render($match['target'] . '.twig');
    } else {
        require SRC . 'views/' . $match['target'] . 'View.php';
    }
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}
