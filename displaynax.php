<?php 
session_start();
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

		<li><a href="logout.php">Log Out</a></li>
		<li><a href="contacts.php">Contact us</a></li>

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

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>



<?php 
$res=mysqli_query($link,"select * from products where location='nakuru'");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to user side -->
<div class="displaytheimages">
  <img src="../myhostel/<?php echo $row["image"]; ?>" alt="" height="250px" width="500px"/>

  <h2 style="color:black;">Ksh <?php echo $row["house_price"]; ?></h2>
  <p style="color:black;"><?php echo $row["house_name"]; ?></p>
  <p style="color:black;"><?php echo $row["category"]; ?></p>
  <p style="color:black;"><?php echo $row["house_description"]; ?></p>
  <p style="color:black;">Located in <?php echo $row["location"]; ?></p>
</div>


<?php 
}

?>
<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
