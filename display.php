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
		<li><a>Services</a>
       		 <ul>
        		<li><a>Our Team</a></li>
        		<li><a href="display.php">Gallery</a></li>
        	
       		 </ul>
		</li>
		<li><a href="homepage1.php">Home</a></li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>


<!-- just display all available places-->
<div class="thetowns">

<?php 
$res=mysqli_query($link,"select * from products order by id DESC");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to house side -->
	<table class="table">
		<tr>
			<td>

  <img src="../myhostel/<?php echo $row["image"]; ?>" alt="" height="250px" width="500px"/></td>

<td><input type="button" name="view" value="view" id="<?php echo $row["id"]?>" class="btn btn-info btn-xs view_data"/>Click to View Accommodation</td>
</tr>
<tr>
	<td>
  <p style="color:black;"><?php echo $row["house_name"]; ?></p>


  <h2 style="color:black;">Ksh <?php echo $row["house_price"]; ?></h2></td>
</tr>
  </table>


<?php 
}

?>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content" style="color: black;">
			<div class="modal-header">
								<h2 style="text-align: left;">House Details</h2>

				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="house_detail">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default">Book Now</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>




<script>
	$(document).ready(function()
	{
		$('.view_data').click(function()
		{
			var house_id = $(this).attr("id");
			$.ajax({
				url:"select.php",
				method:"post",
				data:{house_id:house_id},
				success:function(data)
				{
					$('#house_detail').html(data);
						$('#dataModal').modal("show");

				}
			});


		});	
	});
</script>

<!-- website footer-->
	<footer style="position: relative;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
