<?php 
include 'php/connect.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("links.php");?>

	<title>Bookings</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php include("nav-bar.php");?>
<p style="text-align: center; font-weight: bold;">BOOK NOW</p>
	<table id="mytable" class="table" style="width: 70%;border-style: none; margin-left: 120px;">
		<tr>
			<td>Hostel View</td>
			<td>My Name</td>
		</tr>
		<tr>
			<td>Hostel Name</td>
			<td>My Email</td>
		</tr>
		<tr>
			<td>Location</td>
			<td>Move in Date</td>
		</tr>
		<tr>
			<td>Rooms Available</td>
			<td>Payment</td>
		</tr>
		<tr>
			<td>House Type</td>
		</tr>
		<tr>
			<td>House Price</td>
		</tr>
		<tr>
			<td><input type="submit" name="booking" value="Make Booking" class="btn btn-success"></td>
		</tr>
	</table>
</body>
</html>