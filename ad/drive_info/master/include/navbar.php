<?php
require_once 'php_action/db_connenction_checker.php';

?>
<nav class="navbar navbar-inverse" style="background-color: black;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">IIUC-TMD</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="file_view.php">Downloads</a></li>
                <li><a href="map.php">Google Map</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Records<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ioview.php">In/Out Time</a></li>
                        <li><a href="sinbus.php">Kumira Stop Record</a></li>
                        <li><a href="duration.php">Time Duration Analysis</a></li>

                    </ul>
                </li>
                <li><a href="blog.php">Manage  Posts</a></li>





                <li><a href="employee_info.php">Manage Employee</a></li>

                <li><a href="bus_view.php">Manage Bus</a></li>


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Other Info..<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="staf.php">Employees Info</a></li>
                        <li><a href="tmd.php">Gallery</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>

                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="view-profile.php">View Profile</a></li>
                        <li><a href="manage-profile.php">Manage Profile</a></li>

                    </ul>
                </li>
                <li><a href="logout.php" id="myBtn_login"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>