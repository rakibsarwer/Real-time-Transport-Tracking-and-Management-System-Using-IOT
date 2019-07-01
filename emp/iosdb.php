<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';


$sql = "SELECT id, bus_id, stat_id, in_time, out_time FROM bus_stop";
$result = mysqli_query($connection, $sql);


//mysqli_close($connection);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      
       echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['bus_id'] . "</td>";
echo "<td>" . $row['stat_id'] . "</td>";
echo "<td>" . $row['in_time'] . "</td>";
echo "<td>" . $row['out_time'] . "</td>";
echo "</tr>";
}
}


?>
   