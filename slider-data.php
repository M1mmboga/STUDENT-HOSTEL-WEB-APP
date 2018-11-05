<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Searches</title>
            <?php include('links.php');?>
    <link rel="stylesheet" href="styles1.css">
    <script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<script>	
    $(function(){
        $(document).on('click', '.book_btn', function(event){
            event.preventDefault();

            var href = $(this).attr('href');
            var user_id = $('#user_id').val();

            $.ajax({
                url:"php/check-booked.php",
                method:"post",
                data:{user_id:user_id},
                success:function(data){
                    if(data == ""){
                            location.replace(href);
                    }else{
                          alert("You already made a booking");
                    }
                }
            });
        });
    });

</script>	

<?php include ("nav-bar.php"); ?>

<div class="container-fluid padding">
	<div class="row">

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
 	$query = "SELECT * FROM `products` WHERE location = ? AND category = ? AND house_price BETWEEN ? AND ? AND vacant > 0";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssss",$location, $category,$min,$max);
	$stmt->execute();

	$result = $stmt->get_result();
	$num_rows = mysqli_num_rows($result);

	//if there is a result found..
	if($num_rows>0){
		showCards($result);
	}else{
            noResults();
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
                                        <a class="btn btn-outline-primary book_btn" href="Booking/cartAction.php?action=addToCart&id='.$id.'">Book</a>
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
                <center class="alert alert-warning col-12">No results found!
                Search again
                Or view all or available hostels <a href="display.php">here</a></center>

            ';
            include('slider.php');

           
        }

?>
<input type="hidden" id="user_id" value="<?= $_SESSION['userid'];?>">
		
</div>
</div>

	<!-- website footer-->
	<footer style="height: 120px;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>