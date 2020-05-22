<?php
require_once "mysqlconnect.php";
$product_ID="";
$product_ID=$_REQUEST['product_ID'];
$query = "DELETE FROM products WHERE product_ID='$product_ID'"; 

$result = mysqli_query($db,$query);

if($result){
    
    header("Location: view.php");
} 
else{die ( "error");}
 
?>