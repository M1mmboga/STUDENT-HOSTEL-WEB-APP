<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<title>Searches</title>

		<?php include('links.php');?>

<link rel="stylesheet" href="styles1.css">
</head>
<body>
	

<?php include ("nav-bar.php"); ?>

<div class="container-fluid padding">
	<div class="row-padding">

<?php


include('php/connect.php');

$error = '';
if(isset($_POST['submit'])){

	//Form data
	$location = $_POST['location'];
	$category = $_POST['category'];
	$min = $_POST['price-min'];
	$max = $_POST['price-max'];



	//Search bar 
 	$query = "SELECT * FROM `products` WHERE location = ? AND category = ? AND house_price BETWEEN ? AND ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssss",$location, $category,$min,$max);
	$stmt->execute();

	$result = $stmt->get_result();
	$num_rows = mysqli_num_rows($result);

	//if there is a result found..
	if($num_rows>0){
		showCards($result);
	}else{
		//showNone();
				noResults();
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
					<img class="card-img-top" src="'.$image.'">
					<div class="card-body">
						<h4 class="card-title">'.$house_name.'</h4>
						<p class="card-text">'.$house_description.'</p>
						<a class="btn btn-outline-primary" href="Booking/cartAction.php?action=addToCart&id='.$id.'">Book</a>
						<a class="btn btn-outline-primary" href="display.php">View</a>
						<a class="btn btn-outline-primary" href="homepage1.php">Back Home</a>
					</div>
				</div>
			</div>
		';

	}

	echo $data;

}


function noResults(){
            echo '
                <div class="lead m-auto pb-3">No results found! <br>
                Search again<br>
                Or view all or available hostels <a href="display.php">here</a></div>

            ';
           
        }

?>


		
</div>
</div>

	<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>