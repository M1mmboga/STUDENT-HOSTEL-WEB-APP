<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="styles.css">
	<script>
		var i=0;
		var images=[];
		var time=2000;

		images[0]='image1.jpg';
		images[1]='image8.jpg';
		images[2]='image9.jpg';
		images[3]='image10.jpg';
		images[4]='image1.jpg';

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

	<!--accordion script -->
	<script>
		var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

	</script>
</head>
<body>
	<header><b><p style="font-size: 25px;">Accommodation<img src="logo.jpg" alt="Logo" style="width:100px; border-radius: 0; margin-left: 10px;"></p></b></header><br><br><br>
	<nav>
		<ul>
			<li><a href="homepage.html">Home</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Help</a></li>
			<li><a href="#">Contact us</a></li>
		</ul>
	</nav><br><br><br><br>

<!-- Slideshow images-->
<img name="slide" width="100%" height="400px">


<!-- space after the slideshow images-->
<br><br><br>

<!--line before the accordion -->
<hr style="height: 50%">


<!-- acordion that leads to the gallery -->
<div class="centers">
<button class="accordion" style="text-align: center; font-size: 25px; float: center;"><b><a href="View gallery.html" style="text-decoration: none">View Gallery</b></a></button></div>
<div class="panel"></div>

<?php 

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"myhostel");

?>

<?php 
$res=mysqli_query($link,"select * from products");
while($row=mysqli_fetch_array($res))
{

?>

<!--php to display to user side -->
<div class="displaytheimages">
  <img src="../myhostel/<?php echo $row["image"]; ?>" alt="" height="250px" width="500px"/>

  <h2>Ksh <?php echo $row["house_price"]; ?></h2>
  <p><?php echo $row["house_name"]; ?></p>
  <p><?php echo $row["category"]; ?></p>
  <p><?php echo $row["house_description"]; ?></p>
</div>


<?php 
}

?>



<!--why us section -->

<div class="why">
	<h3 style="font-size: 35px; text-align: center;">Why book with Accommodation?</h3>
	
<img src="security.png" alt="Security" style="border-radius: 50%; padding-left: 50px;" height="300px" width="400px">
<img src="affordability.jpg" alt="Affordability" style="border-radius: 50%;" height="300px" width="400px">
<img src="legitimacy.png" alt="Legitimacy" style="border-radius: 50%;" height="300px" width="400px">

</div>
<!-- website footer-->
	<footer>
		<p>HOME, ABOUT, SERVICES,CONTACT US,LOGIN</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>

</body>
</html>