<?php 

session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include ('links.php') ;?>
	<title>My Account</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php include ('nav-bar.php') ;?> 

<div class="container">
<h1>My Account</h1>

<?php

//connect to db
$conn =mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn,"myhostel");
//write query
$query=("SELECT * from users where userid=$_SESSION[userid]") or(mysqli_error());
$result=mysqli_query($conn,$query);
//display data

print "<table cellpadding=4>";
	while($row=mysqli_fetch_array($result))
	{

	print "<tr>
	<td>Hello: </td>
	<td>".$row['fullname']."</td>
	</tr>

	<tr>
		<td>Username: </td>
	<td>".$row['username']."</td>

	</tr>
	<tr>
			<td>Gender:</td>
	<td>".$row['gender']."</td>

	</tr>
	<tr>
				<td>Uni: </td>
	<td>".$row['uni']."</td>

	</tr>
	<tr>
				<td>Phone: </td>
	<td>".$row['phone']."</td>

	</tr>
	<tr>
				 <td>Email:</td>
	<td>".$row['email']."</td>

	</tr>";
}
print "</table>";

?>
</div>

<div class="container">
	<h1>Booking Details</h1>
<?php 

//connect to db
$conn1=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn1,"myhostel");
//query my data
$query1 = ("SELECT * from booking where user_id = $_SESSION[userid]") or die(mysqli_error());
$result1=mysqli_query($conn1,$query1);
//display my data
print "<table  cellpadding=6>";

while($data=mysqli_fetch_array($result1))
{

	print "<tr>
	<td>Hostel Name</td>
	<td>Date Booked</td>
	<td>Rent Paid</td>

	</tr>

	<tr>

	<td>".$data['hostelname']."</td>

	<td>j</td>

	<td>".$data['total_price']."</td>
	</tr>";

}

print "</table>";
?>
</div>

<!-- website footer-->
	<footer style="position: relative;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>