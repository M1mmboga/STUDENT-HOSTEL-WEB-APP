<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include('links.php'); ?>

	<title>Contact us</title>
	<link rel="stylesheet" href="destinationcss.css">
	<style>
body
		{
			font-family: montserrat;
			width: 100%;
		}
		ul
		{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		ul li
		{
			float: right;
			width: 200px;
			height: 40px;
			background-color: black;
			opacity: .8;
			line-height: 40px;
			text-align: center;
			font-size: 18px;
			margin-right: 8px;
			padding-left: 16px;
		}
		ul li a
		{
			text-decoration: none;
			color: white;
			display: block;
		}
		ul li a:hover
		{
			background-color: green;
		}
		ul li:hover ul li
		{
			display: block;
		}
		ul li ul li
		{
			display: none;
		}

		footer
{
 bottom: 0px;
 background-color: teal;
 text-align: center;
 width: 100%;
 left: 0;
 color: white;
 height: 100px;
 padding-top: 10px;
 position: fixed;
 }
	</style>
</head>
<body>
<div class="nav">
	<ul>

		<li><a href="logout.php">Log Out</a></li>
		<li><a href="#">Contact us</a></li>
    		<li><a href="#">Manage Account</a></li>
   		
		<li><a href="display.php">View Accommodations</a></li>
       		
		<li><a href="homepage1.php">Home</a></li>
	</ul>


<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>


<div class="mycontactform" style="color:black; text-align: center; ">
	<form action="contact.php" method="POST">
		<p style="font-family: montserrat; font-weight: bold; font-size: 30px; margin-top: 10px; "><i>Kindly Submit Any Inquiry Information Below</i></p><br>
		<label for="fname">First Name</label>
		<input type="text"  name="firstname" placeholder="Enter your first name here..." required><br><br>

		<label for="lname">Last Name</label>
		<input type="text"  name="lastname" placeholder="Enter your last name here..." required><br><br>

		<label for="email">Email</label>
		<input type="text"  name="eemail" placeholder="Enter your email here..." required><br><br>

		<label for="county">County</label>
		<select  name="ccounty" placeholder="Enter your county here..." required>
			<option value="Baringo">Baringo County</option>
			<option value="Bomet">Bomet County</option>
			<option value="Bungoma">Bungoma County</option>
			<option value="Busia">Busia County</option>
			<option value="ElgeyoMarakwet">Elgeyo Marakwet County</option>
			<option value="Embu">Embu County</option>
			<option value="Garissa">Garissa County</option>
			<option value="HomaBay">Homa Bay County</option>
			<option value="Isiolo">Isiolo County</option>
			<option value="Kajiado">Kajiado County</option>
			<option value="Kakamega">Kakamega County</option>
			<option value="Kericho">Kericho County</option>
			<option value="Kiambu">Kiambu County</option>
			<option value="Kilifi">Kilifi County</option>
			<option value="Kirinyaga">Kirinyaga County</option>
			<option value="Kisii">Kisii County</option>
			<option value="Kisumu">Kisumu County</option>
			<option value="Kitui">Kitui County</option>
			<option value="Kwale">Kwale County</option>
			<option value="Laikipia">Laikipia County</option>
			<option value="Lamu">Lamu County</option>
			<option value="Machakos">Machakos County</option>
			<option value="Makueni">Makueni County</option>
			<option value="Mandera">Mandera County</option>
			<option value="Meru">Meru County</option>
			<option value="Migori">Migori County</option>
			<option value="Marsabit">Marsabit County</option>
			<option value="Mombasa">Mombasa County</option>
			<option value="Muranga">Muranga County</option>
			<option value="Nairobi">Nairobi County</option>
			<option value="Nakuru">Nakuru County</option>
			<option value="Nandi">Nandi County</option>
			<option value="Narok">Narok County</option>
			<option value="Nyamira">Nyamira County</option>
			<option value="Nyandarua">Nyandarua County</option>
			<option value="Nyeri">Nyeri County</option>
			<option value="Samburu">Samburu County</option>
			<option value="Siaya">Siaya County</option>
			<option value="TaitaTaveta">Taita Taveta County</option>
			<option value="TanaRiver">Tana River County</option>
			<option value="TharakaNithi">Tharaka Nithi County</option>
			<option value="TransNzoia">Trans Nzoia County</option>
			<option value="Turkana">Turkana County</option>
			<option value="UasinGishu">Uasin Gishu County</option>
			<option value="Vihiga">Vihiga County</option>
			<option value="Wajir">Wajir County</option>
			<option value="WestPokot">West Pokot County</option>
			
		</select><br><br>

		<label for="inquiry">Inquiry</label><br>
		<textarea rows="10" cols="80"  name="iinquiry" placeholder="Write your inquiry here..." style="height:100px" required></textarea><br><br>

		<input type="submit" value="Submit" name="submit1">
	</form>
</div>

<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>