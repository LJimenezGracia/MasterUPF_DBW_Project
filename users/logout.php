<?php
// Initialize the session
session_start();

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "../index.php";</script>';
}
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../index.php");
exit;
?>