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
$res=mysqli_query($link,"select * from users order by userid DESC");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to house side -->
	<table class="table">
		<tr>
			<td>

  <p style="color:black;"><?php echo $row["fullname"]; ?></p>

<td><input type="button" name="view" value="View" id="<?php echo $row["userid"]; ?>" class="btn btn-info btn-xs view_data"/>
</td>
</tr>

  </table>


<?php 
}

?>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content" style="color: black; width:100%;">
			<div class="modal-header">
								<h2 style="text-align: left;">User Details</h2>

				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="user_detail">

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" ">Edit</button>
				<button type="button" class="btn btn-primary" ">Delete</button>

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
			var user_id = $(this).attr("id");

			//alert(user_id);

			$.ajax({
				url:"selectusers.php",
				method:"post",
				data:{user_id:user_id},

				success:function(data)
				{
					alert();
					$('#user_detail').html(data);
					$('#dataModal').modal("show");

				}
			});


		});	
	});
</script>



<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
