<?php
include('connect.php');


$query = "SELECT DISTINCT category FROM `products`";

$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();
$data = "";

while($row = $result->fetch_array()){

	$category = $row['category'];

	$data .='<option value="'.$category.'">'.$category.'</option>';
}

echo $data;
