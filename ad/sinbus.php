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
        @media print
        {

            .no-print, .no-print *
            {
                display: none !important;
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
                                    <div class="col-7">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>Kumira Bus Stopage RECORD
                                        </h3>
                                    </div>

                                    <div class="col-5">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-info btn-sm no-print" id="pdfBtn">Print /Download as PDF</button>
                                    </div>
                                </div>

                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->
                                    <?php
                                    $sql1 = "SELECT * FROM bus_stop WHERE stat_id='kumira' GROUP BY bus_id";
                                    $result1 = mysqli_query($connection, $sql1);

                                    if (mysqli_num_rows($result1) > 0) {
                                        // output data of each row
                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                            $bus_no =  $row1['bus_id'] ;


                                            echo "<br><div><h4>".$bus_no." No Bus Record</h4><br><table class='table table-bordered'><thead><tr><th>TRIP NUMBER</th><th>BUS NO</th><th>BUS STOPAGE</th><th>IN TIME</th><th>OUT TIME</th></tr></thead><tbody>";

                                            // output data of each row


                                            $sql2 = "SELECT * FROM bus_stop WHERE bus_id='$bus_no' AND stat_id='kumira' ";
                                            $result2 = mysqli_query($connection, $sql2);

                                            if (mysqli_num_rows($result2) > 0) {
                                                // output data of each row
                                                $trip22='1';
                                                while($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo "<tr>";
                                                    $bus_noo=$row2['bus_id'];
                                                    echo "<td>" . $trip22 . "</td>";

                                                    echo "<td>" . $row2['bus_id'] . "</td>";
                                                    echo "<td>" . $row2['stat_id'] . "</td>";
                                                    echo "<td>" . $row2['in_time'] . "</td>";
                                                    echo "<td>" . $row2['out_time'] . "</td>";
                                                    echo "</tr>";
                                                    $trip22++;
                                                }


                                                echo "</tbody></table></div>";



                                            }

                                        }

                                    }

                                    ?>
                                    <!--  END TOP CAMPAIGN-->
                                </div>
                            </div>
                            <!-- END USER DATA-->
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>_______________________________Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.___________________</p>
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


<script>
    $(document).ready(function(){
        $("#pdfBtn").click(function(){
            window.print();
        });
    });
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
