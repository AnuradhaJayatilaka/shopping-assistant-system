<?php
session_start();
?>
<head>
<style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  .footer{
background-color:#003366;
margin:0;
padding:0;
width:90vw;
height:22.5vh;
float:right;
}

  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  
  .bs-example{
    margin: 20px;        
  }
  div.ex1 {
  width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
}

.column {
  float: left;
}

.left {
  width: 25%;
}

.right {
  width: 75%;
}



.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.vertical-menu {
  width: 200px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #4CAF50; /* Add a green color to the "active/current" link */
  color: white;
}




.subnav {
  float: in-line;
  overflow: hidden;
}

/* Subnav button */
.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: black;
  padding: 14px 90px;
  background-color: #ccc;
  font-family: inherit;
  margin: 0;
  
}

/* Add a red background color to navigation links on hover */
.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: green;
}

/* Style the subnav content - positioned absolute */
.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: green;
  width: 30%;
  z-index: 1;
}

/* Style the subnav links */
.subnav-content a {
  float: inline-start;
  color: black;
  text-decoration: none;
}

/* Add a grey background color on hover */
.subnav-content a:hover {
  background-color: green;
  color: black;
}

/* When you move the mouse over the subnav container, open the subnav content */
.subnav:hover .subnav-content {
  display: block;
}

table, th, td { border: 1px solid black; border-collapse: collapse; } th, td { padding: 5px; } th { text-align: center; }
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
                    <a href="Administratorhomepagenew" >Administrator Home</a>
                    <a href="order.php">Manage orders</a>
                    
                    <a href="view.php">Manage Inventory</a>
                    <a href="cat.php" >Manage Product Categories</a>
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
        if(isset($_POST['add'])){

            //---------passing form values to varibales---------
            $offer            = $_POST['offer'];
            $conditions            = $_POST['conditions'];
            
            //-------------------sql injection---------------------
            $offer    = mysqli_real_escape_string($db, $offer);
            $conditions    = mysqli_real_escape_string($db, $conditions);
          
            $query = "SELECT offer FROM offers WHERE offer = '{$offer}'";
            $select_query = mysqli_query($db, $query); 

            //--------------------------check fields empty or not-------
          if(empty($offer) || empty($conditions) ){

                    echo "Fields cannot be empty!";
            }

            else{
                    //---------------------insert query-------------------
                    $query  = "INSERT INTO offers (offer, conditions) ";
                    $query .= "VALUES ('{$offer}','{$conditions}')";
                    $add_query = mysqli_query ($db, $query);

                    //-------------------check query validation-----------
                    if (!$add_query) {
                        
                        die("Query Failed" . mysqli_error($db));
                    }
                    else{
                          
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
            
          <div class="card card-dark" >
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

                    while($row = mysqli_fetch_assoc($select)) {

                               
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
                      if(isset($_GET['delete'])){

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
                  </div>
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
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    
  });
</script>
</script>
<!--stop duplicate date when reloading the page---->
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>

</div>













<br><br><br><br><br><br><br>

<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>

</body>
</html>

