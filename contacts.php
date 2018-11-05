<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include('links.php'); ?>

	<title>Contact us</title>
	<link rel="stylesheet" href="destinationcss.css">
        <script>
        $(function(){
            //Form styling
         $('#contact_form label').addClass('col-sm-2');   
         $('#contact_form input').addClass('form-control');   
         $('#contact_form select').addClass('form-control');   
         $('#contact_form textarea').addClass('form-control');   
        });
        </script>
</head>
<body>
<!--<div class="nav">
	<ul>

		<li><a href="logout.php">Log Out</a></li>
		<li><a href="#">Contact us</a></li>
    		<li><a href="#">Manage Account</a></li>
   		
		<li><a href="display.php">View Accommodations</a></li>
       		
		<li><a href="homepage1.php">Home</a></li>
	</ul>


<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div>-->
<?php include './nav-bar.php'; ?>

<div class="mycontactform row justify-content-center"  style="color:black; text-align: center; ">
<!--    See the Js above for the additional styling-->
<form action="contact.php" id="contact_form" class="py-3" method="POST">
		<p style="font-family: montserrat; font-weight: bold; font-size: 30px; margin-top: 10px; "><i>Kindly Submit Any Inquiry Information Below</i></p><br>
                <div class="form-group row">
                    <label for="fname" class="">First Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="firstname" class="form-control" placeholder="Enter your first name here..." required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="lname">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="lastname" placeholder="Enter your last name here..." required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="text"  name="eemail" placeholder="Enter your email here..." required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="county">County</label>
                    <div class="col-sm-10">
                        <?php include './county-list.php'; ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inquiry">Inquiry</label><br>
                    <div class="col-sm-10">
                        <textarea rows="10" cols="80"  name="iinquiry" placeholder="Write your inquiry here..." style="height:100px" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-5 py-2" name="submit1">Submit</button>
	</form>
</div>
</body>
<!-- website footer-->
	<footer style=" height: 120px;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>

		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</html>