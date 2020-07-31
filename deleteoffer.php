<?php
require_once "mysqlconnect.php";
$offerid="";
$offerid=$_REQUEST['offerid'];
$query = "DELETE FROM offers WHERE offerid='$offerid'"; 

$result = mysqli_query($db,$query);

if($result){
    
    header("Location: displayoffers.php");
} 
else{die ( "error");}
 
?>