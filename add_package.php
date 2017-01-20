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
		$u_name=$r['uname'];
	echo mysql_error();
	if(isset($_REQUEST['etravel_id']))
		header('location: header.php');
	
	$query2 = "SELECT MAX(pid) AS max FROM package";
	$q2 = mysql_query($query2);
	$r = mysql_fetch_array($q2);
	$max_id = $r['max'];
	$max_id++;
	
	if(isset($_REQUEST['sbtap']))
	{
		$pname = $_REQUEST['p_name'];
		$ptype = $_REQUEST['p_type'];
		$pcat = $_REQUEST['p_cat'];
		$pdetails = $_REQUEST['p_details'];
		$psd = $_REQUEST['start_day'].".".$_REQUEST['start_month'].".".$_REQUEST['start_year'];
		$ped = $_REQUEST['close_day'].".".$_REQUEST['close_month'].".".$_REQUEST['close_year'];
		$bsd = $_REQUEST['book_start_day'].".".$_REQUEST['book_start_month'].".".$_REQUEST['book_start_year'];
		$bcd = $_REQUEST['book_close_day'].".".$_REQUEST['book_close_month'].".".$_REQUEST['book_close_year'];
		$price = $_REQUEST['u_price'];
		
		$query1 = "INSERT INTO package (pid, pname, pcost, startdate, enddate, startbook, closebook, ptype, pcat, pdetails) VALUES (0,'$pname','$price','$psd','$ped','$bsd','$bcd','$ptype','$pcat','$pdetails')";
		if(mysql_query($query1))
			echo "Package created";
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
		<li><a href="header.php">Home</a></li>
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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Add Package</p>
   		<div id="text_link_hp" align="center">
        	<form name="f1" method="get" action="">
  <p>Package ID: 
    <input type="text" name="p_id" value="<?php echo $max_id;?>"  id="tb" disabled>
  </p>
  <p>Package Name: 
    <label for="textfield2"></label>
    <input type="text" name="p_name" id="tb">
  </p>
  <p>Package Type: 
    <select name="p_type" id="tb" onChange="price_calc()">
      <option value="Independent" selected="selected">Independent Tours</option>
      <option value="Inclusive">Inclusive Tours</option>
      <option value="Business">Business Tours</option>
    </select>
  </p>
  <p>Package Category: 
    <select name="p_cat" onChange="price_calc()" id="tb">
      <option value="Elite">Elite</option>
      <option value="Premium">Premium</option>
      <option value="Budget" selected="selected">Budget</option>
    </select>
  </p>
  <p>Package Details: 
    <label for="textarea"></label>
    <textarea name="p_details" cols="25" rows="4" readonly id="tb"></textarea>
  </p>
  <p>Starting Date: 
    <label for="start_day"></label>
    <select name="start_day" id="tb">
      <option value="sd">DD</option>
      <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="start_month" id="tb">
      <option value="sm">MM</option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="start_year" id="tb">
      <option value="sy">YYYY</option>
      <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Closing Date:
    <label for="start_day"></label>
    <select name="close_day" id="tb">
      <option value="cd">DD</option>
      <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="close_month" id="tb">
      <option value="cm">MM</option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <select name="close_year" id="tb">
      <option value="cy">YYYY</option>
      <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Booking Starting Date: 
  	<select name="book_start_day" id="tb">
  	  <option value="bsd">DD</option>
  	  <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_start_month" id="tb">
      <option value="bsm">MM</option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_start_year" id="tb">
      <option value="bsy">YYYY</option>
      <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
  </select></p>
  <p>Booking Closing Date:
    <label for="start_day"></label>
    <select name="book_close_day" id="tb">
      <option value="mcd">DD</option>
      <?php 
      	for($i=1;$i<32;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_close_month" id="tb">
      <option value="bcm">MM</option>
      <?php 
      	for($i=1;$i<13;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
    <label for="start_day"></label>
    <select name="book_close_year" id="tb">
      <option value="bcy">YYYY</option>
      <?php 
      	for($i=2016;$i<2026;$i++)
      		echo "<option value=".$i.">".$i."</option>";
      ?>
    </select>
  </p>
  <p>Cost: Rs.<input name="u_price" type=text id="tb" value=26000 readonly="readonly"></p>
  <p>
    <input type="submit" name="sbtap" value="Add Package" id="btn"> &nbsp;
    <input type="Reset" name="button" value="Reset" id="btn"><br><br>
    <a href="profile_page.php">Cancel Package</a> 
  </p>
</form>
        </div>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div>
	
 </body>
</html>
<?php mysql_close($link);?>