<?php 
session_start();

if(isset($_POST["house_id"]))
{
	$output='';
	$conn=mysqli_connect("localhost","root","","myhostel");
	$query="SELECT * FROM products WHERE id='".$_POST["house_id"]."'";
	$result=mysqli_query($conn,$query);
	$output .= '
	<div class="table-responsive">
		<table class="table table-bordered"';

		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<tr>
				<td><label>House Name</label></td>
				<td>'.$row["house_name"].'</td>
			</tr>

			<tr>
				<td><label>House Price</label></td>
				<td>'.$row["house_price"].'</td>
			</tr>
			<tr>
				<td><label>Number of Rooms</label></td>
				<td>'.$row["numberofrooms"].'</td>
			</tr>
			<tr>
				<td><label>House Image</label></td>
				<td>'.$row["image"].'</td>
			</tr>
			<tr>
				<td><label>Category</label></td>
				<td>'.$row["category"].'</td>
			</tr>
			<tr>
				<td><label>House Description</label></td>
				<td>'.$row["house_description"].'</td>
			</tr>
			<tr>
				<td><label>House Location</label></td>
				<td>'.$row["location"].'</td>
			</tr>
			';
		}
$output .= "</table></div>";
		echo $output;
}

?>