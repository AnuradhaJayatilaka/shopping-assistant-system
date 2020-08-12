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
        <!-- <div class="container-fluid" > -->
        <div class="vertical-menu">
          <a href="Administratorhomepagenew">Administrator Home</a>
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
          <!-- <a href="ViewPayments.php">View Payments</a> -->
          <a href="Advertise.php">Advertise</a>
          <a href="GenerateReports.php">Generate Reports</a>
          <a href="logout.php">Log Out</a>

        </div>
        <!-- </div>   -->
      </div>
      <div class="column">

        <div>
          <!DOCTYPE html>
          <html>

          <head>
            <title>Insert New Record</title>
          </head>

          <body>
            <div class="form">

              <div>

                <form name="form" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" name="new" value="1" /><br>
                  <label>Product Name</label>
                  <input type="text" name="product_name" placeholder="Enter product" required /><br><br>
                  <label>Product ID</label>
                  <input type="text" name="product_ID" placeholder="Enter product ID" required /><br><br>
                  <div class="form-group">
                    <label for="product_category">Category Type</label>
                    <select name="product_category" class="form-control">
                      <!-- form-control Begin -->

                      <option disabled selected> Select a Product Category </option>

                      <?php
                      require_once "mysqlconnect.php";
                      $get_item = "select product_category from category";
                      $run_item = mysqli_query($db, $get_item);

                      while ($data = mysqli_fetch_array($run_item)) {



                        echo "<option value='" . $data['product_category'] . "'>" . $data['product_category'] . "</option>";
                      }

                      ?>

                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                  </div><br>


                  <div class="form-group">
                    <label>Product Description</label>
                    <input type="text" name="description" placeholder="Enter description" required /><br><br>
                    <label>Unit Price </label>
                    <input type="text" name="unit_price" placeholder="unit price" required /><br><br>
                    <label>Brand of the Product</label>
                    <input type="text" name="brand" placeholder="Enter brand" required /><br><br>
                    <label>No of Products</label>
                    <input type="text" name="quantity" placeholder="Enter Quantity" required /><br><br>
                    <p><input name="submit" type="submit" value="Submit" /></p>
                </form>

              </div>
            </div>
          </body>

          </html>

          <?php
          require_once "mysqlconnect.php";
          // include("auth.php");
          $status = "";
          $result = "";
          $product_name = "";
          $product_ID = "";
          $description = "";
          $unit_price = "";
          $brand = "";
          $quantity = "";
          $product_category = "";
          if (isset($_POST['submit'])) {
            // $trn_date = date("Y-m-d H:i:s");

            $product_name = $_REQUEST['product_name'];
            $product_ID = $_REQUEST['product_ID'];
            $description = $_REQUEST['description'];
            $unit_price = $_REQUEST['unit_price'];
            $brand = $_REQUEST['brand'];
            $quantity = $_REQUEST['quantity'];
            $product_category = $_REQUEST['product_category'];
            $available = 'false';
            $product_image          = $_FILES['product_image']['name'];
            $productImg_temp        = $_FILES['product_image']['tmp_name'];
            // $submittedby = $_SESSION["username"];
            //------function for the img-------------------------

            move_uploaded_file($productImg_temp, "products/$product_image");
            $product_image   = mysqli_real_escape_string($db, $product_image);
            $check = "select * FROM products";
            $result_check = mysqli_query($db, $check);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result_check)) {
              if ($row['product_name'] == $product_name && $row['description'] == $description && $row['unit_price'] == $unit_price && $row['brand'] == $brand && $row['product_category'] == $product_category && $available = 'false') {
                $PID=$row['product_ID'];
                $update = "UPDATE products SET quantity= quantity+$quantity WHERE product_ID='$PID'";
                $result = mysqli_query($db, $update);
                $available = "true";
                break;
              }
              $count++;
            }

            if ($available == "false") {


              $sql = "insert into products
    (product_category,product_name,product_ID,description,unit_price,brand,quantity,product_image)values
    ('$product_category','$product_name','$product_ID','$description','$unit_price','$brand','$quantity','$product_image')";
              $result = mysqli_query($db, $sql);
            }
            if ($result) {

              $status = "New Record Inserted Successfully'";
              echo "$status";
              echo "<a href=\"view.php\"style=\"color:red\">view inserted record</a>";
            } else {
              die('Error, insert query failed with:');
            }
          }
          ?>
        </div>

      </div>
</body>




</div>







<br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br>
<br>

<footer class="container-fluid text-center">
  <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>

</body>

</html>