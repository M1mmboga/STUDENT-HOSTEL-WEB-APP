<?php

include 'php/connect.php';

session_start();

if(isset($_POST['house_id'])){

	$house_id = $_POST['house_id'];
	$house_name =  getName($conn, $house_id);

	$status = delete($conn, $house_id);

	if($status){
		echo $house_name." deleted.";
	}


}



function delete($conn, $house_id){

	$query = "DELETE FROM products WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s",$house_id);
	$status =$stmt->execute();

	return $status;
}



function getName($conn, $house_id){
	$query = "SELECT * FROM products WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s",$house_id);
	$stmt->execute();

	$result = $stmt->get_result();
	$row = $result->fetch_array();

	return $row['house_name'];

}