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
		<li><a href="contacts.php">Contact us</a></li>

		<li><a>Find Help</a>
 <ul>
        		<li><a>Cancel Booking</a></li>
        		<li><a>Manage Account</a></li>

       		 </ul>
		</li>
		<li><a href="display.php">View Accommodations</a></li>

		<li><a href="homepage1.php">Home</a></li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>



<?php 
$res=mysqli_query($link,"select image,house_name,house_price from products where location='nairobi' order by id DESC");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to user side -->
<div class="displaytheimages">
	<table class="table">
		<tr>
			<td>
  <img src="../myhostel/<?php echo $row["image"]; ?>" alt="" height="250px" width="500px"/>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewhouses">Click to View Accommodation</button></td>
</tr>
<tr>
	<td>
  <p style="color:black;"><?php echo $row["house_name"]; ?></p>


  <h2 style="color:black;">Ksh <?php echo $row["house_price"]; ?></h2></td>
</tr>
  </table>

</div>


<?php 
}

?>


<?php 



$res=mysqli_query($link,"select * from products where house_name='?' ");
while($row=mysqli_fetch_array($res))
{

?>
<!-- pop up to view more about the accommodation-->


	<div id="viewhouses" class="modal fade" role="dialog" >
		
		<div class="modal-dialog modal-dialog-centered">
			
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color: black;"></h4>
				</div>
				<div class="modal-body">
				<table class="table">
					
<tr>
	<td>
		  <img src="../myhostel/<?php echo $row["image"]; ?>" alt="" height="250px" width="500px"/>
  <p style="color:black;"><?php echo $row["house_name"]; ?></p>
   <h2 style="color:black;">Ksh <?php echo $row["house_price"]; ?></h2>
  <p style="color:black;"><?php echo $row["category"]; ?></p>
  <p style="color:black;"><?php echo $row["house_description"]; ?></p>
  <p style="color:black;">Located in <?php echo $row["location"]; ?></p>
	</td>
</tr>

				</table>
			</div>
			<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Book Now</button>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
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
