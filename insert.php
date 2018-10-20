<?php 

include('php/connect.php');
if(!empty($_POST))
{
	$output='';
	$name=mysqli_real_escape_string($conn,$_POST["name"]);
	$price=mysqli_real_escape_string($conn,$_POST["price"]);
	$rooms=mysqli_real_escape_string($conn,$_POST["rooms"]);

	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
	$fnm=$_FILES["image"]["name"];
	$file_path="./house_images/".$v3.$fnm;
	$file_path1="./house_images/".$v3.$fnm;

	move_uploaded_file($_FILES["image"]["tmp_name"],$file_path);

	$category=mysqli_real_escape_string($conn,$_POST["category"]);
	$description=mysqli_real_escape_string($conn,$_POST["description"]);
	$location=mysqli_real_escape_string($conn,$_POST["location"]);

	$query = "INSERT INTO products(house_name,house_price,numberofrooms,image,category,house_description,location) VALUES ('$name','$price','$rooms','$file_path','$category','$description','$location')";

	if($conn->query($query)){
		echo "New Accommodation Has Been Successffuly Added!";
	}
}

?>