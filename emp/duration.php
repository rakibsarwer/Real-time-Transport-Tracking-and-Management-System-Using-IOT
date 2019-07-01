<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';

//$sql = "SELECT id, bus_id, stat_id, in_time, out_time FROM bus_stop";
//$result = mysqli_query($connection, $sql);


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

<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php include('include/navbar.php') ?>
    <!-- END HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid">


                    <div class="row">
                        <div class="col-lg-12">
                            <!-- USER DATA-->
                            <div class="user-data m-b-30">

                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i> BUS Time Duration Record
                                        </h3>
                                    </div>

                                    <div class="col-6">
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

                                <div class="filters m-b-45">
                                    <!-- TOP CAMPAIGN-->

                                    <div>
                                        <table class="table">
                                            <th>BUS NO</th>
                                            <th>Staring Point</th>
                                            <th>Ending Point</th>


                                        </table>

                                        <form action="" method="POST" id="frm">

                                            <div class="form-row">

                                                <div class="form-group col-md-2">


                                                    <input type="text" class="form-control" name="bus"  placeholder="BUS ID">
                                                </div>

                                            <div class="form-group col-md-4">


                                                <select name="start"  class="form-control" form="frm">
                                                    <option selected value="Routes">Choose Routes</option>
                                                    <option value="kumira">kumira</option>
                                                    <option value="chokbazar">chokbazar</option>
                                                    <option value="bbt">bbt</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select name="end"  class="form-control" form="frm">
                                                    <option selected value="Routes">Choose Routes</option>
                                                    <option value="kumira">kumira</option>
                                                    <option value="chokbazar">chokbazar</option>
                                                    <option value="bbt">bbt</option>
                                                </select>
                                            </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputsub"></label>
                                                    <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
                                                </div>

                                            </div>



                                        </form>
                                    </div>

                                    <table class="table table-bordered">

                                        <?php

                                        if (isset($_POST['submit']))
                                        {
                                            $bus_id =  $_POST['bus'];
                                            $from_stat_id = $_POST['start'];
                                            $to_stat_id = $_POST['end'];
                                        }
                                        else{
                                            $bus_id = '';
                                            $from_stat_id = '';
                                            $to_stat_id = '';
                                        }


                                        $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_id' OR stat_id='$to_stat_id' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                        $dresult = mysqli_query($connection, $dur);



                                        if ($bus_id==NULL){
                                            echo "<div class='alert alert-warning'><strong>'Warning!'</strong>'Please Select Bus No And Stopages' </div><br>";
                                        }
                                        else{
                                            echo "<div class='alert alert-info'><strong>$bus_id </strong> 'no bus from'  <strong>$from_stat_id</strong> 'to' <strong>$to_stat_id</strong></div><br>";

                                            echo"<thead><tr><th>";
                                            echo"Time Duration And Avarage Time";
                                            echo"</th></tr></thead><tbody><tr><td>";






                                            if (mysqli_num_rows($dresult) > 0) {
                                                //  output data of each row
                                                $srl = 0;
                                                $time_array = array();
                                                $sum_of_seconds = 0;
                                                while($row = mysqli_fetch_assoc($dresult)) {
                                                    $srl++;
                                                    if($srl%2!=0){
                                                        //echo "out: ".$row['out_time']." <br>";
                                                        //$a=array("$srl"=>$row['out_time']);
                                                        array_push($time_array,$row['out_time']);

                                                    }
                                                    if($srl%2==0){

                                                        array_push($time_array,$row['in_time']);
                                                    }
                                                }

                                                if(count($time_array)%2 !=0){
                                                    array_pop($time_array);
                                                }

                                                $for_loop_count = 0;
                                                for($i=0; $i<count($time_array); $i=$i+2){
                                                    $dteStart = new DateTime($time_array[$i]);
                                                    $dteEnd   = new DateTime($time_array[$i+1]);
                                                    $dteDiff  = $dteStart->diff($dteEnd);
                                                    $time = '21:30:10';
                                                    $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                    $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

                                                    $sum_of_seconds += $seconds;

                                                    echo"<div class='list-group'><a href='#' class='list-group-item'>";
                                                    echo gmdate('H:i:s', $seconds);
                                                    echo"</a></div>";



                                                    $for_loop_count++;
                                                }
                                                if ($for_loop_count == 0) {
                                                    echo "no data";
                                                } else {
                                                    $avg_time = $sum_of_seconds / $for_loop_count;
                                                    echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                }
                                            }

                                        }


                                        ?>
                                        </td>
                                        </tr>

                                        </tbody>
                                    </table>




                                    <!--  END TOP CAMPAIGN-->
                                </div>
                            </div>
                            <!-- END USER DATA-->
                        </div>




                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>CITY TO CAMPUS</h3>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Avarage Time</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">

                                                                From Chawkbaazar to Kumira :

                                                        </a>
                                                    </h5>
                                                    <HR>
                                                    <span class="time">
 <?php
 $from_stat_in = 'chokbazar';
 $to_stat_in = 'kumira';

 $bus_sql = "SELECT * FROM bus_stop WHERE stat_id='$from_stat_in' ORDER BY id ASC";
 $result_bus = mysqli_query($connection, $bus_sql);
 $ids = array();
 while($row = mysqli_fetch_assoc($result_bus)) {

     $bus_id = $row['bus_id'];
     $start_time = $row['out_time'];
     $id = $row['id'];


     $ids_str = implode($ids, ',');
     //$dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND id>'$id' AND stat_id='$to_stat_in' AND `id` NOT IN ('$ids_str') AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
     $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND id>'$id' AND stat_id='$to_stat_in' AND `id` NOT IN ('$ids_str') ORDER BY id ASC LIMIT 1";
     //echo $dur; exit;
     $dresult = mysqli_query($connection, $dur);


     if (mysqli_num_rows($dresult) > 0) {
         //echo '<pre>';
         //print_r(mysqli_fetch_array($dresult));
         //echo '</pre>';
         //exit;
         //  output data of each row
         $srl = 0;
         $time_array = array();
         $sum_of_seconds = 0;
         /*
         while ($row = mysqli_fetch_assoc($dresult)) {
             $srl++;
             if(count($time_array)<3){
                 if (($srl % 2 != 0) && ($row['stat_id']=='chokbazar')) {
                     //echo "out: ".$row['out_time']." <br>";
                     //$a=array("$srl"=>$row['out_time']);
                     array_push($time_array, $row['out_time']);
                     $ids[] = $row['id'];
                 }
                 if (($srl % 2 == 0) && ($row['stat_id']=='kumira')) {
                     //echo "in: ".$row['in_time']." <br>";
                     //$a=array("$srl"=>$row['in_time']);
                     array_push($time_array, $row['in_time']);
                 }
             }
         }

         if (count($time_array) % 2 != 0) {
             array_pop($time_array);
         }
         */
         $row = mysqli_fetch_assoc($dresult);
         $ids[] = $row['id'];
         $time_array[] = $start_time;
         $time_array[] = $row['in_time'];

         $for_loop_count = 0;
         for ($i = 0; $i < count($time_array); $i = $i + 2) {
             echo "BUS No : ".$bus_id."<br>";
             echo "Start : ".$time_array[$i] ."<br>";
             echo "Finsh : ".$time_array[$i + 1] ."<br>";
             $dteStart = new DateTime($time_array[$i]);
             $dteEnd = new DateTime($time_array[$i + 1]);
             $dteDiff = $dteStart->diff($dteEnd);
             $time = '21:30:10';
             $parsed = date_parse($dteDiff->format("%H:%I:%S"));
             $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
             $sum_of_seconds += $seconds;
             echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


             $for_loop_count++;
         }
         if ($for_loop_count == 0) {
             echo "no data";
         } else {
             $avg_time = $sum_of_seconds / $for_loop_count;
             echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
             echo "<hr><hr>";
         }
     }


 } // end of bus loop
 ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse2">From BBT to Kumira :</a>
                                                            </h4>

                                                            <hr>


                                                        </a>
                                                    </h5>
                                                    <span class="time">
                                                         <?php

                                                         $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                         $result_bus = mysqli_query($connection, $bus_sql);
                                                         while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                             $bus_id = $bus_row['bus_id'];

                                                             $from_stat_o  = 'bbt';
                                                             $to_stat_o = 'kumira';


                                                             $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o' AND stat_id='$to_stat_o' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                             $dresult = mysqli_query($connection, $dur);


                                                             if (mysqli_num_rows($dresult) > 0) {
                                                                 //  output data of each row
                                                                 $srl = 0;
                                                                 $time_array = array();
                                                                 $sum_of_seconds = 0;
                                                                 $flag=1;
                                                                 while ($row = mysqli_fetch_assoc($dresult)) {
                                                                     $srl++;
                                                                     if($flag==1){
                                                                         $flag=0;
                                                                         $stat = $row['stat_id'];
                                                                         if("from_stat_id"=="$stat"){
                                                                             $flag=0;
                                                                             echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                             if ($srl % 2 != 0) {
                                                                                 //echo "out: ".$row['out_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['out_time']);
                                                                                 array_push($time_array, $row['out_time']);

                                                                             }
                                                                             if ($srl % 2 == 0) {
                                                                                 //echo "in: ".$row['in_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['in_time']);
                                                                                 array_push($time_array, $row['in_time']);
                                                                             }
                                                                         }
                                                                     }
                                                                     else{
                                                                         if ($srl % 2 != 0) {
                                                                             //echo "out: ".$row['out_time']." <br>";
                                                                             //$a=array("$srl"=>$row['out_time']);
                                                                             array_push($time_array, $row['in_time']);

                                                                         }
                                                                         if ($srl % 2 == 0) {
                                                                             //echo "in: ".$row['in_time']." <br>";
                                                                             //$a=array("$srl"=>$row['in_time']);
                                                                             array_push($time_array, $row['out_time']);
                                                                         }
                                                                     }
                                                                 }

                                                                 if (count($time_array) % 2 != 0) {
                                                                     array_pop($time_array);
                                                                 }

                                                                 $for_loop_count = 0;
                                                                 for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                     echo "BUS No : ".$bus_id."<br>";
                                                                     echo "Start : ".$time_array[$i] ."<br>";
                                                                     echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                     $dteStart = new DateTime($time_array[$i]);
                                                                     $dteEnd = new DateTime($time_array[$i + 1]);
                                                                     $dteDiff = $dteStart->diff($dteEnd);
                                                                     $time = '21:30:10';
                                                                     $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                     $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                     $sum_of_seconds += $seconds;
                                                                     echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                     $for_loop_count++;
                                                                 }
                                                                 if ($for_loop_count == 0) {
                                                                     echo "no data";
                                                                 } else {
                                                                     $avg_time = $sum_of_seconds / $for_loop_count;
                                                                     echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                     echo "<hr><hr>";
                                                                 }
                                                             }


                                                         } // end of bus loop
                                                         ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--primary">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse13">From Agrabad To Kumira :</a>
                                                            </h4>

                                                            <hr>

                                                        </a>
                                                    </h5>
                                                    <span class="time">

                                                            <?php

                                                            $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                            $result_bus = mysqli_query($connection, $bus_sql);
                                                            while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                                $bus_id = $bus_row['bus_id'];


                                                                $from_stat_in = 'agrabad';
                                                                $to_stat_in = 'kumira';

                                                                $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_in' AND stat_id='$to_stat_in' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                                $dresult = mysqli_query($connection, $dur);


                                                                if (mysqli_num_rows($dresult) > 0) {
                                                                    //  output data of each row
                                                                    $srl = 0;
                                                                    $time_array = array();
                                                                    $sum_of_seconds = 0;
                                                                    while ($row = mysqli_fetch_assoc($dresult)) {
                                                                        $srl++;
                                                                        if ($srl % 2 != 0) {
                                                                            //echo "out: ".$row['out_time']." <br>";
                                                                            //$a=array("$srl"=>$row['out_time']);
                                                                            array_push($time_array, $row['in_time']);

                                                                        }
                                                                        if ($srl % 2 == 0) {
                                                                            //echo "in: ".$row['in_time']." <br>";
                                                                            //$a=array("$srl"=>$row['in_time']);
                                                                            array_push($time_array, $row['out_time']);
                                                                        }
                                                                    }

                                                                    if (count($time_array) % 2 != 0) {
                                                                        array_pop($time_array);
                                                                    }

                                                                    $for_loop_count = 0;
                                                                    for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                        echo "BUS No : ".$bus_id."<br>";
                                                                        echo "Start : ".$time_array[$i] ."<br>";
                                                                        echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                        $dteStart = new DateTime($time_array[$i]);
                                                                        $dteEnd = new DateTime($time_array[$i + 1]);
                                                                        $dteDiff = $dteStart->diff($dteEnd);
                                                                        $time = '21:30:10';
                                                                        $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                        $sum_of_seconds += $seconds;
                                                                        echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                        $for_loop_count++;
                                                                    }
                                                                    if ($for_loop_count == 0) {
                                                                        echo "no data";
                                                                    } else {
                                                                        $avg_time = $sum_of_seconds / $for_loop_count;
                                                                        echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                        echo "<hr><hr>";
                                                                    }
                                                                }


                                                            } // end of bus loop
                                                            ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--success">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse4">From New Market To Kumira :</a>
                                                            </h4>

                                                            <hr>


                                                        </a>
                                                    </h5>
                                                    <span class="time">

                                                          <?php

                                                          $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                          $result_bus = mysqli_query($connection, $bus_sql);
                                                          while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                              $bus_id = $bus_row['bus_id'];


                                                              $from_stat_in = 'new market';
                                                              $to_stat_in = 'kumira';

                                                              $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_in' AND stat_id='$to_stat_in' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                              $dresult = mysqli_query($connection, $dur);


                                                              if (mysqli_num_rows($dresult) > 0) {
                                                                  //  output data of each row
                                                                  $srl = 0;
                                                                  $time_array = array();
                                                                  $sum_of_seconds = 0;
                                                                  while ($row = mysqli_fetch_assoc($dresult)) {
                                                                      $srl++;
                                                                      if ($srl % 2 != 0) {
                                                                          //echo "out: ".$row['out_time']." <br>";
                                                                          //$a=array("$srl"=>$row['out_time']);
                                                                          array_push($time_array, $row['out_time']);

                                                                      }
                                                                      if ($srl % 2 == 0) {
                                                                          //echo "in: ".$row['in_time']." <br>";
                                                                          //$a=array("$srl"=>$row['in_time']);
                                                                          array_push($time_array, $row['in_time']);
                                                                      }
                                                                  }

                                                                  if (count($time_array) % 2 != 0) {
                                                                      array_pop($time_array);
                                                                  }

                                                                  $for_loop_count = 0;
                                                                  for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                      echo "BUS No : ".$bus_id."<br>";
                                                                      echo "Start : ".$time_array[$i] ."<br>";
                                                                      echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                      $dteStart = new DateTime($time_array[$i]);
                                                                      $dteEnd = new DateTime($time_array[$i + 1]);
                                                                      $dteDiff = $dteStart->diff($dteEnd);
                                                                      $time = '21:30:10';
                                                                      $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                      $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                      $sum_of_seconds += $seconds;
                                                                      echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                      $for_loop_count++;
                                                                  }
                                                                  if ($for_loop_count == 0) {
                                                                      echo "no data";
                                                                  } else {
                                                                      $avg_time = $sum_of_seconds / $for_loop_count;
                                                                      echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                      echo "<hr><hr>";
                                                                  }
                                                              }


                                                          } // end of bus loop
                                                          ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--danger js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse5">From Borodarogarhat To Kumira :</a>
                                                            </h4>
                                                            <hr>
                                                        </a>
                                                    </h5>
                                                    <span class="time">

                                                            <?php

                                                            $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                            $result_bus = mysqli_query($connection, $bus_sql);
                                                            while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                                $bus_id = $bus_row['bus_id'];


                                                                $from_stat_in = 'borodarogarhat';
                                                                $to_stat_in = 'kumira';

                                                                $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_in' AND stat_id='$to_stat_in' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                                $dresult = mysqli_query($connection, $dur);


                                                                if (mysqli_num_rows($dresult) > 0) {
                                                                    //  output data of each row
                                                                    $srl = 0;
                                                                    $time_array = array();
                                                                    $sum_of_seconds = 0;
                                                                    while ($row = mysqli_fetch_assoc($dresult)) {
                                                                        $srl++;
                                                                        if ($srl % 2 != 0) {
                                                                            //echo "out: ".$row['out_time']." <br>";
                                                                            //$a=array("$srl"=>$row['out_time']);
                                                                            array_push($time_array, $row['out_time']);

                                                                        }
                                                                        if ($srl % 2 == 0) {
                                                                            //echo "in: ".$row['in_time']." <br>";
                                                                            //$a=array("$srl"=>$row['in_time']);
                                                                            array_push($time_array, $row['in_time']);
                                                                        }
                                                                    }

                                                                    if (count($time_array) % 2 != 0) {
                                                                        array_pop($time_array);
                                                                    }

                                                                    $for_loop_count = 0;
                                                                    for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                        echo "BUS No : ".$bus_id."<br>";
                                                                        echo "Start : ".$time_array[$i] ."<br>";
                                                                        echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                        $dteStart = new DateTime($time_array[$i]);
                                                                        $dteEnd = new DateTime($time_array[$i + 1]);
                                                                        $dteDiff = $dteStart->diff($dteEnd);
                                                                        $time = '21:30:10';
                                                                        $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                        $sum_of_seconds += $seconds;
                                                                        echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                        $for_loop_count++;
                                                                    }
                                                                    if ($for_loop_count == 0) {
                                                                        echo "no data";
                                                                    } else {
                                                                        $avg_time = $sum_of_seconds / $for_loop_count;
                                                                        echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                        echo "<hr><hr>";
                                                                    }
                                                                }


                                                            } // end of bus loop
                                                            ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>CAMPUS TO CITY</h3>

                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Avarage Time</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse55">From Kumira To Chawkbaazar :</a>
                                                            </h4>
                                                            <hr>

                                                        </a>
                                                    </h5>
                                                    <span class="time">
                                                         <?php

                                                         $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                         $result_bus = mysqli_query($connection, $bus_sql);
                                                         while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                             $bus_id = $bus_row['bus_id'];

                                                             $from_stat_o  = 'kumira';
                                                             $to_stat_o = 'chawkbazar';


                                                             $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o'AND stat_id='$to_stat_o' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                             $dresult = mysqli_query($connection, $dur);


                                                             if (mysqli_num_rows($dresult) > 0) {
                                                                 //  output data of each row
                                                                 $srl = 0;
                                                                 $time_array = array();
                                                                 $sum_of_seconds = 0;
                                                                 $flag=1;
                                                                 while ($row = mysqli_fetch_assoc($dresult)) {
                                                                     $srl++;
                                                                     if($flag==1){
                                                                         $flag=0;
                                                                         $stat = $row['stat_id'];
                                                                         if("from_stat_id"=="$stat"){
                                                                             $flag=0;
                                                                             echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                             if ($srl % 2 != 0) {
                                                                                 //echo "out: ".$row['out_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['out_time']);
                                                                                 array_push($time_array, $row['out_time']);

                                                                             }
                                                                             if ($srl % 2 == 0) {
                                                                                 //echo "in: ".$row['in_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['in_time']);
                                                                                 array_push($time_array, $row['in_time']);
                                                                             }
                                                                         }
                                                                     }
                                                                     else{
                                                                         if ($srl % 2 != 0) {
                                                                             //echo "out: ".$row['out_time']." <br>";
                                                                             //$a=array("$srl"=>$row['out_time']);
                                                                             array_push($time_array, $row['in_time']);

                                                                         }
                                                                         if ($srl % 2 == 0) {
                                                                             //echo "in: ".$row['in_time']." <br>";
                                                                             //$a=array("$srl"=>$row['in_time']);
                                                                             array_push($time_array, $row['out_time']);
                                                                         }
                                                                     }
                                                                 }

                                                                 if (count($time_array) % 2 != 0) {
                                                                     array_pop($time_array);
                                                                 }

                                                                 $for_loop_count = 0;
                                                                 for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                     echo "BUS No : ".$bus_id."<br>";
                                                                     echo "Start : ".$time_array[$i] ."<br>";
                                                                     echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                     $dteStart = new DateTime($time_array[$i]);
                                                                     $dteEnd = new DateTime($time_array[$i + 1]);
                                                                     $dteDiff = $dteStart->diff($dteEnd);
                                                                     $time = '21:30:10';
                                                                     $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                     $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                     $sum_of_seconds += $seconds;
                                                                     echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                     $for_loop_count++;
                                                                 }
                                                                 if ($for_loop_count == 0) {
                                                                     echo "no data";
                                                                 } else {
                                                                     $avg_time = $sum_of_seconds / $for_loop_count;
                                                                     echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                     echo "<hr><hr>";
                                                                 }
                                                             }


                                                         } // end of bus loop
                                                         ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse6">From Kumira To BBT :</a>
                                                            </h4>
                                                            <hr>
                                                        </a>
                                                    </h5>
                                                    <span class="time">
                                                         <?php

                                                         $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                         $result_bus = mysqli_query($connection, $bus_sql);
                                                         while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                             $bus_id = $bus_row['bus_id'];

                                                             $from_stat_o  = 'kumira';
                                                             $to_stat_o = 'bbt';


                                                             $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o' AND stat_id='$to_stat_o' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                             $dresult = mysqli_query($connection, $dur);


                                                             if (mysqli_num_rows($dresult) > 0) {
                                                                 //  output data of each row
                                                                 $srl = 0;
                                                                 $time_array = array();
                                                                 $sum_of_seconds = 0;
                                                                 $flag=1;
                                                                 while ($row = mysqli_fetch_assoc($dresult)) {
                                                                     $srl++;
                                                                     if($flag==1){
                                                                         $flag=0;
                                                                         $stat = $row['stat_id'];
                                                                         if("from_stat_id"=="$stat"){
                                                                             $flag=0;
                                                                             echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                             if ($srl % 2 != 0) {
                                                                                 //echo "out: ".$row['out_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['out_time']);
                                                                                 array_push($time_array, $row['in_time']);

                                                                             }
                                                                             if ($srl % 2 == 0) {
                                                                                 //echo "in: ".$row['in_time']." <br>";
                                                                                 //$a=array("$srl"=>$row['in_time']);
                                                                                 array_push($time_array, $row['out_time']);
                                                                             }
                                                                         }
                                                                     }
                                                                     else{
                                                                         if ($srl % 2 != 0) {
                                                                             //echo "out: ".$row['out_time']." <br>";
                                                                             //$a=array("$srl"=>$row['out_time']);
                                                                             array_push($time_array, $row['in_time']);

                                                                         }
                                                                         if ($srl % 2 == 0) {
                                                                             //echo "in: ".$row['in_time']." <br>";
                                                                             //$a=array("$srl"=>$row['in_time']);
                                                                             array_push($time_array, $row['out_time']);
                                                                         }
                                                                     }
                                                                 }

                                                                 if (count($time_array) % 2 != 0) {
                                                                     array_pop($time_array);
                                                                 }

                                                                 $for_loop_count = 0;
                                                                 for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                     echo "BUS No : ".$bus_id."<br>";
                                                                     echo "Start : ".$time_array[$i] ."<br>";
                                                                     echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                     $dteStart = new DateTime($time_array[$i]);
                                                                     $dteEnd = new DateTime($time_array[$i + 1]);
                                                                     $dteDiff = $dteStart->diff($dteEnd);
                                                                     $time = '21:30:10';
                                                                     $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                     $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                     $sum_of_seconds += $seconds;
                                                                     echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                     $for_loop_count++;
                                                                 }
                                                                 if ($for_loop_count == 0) {
                                                                     echo "no data";
                                                                 } else {
                                                                     $avg_time = $sum_of_seconds / $for_loop_count;
                                                                     echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                     echo "<hr><hr>";
                                                                 }
                                                             }


                                                         } // end of bus loop
                                                         ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--primary">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse7">From Kumira To Agrabad :</a>
                                                            </h4>
                                                            <hr>
                                                        </a>
                                                    </h5>
                                                    <span class="time">

                                                            <?php

                                                            $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                            $result_bus = mysqli_query($connection, $bus_sql);
                                                            while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                                $bus_id = $bus_row['bus_id'];

                                                                $from_stat_o  = 'kumira';
                                                                $to_stat_o = 'agrabad';


                                                                $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o' AND stat_id='$to_stat_o'  AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                                $dresult = mysqli_query($connection, $dur);


                                                                if (mysqli_num_rows($dresult) > 0) {
                                                                    //  output data of each row
                                                                    $srl = 0;
                                                                    $time_array = array();
                                                                    $sum_of_seconds = 0;
                                                                    $flag=1;
                                                                    while ($row = mysqli_fetch_assoc($dresult)) {
                                                                        $srl++;
                                                                        if($flag==1){
                                                                            $flag=0;
                                                                            $stat = $row['stat_id'];
                                                                            if("from_stat_id"=="$stat"){
                                                                                $flag=0;
                                                                                echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                                if ($srl % 2 != 0) {
                                                                                    //echo "out: ".$row['out_time']." <br>";
                                                                                    //$a=array("$srl"=>$row['out_time']);
                                                                                    array_push($time_array, $row['in_time']);

                                                                                }
                                                                                if ($srl % 2 == 0) {
                                                                                    //echo "in: ".$row['in_time']." <br>";
                                                                                    //$a=array("$srl"=>$row['in_time']);
                                                                                    array_push($time_array, $row['out_time']);
                                                                                }
                                                                            }
                                                                        }
                                                                        else{
                                                                            if ($srl % 2 != 0) {
                                                                                //echo "out: ".$row['out_time']." <br>";
                                                                                //$a=array("$srl"=>$row['out_time']);
                                                                                array_push($time_array, $row['in_time']);

                                                                            }
                                                                            if ($srl % 2 == 0) {
                                                                                //echo "in: ".$row['in_time']." <br>";
                                                                                //$a=array("$srl"=>$row['in_time']);
                                                                                array_push($time_array, $row['out_time']);
                                                                            }
                                                                        }
                                                                    }

                                                                    if (count($time_array) % 2 != 0) {
                                                                        array_pop($time_array);
                                                                    }

                                                                    $for_loop_count = 0;
                                                                    for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                        echo "BUS No : ".$bus_id."<br>";
                                                                        echo "Start : ".$time_array[$i] ."<br>";
                                                                        echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                        $dteStart = new DateTime($time_array[$i]);
                                                                        $dteEnd = new DateTime($time_array[$i + 1]);
                                                                        $dteDiff = $dteStart->diff($dteEnd);
                                                                        $time = '21:30:10';
                                                                        $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                        $sum_of_seconds += $seconds;
                                                                        echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                        $for_loop_count++;
                                                                    }
                                                                    if ($for_loop_count == 0) {
                                                                        echo "no data";
                                                                    } else {
                                                                        $avg_time = $sum_of_seconds / $for_loop_count;
                                                                        echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                        echo "<hr><hr>";
                                                                    }
                                                                }


                                                            } // end of bus loop
                                                            ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--success">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse8">From Kumira To New Market :</a>
                                                            </h4>
                                                            <hr>
                                                        </a>
                                                    </h5>
                                                    <span class="time">
                                                          <?php

                                                          $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                          $result_bus = mysqli_query($connection, $bus_sql);
                                                          while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                              $bus_id = $bus_row['bus_id'];

                                                              $from_stat_o  = 'kumira';
                                                              $to_stat_o = 'new market';


                                                              $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o' AND stat_id='$to_stat_o' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                              $dresult = mysqli_query($connection, $dur);


                                                              if (mysqli_num_rows($dresult) > 0) {
                                                                  //  output data of each row
                                                                  $srl = 0;
                                                                  $time_array = array();
                                                                  $sum_of_seconds = 0;
                                                                  $flag=1;
                                                                  while ($row = mysqli_fetch_assoc($dresult)) {
                                                                      $srl++;
                                                                      if($flag==1){
                                                                          $flag=0;
                                                                          $stat = $row['stat_id'];
                                                                          if("from_stat_id"=="$stat"){
                                                                              $flag=0;
                                                                              echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                              if ($srl % 2 != 0) {
                                                                                  //echo "out: ".$row['out_time']." <br>";
                                                                                  //$a=array("$srl"=>$row['out_time']);
                                                                                  array_push($time_array, $row['in_time']);

                                                                              }
                                                                              if ($srl % 2 == 0) {
                                                                                  //echo "in: ".$row['in_time']." <br>";
                                                                                  //$a=array("$srl"=>$row['in_time']);
                                                                                  array_push($time_array, $row['out_time']);
                                                                              }
                                                                          }
                                                                      }
                                                                      else{
                                                                          if ($srl % 2 != 0) {
                                                                              //echo "out: ".$row['out_time']." <br>";
                                                                              //$a=array("$srl"=>$row['out_time']);
                                                                              array_push($time_array, $row['in_time']);

                                                                          }
                                                                          if ($srl % 2 == 0) {
                                                                              //echo "in: ".$row['in_time']." <br>";
                                                                              //$a=array("$srl"=>$row['in_time']);
                                                                              array_push($time_array, $row['out_time']);
                                                                          }
                                                                      }
                                                                  }

                                                                  if (count($time_array) % 2 != 0) {
                                                                      array_pop($time_array);
                                                                  }

                                                                  $for_loop_count = 0;
                                                                  for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                      echo "BUS No : ".$bus_id."<br>";
                                                                      echo "Start : ".$time_array[$i] ."<br>";
                                                                      echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                      $dteStart = new DateTime($time_array[$i]);
                                                                      $dteEnd = new DateTime($time_array[$i + 1]);
                                                                      $dteDiff = $dteStart->diff($dteEnd);
                                                                      $time = '21:30:10';
                                                                      $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                      $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                      $sum_of_seconds += $seconds;
                                                                      echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                      $for_loop_count++;
                                                                  }
                                                                  if ($for_loop_count == 0) {
                                                                      echo "no data";
                                                                  } else {
                                                                      $avg_time = $sum_of_seconds / $for_loop_count;
                                                                      echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                      echo "<hr><hr>";
                                                                  }
                                                              }


                                                          } // end of bus loop
                                                          ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--danger js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse9">From Kumira To Bordargarhat :</a>
                                                            </h4>
                                                            <hr>
                                                        </a>
                                                    </h5>
                                                    <span class="time">

                                                            <?php

                                                            $bus_sql = "SELECT DISTINCT bus_id FROM bus_stop ";
                                                            $result_bus = mysqli_query($connection, $bus_sql);
                                                            while($bus_row = mysqli_fetch_assoc($result_bus)) {

                                                                $bus_id = $bus_row['bus_id'];

                                                                $from_stat_o  = 'kumira';
                                                                $to_stat_o = 'borodarogarhat';


                                                                $dur = "SELECT * FROM bus_stop WHERE bus_id='$bus_id' AND stat_id='$from_stat_o' AND stat_id='$to_stat_o' AND `out_time` <= DATE(NOW())  AND `out_time` >= DATE(NOW()) - INTERVAL 30 DAY";
                                                                $dresult = mysqli_query($connection, $dur);


                                                                if (mysqli_num_rows($dresult) > 0) {
                                                                    //  output data of each row
                                                                    $srl = 0;
                                                                    $time_array = array();
                                                                    $sum_of_seconds = 0;
                                                                    $flag=1;
                                                                    while ($row = mysqli_fetch_assoc($dresult)) {
                                                                        $srl++;
                                                                        if($flag==1){
                                                                            $flag=0;
                                                                            $stat = $row['stat_id'];
                                                                            if("from_stat_id"=="$stat"){
                                                                                $flag=0;
                                                                                echo "xxxxxxxxxxxxxxxxxxxxx";
                                                                                if ($srl % 2 != 0) {
                                                                                    //echo "out: ".$row['out_time']." <br>";
                                                                                    //$a=array("$srl"=>$row['out_time']);
                                                                                    array_push($time_array, $row['in_time']);

                                                                                }
                                                                                if ($srl % 2 == 0) {
                                                                                    //echo "in: ".$row['in_time']." <br>";
                                                                                    //$a=array("$srl"=>$row['in_time']);
                                                                                    array_push($time_array, $row['out_time']);
                                                                                }
                                                                            }
                                                                        }
                                                                        else{
                                                                            if ($srl % 2 != 0) {
                                                                                //echo "out: ".$row['out_time']." <br>";
                                                                                //$a=array("$srl"=>$row['out_time']);
                                                                                array_push($time_array, $row['in_time']);

                                                                            }
                                                                            if ($srl % 2 == 0) {
                                                                                //echo "in: ".$row['in_time']." <br>";
                                                                                //$a=array("$srl"=>$row['in_time']);
                                                                                array_push($time_array, $row['out_time']);
                                                                            }
                                                                        }
                                                                    }

                                                                    if (count($time_array) % 2 != 0) {
                                                                        array_pop($time_array);
                                                                    }

                                                                    $for_loop_count = 0;
                                                                    for ($i = 0; $i < count($time_array); $i = $i + 2) {
                                                                        echo "BUS No : ".$bus_id."<br>";
                                                                        echo "Start : ".$time_array[$i] ."<br>";
                                                                        echo "Finsh : ".$time_array[$i + 1] ."<br>";
                                                                        $dteStart = new DateTime($time_array[$i]);
                                                                        $dteEnd = new DateTime($time_array[$i + 1]);
                                                                        $dteDiff = $dteStart->diff($dteEnd);
                                                                        $time = '21:30:10';
                                                                        $parsed = date_parse($dteDiff->format("%H:%I:%S"));
                                                                        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                                                        $sum_of_seconds += $seconds;
                                                                        echo "Time Take : ".gmdate('H:i:s', $seconds)."<br><br>";


                                                                        $for_loop_count++;
                                                                    }
                                                                    if ($for_loop_count == 0) {
                                                                        //echo "no data";
                                                                    } else {
                                                                        $avg_time = $sum_of_seconds / $for_loop_count;
                                                                        echo "Average Time Taken: " . gmdate('H:i:s', $avg_time);
                                                                        echo "<hr><hr>";
                                                                    }
                                                                }


                                                            } // end of bus loop
                                                            ?>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                </div>
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