<?php 
session_start();

if(isset($_POST["feedback_id"]))
{
	$output='';
	$conn=mysqli_connect("localhost","root","","myhostel");
	$query="SELECT * FROM contact WHERE feedbackid='".$_POST["feedback_id"]."'";
	$result=mysqli_query($conn,$query);
	$output .= '
	<div class="table-responsive">
		<table class="table table-bordered"';

		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<tr>
				<td><label>Name</label></td>
				<td>'.$row["fname"]." ".$row["lname"].'</td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td>'.$row["email"].'</td>
			</tr>
			
			<tr>
				<td><label>County</label></td>
				<td>'.$row["county"].'</td>
			</tr>
			<tr>
				<td><label>Inquiry</label></td>
				<td>'.$row["inquiry"].'</td>
			</tr>
			
			';
		}
	$output .= "</table></div>";
		echo $output;
}


//REMEMBER TO PUT TIME OF SENDING INQUIRY
?>