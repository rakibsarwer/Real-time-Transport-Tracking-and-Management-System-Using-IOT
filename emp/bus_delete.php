<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

	$idd=$_GET['id'];
	
$sql = "DELETE FROM bus_info WHERE id= $idd";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Bus Information Deleted.
		</div>" ;
    header('Location: bus_view.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> New Bus Information  could not be Delete.
		
	
		</div>";
    header('Location: bus_view.php');

}

	  
//mysqli_close($connection);

?>


