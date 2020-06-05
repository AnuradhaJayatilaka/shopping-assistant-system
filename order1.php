<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="AdimistratorHomepage.php">Admin Home</a> 
| <a href="order.php">Back to Order list</a> 
| <a href="logout.php">Logout</a></p>
<h1>Order details</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Order ID</strong></th>
<th><strong>Items</strong></th>

</tr>
</thead>
<tbody>
<?php 
$order_ID=$_REQUEST['order_ID'];
$count=1;
$sql_query="Select * from order_details where orderid='$order_ID';";
$result = mysqli_query($db,$sql_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["orderid"]; ?></td>
<td align="center"><?php echo $row["item"]; ?></td>

</tr>
<?php $count++; } ?>

</div>
</body>
</html>