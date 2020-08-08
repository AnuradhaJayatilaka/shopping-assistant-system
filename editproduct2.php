<?php

require('mysqlconnect.php');
$id=$_REQUEST['id'];
$quantity =$_REQUEST['quantity_needed'];
$update="UPDATE cart1 SET quantity_needed='$quantity' where id='$id'";
$result=mysqli_query($db, $update);
if($result){
    
   header ('locaion:cart.php');
    
} 

else { die ( "error");}

?>