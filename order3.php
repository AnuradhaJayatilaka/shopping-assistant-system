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
<link rel="stylesheet" href="background.css">
</head>
<body>
<div class="form">
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="order.php">Back to Order list</a> 
| <a href="logout.php">Logout</a></p>
<h1>Order details</h1>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Order ID</strong></th>
<th><strong>Items</strong></th>
<th><strong>Product status</strong></th>

</tr>
</thead>
<tbody>
<?php 
session_start();

$order_ID=$_SESSION['orderid'];
$_SESSION["orderid"] = $order_ID;
$count=1;
$sql_query="Select * from order_details where orderid='$order_ID';";
$result = mysqli_query($db,$sql_query);
while($row = mysqli_fetch_assoc($result)) { 
    
    echo "<tr>";
    $line="<td align=\"center\">".$row["orderid"]."</td>";
    echo $line;
    $line="<td align=\"center\">".$row["item"]."</td>";
    echo $line;
    $line="<td align=\"center\">".$row["product_status"]."</td>";
    echo $line;
    // $line="<td align=\"center\">"."<form action= \"order2.php\" ><input type=\"text\" name=\"product_status\" placeholder=\"added/not added\"><input type=\"submit\" type=\"submit\" value=\"change\" class=\"btn-Search\"/></form>"."</td>";
    // echo $line;
    echo "</tr>";
    
    
    $count++; 
    }
  ?>
  

</div>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>