<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];

$speed = $_GET['speed'];



require_once '../php_action/db_connect.php';



$sql ="INSERT INTO maptest (id, lat, lng, speed)
VALUES ('',$lat, $lng, $speed)";

if (mysqli_query($connection, $sql)) {
    echo "failed";
   
} else {
     echo "inserted";
}

mysqli_close($connection);
?>