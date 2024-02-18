<?php

// Add the article into the database
function addArticle($db, $articleID, $articleContent, $movieID, $created)
{
    global $db;
    $sql = 'INSERT INTO articles WHERE articleID = :articleID, articleContent = :articleContent, movieID = :movieID, created = :created';
    $query = $db->prepare($sql);
    $query->bindParam(':articleID, :articleContent, :movieID, :created', $articleID, $articleContent, $movieID, $created);
    $query->execute();
}

// Update the article informations into the database
function updateArticle($db, $articleContent, $updated, $articleID)
{
    global $db;
    $sql = 'UPDATE articles SET articleContent = :articleContent, updated = :updated WHERE articleID = :articleID';
    $query = $db->prepare($sql);
    $query->bindParam(':articleContent, :updated, :articleID', $articleContent, $updated, $articleID);
    $query->execute();
}

// Delete the article from the database
function deleteArticle($db, $articleID)
{
    global $db;
    $sql = 'DELETE FROM articles WHERE articleID = :articleID';
    $query = $db->prepare($sql);
    $query->bindParam(':articleID', $articleID);
    $query->execute();
}


// Fetch all the articles stored in the database
function getAllArticles()
{
    global $db;
    $sql = 'SELECT * FROM articles';
    $query = $db->query($sql);
    $query->execute();

    return $query->fetchAll();
}

// Fetch the IDs of every article in the database
function getArticleByID($articleID) {
    global $db;
    $sql = 'SELECT * FROM articles WHERE articleID = :articleID';
    $query = $db->prepare($sql);
    $query->bindParam(':articleID', $articleID);
    $query->execute();
}

// Checks if a movie has already been reviewed, if so it means it has already a review in the database
function checkAlreadyExistArticle($articleID)
{
    global $db;
    $sql = 'SELECT articleID FROM articles';
    $query = $db->prepare($sql);
    $query->bindParam(':articleID ', $articleID, PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}