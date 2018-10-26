<?php
include('connect.php');


$query = "SELECT DISTINCT location FROM `products` ";

$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();
$data = "";

while($row = $result->fetch_array()){

	$location = $row['location'];

	$data .='<option value="'.$location.'">'.$location.'</option>';
}

echo $data;

