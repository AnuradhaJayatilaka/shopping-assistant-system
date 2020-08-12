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

<div class="vertical-menu">
  <a href="#" class="active">Administrator Home</a>
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

















<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>

</body>
</html>

