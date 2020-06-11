<?php
require_once "mysqlconnect.php";
session_start();
$order_ID=$_SESSION['orderid'];
$product_status="";
$product_status="not added";
$item_number=$_GET['item_number'];
// $item_number=$_GET['item_number'];
// $item_number1="Select item_number from order_details where orderid='$order_ID'";
// // $item_number = mysqli_query($db,$item_number1);
// $results=mysqli_query($db,$item_number1); 

// for($i=0;$i<$results->num_rows;$i++){ 

// $result=$results->fetch_object(); 

// // print_r($result) ;

// // print_r($result->item_number) ;
// $item_number= $result->item_number;
// echo "$item_number";

// $query = "insert into order_details (product_status) values ('$product_status') where item_number='$item_number';"; 
$query="update order_details set product_status='$product_status' where item_number='$item_number'";

$result2 = mysqli_query($db,$query);

if($result2){
    
    header("Location: order3.php");
} 
else{die ( "error");}


// $query = "insert into order_details (product_status) values ('$product_status') where item_number='$item_number'"; 

// $result = mysqli_query($db,$query);

// if($result){
    
//     header("Location: order3.php");
// } 
// else{die ( "error");}
 
?>