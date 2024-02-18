<?php

// API endpoint to add movie recommandation in the database
if (isset($_POST['recommandation'])) {
    submitSuggestionREST($db, '', $_POST['recommandation'], date('now'));
    echo json_encode(array(
        "success" => true
    ));
}
