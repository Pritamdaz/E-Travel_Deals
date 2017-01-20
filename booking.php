<html>
<head>
<link href="home.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function show_receipt()
	{
		var username = document.getElementById('uname').value;
		var bookid = document.getElementById('p_id').value;
		var bookname = document.getElementById('p_name').innerHTML;
		var startdate = document.getElementById('start_date').innerHTML;
		var enddate = document.getElementById('end_date').innerHTML;
		var ptype = document.getElementById('p_type').innerHTML;
		var pcat = document.getElementById('p_cat').innerHTML;
		var noppl = document.getElementById('no_people').value;
		var costtag = document.getElementById('cost_tag').innerHTML;
		var paytype = document.getElementById('pay_type').value;
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		var currentdate = dd+"/"+mm+"/"+yyyy;

		document.write("<h3>Booking Receipt</h3><p>Booking ID:"+bookid+"</p><p>Name:"+username+"</p><p>Package Name:"+bookname+"</p><p>Package Start Date:"+startdate+"</p><p>Package End Date:"+enddate+"</p><p>Booking Date:"+currentdate+"</p><p>Package type:"+ptype+"</p><p>Package Category:"+pcat+"</p><p>No. of people:"+noppl+"</p><p>Total Cost:"+costtag+"</p><p>Payment Type:"+paytype+"</p>");
		
	}

</script>
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
			
		
		if(isset($_GET['pid']))
			$p_id = $_GET['pid'];
		else
			$p_id = 1;
		
		$q = "SELECT * FROM package WHERE pid=$p_id";
		$q1 = mysql_query($q);
		while($r=mysql_fetch_array($q1))
		{
			$p_name=$r['pname'];
			$p_sd=$r['startdate'];
			$p_ed=$r['enddate'];
			$p_type=$r['ptype'];
			$p_cat=$r['pcat'];
			$p_cost=$r['pcost'];
		}
		
		$query2="SELECT * FROM useracc WHERE email='".$_SESSION['etravel_id']."'";
		$q2=mysql_query($query2);
		while($r2=mysql_fetch_array($q2))
		{
			$u_name=$r2['uname'];
		}
		
		if(isset($_REQUEST['booknow']))
		{
			$q1 = "SELECT * FROM package WHERE pid=".$p_id;
			$q1 = mysql_query($q1);
			while($r1=mysql_fetch_array($q1))
			{
				$tot=$r1['pcost'];
				$pname=$r1['pname'];
			}
				
			$no_ppl=$_REQUEST['no_ppl'];
			$tot=$tot*$no_ppl;	
			$query1 = "INSERT INTO booking (bid,uid,pid,bookdate,nopeople,totalcost,pname) VALUES(0,'$email',$p_id,now(),$no_ppl,$tot,'$pname')";
			if($q1=mysql_query($query1))
			{
				echo '<script type="text/javascript">alert("Your Package has been booked!");</script>';
			}
			
		}
	?>

<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	
  <a id="sidebar"style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; position:absolute; right:250; top:60;">Hello, <?php echo $u_name;?></a><br><br>
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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Booking:</p>
   		<div style="margin-left:40%;">
        <form name="form1" method="post" action="">
	  <p>Booking ID: 
	    <input type="text" name="textfield" id="p_id" value=<?php echo $p_id;?> disabled>
	  </p>
	  <p>Package Name:&nbsp;<a id="p_name" style="color:#F90"><?php echo $p_name;?></a></p>
	  <p>Start Date:&nbsp;<a id="start_date" style="color:#F90"><?php echo $p_sd;?></a></p>
	  <p>End Date:&nbsp;<a id="end_date" style="color:#F90"><?php echo $p_ed;?></a></p>
	  <p>Type:&nbsp;<a id="p_type" style="color:#F90"><?php echo $p_type;?></a></p>
	  <p>Category:&nbsp;<a id="p_cat" style="color:#F90"><?php echo $p_cat;?></a></p>
	  <p>No. of people:
	    <select name="no_ppl" id="no_people" onChange="price_calc();">
        <?php
			for($i=1;$i<21;$i++)
			{
	      		echo '<option value="'.$i.'">'.$i.'</option>';
			}
		?>
        </select>
	  </p>
	  <p>Total Cost:&nbsp;Rs.<a id="cost_tag" style="color:#F90"><?php echo $p_cost;?></a></p>
	  <p>Payment Type:
	    <select name="select2" id="pay_type">
	      <option value="cash">Cash</option>
	      <option value="credit" selected="selected">Credit Card</option>
	      <option value="debit">Debit Card</option>
	      <option value="ewallet">Mobile Wallets</option>
        </select>
	    <input type="hidden" name="u_name" id="uname" value="<?php echo $u_name;?>">
	  </p>
	  <p>
	    <input type="submit" name="booknow" id="btn" value="Book Now" onClick="show_receipt()">
	  </p>
</form>
	
        </div>
  <p>
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 
</body>
<script type="text/javascript">
	var p;
	p = document.getElementById("cost_tag").innerHTML;
	function price_calc()
	{
		x=document.getElementById("no_people").value;
		document.getElementById("cost_tag").innerHTML=p*x;
	}
</script>
</html>