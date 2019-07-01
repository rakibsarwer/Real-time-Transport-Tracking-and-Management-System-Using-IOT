<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

	$id=$_GET['id'];
	
$sql = "DELETE FROM blogs WHERE blog_id= $id";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Notice Deleted.
		</div>" ;
    header('Location: blog.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Notice could not be Delete.
		
	
		</div>";
    header('Location: blog.php');

}

	  
//mysqli_close($connection);

?>