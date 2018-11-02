<?php 
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"myhostel");

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include('links.php'); ?>

	<title></title>
	<link rel="stylesheet" href="styles1.css">

	<script src='js/autosize.js'></script>
	<style>
	div.gallery {
    margin: 45px;
    border: 1px solid #ccc;
    float: left;
    width: 280px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: 200px;
}

div.desc {
    padding: 25px;
    text-align: center;
}	
	</style>
</head>
<body>
	
	<div class="nav">
	<ul>

		<li><a href="logout.php">Log Out</a></li>
		<li><a href="contacts.php">Contact us</a></li>

	
        		<li><a href="myaccount.php">Manage Account</a></li>

		<li><a href="display.php">View Accommodations</a></li>

		<li><a href="homepage1.php">Home</a></li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>


<!-- just display all available places-->

<?php 
$res=mysqli_query($link,"select * from products order by id DESC");
while($row=mysqli_fetch_array($res))
{

?>


<!--php to display to house side -->
<div class="gallery">
  <a target="_blank" >

  	<img src='<?php echo $row["image"]; ?>' alt="" height="250px" width="500px"/>

  </a>

  <div class="desc">    <?php echo $row["house_name"]; ?>  Ksh <?php echo $row["house_price"]; ?>  in <?php echo $row["location"]; ?>	<input type="button" name="view" value="Click to view accommodation" id="<?php echo $row["id"]?>" class="btn btn-info btn-xs view_data"/>
 
</div>
</div>
		
<?php 
}

?>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="color: black;">
			<div class="modal-header">
				<h2 style="text-align: left;">House Details</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div id="house_detail">
				
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="user_id" value="<?= $_SESSION['userid'];?>">

	
<script>

autosize(document.querySelectorAll('textarea'));

	$(document).ready(function()
	{
		$('.view_data').click(function()
		{
			var house_id = $(this).attr("id");
			$.ajax({
				url:"select2.php",
				method:"post",
				data:{house_id:house_id},
				success:function(data)
				{
					$('#house_detail').html(data);
					$('#dataModal').modal("show");
				}
			});


		});	

		$(document).on('click', '#book_btn', function(event){
			event.preventDefault();

			var href = $(this).attr('href');
			var user_id = $('#user_id').val();

			$.ajax({
				url:"php/check-booked.php",
				method:"post",
				data:{user_id:user_id},
				success:function(data)
				{
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

<!-- website footer
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>-->
</body>
</html>
