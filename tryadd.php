<?php 

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"myhostel");

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="">
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
			color: white;
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

		<li><a>Log Out</a></li>
		<li><a href="contacts.html">Contact us</a></li>
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


<table border="0" style="color: black; font-weight: bold;">
<tr>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-left: 10px;"></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" ></td>


</tr>

<tr>
<td>
		<div class="container">
		<div class="table-responsive">
			<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Accommodation</button>
		</div>
	</div>

	<div id="add_data_Modal" class="modal fade" >
		
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Accommodation</h4>
				</div>
				<div class="modal-body">
				<form method="post" id="insert_form">
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

		<td><h3>View Accommodations</h3></td>

</tr>




</table>



</body>
</html>


<?php 

if(isset($_POST["submit1"]))
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
	$fnm=$_FILES["himage"]["name"];
	$dst="./house_images/".$v3.$fnm;
	$dst1="./house_images/".$v3.$fnm;

	move_uploaded_file($_FILES["himage"]["tmp_name"],$dst);

	mysqli_query($link,"insert into products values('','$_POST[hname]','$_POST[hprice]','$_POST[hrooms]','$dst1','$_POST[hcategory]','$_POST[hdescription]','$_POST[locate]')");

	echo '<script type="text/javascript">
	window.onload = function(){alert("New Accommodation Has Been Successffuly Added!");}
	</script>';
}

?>