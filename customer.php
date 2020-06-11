<?php
session_start();
$email= $_SESSION['email_address'];
$username= $_SESSION['user_name'];
echo "<font color='black'>welcome ".$username."</font>";

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap 4 Nav Vertical Alignment</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
  <link rel="stylesheet" a href="SearchProduct.css">
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
     

      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
   <a class="navbar-brand" href="#">
    <img src="download.png" alt="Logo" style="width:40px;">
  </a>
  <a href="listOrders.php?$email=email_address"class="nav-item nav-link">Place Orders as a list</a>
               
               <a href="viewoffers.php" class="nav-item nav-link">View Offers</a> 
               <a href="addFeedback.php" class="nav-item nav-link">Add Feedback</a>
               <a href="display.php" class="nav-item nav-link">View Products</a>
               <a href="cart.php" class="nav-item nav-link">My Cart</a>
               <a href="searchProduct.php" class="nav-item nav-link">Search Product</a>
               <a href="logout.php" class="nav-item nav-link">Log Out</a>
</nav>
      
  </div>
  </body>
  </html>
