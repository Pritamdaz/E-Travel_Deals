<?php
	session_start();
	if(isset($_SESSION['etravel_id'])){}
	else 
		header("location:header.php");
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	
	$email = $_SESSION['etravel_id'];
	$str = "";
	$query="SELECT * FROM booking WHERE uid='$email'";
	$q1 = mysql_query($query);
	while($r=mysql_fetch_array($q1))
	{
		$str=$str."<hr>Package name:".$r['pname']."<br> Booking Date:".$r['bookdate']."<br> No. of People:".$r['nopeople']."<br> Total Cost: Rs.".$r['totalcost']."<br><br><input type=button value=Print>";
	}
	echo "Your Bookings:<br>".$str;
	
?>