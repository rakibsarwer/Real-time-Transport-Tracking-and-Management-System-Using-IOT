<?php
session_start();
require('db_connect.php');


//This block is for image upload
$imageN = time().$_FILES['image']['name'];
$temporary_location= $_FILES['image']['tmp_name'];
$myLocation= '../images/'.$imageN;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$idN=$_POST['id'];
$headingN = $_POST['heading'];
$detailsN = $_POST['details'];
$userName = $_SESSION['adminName'];

//Get Current Date and Time Automaticly
date_default_timezone_set('Asia/Dhaka');
$dateTime = date('F j, Y h:i:s a', time());

$sqlu = "UPDATE blogs SET heading = '$headingN',details = '$detailsN',image = '$imageN',username = '$userName', date_time= '$dateTime' WHERE blog_id = $idN";
if ($connection->query($sqlu) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Blog Post Updated successfully.
		</div>" ;
		header('Location: ../blog.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Blog Post could not be Updated.
		</div>" ;
		header('Location: ../blog.php');
 
}

$connection->close();

?>