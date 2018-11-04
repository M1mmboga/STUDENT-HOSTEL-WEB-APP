<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('temp-links.php'); ?>
    <?php include('links.php'); ?>
    <script src="js/main.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="css/styles1.css">
	<title>Home</title>


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
<body class="loader-active">
	
	<?php include("nav-bar.php");?>

<!-- Slideshow images-->
<img name="slide"  style="padding-left: 70px; height:400px; width:90%">

<!--why us section -->

<div class="why">
    <h3 style="font-size: 35px; text-align: center; color: black; font-family: serif;"><i>Find your perfect match</i><hr style="width: 500px;">
</h3>
</div>
<!-- search bar -->
<?php include('slider.php');?>

<!--== Services Area Start ==-->
<section id="service-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Why choose us?</h2>
                    <span class="title-line"><i class="fa fa-hotel"></i></span>
                    
                </div>
            </div>
            <!-- Section Title End -->
        </div>


        <!-- Service Content Start -->
        <div class="row">
            <!-- Single Service Start -->
            <div class="col-lg-4 text-center">
                <div class="service-item">
                    <i class="fa fa-check"></i>
                    <h3>VERIFIED</h3>
                    <p>All our hostels are verified. No fraudsters here!</p>
                </div>
            </div>
            <!-- Single Service End -->

            <!-- Single Service Start -->
            <div class="col-lg-4 text-center">
                <div class="service-item">
                    <i class="fa fa-key"></i>
                    <h3>SECURE</h3>
                    <p>our transactions are all encrypted to ensure your data is kept safe.</p>
                </div>
            </div>
            <!-- Single Service End -->

            <!-- Single Service Start -->
            <div class="col-lg-4 text-center">
                <div class="service-item">
                    <i class="fa fa-money"></i>
                    <h3>AFFORDABLE</h3>
                    <p>No need to break the bank. Our prices are pocket friendly.</p>
                </div>
            </div>
            <!-- Single Service End -->
        </div>
        <!-- Service Content End -->
    </div>
</section>
<!--== Services Area End ==-->
<hr class="section-break">
<!--== Testimonials Area Start ==-->
<section id="testimonial-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Testimonials</h2>
                    <span class="title-line"><i class="fa fa-bed"></i></span>
                    <p>Let's hear from some of our previous customers.</p>
                </div>
            </div>
            <!-- Section Title End -->
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 m-auto">
                <div class="testimonial-content">
                    <!--== Single Testimoial Start ==-->
                    <div class="single-testimonial">
                        <p class="lead">An amazing student living site...</p>
                        <h3 class="lead">Salma Mohammed</h3>
                        <div class="client-logo">
                            <img src="assets/img/client/client-pic-1.jpg" alt="JSOFT">
                        </div>
                    </div>
                    <!--== Single Testimoial End ==-->

                    <!--== Single Testimoial Start ==-->
                    <div class="single-testimonial">
                        <p class="lead">Good service by the facilitators...</p>
                        <h3 class="lead">Jane Njeri</h3>
                        <div class="client-logo">
                            <img src="assets/img/client/client-pic-3.jpg" alt="JSOFT">
                        </div>
                    </div>
                    <!--== Single Testimoial End ==-->

                    <!--== Single Testimoial Start ==-->
                    <div class="single-testimonial">
                        <p class="lead">What pulled me to My Hostel is the affordable prices...</p>
                        <h3 class="lead">Brian Bundi</h3>
                        <div class="client-logo">
                            <img src="assets/img/client/client-pic-2.jpg" alt="JSOFT">
                        </div>
                    </div>
                    <!--== Single Testimoial End ==-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonials Area End ==-->



<!-- website footer-->
	<footer style="height: 120px;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
	
</body>
</html>