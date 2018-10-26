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
    <?php include ('../links.php');?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
   ul
        {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        ul li
        {
            float: right;
            width: 200px;
            height: 40px;
            background-color: black;
            opacity: .8;
            line-height: 40px;
            text-align: center;
            font-size: 18px;
            margin-right: 8px;
            padding-left: 16px;
        }
        ul li a
        {
            text-decoration: none;
            color: white;
            display: block;
        }
        ul li a:hover
        {
            background-color: green;
        }
        ul li:hover ul li
        {
            display: block;
        }
        ul li ul li
        {
            display: none;
        }

        footer
{
 bottom: 0px;
 background-color: teal;
 text-align: center;
 width: 100%;
 left: 0;
 color: white;
 height: 100px;
 padding-top: 10px;
 }

        input[type="number"] {
            width: 20%;
        }
    </style>
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

<div class="nav">
  <ul>
    <li><a href="../logout.php">Logout</a></li>
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
<div class="container">
<!-- Top links -->
<!--End top links-->
<br>
<br>
    <h1><i><?php echo $_SESSION["username"]?>, proceed to book the hostel below</i></h1>
    <table class="table" style="color:black;">
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
    </tbody>
    <tfoot>
        <tr>
            <td><a href="../display.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> View Other Accommodations</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'Ksh'.$cart->total(); ?></strong></td>
            <td><a href="#" class="btn btn-success btn-block" id='checkout-link'>Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    <div class="col-md-4">
        <label for="from">Check in date</label>
    <input type="text" id="from" name="from" class="form-control" readonly required="">
    </div>
    <div class="col-md-4">
    <label for="to">Check out date</label>
    <input type="text" id="to" name="to" class="form-control" readonly required="">
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