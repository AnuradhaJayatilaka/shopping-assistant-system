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
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="form">
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="order.php">Back to Order list</a> 
| <a href="logout.php">Logout</a></p>
<h1>Order details</h1>
<table class="table table-dark table-hover">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<!-- <th><strong>Order ID</strong></th> -->
<th><strong>items</strong></th>
<!-- <th><strong>Item id</strong></th> -->
<th><strong>product_status</strong></th>
<th><strong>update product status</strong></th>

</tr>
</thead>
<tbody>
<?php 
session_start();

$order_ID=$_GET['orderid'];
$_SESSION["orderid"] = $order_ID;
$count=1;
$sql_query="Select * from order_details where orderid='$order_ID';";
$result = mysqli_query($db,$sql_query);
while($row = mysqli_fetch_assoc($result)) { 
    
    // echo "<tr>";
    // $line="<td align=\"center\">".$row["orderid"]."</td>";
    // echo $line;
    $line="<td align=\"center\">".$row["item"]."</td>";
    echo $line;
    // $line="<td align=\"center\">".$row["item_number"]."</td>";
    // echo $line;
    $line="<td align=\"center\">".$row["product_status"]."</td>";
    echo $line;
    $line="<td align=\"center\">"."<form action= \"order2.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"added\" class=\"btn-Search\"/></form>"."<form action= \"order5.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"not added\" class=\"btn-Search\"/></form>"."</td>";
    echo $line;
    echo "</tr>";  
    $count++; 
    }
  ?>
</tbody>
</table> 

</div>
</body>
</html>