<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Etravel_reg</title>
<link href="styles/reg.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css">
</head>

<body>

<p>
  <?php 

if(isset($_REQUEST['reg_s']))
{
	$name = $_REQUEST['u_name'];
	$email = $_REQUEST['u_email'];
	$ph = $_REQUEST['u_ph'];
	$addr = $_REQUEST['u_addr'];
	$pass = $_REQUEST['u_pass'];
	$pass2 = $_REQUEST['u_pass_2'];
	$secq = $_REQUEST['secq'];
	$seca = $_REQUEST['seca'];
	$type = $_REQUEST['u_type'];
	
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
		mysql_select_db("etravel",$link) or die("Database not connected");
	$query = "INSERT INTO USERACC (uname, email, phone,address,pwd,secques,secans,atype) VALUES ('$name','$email',$ph,'$addr','$pass','$secq','$seca','$type')";
	$q1 = mysql_query($query);
	mysql_error();
	session_start();
	$_SESSION['etravel_id']=$email;
	echo $_SESSION['etravel_id'];
	
	
}

?>
</p>
<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	

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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Create Account:</p>
   		<div style="margin-left:40%;">
        
        </div>
  <p>
  <form id="form1" name="form1" method="get" action="" style="margin-left:350px;">
    <p>Name:
      <input type="text" name="u_name" id="textfield" />
      &nbsp;&nbsp;&nbsp;</p>
    <p>Email or UserId:
      <input type="email" name="u_email" id="textfield" />
    </p>
    <p>Phone No.:
      <input type="text" name="u_ph" id="textfield" maxlength="10" />
    </p>
    <p align="left">Address:
      <textarea name="u_addr" id="addr" cols="25" rows="3"></textarea>
    </p>
    <p>Password:
      <input type="password" name="u_pass" id="textfield" />
    </p>
    <p>Confirm Password:
      <input type="password" name="u_pass_2" id="textfield" />
    </p>
    <p> Security Question:
      <select name="secq" id="select">
        <option value="i1">What was your childhood name?</option>
        <option value="i2">What is your grandfather's name?</option>
        <option value="i3">Where were you born?</option>
      </select>
    </p>
    <p>Security Answer:
      <input type="text" name="seca" id="textfield2" />
    </p>
    <p>Type:
      <label for="u_type"></label>
      <select name="u_type" id="u_type">
        <option value="t1">admin</option>
        <option value="t2" selected="selected">user</option>
      </select>
    </p>
    <p>
      <input type="reset" name="reset" id="reset" value="Reset" />
      &nbsp;&nbsp;&nbsp;
      <input type="submit" name="reg_s" id="button" value="Register" />
    </p>
  </form>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
<p>Registration </p>
</body>
</html>
