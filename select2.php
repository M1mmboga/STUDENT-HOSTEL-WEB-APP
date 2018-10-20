<?php 
include 'php/connect.php';
session_start();

if(isset($_POST["house_id"]))
{
	$output='';
	$query="SELECT * FROM products WHERE id='".$_POST["house_id"]."'";
	$result=mysqli_query($conn,$query);
	

		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<form method="post" action="php/edithouse.php">
				<input type="hidden" name="house_id" value="'.$row["id"].'" /> 
				<div class="modal-body" id="house_detail">
					<div class="table-responsive">
						<table class="table table-bordered"
							<tr>
								<td><label>House Name</label></td>
								<td> <input type="text" name="house_name" id="house_name" value="'.$row["house_name"].'" class="form-control" readonly/> </td>
							</tr>
							<tr>
								<td><label>House Price</label></td>
								<td><input type="number" name="house_price" value="'.$row["house_price"].'" class="form-control" required/></td>
							</tr>
							<tr>
								<td><label>Number of Rooms</label></td>
								<td><input type="number" name="numberofrooms" value="'.$row["numberofrooms"].'" class="form-control" required/></td>
							</tr>
							<tr>
								<td><label>House Image</label></td>
								<td><img src = "'.$row['image'].'." style="width:300px; height: 300px;"></td>
							</tr>
							<tr>
								<td><label>Category</label></td>
								<td><input type="text" name="category" value="'.$row["category"].'" class="form-control" readonly/></td>
							</tr>
							<tr>
								<td><label>House Description</label></td>
								<td><input type="text" name="house_description" value="'.$row["house_description"].'" class="form-control" required/></td>
							</tr>
							<tr>
								<td><label>House Location</label></td>
								<td><input type="text" name="location" value="'.$row["location"].'" class="form-control" required/></td>
							</tr>				
						</table>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default"><a href="Booking/cartAction.php?action=addToCart&id='.$row['id'].'">Book Now</a></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
			';
		}
			
		echo $output;
}

?>

		
			 
			
			