<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

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
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
                        <div class="col-lg-12">
                            <!-- USER DATA-->
                            <div class="user-data m-b-30">

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>Notice Content
                                        </h3>
                                    </div>


                                </div>


                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->
                                    <form action="php_action/store_blog.php" method="POST" enctype="multipart/form-data">
                                        Heading:<br>
                                        <input class="form-control" type="text" name="heading" value="" required="true">
                                        Details:<br>
                                        <textarea class="form-control" name="details" rows="8" required="true"></textarea>
                                        Image:<br>
                                        <input class="form-control" type="file" name="image" accept="image/*" required="true">
                                        <br>
                                        <input name="submit"class="btn btn-primary" type="submit" value="Publish">
                                    </form>

                                    <!--  END TOP CAMPAIGN-->
                                </div>
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




<?php include('include/navbar.php') ?>

<div class="container">
  <h1></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-6">

		</div>
		<div class="col-sm-6">
			      <?php
				
				if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					$_SESSION['message'] = NULL;
				}
			?> 				
		</div>
	</div>
	<br>

</div>


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
