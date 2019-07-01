<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';
//session_start();
$username = $_SESSION['adminName'];
// Read data
$sql = "SELECT * FROM users where username = '$username'";
$result = $connection->query($sql);
// output data of each row	
while($row = $result->fetch_assoc()) {	
	$fullname = $row['fullname'];
	$email = $row['email'];
	$username = $row['username'];
}
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

<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php include('include/navbar.php') ?>
    <!-- END HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">

        <div class="section__content section__content--p30">


            <div class="container-fluid">
                <div class="row">
                    <?php

                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        $_SESSION['message'] = NULL;
                    }
                    ?>
                </div>

                <div class="row">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-user"></i>
                                    <strong class="card-title pl-2">My Profile</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap">
                                        <h5 class="text-sm-center mt-2 mb-1">Full Name: <?php echo $fullname; ?></h5>
                                        <div class="location text-sm-center">
                                            <i class="fa fa-contao"></i> Username: <?php echo $username; ?></div>

                                        <div class="location text-sm-center">
                                            <i class="fa fa-inbox"></i> Email: <?php echo $email; ?></div>
                                    </div>
                                    <hr>
                                    <div class="card-text text-sm-center">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <!-- USER DATA-->
                            <div class="user-data m-b-30">

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>Edit Profile
                                        </h3>
                                    </div>


                                </div>


                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->


                                    <div class="row">


                                    <div class="col-sm-12">

                                            <form action="php_action/update_profile.php" method="POST" enctype="multipart/form-data">
                                                Full Name:<br>
                                                <input class="form-control" type="text" name="fullname" value="<?php echo $fullname; ?>" required="true">
                                                Username:<br>
                                                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" readonly="true">
                                                Email:<br>
                                                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required="true">
                                                <br>
                                                <input class="btn btn-primary" type="submit" value="Update Profile">
                                            </form>

                                      <br>
                                            <form action="php_action/update_password.php" method="POST" enctype="multipart/form-data" onsubmit="return(validate());" id="myForm">
                                                New Password:<br>
                                                <input class="form-control" type="password" name="password" required="true">
                                                Confirm New Password:<br>
                                                <input class="form-control" type="password" name="confirm_password" required="true">
                                                <br>
                                                <input class="btn btn-primary" type="submit" value="Update Password">
                                            </form>

                                    </div>
                                    </div>

                                    </div>
                                    <!--  END TOP CAMPAIGN-->

                            </div>
                            <!-- END USER DATA-->
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
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
