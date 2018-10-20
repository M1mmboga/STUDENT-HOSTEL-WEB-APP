<?php

include('connect.php');

if(isset($_POST['house_id'])){

	//Form data
	$data = array(
		'house_id' => $_POST['house_id'],
		'house_price' => $_POST['house_price'],
		'numberofrooms' => $_POST['numberofrooms'],
		'house_description' => $_POST['house_description'],
		'location' => $_POST['location']
	);

	//on successful update..
	if(updateProduct($conn,$data)){
		alert("Details updated");
		header("refresh:0.1; url=../display1.php");
	}

}



function updateProduct($conn, &$data){

	$query = 'UPDATE products SET house_price = ? , numberofrooms = ?, house_description = ?, location = ? WHERE id = ?';
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sssss",$data['house_price'], $data['numberofrooms'], $data['house_description'], $data['location'], $data['house_id']);
	$bool = $stmt->execute();

	return $bool;
}

