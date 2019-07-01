<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

	$id=$_GET['id'];
	
$sql = "DELETE FROM users WHERE user_id= $id";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Employee Information Deleted.
		</div>" ;
    header('Location: employee_info.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Employee Information  could not be Delete.
		
	
		</div>";
    header('Location: employee_info.php');

}

	  
//mysqli_close($connection);

?>


