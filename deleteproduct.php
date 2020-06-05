<?php
require_once "mysqlconnect.php";

$ID=$_REQUEST['id'];
$query = "DELETE FROM cart1 WHERE id='$ID'"; 

$result = mysqli_query($db,$query);

if($result){
    
    header("Location: cart.php");
} 
else{die ( "error");}
 
?>