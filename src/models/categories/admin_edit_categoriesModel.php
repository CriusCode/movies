<?php

// Checks if the category already exists in the database
function checkAlreadyExistCategory($categoryName)
{
    global $db;
    $sql = 'SELECT CategoryName FROM Categories WHERE CategoryName = :categoryName';
    $query = $db->prepare($sql);
    $query->bindParam(':categoryName', $categoryName, PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}

// Add the new category in the database
function addCategory($categoryName): bool
{
    global $db;

    if (!empty($categoryName)) {
        $data = [
            'categoryName' => $categoryName,
        ];

        try {
            $sql = 'INSERT INTO Categories (CategoryName) VALUES (:categoryName)';
            $query = $db->prepare($sql);
            $query->execute($data);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    return false;
}


// Update the already existing category if it's necessary
function updateCategory($categoryID, $newCategoryName): bool
{
    global $db;

    if (!empty($newCategoryName)) {
        $data = [
            'categoryID' => $categoryID,
            'newCategoryName' => $newCategoryName,
        ];

        try {
            $sql = 'UPDATE Categories SET CategoryName = :newCategoryName WHERE CategoryID = :categoryID';
            $query = $db->prepare($sql);
            $query->execute($data);

            return true;
        } catch (PDOException $e) {

            return false;
        }
    }

    return false;
}


// Delete the category both visually and from the database
function deleteCategory($categoryID): array
{

    global $db;

    if (!empty($categoryID)) {
        $data = [
            'categoryID' => $categoryID
        ];

        try {
            $sql = 'DELETE FROM categories WHERE CategoryID = :categoryID';
            $query = $db->prepare($sql);
            $query->execute($data);

            return $data;
        } catch (PDOException $e) {

            return false;
        }
    }

    return false;
}
