<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$speed = $_GET['speed'];
$pass = $_GET['pass'];
$no = $_GET['no'];
$type = $_GET['type'];
$des = $_GET['des'];
$stat = $_GET['stat'];


require_once '../php_action/db_connect.php';



$sql = "INSERT INTO markers (id, no, lat, lng, type, pass, des, speed, stat, time)
VALUES ('', $no, $lat, $lng, $type, $pass, $des, $speed, $stat, NOW())";

if (mysqli_query($connection, $sql)) {
    echo "inserted";
   
} else {
     echo "failed to inserted";
}

mysqli_close($connection);
?>