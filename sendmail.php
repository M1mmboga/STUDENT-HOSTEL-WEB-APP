<?php 

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$email = $_REQUEST['eemail'];
$county = $_REQUEST['ccounty'];
$inquiry = $_REQUEST['iinquiry'];

$msg = "Firstname: $firstname\nLastname: $lastname\nEmail: $email\nCounty: $county\nInquiry: $inquiry";

mail("mmbogamiriam2@gmail.com", "Website feedback", " Info is: \n\n$msg", "From: \n$email");

header("Location: thankscontact.php");