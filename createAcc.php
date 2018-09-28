<?php 

session_start();

//connect to database
$db= mysqli_connect("localhost","root","","myhostel");

if(isset($_POST['register_btn']))
{
	//session_start();
	


if($password == $password2)
{
//create user account
$username=$_POST['username'];
$email=$_POST['email'];
$password = md5($password); //hash password before storing it for security
$sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
mysqli_query($db,$sql);
$_SESSION['message'] = "You are successfully logged in";
$_SESSION['username'] = $username;
header("location: homepage1.php");// take me to home page


}else
{
	//fail to create user
	$_SESSION['message'] = "The two passwords do not match";
		header("location: register.php");

}


}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome, Create an Account</title>
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
	</style>
</head>
<body>

			<div class="nav">
	<ul>

		<li><a>Contact us</a></li>
		<li><a>My Account</a>
			 <ul>
        		<li><a href="login.php">Log In</a></li>
        		<li><a href="createAcc.php">Create An Account</a></li>
       		 </ul>
		</li>
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
        		<li><a>Accommodation Gallery</a></li>
        		<li><a>Mission &amp; Vision</a></li>
        		<li><a>Book Accommodation</a></li>
       		 </ul>
		</li>
		<li><a>Home</a></li>
	</ul>


<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation </i></h1>
</div>

<!--register account form -->
	<div class="mylogin" style="padding-left: 300px; ">
	<div class="heading1" style="color: black; padding-left: 120px; font-weight: bold; font-size: 30px;"><i>Proceed to Register</i></div> <br>

	<form method="POST" action="createAcc.php" style="float: center; color: green; font-size: 30px; border-style: dotted; width: 550px; border-radius: 10px;">
		<table >
		<tr>
		<td>First Name:</td>
		<td><input type="text" name="username"  ></td>
	</tr>	
	
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email"  ></td>
	</tr>	

	<tr>
		<td>Password:</td>
		<td><input type="password" name="password"  ></td>
	</tr>	

	<tr>
		<td>Confirm Password:</td>
		<td><input type="password" name="password2"  ></td>
	</tr>	

	<tr>
		<td></td>
		<td><input type="submit" name="register_btn" value="Register" ></td>
	</tr>	
		</table>
		
	</form>
</div> -->
</body>
</html>