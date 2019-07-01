<?php
session_start();
require('db_connect.php');
$username = $_SESSION['adminName'];

// Receiving data
$fullname = $_POST['fullname'];
$email = $_POST['email'];

$sql = "UPDATE users SET fullname = '$fullname',email = '$email' where username = '$username'";
$connection->query($sql);

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Profile updated successfully.
		</div>" ;
		header('Location: ../view-profile.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Profile could not be updated.
		</div>" ;
		header('Location: ../view-profile.php');
 
}

$connection->close();

?>