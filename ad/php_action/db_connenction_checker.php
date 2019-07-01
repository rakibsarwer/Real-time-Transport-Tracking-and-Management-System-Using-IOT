<?php 
require_once ('db_connect.php');
// start of login timeout section
session_start();
$now = time();
if (isset($_SESSION['discard_after_x']) && $now > $_SESSION['discard_after_x']) {
   
    session_unset();
    session_destroy();
    session_start(); 
}

$_SESSION['discard_after_x'] = $now + 7200;  //7200 means 3600sec = 2 hour
// end of login timeout section



// echo $_SESSION['userName'];

if(!$_SESSION['adminName']) {
	header('location: index.php');	
} 

?>