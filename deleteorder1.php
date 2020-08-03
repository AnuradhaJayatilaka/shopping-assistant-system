<?php
require_once "mysqlconnect.php";
$order_ID="";
$order_ID=$_REQUEST['orderid'];
$query = "DELETE FROM orders WHERE orderid='$order_ID'"; 

$result = mysqli_query($db,$query);

if($result){
    
    header("Location: order.php");
} 
else{die ( "error");}
 
?>