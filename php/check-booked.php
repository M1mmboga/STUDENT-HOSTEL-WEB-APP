<?php

include 'connect.php';
include '../Classes/Bookings.php';

$bookings = new Bookings();


if(isset($_POST['user_id'])){

	$row = $bookings->checkBooked($conn, $user_id);

	if(isset($row)){
		echo "booked";
	}
}