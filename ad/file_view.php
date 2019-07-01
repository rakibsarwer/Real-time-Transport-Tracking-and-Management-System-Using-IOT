<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

//mysqli_close($connection);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>TMD Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('include/navbar.php') ?>
<div class="container">
 <div class="row">
        <?php

        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            $_SESSION['message'] = NULL;
        }
        ?>
    </div>

    <h2>Transportation Shedule Information</h2>
	<br>
	<br>
	<div class="row">
	

	
	
	

<?php 
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)

{

$fileName = $_FILES['userfile']['name'];

$tmpName  = $_FILES['userfile']['tmp_name'];

$fileSize = $_FILES['userfile']['size'];

$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');

$content = fread($fp, filesize($tmpName));

$content = addslashes($content);

fclose($fp);

if(!get_magic_quotes_gpc())

{

$fileName = addslashes($fileName);

}


$query = "INSERT INTO files (name, size, type, content ) ".

"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysqli_query($connection,$query) or die('Error, query failed');

echo "
File $fileName uploaded
";

}

?>
<form method="post" enctype="multipart/form-data">


<table width="470" border="0" cellspacing="1" cellpadding="1">
<tbody>
<tr>
<td width="20"></td>
<td width="100"><b>File Upload :</b></td>
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	
<input id="userfile" type="file" name="userfile" class="btn btn-default" role="button"/></td>
<td width="80"><input id="upload" type="submit" name="upload" value=" Upload " class="btn btn-info" role="button"/></td>
</tr>
</tbody>
</table>
</form>


	</div>

	<br>
	<br>
    <table class="table table-hover">
        

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


$queryy = "SELECT * FROM files ";

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

<tr>

	
		<td><a href="file_download.php?id=<?php echo $id;?>"><?php echo $name; ?></a></td>
		<td><a class="btn btn-success" href="file_download.php?id=<?php echo $id;?>">Download</a></td>
		<td><a class="btn btn-success"  href="file_delete.php?id=<?php echo $id;?>">Delete</a></td>
		
	
	
	</tr>
	


<?php
}


}

?>



			    
</div>
		
    </table>



<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>
</body>
</html>


