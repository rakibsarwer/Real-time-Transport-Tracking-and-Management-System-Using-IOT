<?php 

require_once 'php_action/db_connenction_checker.php';

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: ../../../index.php');	

?>