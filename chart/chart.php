 <?php

	   include '../php_action/db_connect.php';
  
 $data[] = array('Time','Passenger');
 $sql = "select * from markers WHERE no ='11-0152'";
 $query = mysqli_query($connection,$sql);
 while($result = mysqli_fetch_array($query))
{
     date_default_timezone_set("Asia/Dhaka");
	
	
	$current_time=date('Y-m-d h:i:s');
	
    $datetime = $result['time'];
 $date = date('Y-m-d', strtotime($datetime));
 $time = date('h:i:s', strtotime($datetime));
    
    
 $data[] = array($time,(int)$result['pass']);

 }		
 echo json_encode($data);

 ?>

