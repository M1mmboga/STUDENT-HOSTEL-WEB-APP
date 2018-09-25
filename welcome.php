<?php 

$uname="admin";//static uname and pword but usually also set from dbase uname var and pword var
$pword="admin";

session_start();

if(isset($_SESSION['uname']))//my session is already set
{
	echo "Welcome, ".$_SESSION['uname']."<br>";//display welcome (myname) and a logout button
echo "<a href='add_product.php'><input type=button value=Add Hosing To Website></a>"."<br>";

	echo "<a href='logout.php'><input type=button value=logout name=logout></a>";
}
//otherwise let me log in first and verify my login
else
{
	if($_POST['uname']==$uname && $_POST['pword']==$pword) //for login check if my password and username match the ones set
	{
		$_SESSION['uname']=$uname; //create the session and take me to the next page

		echo "<script>location.href='welcome.php'</script>";
	}
	else //if i give you wrong login details, make me login again
	{
		echo "<script>alert('username or password incorrect')</script>";

		echo "<script>location.href='login.php'</script>";
	}
}
?>