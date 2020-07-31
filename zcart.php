<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My Cart</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="background.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
<p><a href="customer.php">Customer Home</a> ||
<a href="display.php">view products</a> ||
<!-- | <a href="cart.php">My Cart</a>  -->
<a href="logout.php">Logout</a></p>
<h2>My Cart</h2>
<table class="table table-dark table-hover">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<!-- <th><strong>ID</strong></th> -->
<th><strong>Product Name</strong></th>
<th><strong>Quantity Needed</strong></th>
<th><strong>unit price</strong></th>
<th><strong>total</strong></th>
<th><strong>Edit</strong></th>
<!-- <th><strong>Description</strong></th>
<th><strong>Brand</strong></th> -->

<th><strong>Delete</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
session_start();
$email = $_SESSION['email_address'];

$unit_price=$_SESSION['unit_price'];
 $product_ID=$_SESSION["product_ID"] ;
 $_SESSION["product_ID"]=$product_ID;

$sel_query="Select * from cart1 WHERE email_address='$email' ORDER BY id desc ;";
$summ=0;
$result = mysqli_query($db,$sel_query);



// $pn = "SELECT product_name FROM cart1 WHERE email_address='$email'";
// $result1 = mysqli_query($db, $pn);
// $oneresult1 = $result1->fetch_object();
// $product_name = $oneresult1->product_name;
// $_SESSION["product_name"] = $product_name;

// $pi = "SELECT product_ID FROM products WHERE product_name='$product_name'";
// $result2 = mysqli_query($db, $pi);
// $oneresult2 = $result2->fetch_object();
// $product_ID = $oneresult2->product_ID;
// $_SESSION["product_ID"] = $product_ID;

// $up = "SELECT unit_price FROM cart1 WHERE product_Id='$product_ID'";
// $result3 = mysqli_query($db, $up);
// $oneresult3 = $result3->fetch_object();
// $unit_price = $oneresult3->unit_price;
// $_SESSION["unit_price"] = $unit_price;

while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<!-- <td align="center"><?php echo $row["id"]; ?></td> -->
<td align="center"><?php echo $row["product_name"]; ?></td>
<td align="center"><?php echo $row["quantity_needed"]; ?></td>
<td align="center"><?php echo $row["unit_price"]; ?></td>
<td align="center"><?php echo $row["unit_price"]*$row["quantity_needed"]; ?></td>
<?php 
$summ = $summ + $row["unit_price"]*$row["quantity_needed"];

?>
<td align="center">
<a href="editproduct1.php?id=<?php echo $row["id"]; ?>">Edit Quantity</a>
</td>
<td align="center">
<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>

</td>
</tr>
<?php $count++; } 
// echo "$summ";
?>


</tbody>
</table>
</div>

<div class="container">
<p class="bg-dark text-white">Your total bill is:<?php echo $summ ?></p>
<br><br>
</div>


<input type="button" value="Buy items" onclick="location='buy1.php'" />



</body>
</html>