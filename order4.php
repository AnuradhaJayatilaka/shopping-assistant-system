<?php
session_start();
require("adminheader.php");

?>
<head>

 
  </head>
  <body>



<div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>
  
</div>
<div class="container">
    <div class="row">
        <div class="column">
            <div class="vertical-menu">
            <a href="administratorhomepagenew.php" >Administrator Home</a>
            <div class="subnav" >
                      <button class="subnavbtn" >Manage Inventory <i class="fa fa-caret-down" c></i></button>
                      <div class="subnav-content">
                      <a href="view.php" >View Products</a>
                        <a href="insert.php">Add Product</a>
                        
                      </div>
                    </div>
            <div class="subnav">
              <button class="subnavbtn" >Manage orders <i class="fa fa-caret-down"></i></button>
              <div class="subnav-content">
                <a href="order.php">View Ongoing List Orders</a>
                <a href="completeorder.php">View Complete List Orders</a>
                <a href="view_cartorder.php">View Ongoing cart orders </a>
                <a href="view_completecartorder.php">View Complete cart orders </a>
              </div>
            </div>
            <a href="cat.php">Manage Product Categories</a>
            <a href="displayoffers.php">Manage Offers</a>
            <a href="viewcashierlist.php">Manage Cashiers</a>

            <a href="ViewSuggestions.php">View Suggestions</a>
            
            
            <a href="viewfeedback1.php">View feedback</a>
            <!-- <a href="ViewPayments.php">View Payments</a> -->
            <a href="Advertise.php">Advertise</a>
            <a href="GenerateReports.php">Generate Reports</a>
            <a href="logout.php">Log Out</a>
            </div>
        </div>
        <div class="column">
        <?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">

<h2>View Orders</h2>
<table class="table table-stripped" id="table">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
                                    <th><strong>Order ID</strong></th>
                                        <th><strong>Username</strong></th>
                                        <th><strong>Date and Time</strong></th>
                                        <th><strong>Total amount</strong></th>
                                        <th><strong>Order Status</strong></th>
                                        <th><strong>Change Order Status</strong></th>
                                        <th><strong>View Order Details</strong></th>
                                        <th>Delete Order</th>



</tr>
</thead>
<tbody>
<?php

$orderid=$_GET['orderid'];
$order_status="complete";
$count=1;
$query="update orders set order_status='$order_status' where orderid='$orderid'";
$result2 = mysqli_query($db,$query);

$sel_query="Select * from orders ";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["orderid"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["date_time"]; ?></td>
<td align="center"><?php echo $row["amount"]; ?></td>
<td align="center"><?php echo $row["order_status"]; ?></td>

<td align="center">
                                              <form action= "order4.php" method="GET">
                                              <input type="hidden" name="order_status" >
                                              <input type="hidden" name="orderid" value=<?php echo $row["orderid"] ?> >
                                              <input type="submit" type="submit" value="complete" class="btn-Search">
                                            </form>
                                            <form action= "order6.php" method="GET">
                                              <input type="hidden" name="order_status" >
                                              <input type="hidden" name="orderid" value=<?php echo $row["orderid"] ?>>
                                              <input type="submit" type="submit" value="processing" class="btn-Search"/>
                                            </form>
                                          </td>
<td align="center">
<a href="order1.php?orderid=<?php echo $row["orderid"]; ?>">View details</a>
</td>
<td align="center">
                                            <a href="deleteorder1.php?orderid=<?php echo $row["orderid"]; ?>">Delete</a>
                                            </td>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>

</body>
</html>
                   
        </div>
    </div>
</div>
<br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br>
<br><br><br>
<div class="container">
  <footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</div>
</footer>
</div>

</body>
</html>

