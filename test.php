<?php
include('php/connect.php');

$query = $conn->query("SELECT * FROM products WHERE id = 22");
        $row = $query->fetch_assoc();


echo $row['id'];
echo $row['house_price'];