<?php 
include 'php/connect.php';
session_start();

if(isset($_POST["house_id"]))
{
	$output='';
	$query="SELECT * FROM users WHERE userid='".$_POST["house_id"]."'";
	$result=mysqli_query($conn,$query);
	$output .= '
	<div class="table-responsive">
		<table class="table table-bordered"';

		while($row = mysqli_fetch_array($result))
		{
			$output .= '

			<form method="post" action="php/edithouse.php">
				<input type="hidden" name="house_id" value="'.$row["userid"].'" /> 
				<tr>

					<td><label>House Name</label></td>
					<td> '.$row["fullname"].' </td>
				</tr>
				
				<tr>

					<td><label>House Name</label></td>
					<td> '.$row["uni"].' </td>
				</tr>
				
			</form>

			';
		}
		$output .= "</table></div>";
		echo $output;



}

?>