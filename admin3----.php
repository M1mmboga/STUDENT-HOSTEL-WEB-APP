<?php 

session_start();
include('php/connect.php');


if(isset($_POST["submit1"])){
	$conn->autocommit(false);
	
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
	$fnm=$_FILES["himage"]["name"];
	$dst="./house_images/".$v3.$fnm;
	$dst1="./house_images/".$v3.$fnm;
	


	move_uploaded_file($_FILES["himage"]["tmp_name"],$dst);
	$stmt = $conn->prepare("INSERT INTO products (`house_name`, `house_price`, `numberofrooms`, `image`, `category`, `house_description`, `location`)
		VALUES (?,?,?,?,?,?,?)");

	$stmt->bind_param("sssssss", $_POST['hname'], $_POST['hprice'], $_POST['hrooms'], $dst1, $_POST['category'], $_POST['hdescription'], $_POST['locate']);
	$bool = $stmt->execute();

	if(!$bool){
		echo $conn->error;
	}else{
		$conn->commit(); 
	}

	alert("New Accommodation Has Been Successffuly Added!");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('links.php');?>
	<title>Admin Panel</title>
        <link rel="stylesheet" href="css/admin-styles.css">
</head>
<body>
<?php include './admin-nav.php'; ?>	
    
<table border="0" style="color: black; font-weight: bold;">
<tr>
    <td><img src="admin1.jpg" class="adm-img" style="margin-left: 50px;"></td>
    <td><img src="admin1.jpg" class="adm-img" ></td>
    <td><img src="feedback.jpg" class="adm-img"></td>
    <td><img src="users.jpg" class="adm-img"></td>
</tr>

<tr>
<td>
		<div class="container">
		<div class="table-responsive">
			<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning" style="margin-left: 45px;">Add Accommodation</button>
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
				<form method="post" id="insert_form" enctype="multipart/form-data">
					<label>House Name</label>
					<input type="text" name="name" id="name" class="form-control"><br>
					<label>House Price</label>
					<input type="text" name="price" id="price" class="form-control"><br>
					<label>Number of Rooms</label>
					<input type="text" name="rooms" id="rooms" class="form-control"><br>
					<label>House Image</label>
					<input type="file" name="image" id="image" class="form-control"><br>
					<label>House Category</label>
					<select name="category"  class="form-control">
						<option value="Bedsitter">Bedsitter</option>
						<option value="One Bedroom">One Bedroom</option>
						<option value="Servant Quarter">Servant Quarter</option>
						<option value="Shared Room">Shared Room</option>
					</select>
					<label>House Description</label>
					<textarea name="description" id="description" class="form-control"></textarea>
					<br>
					<label>House Location</label>
					<input type="text" name="location" id="location" class="form-control"><br>
                                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary">
				</form>
                                </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
	</div>
<td ><input type="button" class="btn btn-warning" value="View Accommodations" onclick="opengallery()"></td>

<td style="padding-left: 60px;"><a href="viewfeedback.php" class="btn btn-warning">View Feedback</a></td>
<td style="padding-left: 60px;"><a href="viewusers.php" class="btn btn-warning">View Users</a></td>


<tr>
    <td><img src="users.jpg" width="350px;" height="200px;" style="padding-right: 90px; padding-left: 60px;"></td>
</tr>
<tr>
<td style="padding-left: 60px;"><a href="viewusers.php" class="btn btn-warning">Bookings Made</a></td><tr>

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
						data:new FormData(this),
						contentType: false,
                                                cache: false,
                                                processData:false,
						success:function(data)
						{
							$('#insert_form')[0].reset();
//							$('#add_data_Modal').modal('hide');
							if(data!=""){
								alert(data);
							}
						}
					});
				}
			});


		});
	</script>

</tr>



</table>


<!-- pop up button script-->
<script>
	var mywindow2;
	

	function opengallery()
	{
		mywindow2= window.open('display1.php','_self');
	}
</script>

<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>