<?php

$server="localhost";
$username="root";
$password="";

if(isset($_POST["firstname"]) && isset($_POST["lastname"])
	&& isset($_POST["eemail"]) && isset($_POST["ccounty"]) && isset($_POST["iinquiry"]))
{
	$conn=new mysqli($server,$username,$password,"myhostel");
	$query = $conn->prepare("INSERT INTO contact (fname,lname,email,county,inquiry) values (?,?,?,?,?)");
	$query->bind_param("sssss",$_POST["firstname"], $_POST["lastname"],$_POST["eemail"],$_POST["ccounty"],$_POST["iinquiry"]);
	if($query->execute())
		header("location: thankscontact.php");
	else
		header("location: contacts.php");
}





?>