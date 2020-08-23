<?php
session_start();
require("adminheader.php");


?>

<head>


  </style>

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
            <?php


            $cartorder_ID = $_GET['cartorderid'];
            $_SESSION["cartorderid"] = $cartorder_ID;
            $sql = "SELECT cart_order_status FROM cartorder WHERE cartorderid='$cartorder_ID'";
            $sqlresult = mysqli_query($db, $sql);
            $result1 = $sqlresult->fetch_object();
            $cart_order_status = $result1->cart_order_status;
            if ($cart_order_status == 'Complete') { ?>
              <a href="view_completecartorder.php">Back to order list</a>
              <h1>Order details</h1>
            <?php } else { ?>
              <a href="view_cartorder.php">Back to order list</a>
              <h1>Order details</h1>
            <?php } ?>
            <table class="table table-stripped">
              <thead>
                <tr>
                  <!-- <th><strong>Number</strong></th> -->
                  <!-- <th><strong>Order ID</strong></th> -->
                  <th><strong>Product ID</strong></th>
                  <!-- <th><strong>Item id</strong></th> -->
                  <th><strong>Product Name</strong></th>
                  <th><strong>Quantity</strong></th>

                </tr>
              </thead>
              <tbody>
                <?php


                $cartorder_ID = $_GET['cartorderid'];
                $_SESSION["cartorderid"] = $cartorder_ID;

                $count = 1;
                $sql_query = "Select * from cartorder_details where cartorderid='$cartorder_ID';";
                $result = mysqli_query($db, $sql_query);
                while ($row = mysqli_fetch_assoc($result)) {

                  // echo "<tr>";
                  // $line="<td align=\"center\">".$row["orderid"]."</td>";
                  // echo $line;
                  $line = "<td align=\"center\">" . $row["product_ID"] . "</td>";
                  echo $line;

                  $line = "<td align=\"center\">" . $row["product_name"] . "</td>";
                  echo $line;
                  $line = "<td align=\"center\">" . $row["quantity"] . "</td>";
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