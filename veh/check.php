

<?php
$veh = $_GET['veh'];


require_once '../php_action/db_connect.php';




$sql = "SELECT *FROM veh WHERE veh = '$veh'";
$result= mysqli_query($connection, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "have";
    
} else {
    echo "not";
}
mysqli_close($connection);
?>