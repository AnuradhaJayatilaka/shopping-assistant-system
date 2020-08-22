<?php
require_once "mysqlconnect.php";
session_start();
$order_ID=$_SESSION['orderid'];
$product_status="";
$product_status="added";
$item_number=$_GET['item_number'];

$query="update order_details set product_status='$product_status' where item_number='$item_number'";

$result2 = mysqli_query($db,$query);

if($result2){
    
    header("Location: corder3.php");
} 
else{die ( "error");}



?>