<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('links.php'); ?>
	<script src="js/main.js" type="text/javascript" charset="utf-8" async defer></script>
	<title>Home</title>
	<link rel="stylesheet" href="css/styles1.css">


	<script>
		var i=0;
		var images=[];
		var time=3000;

		images[0]='image8.jpg';
		images[1]='image9.jpg';
		images[2]='living2.jpg';
		images[3]='image8.jpg';

		function changeImg()
		{
			document.slide.src=images[i];

			if(i < images.length -1)
			{
				i++;
			}
			else
			{
				i=0;
			}
			setTimeout("changeImg()",time);
		}
		window.onload = changeImg;

	</script>
</head>
<body>
	
	<?php include("nav-bar.php");?>

<!-- Slideshow images-->
<img name="slide" width="90%" height="400px" style="padding-left: 70px;">

<!--why us section -->

<div class="why">
	<h3 style="font-size: 35px; text-align: center; color: black; font-family: serif;"><i>Why book with Accommodation?</i><hr style="width: 500px;">
</h3>

<!-- search bar -->
<?php include('search-bar.php');?>



<!-- images to explain why us-->	
<img src="security.png" alt="Security" style="border-radius: 50%; padding-left: 50px;" height="300px" width="400px">
<img src="affordability.png" alt="Affordability" style="border-radius: 50%;" height="300px" width="400px">
<img src="legitimacy.png" alt="Legitimacy" style="border-radius: 50%;" height="300px" width="400px">

</div>

<!-- reviews part-->
<div class="reviews">

	<p style="text-align: center; font-size: 30px; color: black;font-family: papyrus;">Student reviews</p>
	<hr style="width: 120px;">
		
	</style>
	<table style="text-align: center; color: black; font-size: 28px; ">
		<tr style="font-weight: bold; font-family: papyrus; ">
				<td>Jane Njeri</td>
				<td>Collete Consesa</td>
				<td>Brian Bundi</td>
			</tr>
		<tr style="font-style: italic; font-family: papyrus;">
			<td>An amazing student living site...</td>
		<td>Good service by the facilitators...</td>
		<td>What pulled me to My Hostel is the affordable prices...</td>
	</tr>
	</table>
	
</div>
<!-- website footer-->
	<footer>
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>