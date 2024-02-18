<?php
// Get the selected informations from the table "users" in the database
function getUsers ()
{
    global $db;

    $sql = 'SELECT id, email FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}
