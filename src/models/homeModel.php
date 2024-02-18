<?php

// Function with SQL request to get all the users from the database
function getAllUsers ($db) {
	$sql = "SELECT * FROM users";
	$request = $db->prepare($sql);
	$request->execute();

	return $request->fetchAll();
}

// Function with SQL request to get all the movies from the database
function getAllMovies ($db) {
	$sql = "SELECT * FROM movies ORDER BY created DESC";
	$request = $db->prepare($sql);
	$request->execute();

	return $request->fetchAll();
}


// Function with SQL request to get all the reviews from the database
function getAllCritique() {

	global $db;

	$sql = "SELECT * FROM movies WHERE critique != '' LIMIT 0,3" ;
	$request = $db->prepare($sql);
	$request->execute();

	return $request->fetchAll();
}


