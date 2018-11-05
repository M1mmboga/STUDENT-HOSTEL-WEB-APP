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
    <?php include('links.php');?>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin-styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin-home.css">
    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>
<script src=""></script>
</head>
<body>
<?php include './admin-nav.php'; ?>	
   
    <!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px;margin-top:43px;">

    <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn-lg btn-success mr-5" style="border-radius: 30px;"><i class="fa fa-plus" style="font-size: 20px;"></i> Add New Accommodation</button>	
    
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <a class="w3-quarter links" href="display1.php">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-bed w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>
                        <?php
                        include_once './php/connect.php';
                        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
                        echo $count;
                        ?>
                    </h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Hostels</h4>
            </div>
        </a>
        <a class="w3-quarter links" href="viewusers.php">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>
                        <?php
                        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
                        echo $count;
                        ?>
                    </h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Users</h4>
            </div>
        </a>
        <a class="w3-quarter links" href="viewbookings.php">
            <div class="w3-container w3-red w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-bookmark w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>
                        <?php
                        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking"));
                        echo $count;
                        ?>
                    </h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Bookings</h4>
            </div>
        </a>
    </div>

    <br>
    <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-twothird" id="myChart">
                <?php

                $data_1=mysqli_query($conn,"SELECT `house_name`, `vacant` FROM `products` ");
                ?>
            </div>
        </div>
    </div>

    <!-- End page content -->
</div>

    

    <div class="container">
        <div class="table-responsive">
        <table border="0" style="color: black; font-weight: bold;">
	<div id="add_data_Modal" class="modal fade" >
		<div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Accommodation</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form method="post" id="insert_form" enctype="multipart/form-data">
                            <label>House Name</label>
                            <input type="text" name="name" id="name" class="form-control"><br>
                            <label>House Price</label>
                            <input type="text" name="price" id="price" class="form-control"><br>
                            <label>Number of Rooms</label>
                            <input type="text" name="rooms" id="rooms" class="form-control"><br>
                            <label>House Image</label>
                            <input type="file" name="image" id="image" class="form-control"><br>
                            <label>House Category</label>
                            <select name="category"  class="form-control">
                                    <option value="Bedsitter">Bedsitter</option>
                                    <option value="One Bedroom">One Bedroom</option>
                                    <option value="Servant Quarter">Servant Quarter</option>
                                    <option value="Shared Room">Shared Room</option>
                            </select>
                            <label>House Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                            <br>
                            <label>House Location</label>
                            <input type="text" name="location" id="location" class="form-control"><br>
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary">
                        </form>
                        </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
	</div>
<!--<td ><input type="button" class="btn btn-warning" value="View Accommodations" onclick="opengallery()"></td>-->




</table>
</div>
   </div>    
<script>
    //pop up button script
        var mywindow2;
	function opengallery()
	{
		mywindow2= window.open('display1.php','_self');
	}
    
    
        $(document).ready(function(){
            $('#insert_form').on('submit', function(event){
                event.preventDefault();
                if($('#name').val()=='')
                {
                        alert("Name is required");
                }

                else if($('#price').val()=='')
                {
                        alert("Price is required");
                }
                else if($('#rooms').val()=='')
                {
                        alert("Number of rooms is required");
                }
                else if($('#image').val()=='')
                {
                        alert("Image is required");
                }
                else if($('#category').val()=='')
                {
                        alert("Category is required");
                }
                else if($('#description').val()=='')
                {
                        alert("Description is required");
                }
                else if($('#location').val()=='')
                {
                        alert("Location is required");
                }
                else{
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data)
                        {
                                $('#insert_form')[0].reset();
//							$('#add_data_Modal').modal('hide');
                                if(data!=""){
                                        alert(data);
                                }
                        }
                    });
                }
            });
        });
	</script>



<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>