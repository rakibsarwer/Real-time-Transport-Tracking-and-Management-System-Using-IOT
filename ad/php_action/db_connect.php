<?php 	
//This is for working on XAMP server 
$localhost = "localhost";
$username = "id8364444_iiuctmdtest";
$password = "mgsr25657860";
$databaseName = "id8364444_iiuctmdtest";



// db connection
$connection = new mysqli($localhost, $username, $password, $databaseName);
// check connection
if($connection->connect_error) {
  die("Connection Failed : " . $connection->connect_error);
} else {
  // echo "Successfully connected";
}



?>