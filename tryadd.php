<?php 

session_start();

if(isset($_POST["submit1"]))
{

$target = "./house_images/".basename($_FILES['himage']['name']);


$link=mysqli_connect("localhost","root","","myhostel");


		$image=$_FILES["himage"]["name"];



	mysqli_query($link,"insert into products values('','$_POST[hname]','$_POST[hprice]','$_POST[hrooms]','$image','$_POST[hcategory]','$_POST[hdescription]','$_POST[locate]')");

if(	move_uploaded_file($_FILES["himage"]["tmp_name"],$target)
)
{
	echo '<script type="text/javascript">
	window.onload = function(){alert("New Accommodation Has Been Successffuly Added!");}
	</script>';
}
	else
	{
		echo '<script type="text/javascript">
	window.onload = function(){alert("New Accommodation Has Not Been Successffuly Added!");}
	</script>';
	}
}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('links.php');?>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="styles1.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body
		{
			font-family: Arial;
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
 }
 
	</style>
</head>
<body>
	<div class="nav">
	<ul>

		<li><a href="logout.php">Log Out</a></li>
		<li><a href="#">Manage Account</a></li>
		<li><a href="homepage2.php">User Home Page</a></li>
		<li><a href="admin3.php">Admin Homepage</a>	</li>
	</ul>



<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']?></i></h1>
</div>


<table border="0" style="color: black; font-weight: bold;">
<tr>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-left: 10px;"></td>
</tr>

<tr>
<td>
		<div class="container">
		<div class="table-responsive">
			<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Accommodation</button>
		</div>
	</div>
</td>
	<div id="add_data_Modal" class="modal fade" >
		
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
											<h4 class="modal-title">Add Accommodation</h4>

						<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form method="post" id="insert_form" enctype="multipart/form-data" action="tryadd.php">
					<label>House Name</label>
					<input type="text" name="name" id="name" class="form-control"><br>
					<label>House Price</label>
					<input type="text" name="price" id="price" class="form-control"><br>
					<label>Number of Rooms</label>
					<input type="text" name="rooms" id="rooms" class="form-control"><br>
					<label>House Image</label>
					<input type="file" name="image" id="image" class="form-control"><br>
					<label>House Category</label>
					<input type="text" name="category" id="category" class="form-control"><br>
					<label>House Description</label>
					<textarea  name="description" id="description" class="form-control"></textarea>
					<br>
					<label>House Location</label>
					<input type="text" name="location" id="location" class="form-control"><br>
					<input type="submit" name="insert" id="insert" value="Insert">
				</form>
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
			$('#insert_form').on('submit', function(event)
			{
				event.preventDefault();
				if($('#name').val()=='')
				{
					alert("Name is required");
				}

				else if($('#price').val()=='')
				{
					alert("Price is required");

				}
				else if($('#rooms').val()=='')
				{
					alert("Number of rooms is required");

				}
				else if($('#image').val()=='')
				{
					alert("Image is required");

				}
				else if($('#category').val()=='')
				{
					alert("Category is required");

				}
				else if($('#description').val()=='')
				{
					alert("Description is required");

				}
				else if($('#location').val()=='')
				{
					alert("Location is required");

				}
				else
				{
					$.ajax({
						url:"insert.php",
						method:"POST",
						data:$('#insert_form').serialize(),
						success:function(data)
						{
							$('#insert_form')[0].reset();
							$('#add_data_Modal').modal('hide');
							$('#').html(data)
						}
					});
				}
			});


		});
	</script>


</tr>




</table>



</body>
</html>


