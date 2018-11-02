<?php


class Bookings{
	
	function checkBooked($conn, $user_id){
		$query = "SELECT * FROM booking WHERE user_id = ?"; 
		$stmt = $conn->prepare($query);
		$stmt->bind_param('s', $user_id);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_array();

		return $row;
	}


}