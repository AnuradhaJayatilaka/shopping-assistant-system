<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Orders</title>
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="background.css">
</head>

<body>
    <!-- $product_ID="product_ID"; -->
    <div class="form">

        <h2>View Records</h2>
        <a href="AdministratorHomepage.php">Admin Home</a> 
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <!-- <th><strong>Number</strong></th> -->
                    <th><strong>Order ID</strong></th>
                    <th><strong>Order details</strong></th>
                    <th><strong>username</strong></th>
                    <th><strong>order date</strong></th>
                    <!-- <th><strong>Brand</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from orders INNER JOIN order_details On orders.orderid=order_details.orderid ;";
                $result = mysqli_query($db, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $row["orderid"]; ?></td>
                        <td align="center"><?php echo $row["order_details"]; ?></td>
                        <td align="center"><?php echo $row["username"]; ?></td>
                        <td align="center"><?php echo $row["order_date"]; ?></td>


                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>