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
          <a href="administratorhomepagenew.php">Administrator Home</a>
          <div class="subnav">
            <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
            <div class="subnav-content">
              <a href="view.php">View Products</a>
              <a href="insert.php">Add Product</a>

            </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
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
          <title>Update Record</title>

        </head>

        <body>
          <div class="form">
            <a href="order.php">Back to order list</a>
            <h1>Order details</h1>
            <table class="table table-stripped">
              <thead>
                <tr>
                  <!-- <th><strong>Number</strong></th> -->
                  <!-- <th><strong>Order ID</strong></th> -->
                  <th><strong>Items</strong></th>
                  <!-- <th><strong>Item id</strong></th> -->
                  <th><strong>Product_status</strong></th>
                  <th><strong>Update product status</strong></th>

                </tr>
              </thead>
              <tbody>
                <?php


                $order_ID = $_GET['orderid'];
                $_SESSION["orderid"] = $order_ID;
                $count = 1;
                $sql_query = "Select * from order_details where orderid='$order_ID';";
                $result = mysqli_query($db, $sql_query);
                while ($row = mysqli_fetch_assoc($result)) {

                  // echo "<tr>";
                  // $line="<td align=\"center\">".$row["orderid"]."</td>";
                  // echo $line;
                  $line = "<td align=\"center\">" . $row["item"] . "</td>";
                  echo $line;
                  // $line="<td align=\"center\">".$row["item_number"]."</td>";
                  // echo $line;
                  $line = "<td align=\"center\">" . $row["product_status"] . "</td>";
                  echo $line;
                  $line = "<td align=\"center\">" . "<form action= \"order2.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"added\" class=\"btn-Search\"/></form>" . "<form action= \"order5.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"not added\" class=\"btn-Search\"/></form>" . "</td>";
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