<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include ('links.php') ;?>
	<title>My Account</title>
        <script src="Offline links/font-awesome/all.js"></script>
        <script>
        $(function(){
           $(document).on('click', '.del_booking', function(){
            var hostel = $(this).closest('tr').children().eq(0).text();  
            var del = confirm('Delete your booking to '+hostel);
              
             if(del){
                 return true;
             }else{
                 return false;
             }
              
           });
           
        });
        </script>
</head>
<body>
	<?php include ('nav-bar.php') ;?> 

<div class="container">
<h1 style="font-family: montserrat;"><u><i>My Account</i></u></h1>

<?php

//connect to db
$conn =mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn,"myhostel");
//write query
$query=("SELECT * from users where userid=$_SESSION[userid]") or(mysqli_error());
$result=mysqli_query($conn,$query);
//display data
echo '<div class="table-responsive">';
print "<table class='table-sm'>";
	while($row=mysqli_fetch_array($result)){
	print "<tr>
	<td>Hello </td>
	<td>".$row['fullname']."</td>
	</tr>

	<tr>
	<td>Username: </td>
	<td>".$row['username']."</td>
	</tr>
        
	<tr>
	<td>Gender:</td>
	<td>".$row['gender']."</td>
	</tr>
        
	<tr>
	<td>Uni: </td>
	<td>".$row['uni']."</td>
	</tr>
        
	<tr>
	<td>Phone: </td>
	<td>".$row['phone']."</td>
	</tr>
        
	<tr>
	<td>Email:</td>
	<td>".$row['email']."</td>
	</tr>";
}
print "</table>";
echo '</div>';
?>
</div><br>

<div class="container">
	<h1 style="font-family: montserrat;"><u><i>Hostels You Have Booked Before</u></i></h1>
<?php 

//connect to db
$conn1=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn1,"myhostel");
//query my data
$query1 = ("SELECT * FROM `users` JOIN booking ON users.userid = booking.user_id JOIN products ON products.id = booking.house_id WHERE users.userid =$_SESSION[userid]") or die(mysqli_error());
$result1=mysqli_query($conn1,$query1);
//display my data

if(mysqli_num_rows($result1)<1){
    echo '<center class="alert alert-dark lead">No bookings to show</center>';
}else{
    showBookings($result1);
}


function showBookings($result1){
        echo '<div class="table-responsive">'
    . '<table class="table table-bordered">';

    echo "<tr>
            <td><b><u>Hostel Name</td>
            <td><b><u>Location</td>
            <td><b><u>Rent Paid</td>
            <td><b><u>Check in</td>
            <td><b><u>Check out</td>
            <td><b><u>Delete</td>
        </tr>";
    while($data=mysqli_fetch_array($result1))
    {
        echo"
            <tr>
            <td>".$data['house_name']."</td>
            <td>".$data['location']."</td>
            <td>".$data['total_price']."</td>
            <td>".$data['checkin']."</td>
            <td>".$data['checkout']."</td>
            <td><a href='Booking/delete-booking.php?bookingid=".$data['bookingid']."&id=".$data['id']."&num=".$data['numberofrooms']."&occupied=".$data['occupied']."' class='btn btn-danger del_booking'><i class='fa fa-trash text-white'></i></a></td>
            </tr>";

    }

    echo "</table>"
    . "</div>";
}

?>
</div>
<!-- website footer-->
	<footer style="height: 120px; position: fixed;">
            <p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
            <p>Contact us : myhostelaccommodation@gmail.com</p>
            <p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>