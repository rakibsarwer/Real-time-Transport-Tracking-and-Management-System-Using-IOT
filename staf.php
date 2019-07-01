<?php
require_once 'php_action/db_connect.php';



$sql = "SELECT id, staf_id, staf_pic, staf_name, staf_contact, staf_email FROM staf_info";
$result = mysqli_query($connection, $sql);


mysqli_close($connection);

?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TMD </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('include/navbar.php') ?>
<div class="container">
    
  <h2>List of Employees of TMD</h2>
  <br>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>SL</th>
         <th>Designation</th>
         <th>Picture</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        
      </tr>
    </thead>
    <tbody>
      
      
<?php

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      
       echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['staf_id'] . "</td>";
echo "<td>";
echo '<img src="data:image/png;base64,'.base64_encode($row['staf_pic']).'" class="img-circle" width="50" height="50"/>';
echo"</td>";
echo "<td>" . $row['staf_name'] . "</td>";
echo "<td>" . $row['staf_contact'] . "</td>";
echo "<td>" . $row['staf_email'] . "</td>";

echo "</tr>";
}
}
?>
     
      
    </tbody>
  </table>
</div>

</body>
</html>
