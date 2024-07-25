<?php
function deleteMovie($movieID) {
    global $db;
    $sql = 'DELETE FROM movies WHERE id = :movieID';
    $query = $db->prepare($sql);
    $query->bindParam(':movieID', $movieID, PDO::PARAM_INT);
    $query->execute();
    echo json_encode(['success' => true]);
}