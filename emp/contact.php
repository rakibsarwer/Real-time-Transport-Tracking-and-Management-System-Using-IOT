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
  

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="animsition">

<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php include('include/navbar.php') ?>
    <!-- END HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div  style="margin-top:7%">

        <div>


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
                                            <i class="zmdi zmdi-account-calendar"></i>CONTACT
                                        </h3>
                                    </div>


                                </div>


                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->
                                    <div class="container-fluid bg-grey">
                                        <h2 class="text-center"></h2>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <p>Contact us and we'll get back to you within 24 hours.</p>
                                                <p><span class="glyphicon glyphicon-map-marker"></span> IIUC, Chittagong</p>
                                                <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
                                                <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                                                    </div>
                                                </div>
                                                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                        <button class="btn btn-primary pull-right" type="submit">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div id="googleMap" style="height:400px;width:100%;"></div>
                                    </div>
                                    </div>
                                    <!-- Add Google Maps -->

                                    <!--  END TOP CAMPAIGN-->
                                </div>
                            </div>
                            <!-- END USER DATA-->
                        </div>


                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>





<script>
function myMap() {
var myCenter = new google.maps.LatLng(22.3685607,91.7787405);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>



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
