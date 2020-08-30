<?php
session_start();
require("adminheader.php");


?>

<head>

</head>

<body>



  <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

  </div>
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


        <a href="viewfeedback1.php" class="active">View feedback</a>

        <a href="GenerateReports.php">Generate Reports</a>
        <a href="viewcustomerdetails.php">View Customer details</a>
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

      </head>

      <body>
        <h1>CUSTOMER FEEDBACK</h1>
        <div class="form">

          <table class="table table-stripped">
            <thead>
              <tr>

                <th><strong>Customer Name</strong></th>
                <th><strong>Feedback Date</strong></th>
                <th><strong>Feedback on products</strong></th>
                <th><strong>Feedback on staff and services</strong></th>

              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET['submit'])) {
                if (!empty($_GET)) {
                  require('mysqlconnect.php');
                  $count = 1;
                  $start = $_GET['start'];
                  $sdate = new DateTime($start);
                  $stime = new DateTime('00:00:00');

                  // Solution 1, merge objects to new object:
                  $starttime = new DateTime($sdate->format('Y-m-d') . ' ' . $stime->format('H:i:s'));

                  $s = $starttime->format('Y-m-d H:i:s');

                  $end = $_GET['end'];
                  $edate = new DateTime($end);
                  $etime = new DateTime('23:59:59');

                  // Solution 1, merge objects to new object:
                  $enddate = new DateTime($edate->format('Y-m-d') . ' ' . $etime->format('H:i:s'));

                  $e = $enddate->format('Y-m-d H:i:s');
                  $sql = "SELECT * FROM feedback WHERE date_time BETWEEN '$s' AND '$e'";
                  $result = mysqli_query($db, $sql);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td align="center"><?php echo $row["username"]; ?></td>
                      <td align="center"><?php echo $row["date_time"]; ?></td>
                      <td align="center"><?php echo $row["productfeedback"]; ?></td>
                      <td align="center"><?php echo $row["stafffeedback"]; ?></td>


                    </tr>
                  <?php $count++;
                  }
                }
              } else {
                $count = 1;

                $sql2 = "SELECT * FROM feedback ORDER BY date_time DESC LIMIT 10";
                $result = mysqli_query($db, $sql2);
                // $sel_query="Select * from feedback ORDER BY date_time desc;";
                // $result3 = mysqli_query($db,$sel_query);
                // if(($result==1)&&($result2==1)){
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td align="center"><?php echo $row["username"]; ?></td>
                    <td align="center"><?php echo $row["date_time"]; ?></td>
                    <td align="center"><?php echo $row["productfeedback"]; ?></td>
                    <td align="center"><?php echo $row["stafffeedback"]; ?></td>


                  </tr>
              <?php $count++;
                }
              } ?>

              <div>
                <form action="viewfeedback1.php" method="GET">
                  <label>Starting date</label>
                  <input type="Date" name="start" id="start" />
                  <label>Ending Date</label>
                  <input type="date" name="end" id="end" />
                  <input name="submit" type="submit" value="Submit" />
                </form>
              </div>

            </tbody>
          </table>
        </div>
      </body>

      </html>

    </div>



  </div>










  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br>

  <footer class="container-fluid text-center">
    <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
  </footer>
  </div>
</body>

</body>

</html>