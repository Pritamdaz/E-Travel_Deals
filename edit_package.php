<?php 
	if(isset($_REQUEST['etravel_id']))
		header('location: header.php');
	$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
	mysql_select_db("etravel",$link) or die("Database not connected");
	session_start();
	$email = $_SESSION['etravel_id'];
	$query = "SELECT * FROM useracc WHERE email='$email'";
	$q = mysql_query($query);
	while($r=mysql_fetch_array($q))
	{
		$u_name=$r['uname'];
		$u_type=$r['atype'];
	}
	if(isset($_GET['pid']))
		$_SESSION['etravel_ed_id'] = $_GET['pid'];
	$pid = $_SESSION['etravel_ed_id'];
	
	$query2 = "SELECT * FROM package WHERE pid=".$pid;
	$q2 = mysql_query($query2);
	while($r2 = mysql_fetch_array($q2))
	{
		$get_name = $r2['pname'];
		$get_cost = $r2['pcost'];
		$get_sd = $r2['startdate'];
		$get_ed = $r2['enddate'];
		$get_sb = $r2['startbook'];
		$get_cb = $r2['closebook'];
		$get_type = $r2['ptype'];
		$get_details = $r2['pdetails'];
		$get_cat = $r2['pcat'];
		
		$get_sd = explode("-",$get_sd);
		$get_ed = explode("-",$get_ed);
		$get_sb = explode("-",$get_sb);
		$get_cb = explode("-",$get_cb);
	}
	
	if(isset($_REQUEST['sbtap']))
	{
		$pid = $_SESSION['etravel_ed_id'];
		$pname = $_REQUEST['p_name'];
		$ptype = $_REQUEST['p_type'];
		$pcat = $_REQUEST['p_cat'];
		$pdetails = $_REQUEST['p_details'];
		$psd = $_REQUEST['start_day'].".".$_REQUEST['start_month'].".".$_REQUEST['start_year'];
		$ped = $_REQUEST['close_day'].".".$_REQUEST['close_month'].".".$_REQUEST['close_year'];
		$bsd = $_REQUEST['book_start_day'].".".$_REQUEST['book_start_month'].".".$_REQUEST['book_start_year'];
		$bcd = $_REQUEST['book_close_day'].".".$_REQUEST['book_close_month'].".".$_REQUEST['book_close_year'];
		$price = $_REQUEST['u_price'];
		
		$query1 = "UPDATE package SET pname='$pname',pcost='$price',startdate='$psd',enddate='$ped',startbook='$bsd',closebook='$bcd',ptype='$ptype',pcat='$pcat',pdetails='$pdetails'  WHERE pid=$pid";
		if(mysql_query($query1))
		{
			header("location:view_package.php");
		}
		mysql_error();
	}
?>

<html>
<head>
	<link href="home.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		function price_calc()
		{
			var ptype_val = 10000;
			var pcat_val = 6000;
			var ptype = document.f1.p_type.value;
			var pcat = document.f1.p_cat.value;

			if(ptype=="Independent")
				ptype_val = 6000;
			if(ptype=="Inclusive")
				ptype_val = 8000;
			if(ptype=="Business")
				ptype_val = 10000;

			if(pcat=="Budget")
				pcat_val = 20000;
			if(pcat=="Premium")
				pcat_val = 50000;
			if(pcat=="Elite")
				pcat_val = 100000;

			var tot_cost = ptype_val + pcat_val;
			document.getElementById("pricer").value = tot_cost;
		}
	</script>
</head>

<body>
<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	
  <a id="sidebar"style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; position:absolute; right:250; top:60;">Hello, <?php echo $u_name;?></a><br><br>
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
	<div id="pic_container" style="background-image:url(pics/slide2.png);">
		<div id="pic_text">
			<h3>Travelkart</h3>
			<p>Maintain an account with us for booking and package deals</p>
		</div>
	</div>
	<br><br>
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Account Settings:</p>
   		<div id="text_link_hp" align="center">
        <form name="f1" method="get" action="">
  <h3>Edit Package</h3>
  <p>Package ID: 
    <input type="text" name="p_id" id="tb" value="<?php echo $pid;?>" disabled>
  </p>
  <p>Package Name: 
    <label for="textfield2"></label>
    <input type="text" name="p_name" id="tb" value="<?php echo $get_name;?>">
  </p>
  <p>Package Type: 
    <label for="select"></label>
    <select name="p_type" id="tb" onChange="price_calc()">
    	<option value="<?php echo $get_type;?>" selected="selected"><?php echo $get_type;?></option>
      <option value="Independent">Independent Tours</option>
      <option value="Inclusive">Inclusive Tours</option>
      <option value="Business">Business Tours</option>
    </select>
  </p>
  <p>Package Category: 
    <label for="select2"></label>
    <select name="p_cat" id="tb" onChange="price_calc()">
    	<option value="<?php echo $get_cat;?>" selected="selected"><?php echo $get_cat;?></option>
      <option value="Elite">Elite</option>
      <option value="Premium">Premium</option>
      <option value="Budget">Budget</option>
    </select>
  </p>
  <p>Package Details: 
    <label for="textarea"></label>
    <textarea name="p_details" id="tb" cols="25" rows="4"><?php echo $get_details;?></textarea>
  </p>
  <p>Starting Date: 
    <label for="start_day"></label>
    <select name="start_day" id="tb">
      <option value="<?php echo $get_sd[2];?>" selected><?php echo $get_sd[2];?></option>
      <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="start_month" id="tb">
      <option value="<?php echo $get_sd[1];?>" selected><?php echo $get_sd[1];?></option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="start_year" id="tb">
      <option value="<?php echo $get_sd[0];?>" selected><?php echo $get_sd[0];?></option>
      <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Closing Date:
    <label for="start_day"></label>
    <select name="close_day" id="tb">
      <option value="<?php echo $get_ed[2];?>" selected><?php echo $get_ed[2];?></option>
          <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="close_month" id="tb">
      <option value="<?php echo $get_ed[1];?>" selected><?php echo $get_ed[1];?></option>
         <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="close_year" id="tb">
      <option value="<?php echo $get_ed[0];?>" selected><?php echo $get_ed[0];?></option>
          <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Booking Starting Date: 
  	<select name="book_start_day" id="tb">
      <option value="<?php echo $get_sb[2];?>" selected><?php echo $get_sb[2];?></option>
  	  	  <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_start_month" id="tb">
      <option value="<?php echo $get_sb[1];?>" selected><?php echo $get_sb[1];?></option>
          <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_start_year" id="tb">
      <option value="<?php echo $get_sb[0];?>" selected><?php echo $get_sb[0];?></option>
          <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
  </select></p>
  <p>Booking Closing Date:
    <label for="start_day"></label>
    <select name="book_close_day" id="tb">
      <option value="<?php echo $get_cb[2];?>" selected><?php echo $get_cb[2];?></option>
      <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_close_month" id="tb">
      <option value="<?php echo $get_cb[1];?>" selected><?php echo $get_cb[1];?></option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_close_year" id="tb">
      <option value="<?php echo $get_cb[0];?>" selected ><?php echo $get_cb[0];?></option>
          <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Cost: Rs.<input type=text value=<?php echo $get_cost;?> id="tb" name="u_price"></p>
  <p>
    <input type="submit" name="sbtap" id="btn" value="Save Changes"> &nbsp;
    <input type="Reset" name="button" id="btn" value="Reset"><br><br>
    <a href="add_package.php">Cancel Package</a> 
  </p>
</form>
 </body>
</html>
<?php mysql_close($link);?>
        </div>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
