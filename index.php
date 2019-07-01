<?php
require_once 'php_action/db_connect.php';





// = "SELECT * FROM bus_stop WHERE stat_id!='kumira' AND out_time!='NULL'  GROUP BY bus_id DESC ";
//$sql_in="SELECT MAX(id) as mid,bus_id,MIN(out_time) AS minOutTime, stat_id FROM bus_stop WHERE stat_id!='kumira' GROUP BY bus_id ORDER BY mid ASC ";
//$result_in = mysqli_query($connection, $sql_in);










?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

<?php include('include/navbar.php') ?>
 
<div class="container">
 
  <center> <h1 align="center">Transport Management Division</h1>

		<h3>Welcome Viewer</h3>
		<p>This is The Daily List of Bus Status .</p>
 
	</center>
	<br>
<div class="row">
  <div class="col-sm-4">
            <div class="panel-group">
          
                
                <div class="panel panel-info">


                    <div class="panel-heading"><strong>
                       <?php // echo $count_in;?></strong>
                        Incomming Bus From City</div>


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
                                    $dur = "SELECT * FROM bus_stop WHERE stat_id='chawkbazar' ORDER  BY `id` DESC";

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

    <div class="col-sm-4">
        <div class="panel-group">


            <div class="panel panel-success">


                <div class="panel-heading"><strong>
                    <?php // echo $count_hold;?></strong>
                    Staying Bus in Campus</div>

                <table class="table table-bordered">

                    <thead><tr>
                        <th>Bus No</th>

                        <th>In Time</th>

                    </tr></thead><tbody>
                    <?php
                    $dat='2018-12-26';
                    $sql_hold = "SELECT * FROM bus_stop WHERE  stat_id='kumira' GROUP BY bus_id DESC ";
                    $result_hold = mysqli_query($connection, $sql_hold);

                    if (mysqli_num_rows($result_hold) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result_hold)) {


                            echo "<tr>";
                            echo "<td>" . $row['bus_id'] . "</td>";
                            echo "<td>" . $row['in_time'] . "</td>";

                            echo "</tr>";


                        };

                    }
                    ?>


                    </tbody>
                </table>




            </div>



        </div>
    </div>

    <div class="col-sm-4">
        <div class="panel-group">


            <div class="panel panel-danger">


                <div class="panel-heading"><strong>
                    <?php  //echo $count_out;?></strong>
                    Outgoing Bus From Campus</div>

                <table class="table table-bordered">

                    <thead><tr>
                        <th>Bus No</th>

                        <th>Out Time</th>

                    </tr></thead><tbody>
                    <?php





                    $dat='2018-12-26';
                    //date('Y-m-d');
                    $dur = "SELECT * FROM bus_stop WHERE stat_id='kumira' ORDER  BY `id` DESC";
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
</div>

</body>
</html>
