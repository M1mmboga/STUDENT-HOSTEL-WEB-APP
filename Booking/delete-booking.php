<?php
include '../Classes/Bookings.php';
include '../php/connect.php';

$book = new Bookings();

if(isset($_GET['id'])){
    
    $data = array(
      'bookingid' =>$_GET['bookingid'],
      'id' => $_GET['id'],
      'num'=>$_GET['num'],
      'occupied'=>$_GET['occupied']
    );
    
    $bool = $book->delBooking($conn, $data);
    
    if($bool){
        header('location: ../myaccount.php');
    }
    
  
    
}