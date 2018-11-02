<?php 
include('php/connect.php');
$error='';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register or Login</title>
	<link rel="stylesheet" href="">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
body
		{
			background: url('wallpaper2.jpg');
			background-repeat: no-repeat;
			height: 100%;
			width: 100%;
			position: fixed;
			background-position: center;
			background-attachment: fixed;

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
			color: red;
			display: block;
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
 text-align: center;
 width: 100%;
 left: 0;
 color: black;
 height: 100px;
 padding-top: 10px;
 position: fixed;
 }
	</style>
</head>
<body>
	
		<div class="nav">
	<ul>

		<li><a href="#"> <button type="button" name="add" id="add" data-toggle="modal" data-target="#signup1" class="btn btn-warning" style="color: blue; background-color: white; padding-left: 40px; font-family: serif; border-style: none; font-size: 30px;">Sign Up</button> </a></li>
		<li><a href="#"><button type="button" name="add" id="add" data-toggle="modal" data-target="#login1" class="btn btn-warning" style="color: blue; background-color: white; padding-left: 35px; font-family: serif; border-style: none; margin-right: 30px; font-size: 30px;">Login</button></a></li>
	</ul>


<h1 style="font-size: 35px; color: white; font-family: serif; font-weight: bolder;"><i>Find Your Accommodation </i></h1><br><br><br><br><br><br>
<p style="font-size: 45px; text-align: center; color: white; font-family: serif;  font-weight: bolder;">Are you a student in search of good accommodation in Nairobi? <br> Join us today, finding a good hostel is a click away...</p>
</div>
<h3 style="color: red;"><?php echo $error;?></h3>
<!-- login pop up form-->
<div class="container">
		<div class="table-responsive">
			
		</div>
	</div>

	<div id="login1" class="modal fade" >
		
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color: black;">Login To Your Account</h4>
				</div>
				<div class="modal-body">
				<form method="POST" id="insert_form" enctype="multipart/form-data" action="login.php" style=" position: relative; height: 100%;">

					<span style="color: red;">Login If You Already Have An Account</span><br><br>

					<label>Username or Email</label>
					<input type="text" autocomplete="off" name="username" id="name" class="form-control" required ><br>
					<label>Password</label>
					<input type="password" autocomplete="off" name="password" id="pword" class="form-control" required value=""><br>
					
					<input type="submit" name="login" id="login" value="Login" style="background-color: green;">
				</form>
			</div>
			<div class="modal-footer">
				<span style="color: red; "><p data-toggle="modal" data-target="#signup1" class="btn btn-warning" class="btn btn-default" data-dismiss="modal">Don't Have An Account?</p></span>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!--sign up pop up form-->

<div class="container">
		<div class="table-responsive">
			
		</div>
	</div>

	<div id="signup1" class="modal fade" >
		
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Create An Account</h4>
				</div>
				<div class="modal-body">
				<form method="POST" id="insert_form" enctype="multipart/form-data" action="createAcc.php" style=" position: relative; height: 100%;">

					<span style="color: red;">Your Records Will be Entered Once You Click Submit</span><br><br>

					<label>Full Name</label>
					<input type="text" name="fullname" id="name" class="form-control" required><br>
					
					<label>Gender</label><br>
					<select name="gender">						
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select><br><br>

					<label>Email</label>
					<input type="text" name="email" id="email" class="form-control" required><br>
					<label>Phone Number</label>
					<input type="text" name="phone" id="phone" class="form-control" required><br>

					<label>University</label>
					<input type="text" name="uni" id="uni" class="form-control" required><br>
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" required><br>
					<label>Password</label>
					<input type="password" name="password1" id="password1" class="form-control" required><br>
					<label>Confirm Password</label>
					<input type="password" name="password2" id="password2" class="form-control" required><br>
					<label>User Type</label><br>
					<select name="type" >						
						<option value="student">Student</option>
						<option value="other">Other</option>
					</select><br><br>
					<input type="submit" name="register" id="register" value="Submit">
				</form>
			</div>
			<div class="modal-footer">
				<span style="color: red;"><p data-toggle="modal" data-target="#login1" class="btn btn-warning" class="btn btn-default" data-dismiss="modal">Already Have An Account?</p></span>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<footer>
	
		<p>Contact us : myhostelaccommodation@gmail.com</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>

</footer>
</body>
</html>