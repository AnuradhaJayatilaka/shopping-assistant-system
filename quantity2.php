<?php
// Initialize the session
require_once "mysqlconnect.php";
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
session_start();
$email = $_SESSION['email_address'];
$quantity = $_GET['quantity_needed'];
$product_ID = $_SESSION['product_ID'];
$product_name1 = "SELECT product_name FROM products WHERE product_ID='$product_ID'";
$resulttwo = mysqli_query($db, $product_name1);
$oneresulttwo = $resulttwo->fetch_object();
$product_name = $oneresulttwo->product_name;
$_SESSION["product_name"] = $product_name;


// $hashed_password = "SELECT password FROM users WHERE email_address='$email'";
// $resulttwo = mysqli_query($db, $hashed_password);
// $oneresulttwo = $resulttwo->fetch_object();
// $hashPassword = $oneresulttwo->password;
// $_SESSION["password"] = $hashPassword;


$_SESSION["email_address"] = $email;
$_SESSION["quantity_needed"] = $quantity;
$_SESSION["product_name"] = $product_name;


$sql="insert into cart1 (email_address,quantity_needed, product_name) values ('$email','$quantity','$product_name')";
$result = mysqli_query($db, $sql);
header("location: cart.php");



echo "end of program"; ?>