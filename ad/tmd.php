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
  <style>
   
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
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
                                            <i class="zmdi zmdi-account-calendar"></i>TMD PROGRAMS
                                        </h3>
                                    </div>


                                </div>


                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->
                                    <!-- Container (Portfolio Section) -->
                                    <div class="container text-center bg-grey">
                                        <h2></h2><br>

                                        <div class="row text-center">
                                            <div class="col-sm-4">
                                                <div class="thumbnail">
                                                    <img src="images/car/c.jpg" alt="Paris" width="400" height="300">
                                                    <p><strong>New Program</strong></p>
                                                    <p>Happend at 12/7/2018</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="thumbnail">
                                                    <img src="images/car/c.jpg" alt="New York" width="400" height="300">
                                                    <p><strong>Old Program</strong></p>
                                                    <p>Happend at 12/4/2018</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="thumbnail">
                                                    <img src="images/car/c.jpg" alt="San Francisco" width="400" height="300">
                                                    <p><strong>Mix Program</strong></p>
                                                    <p>Happend at 12/6/2018</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>




                                    <div class="container text-center bg-grey" >
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="title-3 m-b-30">
                                                    <i class="zmdi zmdi-account-calendar"></i>Photo Gallery
                                                </h3>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/h.jpeg" target="_blank">
                                                        <img src="images/car/h.jpeg" alt="Lights" style="width:100%">
                                                        <div class="caption">
                                                            <p>IIUC Central Auditoriam..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/f.jpg" target="_blank">
                                                        <img src="images/car/f.jpg" alt="Nature" style="width:100%">
                                                        <div class="caption">
                                                            <p>IIUC Bus Waiting..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/g.jpeg" target="_blank">
                                                        <img src="images/car/g.jpeg" alt="Fjords" style="width:100%">
                                                        <div class="caption">
                                                            <p>BRTC Bus On The Bus Stopage..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/e.jpg" target="_blank">
                                                        <img src="images/car/e.jpg" alt="Lights" style="width:100%">
                                                        <div class="caption">
                                                            <p>IIUC Centarl Mosque..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/e.jpg" target="_blank">
                                                        <img src="images/car/e.jpg" alt="Nature" style="width:100%">
                                                        <div class="caption">
                                                            <p>IIUC Centarl Mosque..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <a href="images/car/e.jpg" target="_blank">
                                                        <img src="images/car/e.jpg" alt="Fjords" style="width:100%">
                                                        <div class="caption">
                                                            <p>IIUC Centarl Mosque..</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

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










  <br>




<footer class="container-fluid text-center">
  <p>Copyright By @IIUC-TMD</p>
</footer>

</body>
</html>
