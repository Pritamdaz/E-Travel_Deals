<?php 
	if(isset($_REQUEST['etravel_id']))
		header('location: header.php');
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	session_start();
	$pid = $_GET['pid'];
	$query = "DELETE FROM package WHERE pid=".$pid;
	if(mysql_query($query))
		header("location:view_package.php");
?>