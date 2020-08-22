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

        ?>
        <!DOCTYPE html>
        <html>

        <head>
          <!-- <meta charset="utf-8"> -->
          <title>View Completed Cart orders</title>

        </head>

        <body>
          <!-- $product_ID="product_ID"; -->
          <div class="form">

            <h2>View Completed Cart orders</h2>
            <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <!-- <th><strong>Number</strong></th> -->
                  <th><strong>Order ID</strong></th>
                  <th><strong>Username</strong></th>
                  <th><strong>Date and Time</strong></th>
                  <th><strong>Total amount</strong></th>
                  <th><strong>Order Status</strong></th>
                  <th><strong>View Order Details</strong></th>

                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_GET['submit'])){
                  if(!empty($_GET))
                  {
                    require('mysqlconnect.php');
                    $count=1;
                    $start=$_GET['start'];
                    $sdate = new DateTime($start);
                  $stime = new DateTime('00:00:00');

                  // Solution 1, merge objects to new object:
                  $starttime = new DateTime($sdate->format('Y-m-d') . ' ' . $stime->format('H:i:s'));
                 
                  $s=$starttime->format('Y-m-d H:i:s');
                    $end=$_GET['end'];
                    $edate = new DateTime($end);
                  $etime = new DateTime('23:59:59');

                  // Solution 1, merge objects to new object:
                  $endtime = new DateTime($edate->format('Y-m-d') . ' ' . $etime->format('H:i:s'));
                 
                  $e=$endtime->format('Y-m-d H:i:s');
                    $sql="select * from cartorder where porder_date_time between '$s' and '$e';";
                    $result=mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                    <td align="center"><?php echo $row["cartorderid"]; ?></td>
                    <td align="center"><?php echo $row["email_address"]; ?></td>
                    <td align="center"><?php echo $row["porder_date_time"]; ?></td>
                    <td align="center"><?php echo $row["amount"]; ?></td>
                    <td align="center"><?php echo $row["cart_order_status"]; ?></td>
                    <td align="center">
                      <a href="cviewcartorderdetails.php?cartorderid=<?php echo $row["cartorderid"]; ?>">View details</a>
                    </td>

                  </tr>
                      <?php $count++; }
                       }
                      }
                      else{
                $count = 1;
                $sel_query = "Select * from cartorder Where cart_order_status='Complete' order  by cartorderid asc LIMIT 10";
                $result = mysqli_query($db, $sel_query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td align="center"><?php echo $row["cartorderid"]; ?></td>
                    <td align="center"><?php echo $row["email_address"]; ?></td>
                    <td align="center"><?php echo $row["porder_date_time"]; ?></td>
                    <td align="center"><?php echo $row["amount"]; ?></td>
                    <td align="center"><?php echo $row["cart_order_status"]; ?></td>
                    <td align="center">
                      <a href="cviewcartorderdetails.php?cartorderid=<?php echo $row["cartorderid"]; ?>">View details</a>
                    </td>

                  </tr>
                <?php
                  $count++;
                }}
                ?>

                <div>
                  <form action="cview_completecartorder.php" method="GET">
                    <label>Starting date</label>
                    <input type="Date" name="start" id="start" />
                    <label>Ending Date</label>
                    <input type="date" name="end" id="end" />
                    <input name="submit" type="submit" value="Submit" />
                  </form><br><br>
                </div>
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