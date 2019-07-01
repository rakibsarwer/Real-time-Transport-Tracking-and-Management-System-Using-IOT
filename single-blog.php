<?php
require_once 'php_action/db_connect.php';

$id = $_GET['id'];
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyBlog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="custom/style.css">
</head>
<body>
<?php include('include/navbar.php') ?>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Create Notice</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="blog.php">Notice Feed</a></li>
		<li class=""><a href="map.php">Google Map</a></li>

      </ul><br>

    </div>

    <div class="col-sm-9">
	  <?php 
	    $sql = "SELECT * FROM blogs where blog_id = '$id' ";
		$result = $connection->query($sql);              
		while($row = $result->fetch_assoc()) {  
			$heading = $row['heading'];  
			$details = $row['details']; 
			$image = $row['image']; 
			$username = $row['username']; 
			$date_time = $row['date_time'];
			$blog_id = $row['blog_id'];			
	  ?>

      <hr>
      <h2><?php echo $heading; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo $username.",".$date_time; ?></h5>
	  <img src="images/<?php echo $image?>" width="90%" height="500px">
	  <br><br>
      <?php echo $details; ?>
	  <br>
      <br><br>
	  <?php } ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
