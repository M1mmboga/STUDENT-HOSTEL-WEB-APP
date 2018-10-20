<?php 
session_start();

if(isset($_POST["user_id"]))
{
	$output='';
	$conn=mysqli_connect("localhost","root","","myhostel");
	$query="SELECT fullname,gender,uni,phone,email FROM users WHERE userid='".$_POST["user_id"]."'";
	$result=mysqli_query($conn,$query);
	$output .= '
	<div class="table-responsive">
		<table class="table table-bordered"';

		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<tr>
				<td><label>Full Name</label></td>
				<td>'.$row["fullname"].'</td>
			</tr>

			<tr>
				<td><label>Gender</label></td>
				<td>'.$row["gender"].'</td>
			</tr>
			<tr>
				<td><label>University</label></td>
				<td>'.$row["uni"].'</td>
			</tr>
			
			<tr>
				<td><label>Phone</label></td>
				<td>'.$row["phone"].'</td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td>'.$row["email"].'</td>
			</tr>
			
			';
		}
	$output .= "</table></div>";
		echo $output;
}

?>