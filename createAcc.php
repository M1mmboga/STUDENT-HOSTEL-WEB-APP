<?php 

session_start();

//connect to database
$db= mysqli_connect("localhost","root","","myhostel");

if(isset($_POST['register']))
{
	//session_start();
	

if($password1 == $password2)
{
	//create user account
	$fullname=$_POST['fullname'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$uni=$_POST['uni'];
	$type=$_POST['type'];
	$password = $_POST['password1'];

	$username=$_POST['username'];
	$hash = password_hash($password,PASSWORD_BCRYPT); //hash password before storing it for security
	$sql="INSERT INTO users (fullname,gender,email,phone,uni,username,password,type) VALUES ('$fullname','$gender','$email','$phone','$uni','$username','$hash','$type')";
	mysqli_query($db,$sql);
	$_SESSION['message'] = "You are successfully logged in";
	$_SESSION['username'] = $username;
	header("location: register.php");// take me to login  page

}else
{
	//fail to create user
	$_SESSION['message'] = "The two passwords do not match";
		header("location: register.php");

}


}



?>
