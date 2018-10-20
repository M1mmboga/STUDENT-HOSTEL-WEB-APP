<?php 
session_start();
$error = '';

$conn = mysqli_connect("localhost","root","","myhostel");

if(isset($_POST['login']))
{
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$error= "Username or Password is missing";
		echo $error;
	}
	
	else if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = 'SELECT * FROM `users` WHERE username = ? OR email = ?';

		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss",$username,$username);
		$bool = $stmt->execute();

		if(!$bool)
		{
			echo $conn->error;
		}

		$result = $stmt->get_result();
		$row = $result->fetch_array();

		//If a user with that username is found ...
		if(mysqli_num_rows($result)>0)
		{ 

			$hash = $row['password'];
			//If the password hashes match ...
			if(password_verify($password,$hash)){
				$_SESSION['message'] = "You are successfully logged in";
				$_SESSION['username'] = $username;
				$_SESSION['userid'] = $row['userid'];


				//Get db results
				$type = $row['type'];

				echo $type;
				redirect($type);
			}else{

				echo $error="Invalid password";
			}
			
			
		}else
		{
			header("Location: register.php");

			$error = 'Invalid username or email';
			//fail to login user
			$_SESSION['message'] = $msg;
			echo $msg;
		}

		

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

	}
	/else 
	{
		//fail to create user
		$_SESSION['message'] = "Username and password do not match";
	}*/
}


function redirect($type){

	if($type == "student"){
		header("location: homepage1.php");// take me to home page
	}

	else if($type == "other"){
		header("location: admin3.php");// take me to home page
	}


}



?>
