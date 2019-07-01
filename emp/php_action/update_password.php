<?php
session_start();
require('db_connect.php');
$username = $_SESSION['adminName'];
// Receiving data
$password = md5($_POST['password']);

$sql = "UPDATE users SET password = '$password' where username = '$username'";
$connection->query($sql);

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Password updated successfully.
		</div>" ;
		header('Location: ../view-profile.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Password could not be updated.
		</div>" ;
		header('Location: ../view-profile.php');
 
}

$connection->close();

?>