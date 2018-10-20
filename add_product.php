<?php 
session_start();
include('php/connect.php');


if(isset($_POST["submit1"])){
	$conn->autocommit(false);
	
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
	$fnm=$_FILES["himage"]["name"];
	$dst="./house_images/".$v3.$fnm;
	$dst1="./house_images/".$v3.$fnm;
	


	move_uploaded_file($_FILES["himage"]["tmp_name"],$dst);
	$stmt = $conn->prepare("INSERT INTO products (`house_name`, `house_price`, `numberofrooms`, `image`, `category`, `house_description`, `location`)
		VALUES (?,?,?,?,?,?,?)");

	$stmt->bind_param("sssssss", $_POST['hname'], $_POST['hprice'], $_POST['hrooms'], $dst1, $_POST['category'], $_POST['hdescription'], $_POST['locate']);
	$bool = $stmt->execute();

	if(!$bool){
		echo $conn->error;
	}else{
		$conn->commit(); 
	}

	alert("New Accommodation Has Been Successffuly Added!");
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<span style="color: white; font-size: 
26px; border-style: solid; background-color: teal;"><i>Enter a new accommodation to the website.</i></span><br>
<form name="uploadform" method="post" enctype="multipart/form-data">
	<table>

		<tr>
			<td>House Name</td>
			<td><input type="text" name="hname" required value=""></td>
		</tr>

		<tr>
			<td>House Price</td>
			<td><input type="number" name="hprice" required value=""></td>
		</tr>

		<tr>
			<td>Number of rooms</td>
			<td><input type="number" name="hrooms" required value=""></td>
		</tr>

		<tr>
			<td>House Image</td>
			<td><input type="file" name="himage" required></td>
		</tr>

		<tr>
			<td>House Category</td>
			<td>
				<input type="text" name="category" required value="">
			</td>
		</tr>
			<tr>
			<td>House Description</td>
			<td>
				<textarea cols="15" rows="10" name="hdescription" required></textarea>
			</td>
		</tr>

		<tr>
			<td>Location</td>
		<td> <input type="text" name="locate" required value=""></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit1" value="Upload"></td>
		</tr>
	</table>
</form>
</body>
</html>>