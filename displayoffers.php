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
          <a href="displayoffers.php" class="active">Manage Offers</a>
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
        <?php
        require('mysqlconnect.php');
        ?>
        <?php
        //---------add items------------------------------------------------------------------------------------------------------------------------------------
        if (isset($_POST['add'])) {

          //---------passing form values to varibales---------
          $offer            = $_POST['offer'];
          $conditions            = $_POST['conditions'];

          //-------------------sql injection---------------------
          $offer    = mysqli_real_escape_string($db, $offer);
          $conditions    = mysqli_real_escape_string($db, $conditions);

          $query = "SELECT offer FROM offers WHERE offer = '{$offer}'";
          $select_query = mysqli_query($db, $query);

          //--------------------------check fields empty or not-------
          if (empty($offer) || empty($conditions)) {

            echo "Fields cannot be empty!";
          } else {
            //---------------------insert query-------------------
            $query  = "INSERT INTO offers (offer, conditions) ";
            $query .= "VALUES ('{$offer}','{$conditions}')";
            $add_query = mysqli_query($db, $query);

            //-------------------check query validation-----------
            if (!$add_query) {

              die("Query Failed" . mysqli_error($db));
            } else {

              echo "Add Succesfully";
            }
          }
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

    <title>Offers</title>
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
                    <h3 style="text-align: center;">Offers</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--- tassels table -->
                    <table id="example4" class="table table-stripped ">
                      <thead>
                        <tr>

                          <th style="width: 150px;"> Offer</th>
                          <th style="width: 120px;">Conditions</th>

                          <th style="width: 120px;">Delete</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $query1 = "SELECT * FROM offers";
                        $select = mysqli_query($db, $query1);

                        while ($row = mysqli_fetch_assoc($select)) {


                          $offer          = $row['offer'];
                          $conditions            = $row['conditions'];

                          echo "<tr>";
                          echo "<td>$offer </td>";
                          echo "<td>$conditions </td>";
                          //  echo "<td><a href='editoffers.php?edit={$offer}' class='btn btn-danger btn-sm '><i class='fas fa-trash-alt'></i> edit</a></td>";
                          echo "<td><a href='displayoffers.php?delete={$offer}' class='btn btn-danger btn-sm '><i class='fas fa-trash-alt'></i> Delete</a></td>";


                          echo "</tr>";
                        }
                        //Delete items
                        if (isset($_GET['delete'])) {

                          $the_offer = $_GET['delete'];

                          $query2 = "DELETE FROM offer WHERE offer ='$the_offer' ";
                          $delete_query = mysqli_query($db, $query2);
                        }

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
                  <h3 class="card-title">Add offer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="#" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="offer">Offer</label>
                      <input type="text" class="form-control" id="offer" name="offer">
                    </div><br>
                    <div class="form-group">
                      <label for="conditions">Conditions</label>
                      <input type="text" class="form-control" id="conditions" name="conditions">
                    </div>

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













  <br><br><br><br><br><br><br><br>

  <footer class="container-fluid text-center">
    <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
  </footer>

</body>

</html>