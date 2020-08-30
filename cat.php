<?php
session_start();
require("adminheader.php");
?>

<head>
<style>
    label {
      display: inline-block;
      width: 300px;
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
          <a href="cat.php" class="active">Manage Product Categories</a>
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
        <?php
        require('mysqlconnect.php');

        //---------add items------------------------------------------------------------------------------------------------------------------------------------
        if (isset($_POST['add'])) {

          //---------passing form values to varibales---------
          $product_category            = $_POST['product_category'];
          // $cat_code            = $_POST['cat_code'];
          $cat_code = substr("$product_category", 0, 3);
          $cat_image             = $_FILES['cat_image']['name'];
          $categoryImg_temp        = $_FILES['cat_image']['tmp_name'];
          $cat_description         = $_POST['cat_description'];




          //------function for the img-------------------------

          move_uploaded_file($categoryImg_temp, "img2/$cat_image");


          //-------------------sql injection---------------------
          $product_category    = mysqli_real_escape_string($db, $product_category);
          $cat_code    = mysqli_real_escape_string($db, $cat_code);
          $cat_image   = mysqli_real_escape_string($db, $cat_image);
          $cat_description       = mysqli_real_escape_string($db, $cat_description);

          $category_query = "SELECT product_category FROM category WHERE product_category = '{$product_category}'";
          $select_category_query = mysqli_query($db, $category_query);

          //--------------------------check fields empty or not-------
          if (empty($product_category) || empty($cat_image) || empty($cat_description) || empty($cat_code)) {

            echo "Fields cannot be empty!";
          } else {
            //---------------------insert query-------------------
            $query  = "INSERT INTO category (product_category, cat_code, cat_image, cat_description) ";
            $query .= "VALUES ('{$product_category}','{$cat_code}','{$cat_image}','{$cat_description}')";
            $add_category_query = mysqli_query($db, $query);

            //-------------------check query validation-----------
            if (!$add_category_query) {

              die("Query Failed" . mysqli_error($db));
            } else {

              echo "Add Succesfully";
            }
          }
        }
        if (isset($_GET['delete'])) {
          $the_cat_code = $_GET['delete'];
          $selectcategory = "select product_category from category where cat_code='$the_cat_code'";
          $resultselectcategory = mysqli_query($db, $selectcategory);
          $resultselectcategory1 = $resultselectcategory->fetch_object();
          $procat = $resultselectcategory1->product_category;
          $deleteproducts_ofthecategory = "DELETE FROM products where product_category='$procat'";
          $resultdeleteproducts_ofthecategory = mysqli_query($db, $deleteproducts_ofthecategory);


          $query = "DELETE FROM category WHERE cat_code ='$the_cat_code' ";
          $delete_query = mysqli_query($db, $query);
          // header("location:cat.php");

        }

        ?>
      </div>

    </div>
  </div>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Category</title>
    <link rel="stylesheet" type="text/css" href="css2/style1.css">
    <link rel="stylesheet" type="text/css" href="css2/style2.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
    label {
      display: inline-block;
      width: 300px;
    }
    </style>
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <br>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- /.col-md-12 -->
              <div class="col-lg-12">

                <div class="card card-dark">
                  <div class="card-header" id="header">
                    <h3 style="text-align: center;">Main Categories</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--- tassels table -->
                    <table id="example4" class="table table-bordered ">
                      <thead>
                        <tr>

                          <th style="width: 150px;"> Category Name</th>
                          <th style="width: 120px;">Category ID</th>
                          <th style="width: 150px;">Category Image</th>
                          <th style="width: 25px;">Description</th>
                          <th style="width: 100px;">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $query = "SELECT * FROM category";
                        $select_category = mysqli_query($db, $query);

                        while ($row = mysqli_fetch_assoc($select_category)) {


                          $product_category          = $row['product_category'];
                          $cat_code            = $row['cat_code'];
                          $cat_image           = $row['cat_image'];
                          $cat_description       = $row['cat_description'];
                          echo "<tr>";


                          echo "<td>$product_category </td>";
                          echo "<td>$cat_code </td>";
                          echo "<td><img src='img2/$cat_image' style='width: 65px;' ></td>";
                          echo "<td>$cat_description</td>";
                          echo "<td><a href='cat.php?delete={$cat_code}' class='btn btn-danger btn-sm '><i class='fas fa-trash-alt'></i> Delete</a></td>";

                          echo "</tr>";
                        }
                        //Delete items

                        ?>
                      </tbody>
                      <tfoot>

                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col-md-6 -->
            </div>
            <!-- /.col-md-6 -->
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
          <!-- Add item tab --->

          <div class="col-lg-12">
            <div class="col-sm-12 " style="border:1px solid #cecece; padding: 20px">
              <div class="card card-dark">
                <div class="card-header" id="header">
                  <h3 class="card-title">Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="#" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="product_category">Category Name</label>
                      <input type="text" class="form-control" id="product_category" name="product_category">
                    </div><br>
                    <!-- <div class="form-group">
                    <label for="cat_code">Category code</label>
                    <input type="text" class="form-control" id="cat_code" name="cat_code">
                  </div><br> -->
                    <div class="form-group">
                      <label for="cat_image">Category Image</label>
                      <input type="file" class="form-control" id="cat_image" name="cat_image">
                    </div><br>
                    <div class="form-group">
                      <label for="cat_description">Descripton</label>
                      <textarea class="form-control" id="cat_description" name="cat_description"></textarea>
                    </div><br>
                  </div>
                  <div class="card-footer">
                    <input type="submit" class="btn btn-dark" name="add" value="Add" id="btn" />
                  </div>
                  <!-- /.card-body -->
                </form>

              </div>
              <!-- /card -->
            </div>
            <!-- /.col-sm-12 -->
          </div>
          <!-- /.col-lg-12 -->


        </div>
        <!-- /.content -->
      </div>

      <footer class="main-footer"></footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        bsCustomFileInput.init();
      });
    </script>
    <script>
      $(function() {
        $("#example4").DataTable({
          "responsive": true,
          "autoWidth": false,
        });

      });
    </script>
    </script>
    <!--stop duplicate date when reloading the page---->
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
  </body>

  </html>

  </div>













  <br><br><br>

  <footer class="container-fluid text-center">
    <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
  </footer>

</body>

</html>