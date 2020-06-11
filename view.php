
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
<link rel="stylesheet" href="background.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
    
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table class="table table-dark table-hover">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Product ID</strong></th>
<th><strong>Product Name</strong></th>
<th><strong>unit price(Rs)</strong></th>
<th><strong>Description</strong></th>
<th><strong>Brand</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
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
<td align="center"><?php echo $row["quantity"]; ?></td>
<td align="center">
<a href="edit.php?product_ID=<?php echo $row["product_ID"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?product_ID=<?php echo $row["product_ID"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>