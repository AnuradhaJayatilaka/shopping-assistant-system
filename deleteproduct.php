<?php
require_once "mysqlconnect.php";

$ID=$_REQUEST['id'];
$query = "DELETE FROM cart1 WHERE id='$ID'"; 

$result = mysqli_query($db,$query);

$sql="update cart1 set id=id-1 where id > $ID";
$result2=mysqli_query($db,$sql);
if($result){
    
    header("Location: cart.php");
} 
else{die ( "error");}
 
?>