<?php
// Initialize the session
require_once "mysqlconnect.php";
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
session_start();
$email = $_SESSION['email_address'];
$quantity = $_SESSION['quantity'];
$product_ID = $_SESSION['product_ID'];
$product_name1 = "SELECT product_name FROM products WHERE product_ID='$product_ID'";
$resulttwo = mysqli_query($db, $product_name1);
$oneresulttwo = $resulttwo->fetch_object();
$product_name = $oneresulttwo->product_name;
$_SESSION["product_name"] = $product_name;
// $_SESSION["quantity_needed"] = $quantity_needed;



$unit_price = $_SESSION['unit_price'];

$_SESSION["unit_price"] = $unit_price;




$_SESSION["email_address"] = $email;
$_SESSION["quantity_needed"] = $quantity;
$_SESSION["product_name"] = $product_name;

$check = "select * FROM cart1 WHERE email_address='$email'";
$result_check = mysqli_query($db, $check);
$count = 1;
$available = 'false';
while ($row = mysqli_fetch_assoc($result_check)) {
    if ($row['product_ID'] == $_SESSION['product_ID'] && $available='false') {
        $update = "UPDATE cart1 SET quantity_needed= quantity_needed+$quantity WHERE product_name='$product_name'";
        $result_update = mysqli_query($db, $update);
        $available = "true";
    break;
        // header("location: cart.php");
    }
    $count++;
}
if($available=="true"){header("location: cart.php");}
if ($available == "false") {

    $sql = "insert into cart1 (email_address,quantity_needed, product_name,unit_price,product_ID) values ('$email','$quantity','$product_name','$unit_price','$product_ID')";
    $result = mysqli_query($db, $sql);
    header("location: cart.php");



    echo "end of program";
}
