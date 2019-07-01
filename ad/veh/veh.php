<?php
$veh = $_GET['veh'];


require_once '../php_action/db_connect.php';



$sql = "INSERT INTO veh (id, veh, time)
VALUES ('', $veh, NOW())";

if (mysqli_query($connection, $sql)) {
    echo "inserted";
   
} else {
     echo "failed";
}

mysqli_close($connection);
?>