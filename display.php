<?php 

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"myhostel");

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="styles1.css">
</head>
<body>
	
	<div class="nav">
	<ul>

		<li><a>Contact us</a></li>
		<li><a>My Account</a>
		<ul>
			<li>Log In</li>
			<li>Create An Account</li>
		</ul>
		</li>

		<li><a>Find Help</a>
 <ul>
        		<li><a>Payment modes</a></li>
        		<li><a>How To Use</a></li>
        		<li><a>Cancel Booking</a></li>
        		<li><a>Manage Account</a></li>

       		 </ul>
		</li>
		<li><a>Services</a>
       		 <ul>
        		<li><a>Our Team</a></li>
        		<li><a href="display.php">Accommodation Gallery</a></li>
        		<li><a>Mission &amp; Vision</a></li>
        		<li><a>Book Accommodation</a></li>
       		 </ul>
		</li>
		<li><a href="homepage1.php">Home</a></li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation</i></h1>
</div>

<div class="thetowns">
<p><a href="displaynrb.php" style="text-decoration: none; text-align:  center; ">Nairobi</a></p>

<p><a href="displaynax.php" style="text-decoration: none; text-align:  center;">Nakuru</a></p>


<p><a href="displaymsa.php" style="text-decoration: none; text-align:  center;">Mombasa</a></p>


<p><a href="displaynyeri.php" style="text-decoration: none; text-align:  center;">Nyeri</a></p>
</div>

<!-- website footer-->
	<footer style="position: fixed;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
