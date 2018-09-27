<?php 

session_start();

if(isset($_SESSION['username']))
{
	session_destroy();

	echo "<script>location.href='register.php'</script>";
}
else
{
	echo "<script>location.href='register.php'</script>";
}
?>