<?php
session_start();
require("adminheader.php");
?>

<head>
  <style>
    #tblAlign {
      margin-left: 80px
    }
  </style>

</head>

<body>

  <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

  </div>

  <div class="container">

    <div class="row">
      <div class="column">
        <div class="vertical-menu">
          <a href="Administratorhomepagenew.php">Administrator Home</a>
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
          <a href="viewcustomerdetails.php" class="active">View Customer details</a>
          <a href="logout.php">Log Out</a>
        </div>
      </div>
      <div class="column" id="tblAlign">
        <?php
        require('mysqlconnect.php');
        // include("auth.php");
        ?>
        <!-- <!DOCTYPE html>
            <html>
                <head></head>
                <body> -->
        <div>
          <form name="form" method="GET" action="viewcustomerdetails.php" enctype="multipart/form-data">
            <label>Type the Customer's name:</label>
            <input type="text" name="user_name" id="user_name">
            <p><input name="submit" type="submit" value="search" /></p>
          </form>
        </div>
        <div >
        
                  </div>
        
        <div class="form">
          <h2>View Customer Details</h2>
          <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th><strong>Email-address</strong></th>
                <th><strong>Username</strong></th>
                <th><strong>NIC</strong></th>
                <th><strong>Mobile number</strong></th>
                <th><strong>Title</strong></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;

              
        if (!empty($_GET)) {?>
        <a href="viewcustomerdetails.php" >Back to All Users view</a>
        <?php
          $pname = $_GET['user_name'];
        
        $sel_query = "Select * from users WHERE user_type='Customer' ORDER BY email_address desc;";
          $result = mysqli_query($db, $sel_query);
          $sel_query1 = "Select * from users WHERE user_type='Customer' AND   user_name LIKE '%$pname%' OR user_name LIKE '$pname%' OR user_name LIKE '%$pname'  OR REGEXP_LIKE(user_name, '^$pname$') OR REGEXP_LIKE(user_name, '$pname') ";
          $result1 = mysqli_query($db, $sel_query1);
        if( $result1==true){
            
        while ($row = mysqli_fetch_assoc($result1)) { ?>
                <tr>
                  <td align="center"><?php echo $row["email_address"]; ?></td>
                  <td align="center"><?php echo $row["user_name"]; ?></td>
                  <td align="center"><?php echo $row["NIC"]; ?></td>
                  <td align="center"><?php echo $row["mobile_number"]; ?></td>
                  <td align="center"><?php echo $row["title"]; ?></td>
                  
                </tr>
                <?php
                $count++;
              } }?>
          <?php
        }
                else{$sel_query = "Select * from users WHERE user_type='Customer' ORDER BY email_address desc;";
          $result = mysqli_query($db, $sel_query);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <td align="center"><?php echo $row["email_address"]; ?></td>
                  <td align="center"><?php echo $row["user_name"]; ?></td>
                  <td align="center"><?php echo $row["NIC"]; ?></td>
                  <td align="center"><?php echo $row["mobile_number"]; ?></td>
                  <td align="center"><?php echo $row["title"]; ?></td>
            </tr>
          <?php
            $count++;
          }} ?>
              
            </tbody>
          </table>
        </div>
        <!-- </body> -->

        <!-- </html> -->
      </div>
    </div>
  </div>







  <!-- <br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br> -->
  <!-- <div class="container" id="test">
    <div class="row">
      <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
        </div>
      </footer>
    </div>
  </div> -->


</body>