<?php


require_once "mysqlconnect.php";
session_start();
$id = $_GET['id'];
$quantity = $_GET['quantity_needed'];
$update = "UPDATE cart1 SET quantity_needed='$quantity' where id='$id'";
$result = mysqli_query($db, $update);
if ($result) {

       header("Location: cart.php");
} else {
       die("error");
}
