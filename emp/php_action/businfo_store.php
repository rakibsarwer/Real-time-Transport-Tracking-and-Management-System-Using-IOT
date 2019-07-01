<?php
session_start();
require('db_connect.php');

// Receiving data
$id = $_POST['id'];
$busName = $_POST['busName'];
$busNum = $_POST['busNum'];
$tagNo = $_POST['tagNo'];
$driverInfo = $_POST['driverInfo'];

if(isset($_POST['submit']))
{

$sql = "INSERT INTO bus_info (bus_name,bus_no,tag_no,driver_info) VALUES ('$busName','$busNum','$tagNo','$driverInfo')";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Bus Information added.
		</div>" ;
    header('Location: ../bus_view.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> New Bus Information could not be added.
	
		</div>" ;
    header('Location: ../bus_view.php');

}
}

if (isset($_POST['update']))
{
	
	
$sql = "UPDATE bus_info SET bus_name ='$busName',bus_no ='$busNum',tag_no ='$tagNo',driver_info ='$driverInfo' WHERE id= $id";

if ($connection->query($sql) === TRUE) {

    $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Bus Information Updated.
		</div>" ;
    header('Location: ../bus_view.php');

} else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> New Bus Information  could not be Updated.
		
	
		</div>";
    header('Location: ../bus_view.php');

}
}


$connection->close();

?>