<?php

//Using PDO in this example.

$username = "root";
$password = "";
$database = "id6526789_myblog";


// Start XML file, create parent node


// Opens a connection to a MySQL server

$connection=mysqli_connect ('localhost', $username, $password);


// Set the active MySQL database

$db_selected = mysqli_select_db($connection,$database);

// Select all the rows in the markers table

//Get our locations from the database.
$sth = $pdo->prepare("SELECT `lat`, `lng` FROM `markers`");
$sth->execute();
$locations = $sth->fetchAll(PDO::FETCH_ASSOC);

//Encode the $locations array in JSON format and print it out.
header('Content-Type: application/json');
echo json_encode($locations);