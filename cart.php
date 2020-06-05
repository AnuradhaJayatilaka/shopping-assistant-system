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
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
<p><a href="customer.php">Customer Home</a> 
<a href="display.php">view products</a> 
<!-- | <a href="cart.php">My Cart</a>  -->
<a href="logout.php">Logout</a></p>
<h2>View Products</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<!-- <th><strong>ID</strong></th> -->
<th><strong>Product Name</strong></th>
<th><strong>Quantity Needed</strong></th>
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
$sel_query="Select * from cart1 WHERE email_address='$email' ORDER BY product_name desc ;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<!-- <td align="center"><?php echo $row["id"]; ?></td> -->
<td align="center"><?php echo $row["product_name"]; ?></td>
<td align="center"><?php echo $row["quantity_needed"]; ?></td>


<td align="center">
<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>

</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>