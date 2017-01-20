
<html>
<head>
	<link href="home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
	session_start();
	$er="";
	$user_email=$_SESSION['etravel_id'];
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
if(isset($_REQUEST['etravel_id']))
	header('location: header.php');
if(isset($_REQUEST['sub1']))
{
	$query = "SELECT pwd FROM useracc WHERE email='$user_email'";
	$q = mysql_query($query);
	global $u_pass1;
	$flag=false;
	if($r = mysql_fetch_array($q))
	{
		if($r[0]== $_REQUEST['p1'])
			$flag=true;
		else
			$flag=false;
		
	}
     if($flag==false)
     	$er="Incorrect Old Password";
     else 
     {
     	
     	$np=$_REQUEST['p2'];
     	$cnp=$_REQUEST['p3'];
     	if($np==$cnp)
     	{
     	$q="update useracc set pwd='$np' where email='$user_email'";
     	$row=mysql_query($q,$link);
     	if($row>0)
     		$er='<style="background-color:green;">Updated Successfully</style>';
     	else 
     		$er="No Connection to Database";
     	}
     	else 
     		$er="Passwords dont match";
     }
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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Change Password</p>
  <div style="margin-left:30%; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; size:20px; color:#333; font-weight:bold;">
        <form method=get>
			Old Password:<input type=password name="p1" id="tb"><br><br>
			New Password: <input type=password name="p2" id="tb"><br><br>
			Confirm New Password: <input type=password name="p3" id="tb"><br><br>
			<input type=submit value="Update Password" name="sub1" id="btn">
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