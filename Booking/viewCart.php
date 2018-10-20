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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

        h1 {
            color: black;
            font-family: Helvetica;
        }

        tr {
            color: black;
            font-family: Arial;
            font-size: 20px;
        }

        th {
            color: black;
        }

        .container {
            padding: 5px;
            min-width: 100%;
            height:800px;

            .topnav a:hover:before {
                visibility: visible;
                -webkit-transform:scaleX(1);
                transform: scaleX(1);
            }
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

        <li><a href="logout.php">Log Out</a></li>
        <li><a href="contacts.php">Contact us</a></li>

                <li><a href="#">Cancel Booking</a></li>
                <li><a href="#">Manage Account</a></li>

             
        <li><a href="display.php">View Accommodations</a></li>

        <li><a href="homepage1.php">Home</a></li>
    </ul>

<h1 style="font-size: 25px; color: grey; font-family: serif;"><i>Find Your Accommodation, <?php echo $_SESSION['username']; ?></i></h1>
</div><div class="container">
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
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
</html>