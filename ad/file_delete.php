<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

	$idd=$_GET['id'];
	
$sql = "DELETE FROM files WHERE id= $idd";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Transport Shedule Deleted.
		</div>" ;
    header('Location: file_view.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Transport Shedule  could not be Delete.
		
	
		</div>";
    header('Location: file_view.php');

}

	  
//mysqli_close($connection);

?>


