<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$speed = $_GET['speed'];
$pass = $_GET['pass'];
$no = $_GET['no'];
//$type = $_GET['type'];
$des = $_GET['des'];
$stat = $_GET['stat'];


require_once '../php_action/db_connect.php';

	date_default_timezone_set("Asia/Dhaka");
	
	
	$current_time=date('Y-m-d H:i:s');
	
	if($lat!=0.000000 && $lat!="" && $lng!="" && $speed!="" && $pass!="" && $stat!="" && $no!="")
	{

$sql = "INSERT INTO markers ( no, lat, lng, pass, des, speed, stat, time)
VALUES ( '$no', '$lat', '$lng', '$pass', '$des', '$speed', '$stat','$current_time')";

if (mysqli_query($connection, $sql)) {
    echo "inserted";
   
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
}
?>