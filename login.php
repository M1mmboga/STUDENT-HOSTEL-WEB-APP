<?php 
session_start();
$error = '';

$conn = mysqli_connect("localhost","root","","myhostel");

if(isset($_POST['login']))
{
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$error= "Username or Password is missing";
	}
	
	else if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = "SELECT username, password from users where username=? AND password=? LIMIT 1";

		mysqli_query($conn,$query);

		$_SESSION['message'] = "You are successfully logged in";
		$_SESSION['username'] = $username;
		header("location: homepage1.php");// take me to home page

	}
	/*if(!empty($_POST['username']) && !empty($_POST['password']))
	{ 
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = "SELECT username, password from users where username='admin' AND password='admin' LIMIT 1";

		mysqli_query($conn,$query);

		$_SESSION['message'] = "You are successfully logged in";
		$_SESSION['username'] = $username;
		header("location: admin3.php");// take me to home page

	}*/
	else 
	{
		//fail to create user
		$_SESSION['message'] = "Username and password do not match";
	}
}



?>
