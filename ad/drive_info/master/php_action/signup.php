<?php
session_start();
require_once('db_connect.php');


   
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        //echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    
// escape variables for security
$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
$email    = mysqli_real_escape_string($connection, $_POST['email']);
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$rol = mysqli_real_escape_string($connection, $_POST['rol']);


$password = password_hash($password, PASSWORD_DEFAULT);



$sql = "INSERT INTO users (fullname,email,username,password,rol) 
		VALUES ('$fullname','$email','$username','$password','$rol')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Employee Added successfully.
		</div>" ;
		header('Location: ../employee_info.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> New Employee could not be Added .
		</div>" ;
		header('Location: ../employee_info.php');
 
}

$connection->close();

?>