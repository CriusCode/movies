<?php

// Function that checks if a user has already commented a movie, if so, allows him to comment only once.
function hasUserCommented($db, $userID, $movieID)
{
    $sql = 'SELECT COUNT(*) FROM comments WHERE userID = :userID AND movieID = :movieID';
    $query = $db->prepare($sql);
    $query->bindValue(':userID', $userID, PDO::PARAM_INT);
    $query->bindValue(':movieID', $movieID, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchColumn() > 0;
}

// Function to get all the comments stocked in the database
function getAllComments()
{

    global $db;
    $sql = 'SELECT * FROM comments, users, movies WHERE comments.UserID = users.id AND comments.MovieID = movies.id ORDER BY STATUS';
    $query = $db->query($sql);
    $query->execute();

    return $query->fetchAll();
}


// Function to get all the pending comments stocked in the database
function getPendingComments($db, $movieID)
{
    $sql = 'SELECT * FROM comments WHERE movieID = :movieID AND status = :status';
    $query = $db->prepare($sql);
    $query->bindValue(':movieID', $movieID, PDO::PARAM_INT);
    $query->bindValue(':Status', 'pending', PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


// Function to validate and publish a user comment
function approveComment($db, $IDComment)
{
    $sql = 'UPDATE comments SET status = :status WHERE IDComment = :IDComment';
    $query = $db->prepare($sql);
    $query->bindValue(':Status', 'approved', PDO::PARAM_STR);
    $query->bindValue(':IDCOmment', $IDComment, PDO::PARAM_INT);
    $query->execute();
}


// Function to delete a comment
function deleteComment($db, $IDComment)
{
    $sql = 'DELETE FROM comments WHERE IDComment = :IDComment';
    $query = $db->prepare($sql);
    $query->bindValue(':IDComment', $IDComment, PDO::PARAM_INT);
    $query->execute();
}

// WHERE users.id = comments.UserID AND movies.id = comments.MovieID