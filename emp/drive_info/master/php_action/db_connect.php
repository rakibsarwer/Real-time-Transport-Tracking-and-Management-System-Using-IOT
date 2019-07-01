<?php 	
//This is for working on XAMP server 
$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "id6526789_myblog";



// db connection
$connection = new mysqli($localhost, $username, $password, $databaseName);
// check connection
if($connection->connect_error) {
  die("Connection Failed : " . $connection->connect_error);
} else {
  // echo "Successfully connected";
}



?>