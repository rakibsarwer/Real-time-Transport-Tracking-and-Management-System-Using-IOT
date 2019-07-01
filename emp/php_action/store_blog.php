<?php
session_start();
require('db_connect.php');


//This block is for image upload
$image = time().$_FILES['image']['name'];
$temporary_location= $_FILES['image']['tmp_name'];
$myLocation= '../images/'.$image;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$heading = $_POST['heading'];
$details = $_POST['details'];
$username = $_SESSION['adminName'];

//Get Current Date and Time Automaticly
date_default_timezone_set('Asia/Dhaka');
$date_time = date('F j, Y h:i:s a', time());

$sql = "INSERT INTO blogs (heading,details,image,username,date_time) VALUES ('$heading','$details','$image','$username','$date_time')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Blog Published successfully.
		</div>" ;
		header('Location: ../blog.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Blog could not be Published.
		</div>" ;
		header('Location: ../blog.php');
 
}

$connection->close();

?>