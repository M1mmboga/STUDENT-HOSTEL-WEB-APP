<?php 
//connect to db
$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn,"myhostel") or die(mysqli_error());

//query to extract the data
$query = ("SELECT * from users where userid=$_SESSION[userid]") or die(mysqli_error());
$result=mysqli_query($conn,$query);
//how to display the data
	print "<table border cellpadding=7>";

while($info=mysqli_fetch_array($result))
{
	print "<tr>";
	print "<th>Full Name</th>";
	print "<th>Username</th>";
	print "<th>Gender</th>";
	print "<th>Uni</th>";
	print "<th>Phone</th>";
	print "<th>Email</th></tr>";

	print "<tr>";
	print " <td>".$info['fullname']."</td>";
	print "<td>".$info['username']."</td>";
	print "<td>".$info['gender']."</td>";
	print "<td>".$info['uni']."</td>";
	print "<td>".$info['phone']."</td>";
	print "<td>".$info['email']."</td></tr>";

}
print "</table>";