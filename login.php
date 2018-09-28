<?php 
session_start();
$error = '';

if(isset($_POST['login_btn']))
{
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$error= "Username or Password is missing";
	}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$conn = mysqli_connect("localhost","root","","myhostel");

		$query = "SELECT username, password from users where username=? AND password=? LIMIT 1";



		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();
		$stmt->bind_result($username,$password);
		$stmt->store_result();


		if($stmt->fetch())
		{
			$_SESSION['username'] = $username;
			header("location: homepage1.php");// take me to home page
		}
		else
		{
			$error = "Username or Password invalid";
		}
		mysqli_close($conn);
	}
}



?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome, Login to your account</title>
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
	<div class="heading1" style="color: black; padding-left: 120px; font-weight: bold; font-size: 30px;"><i>Proceed to Login</i></div> <br>

	<form method="POST" action="login.php" style="float: center; color: green; font-size: 30px; border-style: dotted; width: 550px; border-radius: 10px;">
		<table >
		<tr>
		<td>First Name:</td>
		<td><input type="text" name="username"  required></td>
	</tr>	
	
	
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password"  required></td>
	</tr>	


	<tr>
		<td></td>
		<td><input type="submit" name="login_btn" value="Login" ></td>
	</tr>	

	<span style="color: red;"><?php echo $error; ?></span>
		</table>
		
	</form>
</div> 
</body>
</html>