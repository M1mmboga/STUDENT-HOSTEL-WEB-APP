<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
?>
<div>
  <ul>
		<?php toggleNav(); ?>
		<li><a href="../contacts.php">Contact us</a></li>
				        <li><a href="../myaccount.php">Manage Account</a></li>

		<li><a href="../display.php">View Accommodations</a></li>
		<li><a href="../homepage1.php">Home</a></li>
	</ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;">
	<i>Find Your Accommodation, 
		<?php 
			if(isset($_SESSION['username'])){
				echo $_SESSION['username']; 
			}else{
				echo "easily today";
			}
		?>		
	</i>
</h1>
</div>

<?php
function toggleNav(){
	
	$data;

	if(isset($_SESSION['username'])){
		$data = '<li><a href="../logout.php">Log Out</a></li>';
	}else{
		$data = '<li><a href="../register.php">Sign in</a></li>';
	}

	echo $data;

}

?>
<!--
<div class="thetowns">

<p><a href="displaynrb.php" style="text-decoration: none; text-align:  center; ">Nairobi</a></p>

<p><a href="displaynax.php" style="text-decoration: none; text-align:  center;">Nakuru</a></p>


<p><a href="displaymsa.php" style="text-decoration: none; text-align:  center;">Mombasa</a></p>


<p><a href="displaynyeri.php" style="text-decoration: none; text-align:  center;">Nyeri</a></p>
</div> -->