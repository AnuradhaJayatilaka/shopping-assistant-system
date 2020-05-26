<?php
session_start();
$email= $_SESSION['email_address'];
echo "welcome customer";

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap 4 Nav Vertical Alignment</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
  <script src="../jquery/jquery-3.5.1.js"></script>
  <!-- not sure -->
  <script src="../popper-core/src/popper.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="../bootstrap/dist/js/bootstrap.js"></script>
  <style type="text/css">
  
      .bs-example{
          margin: 20px;        
      }
  </style>
  <!-- <script src="https://kit.fontawesome.com/42deadbeef.js"></script>
  <link rel="stylesheet" href="AdministratorHomepage.css"> -->
  </head>
  <body>
  <div class="bs-example">
      <nav class="nav nav-pills">
          
           <a href="MyCart.php" class="nav-item nav-link">My Cart</a>
           
               <a href="listOrders.php?$email=email_address"class="nav-item nav-link">Place Orders as a list</a>
               
               <a href="ViewOffersAnd Discounts.php" class="nav-item nav-link">View Offers& Discounts</a> 
               <a href="addFeedback.php" class="nav-item nav-link">Add Feedback</a>
               <!-- <a href="ManageOffers.php" class="nav-item nav-link">Manage Offers</a>
               <a href="GenerateReports.php" class="nav-item nav-link">Generate Reports</a>
               <a href="Advertise.php" class="nav-item nav-link">Advertise</a> -->
               <a href="logout.php" class="nav-item nav-link">Log Out</a>
               <!-- Go Back -->
      </nav>
  </div>
  </body>
  </html>
