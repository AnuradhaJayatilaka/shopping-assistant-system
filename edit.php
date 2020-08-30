<?php
session_start();
require("adminheader.php");
?>

<head>
  <style>
    label {
      display: inline-block;
      width: 200px;
    }
  </style>

</head>

<body>



  <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

  </div>

  <div class="container">
    <div class="row">
      <div class="column">
        <!-- <div class="container-fluid" > -->
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
          <a href="viewcustomerdetails.php">View Customer details</a>
          <a href="logout.php">Log Out</a>

        </div>
        <!-- </div>   -->
      </div>
      <div class="column">
        <!DOCTYPE html>
        <html>

        <head>
          <meta charset="utf-8">
          <title>Update Record</title>
        </head>

        <body>
          <div class="form">
            <h1>Update Record</h1>
            <div>
              <form name="form" method="POST" action="edditted.php" enctype="multipart/form-data">
                <?php
                require('mysqlconnect.php');

                $product_ID = $_REQUEST['product_ID'];
                $sql = "select* from products where product_ID='$product_ID'";
                $result = mysqli_query($db, $sql);
                $oneresult = $result->fetch_object();
                $product_name = $oneresult->product_name;
                $_SESSION["product_name"] = $product_name;
                $brand = $oneresult->brand;
                $_SESSION["brand"] = $brand;
                $description = $oneresult->description;
                $unit_price = $oneresult->unit_price;
                $quantity = $oneresult->quantity;


                echo "<input name=\"product_ID\" type=\"hidden\" value=\"$product_ID\" />";
                echo "Edit the details of " . $brand . " " . $product_name . "
                                        ";
                ?>
                <br><br>

                <div class="form-group">
                  <label>Product Description</label>
                  <input type="text" name="description" placeholder=<?php echo "$description" ?> required /><br><br>
                  <label>Unit Price </label>
                  <input type="text" name="unit_price" placeholder=<?php echo "$unit_price" ?> required /><br><br>
                  <label>No of Products</label>
                  <input type="number" name="quantity" placeholder=<?php echo "$quantity" ?> required /><br><br>
                  <p><input name="submit" type="submit" value="Update" /></p>
              </form>
            </div>
          </div>
        </body>

        </html>

      </div>







      <br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br>

      <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
      </footer>

</body>

</html>