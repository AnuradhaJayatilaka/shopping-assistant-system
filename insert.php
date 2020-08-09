
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
label { display: inline-block; width: 150px; }
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
                    
                    <a href="view.php" class="active">Manage Inventory</a>
                    <a href="cat.php" >Manage Product Categories</a>
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
                    $run_item = mysqli_query($db,$get_item);
                    
                    while ($data= mysqli_fetch_array($run_item)){
                      
                     
                      
                      echo "<option value='". $data['product_category'] ."'>" .$data['product_category'] ."</option>";
                      
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
$quantity="";
$product_category="";
if(isset($_POST['submit'])){
    // $trn_date = date("Y-m-d H:i:s");

    $product_name = $_REQUEST['product_name'];
    $product_ID = $_REQUEST['product_ID'];
    $description = $_REQUEST['description'];
    $unit_price = $_REQUEST['unit_price'];
    $brand = $_REQUEST['brand'];
    $quantity = $_REQUEST['quantity'];
    $product_category = $_REQUEST['product_category'];
    $product_image          = $_FILES['product_image']['name'];
    $productImg_temp        = $_FILES['product_image']['tmp_name'];
    // $submittedby = $_SESSION["username"];
 //------function for the img-------------------------

 move_uploaded_file($productImg_temp, "products/$product_image" );
 $product_image   = mysqli_real_escape_string($db, $product_image);



    $sql = "insert into products
    (product_category,product_name,product_ID,description,unit_price,brand,quantity,product_image)values
    ('$product_category','$product_name','$product_ID','$description','$unit_price','$brand','$quantity','$product_image')";
    $result = mysqli_query($db, $sql);

    if ($result) {

        $status = "New Record Inserted Successfully'";echo "$status";
         echo "<a href=\"view.php\"style=\"color:red\">view inserted record</a>";
    } else {
        die('Error, insert query failed with:');
    }
}
?>
  </div>
  
  </div></body>




    </div>







    <br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br>

<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>

</body>
</html>