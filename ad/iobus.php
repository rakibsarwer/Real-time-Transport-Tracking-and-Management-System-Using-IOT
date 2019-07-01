<?php

    include 'php_action/db_connect.php';
    
    $bus_id= $_GET['bus'];
 	$stat_id= $_GET['stat'];
//$bus_id= "20";
//$stat_id= 1;
	
  	date_default_timezone_set("Asia/Dhaka");
	
	
	$current_time=date('Y-m-d H:i:s');
	
	
	$sql = "SELECT * FROM bus_info WHERE bus_no = '$bus_id'";
$result= mysqli_query($connection, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    
    

	

    $sql = "SELECT * From bus_stop WHERE bus_id='$bus_id' && stat_id='$stat_id'  ORDER BY id DESC LIMIT 1";
    
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $out_time = $row['out_time'];
            if($out_time=='0000-00-00 00:00:00'){
                $sql = "UPDATE bus_stop SET out_time='$current_time' WHERE id='$id'";
                mysqli_query($connection, $sql);
                echo 'inserted';
                
            }
            else{
                $sql = "INSERT INTO bus_stop (bus_id, stat_id, in_time, out_time) VALUES ('$bus_id', '$stat_id', 
        '$current_time','NULL')";
    
            mysqli_query($connection, $sql);
            echo 'inserted';
                
            }
        }
    }
    else{
        $sql = "INSERT INTO bus_stop (bus_id, stat_id, in_time, out_time) VALUES ('$bus_id', '$stat_id', 
        '$current_time','NULL')";
    
        mysqli_query($connection, $sql);
        echo 'inserted';    
    }
    //  mysqli_query($connection,$data);
	
  } else {
    echo "failed";
}
?>