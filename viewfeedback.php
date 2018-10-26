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
		<li><a href="#">Manage Account</a></li>
		<li><a href="homepage2.php">User Home Page</a></li>
		<li><a href="admin3.php">Admin Homepage</a>	</li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>



<!-- just display all available places-->
<div class="thetowns">

<?php 
$res=mysqli_query($link,"select * from contact order by feedbackid DESC");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to house side -->
	<table class="table">
		<tr>
			<td>

  <p style="color:black;"><?php echo $row["fname"]." ".$row["lname"]; ?></p>

<td>
	<input type="button" name="view" value="View" id="<?php echo $row["feedbackid"]; ?>" class="btn btn-info btn-xs view_data"/>
</td>
</tr>

  </table>


<?php 
}

?>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="color: black; width:100%;">
			<div class="modal-header">
								<h2 style="text-align: left;">User Feedback Details</h2>

				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="feedback_detail">

			</div>
			<div class="modal-footer">

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
			var feedback_id = $(this).attr("id");

			//alert(user_id);

			$.ajax({
				url:"selectfeedback.php",
				method:"post",
				data:{feedback_id:feedback_id},

				success:function(data)
				{
					alert();
					$('#feedback_detail').html(data);
					$('#dataModal').modal("show");

				}
			});


		});	
	});
</script>



<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p>Contact us : myhostelaccommodation@gmail.com</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
