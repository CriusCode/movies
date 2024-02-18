<?php


// Different conditions to check if a review already exists, it is set null by default because I will
// only review the movies I have seen, and can't review the upcoming movies without haven't seen them
// displays messages in consequences
if (isset($_POST['articleContent'])) {

    if (!empty($_POST['articleContent'])) {
        $articleID = isset($_GET['articleID']) ? $_GET['articleID'] : null;
        $articleContent = $_POST['articleContent'];

        if (!checkAlreadyExistArticle($articleID)) {
            if ($articleID !== null) {
                updateArticle($db, $articleContent, $updated, $articleID);
                alert('L\'article a bien été mise à jour', 'success');
            } else {
                addArticle($db, $articleID, $articleContent, $movieID, $created);
                alert('L\'article a bien été ajouté', 'success');
            }
        } else {
            alert('L\'article existe déjà dans la base de données', 'danger');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires pour l\'article', 'warning');
    }
}
