<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';




$id=$_GET['id'];
// Read data
$sql = "SELECT * FROM users where user_id = $id";
$result = $connection->query($sql);
// output data of each row	
while($row = $result->fetch_assoc()) {	
	$fullname = $row['fullname'];
	$email = $row['email'];
	$username = $row['username'];
}

// Receiving data

if(isset($_POST['update']))
{
$idN=$_POST['id'];
$fullName = $_POST['fullname'];
$emailN = $_POST['email'];
$userName=$_POST['username'];
$passwordN = md5($_POST['password']);
$rolN=$_POST['rol'];
$sqlu = "UPDATE users SET fullname = '$fullName',email = '$emailN',username = '$userName',password = '$passwordN', rol= '$rolN' where user_id = $idN";
$connection->query($sqlu);


if ($connection->query($sqlu) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Password updated successfully.
		</div>" ;
		header('Location: employee_info.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Password could not be updated.
		</div>" ;
		header('Location: employee_info.php');
 
}
}

$connection->close();

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('include/navbar.php') ?>

<div class="container">
  <h1>Update Employee Information</h1>


	<div class="row">
		<div class="col-sm-6">
		<form class="form-horizontal" id="updateBus" action="" method="post" enctype="multipart/form-data" onsubmit="return(validate());" id="myForm">
        <fieldset>
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

            <div class="form-group">
                <label for="busname" class="col-sm-4 control-label">Full Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="busname" name="fullname" placeholder="Bus Name" value="<?php echo $fullname; ?>"  />
					
					
			
		
					
                </div>
            </div>
            <div class="form-group">
                <label for="busnum" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="busnum" name="username" placeholder="Bus Number" value="<?php echo $username; ?>" required="true"/>
					
                </div>
            </div>

            <div class="form-group">
                <label for="tagno" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tagno" name="email" placeholder="Tag Number"  value="<?php echo $email; ?>"  required="true"/>
					
                </div>
            </div>
            <div class="form-group">
                <label for="driverinfo" class="col-sm-4 control-label">New Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="driverinfo" name="password" placeholder="Driver Information" required="true"/>
					
                </div>
            </div>
			
			<div class="form-group">
                <label for="driverinfo" class="col-sm-4 control-label">Confirm New Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="driverinfo" name="password" placeholder="Driver Information" required="true"/>
					
                </div>
            </div>
			
			<div class="form-group">
                <label for="rol" class="col-sm-4 control-label">Admin Check:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="rol" name="rol" placeholder="Admin Check"/>
					
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button name="update" type="submit" class="btn btn-info"> <i class="glyphicon glyphicon-log-in"></i> Update Information</button>
                </div>
            </div>
        </fieldset>
    </form>
		
		
					
		</div>
	</div>
	<br>
			    
</div>

<script type="text/javascript">
    function validate()
      {
		var myForm = document.getElementById("myForm"); 
		
		var string_1 = myForm.elements.namedItem("password").value;
		var string_2 = myForm.elements.namedItem("confirm_password").value;
		
		if(string_1.length < 6 ){
		    alert( "Password Should be minimum 6 characters" );
            myForm.elements.namedItem("password").focus() ;
            return false;
		}
		
		if(string_1 != string_2){
		    alert( "Password Does Not Match!" );
            myForm.elements.namedItem("password").focus() ;
            return false;
		}
		 
		 return( true );
		
	  }
</script>

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
