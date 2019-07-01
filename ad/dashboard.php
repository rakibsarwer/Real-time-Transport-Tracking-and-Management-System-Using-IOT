<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';


// = "SELECT * FROM bus_stop WHERE stat_id!='kumira' AND out_time!='NULL'  GROUP BY bus_id DESC ";
//$sql_in="SELECT MAX(id) as mid,bus_id,MIN(out_time) AS minOutTime, stat_id FROM bus_stop WHERE stat_id!='kumira' GROUP BY bus_id ORDER BY mid ASC ";
//$result_in = mysqli_query($connection, $sql_in);




$sql_out = "SELECT * FROM bus_stop WHERE  stat_id='kumira' AND out_time!= 'NULL' ORDER BY `out_time` DESC LIMIT 1";
$result_out = mysqli_query($connection, $sql_out);






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
  <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
img.resize {
  width:100%;
  height:30%;
}
</style>
</head>
<body>




<div class="page-wrapper">
    <!-- HEADER MOBILE-->

    <?php include('include/navbar.php') ?>
        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content" style="background-color: white;">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card">
                                <div class="card-header bg-white">
                                    <strong class="card-title">

                                        <center> <h1 align="center">Transport Management Division</h1>

                                            <?php

                                            if(isset($_SESSION['message'])){
                                                echo $_SESSION['message'];
                                                $_SESSION['message'] = NULL;
                                            }
                                            ?>
                                            <br>
                                            <h3>Welcome Admin : <?php echo $_SESSION['adminName']; ?></h3>
                                            <p>This is The Daily List of Bus Status .</p>

                                        </center>
                                    </strong>
                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="card border border-success">
                                                <div class="card-header bg-success">
                                                    <strong class="card-title text-light">


                                                        Incomming Bus From City

                                                        <small>
                                                            <span class="badge badge-warning float-right mt-1">
                                                                 <strong>
                                                                 <?php echo "7";?>
                                                                 </strong>
                                                            </span>
                                                        </small>
                                                    </strong>
                                                </div>
                                                <div>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Bus No</th>
                                                            <th>Station</th>
                                                            <th>Out Time</th>



                                                        </tr>
                                                        </thead>
                                                        <tbody>



                                                        <?php




                                                        $dat='2018-12-26';
                                                        //date('Y-m-d');
                                                        $dur = "SELECT * FROM bus_stop WHERE stat_id!='kumira' AND DATE(out_time)='$dat' ORDER  BY `id` DESC";

                                                        $dresult = mysqli_query($connection, $dur);



                                                        if (mysqli_num_rows($dresult) > 0)
                                                        {
                                                            //  output data of each row


                                                            while ($row = mysqli_fetch_assoc($dresult))
                                                            {
                                                                $id=$row['id'];
                                                                $bus_idd=$row['bus_id'];

                                                                $sq="SELECT * FROM bus_stop Where bus_id='$bus_idd' AND id >'$id'";
                                                                $sresult = mysqli_query($connection, $sq);

                                                                if(mysqli_num_rows($sresult)==0)
                                                                {
                                                                    echo "<tr><td>" . $bus_idd . "</td>" ;
                                                                    echo "<td>" . $row['stat_id'] . "</td>";
                                                                    echo "<td>" . $row['out_time'] . "</td></tr>";
                                                                }

                                                            }


                                                        } // end of bus loop
                                                        ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="card border border-danger">
                                                <div class="card-header bg-danger">
                                                    <strong class="card-title text-light">
                                                        Outgoing Bus From Campus
                                                        <small>
                                                            <span class="badge badge-warning float-right mt-1">
                                                                 <strong>
                                                                 <?php echo "7";?>
                                                                 </strong>
                                                            </span>
                                                        </small>
                                                    </strong>
                                                </div>
                                                <div>
                                                    <table class="table table-bordered">

                                                        <thead><tr>
                                                            <th>Bus No</th>
															<th>Station</th>
                                                            <th>Out Time</th>

                                                        </tr></thead><tbody>
                                                        <?php





                                                        $dat='2018-12-26';
                                                        //date('Y-m-d');
                                                        $dur = "SELECT * FROM bus_stop WHERE stat_id='kumira' AND DATE(out_time)='$dat'  ORDER  BY `id` DESC";
                                                        $dresult = mysqli_query($connection, $dur);


                                                        if (mysqli_num_rows($dresult) > 0)
                                                        {
                                                            //  output data of each row


                                                            while ($row = mysqli_fetch_assoc($dresult))
                                                            {
                                                                $id=$row['id'];
                                                                $bus_idd=$row['bus_id'];

                                                                $sq="SELECT * FROM bus_stop Where bus_id='$bus_idd' AND id >'$id'";
                                                                $sresult = mysqli_query($connection, $sq);

                                                                if(mysqli_num_rows($sresult)==0)
                                                                {
                                                                    echo "<tr><td>" . $bus_idd . "</td>" ;
                                                                    echo "<td>" . $row['stat_id'] . "</td>";
                                                                    echo "<td>" . $row['out_time'] . "</td></tr>";
                                                                }

                                                            }


                                                        } // end of bus loop
                                                        ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-primary">
                                                    <strong class="card-title text-light">
                                                        Staying Bus in Campus
                                                        <small>
                                                            <span class="badge badge-warning float-right mt-1">
                                                                 <strong>
                                                                 <?php echo "7";?>
                                                                 </strong>
                                                            </span>
                                                        </small>
                                                    </strong>
                                                </div>
                                                <div>
                                                    <table class="table table-bordered">

                                                        <thead><tr>
                                                            <th>Bus No</th>

                                                            <th>In Time</th>

                                                        </tr></thead><tbody>
                                                        <?php
														
															
													$sql_holde = "SELECT * FROM bus_stop WHERE out_time = 'NULL'";
													$result_holde = mysqli_query($connection, $sql_holde);
																	
																
														 if (mysqli_num_rows($result_holde) > 0)
                                                        {
															
                                                            //  output data of each row


                                                            while ($row3 = mysqli_fetch_assoc($result_holde))
                                                            {


                                                                echo "<tr>";
                                                                echo "<td>" . $row3['bus_id'] . "</td>";
                                                                echo "<td>" . $row3['in_time'] . "</td>";

                                                                echo "</tr>";


                                                            };

                                                        }
                                                        ?>


                                                        </tbody>
                                                    </table>
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
                </div>
            </div>

    <!-- END PAGE CONTAINER-->

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
