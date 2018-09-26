<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">

	<style>
		body
		{
			font-family: Arial;
			color: white;
			width: 100%;
		}
		ul
		{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		ul li
		{
			float: right;
			width: 200px;
			height: 40px;
			background-color: black;
			opacity: .8;
			line-height: 40px;
			text-align: center;
			font-size: 18px;
			margin-right: 8px;
			padding-left: 16px;
		}
		ul li a
		{
			text-decoration: none;
			color: white;
			display: block;
		}
		ul li a:hover
		{
			background-color: green;
		}
		ul li:hover ul li
		{
			display: block;
		}
		ul li ul li
		{
			display: none;
		}

		footer
{
 bottom: 0px;
 background-color: teal;
 text-align: center;
 width: 100%;
 left: 0;
 color: white;
 height: 100px;
 padding-top: 10px;
 }
	</style>
	<script>
		var i=0;
		var images=[];
		var time=3000;

		images[0]='image8.jpg';
		images[1]='image9.jpg';
		images[2]='image10.jpg';
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
	<div class="nav">
	<ul>

		<li><a href="contacts.html">Contact us</a></li>
		<li><a>My Account</a>
			 <ul>
        		<li><a href="signup.html">Log In</a></li>
        		<li><a href="signup.html">Create An Account</a></li>
       		 </ul>
		</li>
		<li><a>Find Help</a>
 <ul>
        		<li><a>Payment modes</a></li>
        		<li><a>How To Use</a></li>
        		<li><a>Cancel Booking</a></li>
        		<li><a>Manage Account</a></li>

       		 </ul>
		</li>
		<li><a>Services</a>
       		 <ul>
        		<li><a>Our Team</a></li>
        		<li><a href="display.php">Accommodation Gallery</a></li>
        		<li><a>Mission &amp; Vision</a></li>
        		<li><a>Book Accommodation</a></li>
       		 </ul>
		</li>
		<li><a href="homepage1.php">Home</a></li>
	</ul>


<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation</i></h1>
</div>

<!-- Slideshow images-->
<img name="slide" width="90%" height="400px" style="padding-left: 70px;">

<!--why us section -->

<div class="why">
	<h3 style="font-size: 35px; text-align: center; color: black; font-family: serif;"><i>Why book with Accommodation?</i><hr style="width: 500px;">
</h3>

	
<img src="security.png" alt="Security" style="border-radius: 50%; padding-left: 50px;" height="300px" width="400px">
<img src="affordability.png" alt="Affordability" style="border-radius: 50%;" height="300px" width="400px">
<img src="legitimacy.png" alt="Legitimacy" style="border-radius: 50%;" height="300px" width="400px">

</div>

<!-- reviews part-->
<div class="reviews">

	<p style="text-align: center; font-size: 30px; color: black;font-family: papyrus;">Student reviews</p>
	<hr style="width: 120px;">
		
	</style>>
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