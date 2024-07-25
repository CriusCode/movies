<?php
/**
 * Get the header
 * @param  string $title  The title of the page
 * @param  string $layout The layout to use
 * @return void
 */
function get_header(string $title, string $layout ='public'): void
{
	require_once '../src/views/layouts/' . $layout . '/header.php';
}


/**
 * Get the footer
 * @param  string $layout The layout to use
 * @return void
 */
function get_footer (string $layout ='public'): void
{
	require_once '../src/views/layouts/' . $layout . '/footer.php';
}
/**
 * Create alert
 *
 * @param string $message The message to save in alert
 * @param string $type    The type of the alert
 * @return void
 */
function alert (string $message, string $type = 'danger'): void
{
    $_SESSION['alert'] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Display alert session
 * @return void
 */
function displayAlert (): void
{
    if (!empty($_SESSION['alert'])) {
        echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert">' . $_SESSION['alert']['message'] . '</div>';

        unset($_SESSION['alert']);
    }
}

displayAlert(); 

function checkAdmin(array $match, AltoRouter $router)
{
    $existAdmin = strpos($match['target'], "admin");
    if ($existAdmin !== false && empty($_SESSION['user']['id'])) {
        header('Location: ' . $router->generate('login'));
    }
}

function globalDeconnect(){
    
    unset($_SESSION['user']);
    unset($_SESSION['attemps']);
}


// If the user or the admin makes 5 unsuccesful connexion attempts, it is blocked for a certain time
function limitAttemps()
{
    global $router;

    if (!empty($_SESSION['attemps']['time'])) {
        $date = new DateTimeImmutable();
        $now = $date->getTimestamp();
        $diff = $now - $_SESSION['attemps']['time'];

        if ($diff > 300) {
            unset($_SESSION['attemps']);
        } else {
            alert('Trop de tentatives, veuillez réessayer dans 5 minutes');
            header('Location: ' . $router->generate('home'));
            die;
        }
    } else {
        if (empty($_SESSION['attemps'])) {
            $_SESSION['attemps']['count'] = 1;
        } else if (!empty($_SESSION['attemps']['count']) && $_SESSION['attemps']['count'] < 5) {
            $_SESSION['attemps']['count']++;
        } else if ($_SESSION['attemps']['count'] >= 5) {
            $date = new DateTimeImmutable();
            $_SESSION['attemps']['time'] = $date->getTimestamp();
        }
    }
}

// Function that automatically disconnect a user or an admin for inactivity after a certain time
function logoutTimer ()
{
    global $router;

    if (!empty($_SESSION['user']['lastLogin'])) {
        $expireHour = 60; // Penser à changer pour la mise en ligne du site

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Europe/Paris'));

        $lastLogin = new DateTime($_SESSION['user']['lastLogin']);

        if ($now->diff($lastLogin)->h >= $expireHour) {
            unset($_SESSION['user']);
            alert('Vous avez été déconnecté pour inactivité', 'danger');
            header('Location: ' . $router->generate('login'));
            die;
        }
    }
}