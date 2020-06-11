<?php

require('mysqlconnect.php');
$status = "";

$id=$_REQUEST['id'];

// $product_name =$_REQUEST['product_name'];
// $unit_price =$_REQUEST['unit_price'];
$quantity =$_REQUEST['quantity_needed'];

$update="UPDATE cart1 SET 
quantity_needed='$quantity'
 where id='$id'";
$result=mysqli_query($db, $update);
if($result){
    $status = "Record Updated Successfully. </br></br>
    <a href='cart.php'>View Updated Record</a>";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
} 

else { die ( "error");}

// }
?>