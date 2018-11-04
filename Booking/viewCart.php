<?php
// initializE shopping cart class 
include './Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bookings</title>
    <meta charset="utf-8">
    <?php include './bootsrap-3.php'; ?>
    <link rel="stylesheet" href="../css/booking.css">
    <script>
    function updateCartItem(obj,id){
        $.get("./cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>

<body>

   <?php include './nav-bar.php'; ?>

<div class="container">
<!-- Top links -->
<!--End top links-->
<br>
<br>
    <h1><i><?php echo $_SESSION["username"]?>, proceed to book the hostel below</i></h1>
    <table class="table" style="color:black; ">
    <thead>
        <tr>
            <th>Hostel Name</th>
            <th>Rent Price</th>
            <th>No. of rooms</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Ksh'.$item["price"]; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo 'Ksh'.$item["subtotal"]; ?></td>
            <td>
                <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
            <?php
            $from=""; $to="";  $href = "#";
            if(isset($_GET['from']) && isset($_GET['to'])){
                $from = $_GET['from']; $to = $_GET['to']; 
                $href = 'checkout.php?from='.$from.'&to='.$to;
            }
            ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="../display.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> View Other Accommodations</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'Ksh'.$cart->total(); ?></strong></td>
            <td><a href="<?= $href;?>" class="btn btn-success btn-block" id='checkout-link'>Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    <div class="col-md-4">
        <label for="from">Check in date</label>
        <input type="text" id="from" name="from" class="form-control" value="<?= $from;?>" readonly required="">
    </div>
    <div class="col-md-4">
    <label for="to">Check out date</label>
    <input type="text" id="to" name="to" class="form-control" value="<?= $to;?>" readonly required="">
    </div>
    </table>
</div>
<script>
    

  $( function() {
    $('input[type=text]').attr('autocomplete','off');
    var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          dateFormat: dateFormat
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          setLink();
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        dateFormat: dateFormat
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
        setLink();
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }

    function setLink(){
        var from = $('#from').val();
        var to = $('#to').val();

        if(from !=="" && to !== ""){
            $('#checkout-link').attr('href','checkout.php?from='+from+'&to='+to);
        }
    }   
    
    $('#checkout-link').click(function(){
       var href = $(this).attr('href');
       
       if(href == "#"){
           alert("Pick check in and check out date first");
       }
    });

  } );
</script>

</body>
<!-- website footer-->
    <footer style="position: fixed;">
        <p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
                <p>Contact us : myhostelaccommodation@gmail.com</p>

        <p><b>Copyright &copy; 2018. Accommodation</b> </p>
    </footer>
</html>