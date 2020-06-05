<?php
SESSION_START();
require_once "mysqlconnect.php";
$productfeedback= $_GET['productfeedback'];
$stafffeedback= $_GET['stafffeedback'];
$email= $_SESSION['email_address'];

$username = "SELECT user_name FROM users WHERE email_address='$email'";
$result = mysqli_query($db, $username);
$oneresult = $result->fetch_object();
$user_name = $oneresult->user_name;
$_SESSION["user_name"] = $user_name;

$sql = "insert into feedback
(username,productfeedback,stafffeedback)values
('$user_name','$productfeedback','$stafffeedback')";
$result = mysqli_query($db, $sql);
?>
