<?php 

$connect = mysqli_connect("localhost","root","","myhostel");
if(!empty($_POST))
{
	$output='';
	$name=mysqli_real_escape_string($connect,$_POST["name"]);
	$price=mysqli_real_escape_string($connect,$_POST["price"]);
	$rooms=mysqli_real_escape_string($connect,$_POST["rooms"]);
	$image=mysqli_real_escape_string($connect,$_POST["image"]);
	$category=mysqli_real_escape_string($connect,$_POST["category"]);
	$description=mysqli_real_escape_string($connect,$_POST["description"]);
	$location=mysqli_real_escape_string($connect,$_POST["location"]);

	$query = "INSERT INTO products(house_name,house_price,numberofrooms,image,category,house_description,location) VALUES ('$name','$price','$rooms','$image','$category','$description','$location')";

	if(mysqli_query($connect,$query))
	{
		$output .= '<label class="text-success">Data inserted</label>';
	}

}

?>