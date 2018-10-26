<?php 

session_start();

if (isset($_POST['respond'])) {
	


	$message=$_POST['response'];
	$to=$_POST['email'];
	$headers = "From: mmbogamiriam2@gmail.com";

	mail($to, "My Hostel Feedback", $message, $headers);
	

header("Location: viewfeedback.php");
}


