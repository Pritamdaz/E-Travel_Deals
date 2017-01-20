<html>
<head>
	<link href="home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
	session_start();
	$er="";
	if(isset($_SESSION['etravel_id']))
	{
	
	}
	else
		header("location:header.php");
	$user_email=$_SESSION['etravel_id'];
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	$query = "SELECT * FROM useracc WHERE email='$user_email'";
	$q = mysql_query($query);
	while($r = mysql_fetch_array($q))
	{
		$u_name = $r['uname'];
		$u_email=$r['email'];
		$u_phone=$r['phone'];
		$u_adr=$r['address'];
	}
	echo mysql_error();
	
	//updating
	if(isset($_REQUEST['upd']))
	{
		$u_email = $_REQUEST['u_email'];
		$u_phone = $_REQUEST['u_ph'];
		$u_adr = $_REQUEST['u_addr'];
		$query2="UPDATE useracc SET email ='$u_email' ,phone=$u_phone ,address='$u_adr' WHERE email='$user_email'";
		$r=mysql_query($query2);
		if($r>0)
			$er = "updated successfully";
		else 
			$er =  "Err";
		echo mysql_error();
	}
	$query2 = "SELECT * FROM useracc WHERE email='$user_email'";
	$q2 = mysql_query($query2);
	while($r2=mysql_fetch_array($q2))
		 $u_name=$r2['uname'];
?>
<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	
  <a id="sidebar"style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; position:absolute; right:250; top:60;"><?php echo "Hello, ".$u_name;?></a><br><br>
  <div id="menu">	
		<ul>	
		<li><a href="profile_page.php">Home</a></li>
		<li><a href="view_package.php">Packages</a></li>
        <li><a href="view_package.php">Booking</a></li>
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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Update Profile</p>
  <div style="margin-left:30%; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; size:20px; color:#333; font-weight:bold;">
        Name:&nbsp;<?php echo $u_name;?>
		<form method=get>
			<p>Email or UserId:
    		<input type="email" name="u_email" id="tb" value="<?php echo $u_email;?>" />
  			</p>
  			<p>Phone No.:
    		<input type="text" name="u_ph" id="tb" maxlength="10" value="<?php echo $u_phone;?>" />
  			</p>
  			<p align="left">Address:
   			<textarea name="u_addr" id="tb" cols="25" rows="3"><?php echo $u_adr;?></textarea>
 			</p>
  			<input type=submit value=Update name=upd id="btn">
			</form>
	</div>
        <div id="err" align="center"><?php echo $er;?></div>
  <p style="float:left; width:80%;" align="center"><font size=5 face="Trebuchet MS" color="#e65b00">Choose from our selected destinations:</font></p>
  <p><img src="pics/places_3.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_2.png" width="371" height="188">
  <img src="pics/places_4.png" width="371" height="188" style="margin-left:70px;">
  <img src="pics/places_1.png" width="371" height="188" ></p>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
</body>
</html>