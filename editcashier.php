<?php
require('mysqlconnect.php');
session_start();
$newmobile=$_GET['mobile_number'];
$email=$_GET['email_address'];

$sql="UPDATE users SET mobile_number=$newmobile WHERE email_address='$email'";
$result=mysqli_query($db,$sql);
if($result==1)
{
    header("Location:viewcashierlist.php");
}