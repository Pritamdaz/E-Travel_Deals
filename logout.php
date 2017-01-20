<?php 
	session_start();
	session_unset($_SESSION['etravel_id']);
	header("location:header.php");
?>