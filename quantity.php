
<?php
session_start();
require_once "mysqlconnect.php";

 $product_ID = $_GET['product_ID'];
 $unit_price = $_GET['unit_price'];
 $quantity =$_GET['quantity'];
 $sql="select quantity from products where product_ID='$product_ID'";
 $result= mysqli_query($db,$sql);
 $oneresult = $result->fetch_object();
$available_quantity = $oneresult->quantity;
if($available_quantity>$quantity){$_SESSION["product_ID"] = $product_ID;
    $_SESSION["unit_price"] = $unit_price;
    $_SESSION["quantity"] = $quantity;
    header('location:quantity2.php');}
 
 else{
     echo "The quantity you entered is not available at our stocks please enter a quantity less than the available quantity";
    header('location:sdisplaynew.php');}
 
?>
