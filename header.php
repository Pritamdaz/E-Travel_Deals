<html>
<head>
<title>TravelKart</title>
<script type="text/javascript">
</script>
<link href="home.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php 
//session_start();
//$user_email=$_SESSION['etravel_id'];
$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
mysql_select_db("etravel",$link) or die("Database not connected");
	if(isset($_REQUEST['sin']))
	{
		$s_email=$_REQUEST['sign_user'];
		$s_pass=$_REQUEST['sign_pass'];
		$query="SELECT * FROM useracc WHERE email='$s_email'";
		$q=mysql_query($query);
		$d_email="";
		$d_pass="";
		while($r=mysql_fetch_array($q,MYSQL_BOTH))
		{
			$d_email=$r['email'];
			$d_pass=$r['pwd'];
		}
		if($d_pass==$s_pass)
		{
			session_start();
			$_SESSION['etravel_id']=$s_email;
			header("location:profile_page.php");
		}
		else 
			echo '<script type="text/javascript">alert("Invalid Email/Password");</script>';
	}
	mysql_close($link);

?>
<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5">  
	<br><br>
	<div id="menu">	
		<ul>	
		<li><a href="#">Home</a></li>
		<li><a href="view_package.php">Packages</a></li>
        <li><a href="view_package.php">Booking</a></li>
		<li><a href="about.htm">About</a></li>	
		<li><a href="contact.htm">Contact Us</a></li>
		</ul>
	</div>
	<br>
	<div id="pic_container" style="background-image:url(pics/slide1.png);">
		<div id="pic_text">
			<h3>Travelkart</h3>
			<p>Meeting your vacational needs</p>
		</div>
	</div>
	<br><br>
  <div id="sidebar">
		<p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:20px">Sign In</p>
   		<form name="form1" method="post" action="">
		  <font face="Trebuchet MS, Arial, Helvetica, sans-serif">E-mail: </font>
		  <input type="text" name="sign_user" id="tb" "><br><br>
			<font face="Trebuchet MS, Arial, Helvetica, sans-serif">Password: </font>
			<input type="password" name="sign_pass" id="tb" >
		  <br><br>
			<input type="submit" value="Log-In" name=sin id="btn">
    	</form>
		<p style="font-size:12px" id="text_link"><a href="reg.php">Create Account</a>&nbsp;&nbsp;<a href="fpass.php">Forgot Password</a></p>
	</div>
  <p id="content_text" style="margin-bottom: 100px;">
		<b>Travel with the best in the country</b><br><br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TravelKart provides you and your family with the most affordable travel options across the country. Visit the most exotic locations with minimal expense. Packages are divided into several category to help you suit your budget. Booking can be done online and reservations are available mostly through this portal. Our android app is coming soon to provide more accessibility.</p>
  <p><br>
  </p>
  <p style="float:left; width:80%;" align="center"><font size=5 face="Trebuchet MS" color="#e65b00">Choose from our selected destinations:</font></p>
  <p><img src="pics/places_3.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_2.png" width="371" height="188">
  <img src="pics/places_4.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_1.png" width="371" height="188" ></p>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
</body>
</html>