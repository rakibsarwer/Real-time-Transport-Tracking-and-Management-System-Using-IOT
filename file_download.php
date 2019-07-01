<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

 include('include/navbar.php') ?>

<div class="container">
  <h1>Transportation Shedule </h1>
<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

if(isset($_GET['id'])) { // if id is set then get the file with the id from database

$id = $_GET['id'];


$sql = "SELECT * FROM files WHERE id = $id";

$result = $connection->query($sql);  
if ($connection->query($sql) >0) {
  
	echo "Success";
   
} else {
	   echo "Failed";
 
} 

if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result)){
		$name=$row['name'];
		$type=$row['type'];
		$size=$row['size'];
		$content=$row['content'];
		
	


header("Content-length: $size");

header("Content-type: $type");

header("Content-Disposition: attachment; filename=$name");

echo $content;
 exit;

	}
}


}
?>

<?php 
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

$queryy = "SELECT * FROM files";

$resultt = $connection->query($queryy);

if(mysqli_num_rows($resultt) == 0)

{

echo "Database is empty";

}

else

{

while($roww=mysqli_fetch_assoc($resultt))
{$id=$roww['id'];
	$name=$roww['name'];
	$contentt=$roww['content'];

	
	
?>




	<div class="row">
		<a href="file_download.php?id=<?php echo $id;?>"><?php echo $name; ?></a>
		
	</div>
	
	
	


<?php
}


}

?>



			    
</div>



</body>
</html>
