<!DOCTYPE HTML>
<html>
	
	<head>
		<title>Search</title>
		<?php include('../links.php');
		?>
	</head>

	<body>
		
<div class="container-fluid padding">
	<div class="row-padding">

<?php


include('connect.php');

$error = '';
if(isset($_POST['search-btn'])){

	//Form data
	$location = $_POST['location'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	


	//Search bar 
 	$query = "SELECT * FROM `products` WHERE location = ? AND category = ? AND house_price <= ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sss",$location, $category,$price);
	$stmt->execute();

	$result = $stmt->get_result();
	$num_rows = mysqli_num_rows($result);

	//if there is a result found..
	if($num_rows>0){
		showCards($result);
	}else{
		//showNone();
				header("location: ../homepage1.php");
				//$_SESSION['message'] = "That hostel is not available";

	}

}


function showCards($result){

	$data = "";

	while($row = $result->fetch_array()){

		$image = $row['image'];
		$house_name = $row['house_name'];
		$house_description = $row['house_description'];
		$id = $row['id'];


		$data.= '
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src=".'.$image.'">
					<div class="card-body">
						<h4 class="card-title">'.$house_name.'</h4>
						<p class="card-text">'.$house_description.'</p>
						<a class="btn btn-outline-primary" href="book.php?id='.$id.'">Book</a>
						<a class="btn btn-outline-primary" href="../display.php">View</a>
						<a class="btn btn-outline-primary" href="../homepage1.php">Back Home</a>

						
						</div>
				</div>
			</div>
		';

	}

	echo $data;

}


?>


		
</div>
</div>


	</body>
</html>

