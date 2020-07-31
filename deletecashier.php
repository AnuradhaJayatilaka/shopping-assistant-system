<?php
require_once "mysqlconnect.php";
$email_address="";
$email_address=$_REQUEST['email_address'];
$query = "DELETE FROM users WHERE email_address='$email_address'"; 

$result = mysqli_query($db,$query);

if($result){
    
    header("Location: viewcashierlist.php");
} 
else{die ( "error");}
 
?>