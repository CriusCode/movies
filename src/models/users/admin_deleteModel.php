<?php

// Delete the user from the database, and displays a success or an error message
function deleteUser()
{
    try {
        global $db;
        $sql = 'DELETE FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        alert('L\'utilisateur a bien été supprimé.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            var_dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard. ', 'danger');
        }
    }
}

// Checks if the user is already in the database, and displays a success or an error message
function getAlreadyExistId()
{
    try {
        global $db;
        $sql = 'SELECT id FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}

function countUsers()
{
    global $db;
    $sql = 'SELECT COUNT(*) FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();
}
