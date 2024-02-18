<?php

// Checks if the comment already exists
function checkAlreadyExistComment($IDComment)
{
    global $db;
    $sql = 'SELECT CommentId FROM Comments WHERE IDComment = :IDComment';
    $query = $db->prepare($sql);
    $query->bindParam(':IDComment', $IDComment, PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}

getAllComments();
