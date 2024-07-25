<?php

// Checks if there is still more than one user/admin, if so, the user or the admin can be deleted
if (!empty($_GET['id']) && (!empty(getAlreadyExistId()->id) && countUsers() > 1)) {
    deleteUser();
    header('Location: ' . $router->generate('users'));
    die();
 
} else {
    header('Location: ' . $router->generate('users'));
    die;
}

