<?php 
session_start();

if(isset($_POST["feedback_id"]))
{
	$output='';
	$conn=mysqli_connect("localhost","root","","myhostel");
	$query="SELECT * FROM contact WHERE feedbackid='".$_POST["feedback_id"]."'";
	$result=mysqli_query($conn,$query);
	$output .= '
	<form action="sendmail.php" method="post">
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
				<td><input type="email" name="email" value="'.$row["email"].'" class="form-control" required readonly/></td>

			</tr>
			
			<tr>
				<td><label>County</label></td>
				<td>'.$row["county"].'</td>
			</tr>
			<tr>
				<td><label>Inquiry</label></td>
				<td>'.$row["inquiry"].'</td>
			</tr>

			<tr>
			<td>Response Message</td>
			<td><textarea name="respond" cols="80" rows="10"></textarea></td>
			</tr>
			
			<tr>
			<input type="submit" value="Send Response" class="btn btn-primary" name="send">
			</tr>

			
			';
		}
	$output .= "</table></div></form>";
		echo $output;
}


//REMEMBER TO PUT TIME OF SENDING INQUIRY
?>