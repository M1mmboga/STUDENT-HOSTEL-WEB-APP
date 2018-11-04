<?php 
// include database configuration file
include '../php/connect.php';
// initialize shopping cart class
include './Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: ../display.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Check out</title>
    <meta charset="utf-8">
    <?php include './bootsrap-3.php'; ?>
    <link rel="stylesheet" href="../css/booking.css">
</head>
<body>
<?php include './nav-bar.php'; ?>

<div class="container">
<br>
<br>
    <h1>Hostel Booking Details</h1>
	
    <table class="table" style="color:black;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Check In</th>
            <th>Check out</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            $from = $_GET["from"];
            $to = $_GET["to"];
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Ksh'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'Ksh'.$item["subtotal"]; ?></td>
            <td><?php echo $from ?></td>
            <td><?php echo $to; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>No items in your cart</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'Ksh'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>	
    <div class="footBtn">
        <?= '<a href="viewCart.php?from='.$from.'&to='.$to.'" class="btn btn-info"><i class="glyphicon glyphicon-menu-left"></i> Go Back</a>'; ?>
       
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutModalLabel">Confirm Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <div class="row">
        <form action="testr.php" method="POST">
		<div class="form-group col-lg-6">
		<label for="firstname">FirstName</label>
		<input class="form-control" id="firstname" name="firstname" type="text" required>
		</div>
		<div class="form-group col-lg-6">
		<label for="lastname">LastName</label>
		<input class="form-control" id="lastname" name="lastname" type="text" required>
		</div>
		<div class="form-group col-lg-6">
		<label for="email">Email</label>
		<input class="form-control" id="email" name="email" type="email" required>
		</div>
		<div class="form-group col-lg-6">
		<label for="pnumber">Phone Number</label>
		<input class="form-control" id="pnumber" name="pnumber" type="text" required>
		</div>
		<!--<div class="form-group col-lg-6">
		<label for="street2">Pick Up Point</label>
		<input class="form-control" id="street2" name="street2" type="text" required>
		</div>-->
		<div class="form-group col-lg-6">
		<textarea name="description" rows="4" col="90" style="height:59px;width:419px;" required>
		Add Comments on your order here
		</textarea>
		</div>
		<div class="form-group col-lg-6">
		<label for="street2">Grand Total</label>
		<input class="form-control" id="total" name="total" type="text" value="<?php echo 'Ksh'.$cart->total(); ?>" readonly>
		</div>
		<input type="submit" name="submit" value="Confirm Order">
		</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<?= '<a href="cartAction.php?action=placeOrder&from='.$_GET['from'].'&to='.$_GET['to'].'" class="btn btn-success orderBtn">Book Hostel(s)<i class="glyphicon glyphicon-menu-right"></i></a>';?>
        
    </div>
</div>

<!-- website footer-->
    <footer style="position: fixed;">
        <p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
                <p>Contact us : myhostelaccommodation@gmail.com</p>

        <p><b>Copyright &copy; 2018. Accommodation</b> </p>
    </footer>
</body>
</html>