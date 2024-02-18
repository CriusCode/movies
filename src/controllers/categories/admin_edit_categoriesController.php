<?php

// Fetch all the categories from the database
function getAllCategories()
{
    global $db;
    $sql = 'SELECT * FROM categories';
    $query = $db->query($sql);
    $query->execute();

    return $query->fetchAll();
}

// Conditions to create category, or update an already existing category, displays messages in consequences
if (isset($_POST['categoryName'])) {

    if (!empty($_POST['categoryName'])) {
        $categoryID = isset($_GET['id']) ? $_GET['id'] : null;
        $categoryName = $_POST['categoryName'];

        if (!checkAlreadyExistCategory($categoryName)) {
            if ($categoryID !== null) {
                updateCategory($categoryID, $categoryName);
                alert('La catégorie a bien été mise à jour', 'success');
            } else {
                addCategory($categoryName);
                alert('La catégorie a bien été ajoutée', 'success');
            }
        } else {
            alert('La catégorie existe déjà dans la base de données', 'danger');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires pour la catégorie', 'warning');
    }
}

// Allows a category to be deleted from the database
if (isset($_GET['deletecat'])) {
    if (deleteCategory($_GET['deletecat'])) {
        alert('La catégorie a bien été supprimée', 'danger');
    }
}
