<html>
<head>
	<link href="home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
	session_start();
	if(isset($_SESSION['etravel_id'])){}
	else 
		header("location:header.php");
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	
	$email = $_SESSION['etravel_id'];
	$query = "SELECT * FROM useracc WHERE email='$email'";
	$q = mysql_query($query);
	while($r=mysql_fetch_array($q))
	{
		$u_name=$r['uname'];
		$u_type=$r['atype'];
	}
	echo mysql_error();
?>
<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	
  <a id="sidebar"style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; position:absolute; right:250; top:60;">Hello, <?php echo $u_name;?></a><br><br>
  <div id="menu">	
		<ul>	
		<li><a href="#">Home</a></li>
		<li><a href="view_package.php">Packages</a></li>
        <li><a href="booking_list.php">Booking</a></li>
		<li><a href="about.htm">About</a></li>	
		<li><a href="contact.htm">Contact Us</a></li>
		</ul>
	</div>
	<br>
	<div id="pic_container" style="background-image:url(pics/slide2.png);">
		<div id="pic_text">
			<h3>Travelkart</h3>
			<p>Maintain an account with us for booking and package deals</p>
		</div>
	</div>
	<br><br>
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Account Settings:</p>
   		<div id="text_link_hp" align="center">
        <a href='change_pass.php' style="font-size:18px;">Change Password</a>
        <a href='update_profile.php' style="font-size:18px">Update Profile</a>
        <a href="fpass.php">Forgot Password</a>
		<a href='logout.php' style="font-size:18px">Log Out</a>
        </div>
  <p>
  <?php
  	if($u_type=="t1")
	{
  echo '<p align="center" style="color:#C90; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:18px;">Admin Settings</p>
  		<div id="text_link_hp" align="center"><a href="add_package.php">Add Package</a></div>
  </p>';
  }
  ?>
  <p style="float:left; width:80%;" align="center"><font size=5 face="Trebuchet MS" color="#e65b00">Choose from our selected destinations:</font></p>
  <p><img src="pics/places_3.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_2.png" width="371" height="188">
  <img src="pics/places_4.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_1.png" width="371" height="188" ></p>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
</body>
</html>