<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
<p><a href="customer.php">Customer Home</a> 
| <a href="cart.php">My Cart</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Products</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Product ID</strong></th>
<th><strong>Product Name</strong></th>
<th><strong>unit price(Rs)</strong></th>
<th><strong>Description</strong></th>
<th><strong>Brand</strong></th>

<th><strong>Add to cart</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from products ORDER BY product_ID desc;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["product_ID"]; ?></td>
<td align="center"><?php echo $row["product_name"]; ?></td>
<td align="center"><?php echo $row["unit_price"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center"><?php echo $row["brand"]; ?></td>

<td align="center">
<a href="quantity.php?product_ID=<?php echo $row["product_ID"]; ?>">Add to cart</a>
</td>

</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>