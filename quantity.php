
<?php
session_start();
 $product_ID = $_GET['product_ID'];
 $unit_price = $_GET['unit_price'];
 $quantity =$_GET['quantity'];
 
 $_SESSION["product_ID"] = $product_ID;
 $_SESSION["unit_price"] = $unit_price;
 $_SESSION["quantity"] = $quantity;
 header('location:quantity2.php');
?>
