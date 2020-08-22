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
          <a href="cashier.php">Cashier Home</a>
          <div class="subnav">
            <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
            <div class="subnav-content">
              <a href="cview.php">View Products</a>
              <a href="cinsert.php">Add Product</a>

            </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
              <a href="corder.php">View Ongoing List Orders</a>
              <a href="ccompleteorder.php">View Complete List Orders</a>
              <a href="cview_cartorder.php">View Ongoing cart orders </a>
              <a href="cview_completecartorder.php">View Complete cart orders </a>
            </div>
          </div>
          <a href="ccat.php">Manage Product Categories</a>
          <a href="cdisplayoffers.php">Manage Offers</a>


          <a href="cViewSuggestions.php">View Suggestions</a>


          <a href="cviewfeedback1.php">View feedback</a>

          <a href="cGenerateReports.php">Generate Reports</a>
          <a href="logout.php">Log Out</a>
        </div>
      </div>
      <div class="column">
        <?php
        require('mysqlconnect.php');
        if (!empty($_GET)) {
          $total_amount = $_GET['amount'];
          $orderid = $_SESSION['orderid'];

          $sql = "update orders set amount='$total_amount' WHERE orderid='$orderid' ";
          $result = mysqli_query($db, $sql);
        }
        // include("auth.php");
        ?>
        <!DOCTYPE html>
        <html>

        <head>
          <!-- <meta charset="utf-8"> -->
          <title>View Ongoing List orders</title>

        </head>

        <body>
          <!-- $product_ID="product_ID"; -->
          <div class="form">

            <h2>View Ongoing List orders</h2>
            <table class="table table-dark table-hover">
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
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from orders WHERE order_status='processing' OR order_status='incomplete' OR order_status='ready for dispatch'";
                $result = mysqli_query($db, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td align="center"><?php echo $row["orderid"]; ?></td>
                    <td align="center"><?php echo $row["username"]; ?></td>
                    <td align="center"><?php echo $row["date_time"]; ?></td>
                    <td align="center"><?php echo $row["amount"]; ?></td>
                    <td align="center"><?php echo $row["order_status"]; ?></td>
                    <td align="center">
                      <form action="order4.php" method="GET">
                        <input type="hidden" name="order_status">
                        <input type="hidden" name="orderid" value=<?php echo $row["orderid"] ?>>
                        <input type="submit" type="submit" value="complete" class="btn-Search">
                      </form>
                      <form action="order6.php" method="GET">
                        <input type="hidden" name="order_status">
                        <input type="hidden" name="orderid" value=<?php echo $row["orderid"] ?>>
                        <input type="submit" type="submit" value="processing" class="btn-Search" />
                      </form>
                    </td>
                    <td align="center">
                      <a href="corder1.php?orderid=<?php echo $row["orderid"]; ?>">View details</a>
                    </td>

                  </tr>
                <?php
                  $count++;
                }
                ?>
              </tbody>
            </table>
          </div>

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