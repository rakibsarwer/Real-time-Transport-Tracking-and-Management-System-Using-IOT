<?php
require_once 'php_action/db_connect.php';

?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>IIUC TMD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<?php include('include/navbar.php') ?>
<div class="container-fluid">

  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Notice Feed</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="blog.php">Notice Feed</a></li>
		<li class=""><a href="map.php">Google Map</a></li>
      </ul><br>

    </div>

    <div class="col-sm-9">

	  <?php 
	    $sql = "SELECT * FROM blogs ORDER BY blog_id DESC";
		$result = $connection->query($sql);              
		while($row = $result->fetch_assoc()) {  
			$heading = $row['heading'];  
			$details = $row['details']; 
			$image = $row['image']; 
			$username = $row['username']; 
			$date_time = $row['date_time'];
			$blog_id = $row['blog_id'];			
	  ?>
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2><?php echo $heading; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo $username.",".$date_time; ?></h5>
      <?php echo substr($details,0,250); ?>
	  <br>
	  <a class="btn btn-primary" href="single-blog.php?id=<?php echo $blog_id?>">View More..</a>

      <br><br>
	  <?php } ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>@copyright by iiuc-tmd</p>
</footer>

</body>
</html>
