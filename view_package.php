<html>
<head>
	<title>View Package</title>
    <link href="home.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
		session_start();
		$link=mysql_connect('localhost', 'root', '') or die("Not able to connect");
		mysql_select_db("etravel",$link) or die("Database not connected");
		
		if(isset($_SESSION['etravel_id']))
		{
			$email = $_SESSION['etravel_id'];
			$query = "SELECT * FROM useracc WHERE email='$email'";
			$q = mysql_query($query);
			while($r=mysql_fetch_array($q))
			{
				$u_name=$r['uname'];
				$u_type=$r['atype'];
			}
			echo mysql_error();
		}
		$query1 = "SELECT pid,pname,startdate,enddate,startbook,closebook,ptype,pcat,pcost,pdetails FROM package";
		$result = mysql_query($query1);
		$str="";
		$counter = 1;
		while($row=mysql_fetch_array($result))
		{
			if(isset($u_type))
			{
				if($u_type=='t1')
				{
					$str=$str."<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td><a href='booking.php?pid=".$row[0]."'>Book</a></td><td><a href='edit_package.php?pid=".$row[0]."'>Edit</a></td><td><a href='delete_package.php?pid=".$row[0]."'>Delete</a></td></tr>";
				}
				else
				{
					$str=$str."<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td><a href='booking.php?pid=".$row[0]."'>Book</a></td></tr>";
				}
			}
			
		}
		mysql_close($link);
	?>

<div class="container">
	<img src="pics/travel-icon-sketching.jpg" width="392" height="74" hspace="20" vspace="5" style="alignment-adjust:central">  
	
  <a id="sidebar"style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; position:absolute; right:250; top:60;"> 
  <?php
  if(isset($u_type))
   echo "Hello".$u_name;
  ?></a><br><br>
  <div id="menu">	
		<ul>	
		<li><a href="profile_page.php">Home</a></li>
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
    	<p align="center" style="color:#C90; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px;">Packages:</p>
   		<div id="text_link_hp" style="border-width:0px;" align="center">
        	<table width="900" height="84" border="1" cellpadding="0" cellspacing="0">
      <tr bgcolor="#FF9900">
        <th height="33" scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Start Date </th>
        <th scope="col">End Date </th>
        <th scope="col">Booking Start </th>
        <th scope="col">Booking End </th>
        <th scope="col">Type</th>
        <th scope="col">Category</th>
        <th scope="col">Price(INR)*</th>
        <th scope="col">Details</th>
        <th scope="col">Booking</th>
        <?php 
		if(isset($u_type))
		{
			if($u_type=='t1')
			{
				echo '
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>';
			}
		}
		?>
      </tr>
	  <?php  echo $str;?>
      
    </table>
    <p>*Prices for 1 person</p>
        </div>
  <p>
  
  <p style="float:left;margin-left:350px;color:grey;">--- A <b>Globsyn</b> Project ---</p>
</div> 

    
</body>
</html>