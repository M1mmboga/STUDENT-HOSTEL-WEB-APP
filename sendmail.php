<?php 

session_start();

if (isset($_POST['send'])) {
	


	$message=$_POST['respond'];
	$to=$_POST['email'];
	$headers = "From: myhostelaccommodation@gmail.com";

	mail($to, "My Hostel Feedback", $message, $headers);
	

header("Location: viewfeedback.php");
}


