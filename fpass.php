<html>
	<head>
		<title>Forgot Password</title>
		<script type="text/javascript">
			function hide1()
			{
				
			}
		</script>
        <link href="home.css" rel="stylesheet" type="text/css">
	</head>

<?php 
	session_start();
	$er="";
	$user_email=$_SESSION['etravel_id'];
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	$query2 = "SELECT * FROM useracc WHERE email='$user_email'";
	$q2 = mysql_query($query2);
	while($r2=mysql_fetch_array($q2))
		$u_name=$r2['uname'];
?>

<body>
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
        <h3>Forgot Password?</h3>
	<form action=fpass.php method=get name=f1>
		UserId/Email: <input type=text name=u_email placeholder="Enter your email/UserId" id="tb">
		<input type=submit value="Submit" name=sbtfpass id="btn">
	</form>
	<?php 
	
		$err1 = true;
	
		if(isset($_REQUEST['sbtfpass']))
		{
			$u_email = $_REQUEST['u_email'];
			$query1 = "SELECT * FROM useracc WHERE email='$u_email'";
			$q1 = mysql_query($query1);	
			while($r1 = mysql_fetch_array($q1))
			{
				echo '	
				<form action=fpass.php method=get name=f1>
					<h3>Security Question:</h3>
					<p>'.$r1['secques'].'</p>
					<input type=text placeholder="Enter Security Answer" name=u_secans id="tb">
					<input type=submit name=sbtsec value=submit id="btn">
				</form>';
				$err1 = false;
				$_SESSION['etravel_seca'] = $r1['secans']; 
				$_SESSION['etravel_temp_id'] = $r1['email']; 
			}
			
			if($err1==true)
				$er =  "User Doesn't Exist. <a href='fpass.php'>Try Again</a>";
		}
	
		if(isset($_REQUEST['sbtsec']))
		{
			$u_secans = $_REQUEST['u_secans'];
			if($_SESSION['etravel_seca']==$u_secans)
			{
				echo '<form action=fpass.php method=get name=f3>
				<h3>Reset Password</h3>
				New Password:<input type=password name=npass id="tb"><br><br>
				Confirm New Password:<input type=password name=cnpass id="tb"><br><br>
				<input type=submit name=sbtrpass id="btn">
				</form>';
				unset($_SESSION['etravel_seca']);
			}
			else
				$er = 'Wrong Security Answer. <a href="fpass.php">Try Again</a>';
		}
		
		if(isset($_REQUEST['sbtrpass']))
		{
			$temp_id = $_SESSION['etravel_temp_id'];
			$query2 = "SELECT * FROM useracc WHERE email='$temp_id'";
			$q2 = mysql_query($query2);
			while($r2 = mysql_fetch_array($q2))
			{
				$u_pass = $r2['pwd'];
			}
					if($_REQUEST['npass']!="" or $_REQUEST['cnpass']!="")
					{
						if($_REQUEST['npass']==$_REQUEST['cnpass'])
						{
							$n_pass = $_REQUEST['npass'];
							$query3 = "UPDATE useracc SET pwd='$n_pass' WHERE email='$temp_id'";
							if(mysql_query($query3))
								$er =  'DONE!!';
							else
								echo mysql_error();	
						}
						else
							$er =  "Passwords Don't Match. <a href='fpass.php'>Try Again</a>";
					}
					else
						$er =  "Empty Fields. <a href='fpass.php'>Try Again</a>";
			unset($_SESSION['etravel_temp_id']);
		}
?>
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