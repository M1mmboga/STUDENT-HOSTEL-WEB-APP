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

$username=$_POST['username'];
$password = md5($password); //hash password before storing it for security
$sql="INSERT INTO users (fullname,gender,email,phone,uni,username,email,password) VALUES ('$fullname','$gender','$email','$phone','$uni','$username','$password')";
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
