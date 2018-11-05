<?php 
// include database configuration file
include '../php/connect.php';
// initialize shopping cart class
include './Cart.php';
include '../Classes/Bookings.php';
   if(session_status() == PHP_SESSION_NONE){
     session_start();
   }


$cart = new Cart;
$book = new Bookings();

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        
        $cart->destroy();//To ensure that not more than one booking is made at a time 
        // get product details
        $_SESSION['id'] = $productID;
        $query = $conn->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['house_name'],
            'price' => $row['house_price'],
            'qty' => 1
        );
        

        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'./viewCart.php':'../display.php';
        header("Location: ".$redirectLoc);

    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: ./viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){
        // insert order details into database
        /*$insertOrder = $con->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");*/
        
        
            // get cart items
            $cartItems = $cart->contents();
            $orderID;

            $from = $_GET['from'];
            $to = $_GET['to'];

            foreach($cartItems as $item){
                $sql = "INSERT INTO `booking`(`user_id`, `house_id`, total_price, checkin, checkout) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss",$_SESSION['userid'], $item['id'], $item['subtotal'],$from,$to);
                $bool = $stmt->execute();
                
                $orderID = $stmt->insert_id;
                $id = $_SESSION['id'];
                
                if($bool){
                    $data = $book->getVacancyInfo($conn, $id);
                    $book->incrementBooking($conn,$data);
                }
                
                //Update number of rooms available
            }
            
            if($bool && isset($orderID)){
                $cart->destroy();
                header("Location: ./orderSuccess.php?id=".$orderID);
            }else{
                //header("Location: ./checkout.php");
                echo $conn->error;
            }
        
    }else{
        header("Location: ../display.php");
    }
}else{
    header("Location: ../display.php"); 
}