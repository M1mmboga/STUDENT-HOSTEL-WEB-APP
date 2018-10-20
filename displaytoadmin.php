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
			<?php include('links.php'); ?>

	<title></title>
	<link rel="stylesheet" href="styles1.css">
</head>
<body>
	
	<div class="nav">
<ul>
<li><a href="logout.php">Log Out</a></li>
		<li><a>Manage Account</a></li>
		<li><a href="homepage2.php">User Home Page</a></li>
		<li><a href="admin3.php">Admin Homepage</a>	</li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>




<table border="0" style="color: black; float:center;">
<tr>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></a></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>

</tr>

<tr>
<td><a href="displaynrb.php" style="text-decoration: none; text-align: center; ">Nairobi</a></td>

<td><a href="displaynax.php" style="text-decoration: none; text-align: center;">Nakuru</a></td>


<td><a href="displaymsa.php" style="text-decoration: none; text-align: center;">Mombasa</a></td>


<td><a href="displaynyeri.php" style="text-decoration: none; text-align:center;">Nyeri</a></td>
</tr>



</table>

<!-- website footer-->
	<footer style="position: fixed;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
