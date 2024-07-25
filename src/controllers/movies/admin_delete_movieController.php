<?php
// Check if the user is logged in and if we have an ID of a movie
if(isset($_GET['id']) && isset($_SESSION['user']['id'])) {
    deleteMovie($_GET['id']);
}