<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add accommodation</title>
	<link rel="stylesheet" href="">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
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
</body>
</html>