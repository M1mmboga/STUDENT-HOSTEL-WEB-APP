<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="">

	<style>
		body
		{
			font-family: Arial;
			color: white;
			width: 100%;
		}
		ul
		{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		ul li
		{
			float: right;
			width: 200px;
			height: 40px;
			background-color: black;
			opacity: .8;
			line-height: 40px;
			text-align: center;
			font-size: 18px;
			margin-right: 8px;
			padding-left: 16px;
		}
		ul li a
		{
			text-decoration: none;
			color: white;
			display: block;
		}
		ul li a:hover
		{
			background-color: green;
		}
		ul li:hover ul li
		{
			display: block;
		}
		ul li ul li
		{
			display: none;
		}

		footer
{
 bottom: 0px;
 background-color: teal;
 text-align: center;
 width: 100%;
 left: 0;
 color: white;
 height: 100px;
 padding-top: 10px;
 }
 
	</style>
</head>
<body>
	<div class="nav">
	<ul>

		<li><a>Log Out</a></li>
		<li><a href="contacts.html">Contact us</a></li>
		<li><a>Find Help</a>
 <ul>
        		<li><a>Payment modes</a></li>
        		<li><a>How To Use</a></li>
        		<li><a>Cancel Booking</a></li>
        		<li><a>Manage Account</a></li>

       		 </ul>
		</li>
		<li><a>Services</a>
       		 <ul>
        		<li><a>Our Team</a></li>
        		<li><a href="display.php">Accommodation Gallery</a></li>
        		<li><a>Mission &amp; Vision</a></li>
        		<li><a>Book Accommodation</a></li>
       		 </ul>
		</li>
		<li><a href="homepage1.php">Home</a></li>
	</ul>


<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation</i></h1>
</div>


<table border="0" style="color: black; font-weight: bold;">
<tr>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px; padding-left: 110px;"></a></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
</tr>

<tr>
<td style="padding-left: 110px;"><input type="button" style="background-color: white; border-color: none; border-style: none; font-size: 20px; font-weight: bold;" value="View All Accommodations" onclick="opengallery()"></td>
<td><input type="button" style="background-color: white; border-color: none; border-style: none; font-size: 20px; font-weight: bold;" value="Add Accommodation" onclick="openpopup()"></td>
<td>Update Accommodation</td>
<td>Delete Accommodation</td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
	<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px; padding-left: 110px;"></td>
	<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
	<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
	<td><img src="admin1.jpg" width="200px;" height="200px;" style="padding-right: 90px;"></td>
</tr>

<tr>
<td style="padding-left: 110px;">View All Users</td>
<td>X</td>
<td>Confirm or Cancel Booking</td>
<td>View Feedback</td>
</tr>
</table>


<!-- pop up button script-->
<script>
	var mywindow;
	var mywindow2;
	function openpopup()
	{
		mywindow= window.open('add_product.php','_blank','height=500,width=500');
	}

	function opengallery()
	{
		mywindow2= window.open('display.php','_self');
	}
</script>
</body>
</html>