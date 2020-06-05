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
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Orders</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Order ID</strong></th>
<th><strong>Username</strong></th>
<th><strong>Date and Time</strong></th>
<th><strong>Total amount</strong></th>
<th><strong>View Order Details</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from orders where order_status='0';";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["orderid"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["date_time"]; ?></td>
<td align="center"><?php echo $row["amount"]; ?></td>
<td align="center">
<a href="order1.php?order_ID=<?php echo $row["orderid"]; ?>">View details</a>
</td>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>