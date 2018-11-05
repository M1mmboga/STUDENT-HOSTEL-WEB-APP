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
	<?php include ('./admin-nav.php') ;?> 


<div class="container">
<?php 

//connect to db
$conn1=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db($conn1,"myhostel");
//query my data
$query1 = ("SELECT * FROM `users` JOIN booking ON users.userid = booking.user_id JOIN products ON products.id = booking.house_id") or die(mysqli_error());
$result1=mysqli_query($conn1,$query1);
//display my data

if(mysqli_num_rows($result1)<1){
    echo '<center class="alert alert-dark lead">No bookings to show</center>';
}else{
    showBookings($result1);
}


function showBookings($result1){
        echo '<div class="table-responsive">'
    . '<table class="table table-bordered table-hover">';

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
            <td>".$data['house_name']."</td>
            <td>".$data['location']."</td>
            <td>".$data['total_price']."</td>
            <td>".$data['checkin']."</td>
            <td>".$data['checkout']."</td>
            </tr>";

    }
    //<td><a href='Booking/delete-booking.php?bookingid=".$data['bookingid']."&id=".$data['id']."&num=".$data['numberofrooms']."&occupied=".$data['occupied']."' class='btn-sm btn-danger del_booking'><i class='fa fa-trash-alt text-white'></i></a></td>
    echo "</table>"
    . "</div>";
}

?>
</div>
</body>
</html>