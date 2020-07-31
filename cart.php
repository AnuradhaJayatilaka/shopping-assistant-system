<?php
session_start();
$email= $_SESSION['email_address'];
$username= $_SESSION['user_name'];


?>
<head>


 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <script>
      $(document).ready(function(){
        $('#product_cat').on("click", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
        });
      });

      function loadPage(){
        var cat = document.getElementById("product_cat").value;
        switch(cat){
          case 'Spices':window.location.href = "spices.php";break;
          default:break;
        }
      }

</script>


 <style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  .footer {
  position: left;
  left: 0;
  bottom: 0;
  width:100%;
  background-color: red;
  color: white;
  text-align: center;
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
  .responsive {
  max-width: 100%;
  height: auto;
}



</style>
  <!-- <script src="https://kit.fontawesome.com/42deadbeef.js"></script>
    <link rel="stylesheet" href="AdministratorHomepage.css"> -->
  </head>
  <body>

    <div class="jumbotron" style="background-image:url(home.jpg); padding-bottom:57px;"><br><br>
    
      <div class="container text-center"><br><br>
      
        <!-- <h1>Singhe Super</h1>      
        <p>kawruth danna thena</p> -->
      </div>
    </div>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
          <li><a  href="customer1.php">Home</a></li>
            <li><a  href="viewoffers.php">View Offers</a></li>
            <li><a   href="addFeedback.php">Add Feedback</a></li>
            <li class=" nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">  view products</a>
            <ul class="dropdown-menu">
             <div class="form-group">
                  <label for="product_category">Category Type</label>
                  
                    <select name="product_category" class="form-control" id="product_cat" onchange="loadPage()"><!--form-control Begin -->
                    
                    <option disabled selected> Select a Product Category </option>
                    
                    <?php 
                    require_once "mysqlconnect.php";
                    session_start();
                    $get_item = "select product_category from category";
                    $run_item = mysqli_query($db,$get_item);
                    
                    while ($data= mysqli_fetch_array($run_item)){

                      
                      echo "<option value='". $data['product_category'] ."'>" .$data['product_category'] ."</option>";
                      
                    }
                    
                    ?>
                    
                  </select>
                </div>
            </ul>
            <!-- <ul class="dropdown-menu">          
                <li><a href="dairyproducts.php" class="dropdown-item">Dairy Products</a></li>
                <li><a href="sanitaryitems.php" class="dropdown-item">Sanitary Products</a></li>
                <li><a href="Beverages.php" class="dropdown-item">Beverages</a></li> 
                <li><a href="snaacks&sweets.php" class="dropdown-item">Snacks and Sweets</a></li> 
                <li><a href="spices.php" class="dropdown-item">Spices</a></li> 
                <li><a href="stationery.php" class="dropdown-item">Stationery</a></li>                      
              </ul> -->
            </li>
            <li class="active"><a class="navbar-brand" href="cart.php">My Cart</a></li>
            <li><a href="searchProduct.php">Search Product</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=" nav-item dropdown">
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="glyphicon glyphicon-user"></span>  Hi <?php echo $_SESSION['user_name'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">          
                <li><a href="" class="dropdown-item">Log Out</a></li>
                <!-- <li><a href="" class="dropdown-item">Manage Account</a></li>                          -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

    <?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My Cart</title>
<link rel="stylesheet" href="css/style.css" />


<link rel="stylesheet" href="css/style.css" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
<!-- <p><a href="customer.php">Customer Home</a> ||
<a href="display.php">view products</a> ||
 | <a href="cart.php">My Cart</a>  -->
<!-- <a href="logout.php">Logout</a></p> --> 
<h2>My Cart</h2>
<table class="table table-striped">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<!-- <th><strong>ID</strong></th> -->
<th><strong>Product Name</strong></th>
<th><strong>Quantity Needed</strong></th>
<th><strong>unit price</strong></th>
<th><strong>total</strong></th>
<th><strong>Edit</strong></th>
<!-- <th><strong>Description</strong></th>
<th><strong>Brand</strong></th> -->

<th><strong>Delete</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
// session_start();
$email = $_SESSION['email_address'];

$unit_price=$_SESSION['unit_price'];
 $product_ID=$_SESSION["product_ID"] ;
 $_SESSION["product_ID"]=$product_ID;

$sel_query="Select * from cart1 WHERE email_address='$email' ORDER BY id desc ;";
$summ=0;
$result = mysqli_query($db,$sel_query);





while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<!-- <td align="center"><?php echo $row["id"]; ?></td> -->
<td align="center"><?php echo $row["product_name"]; ?></td>
<td align="center"><?php echo $row["quantity_needed"]; ?></td>
<td align="center"><?php echo $row["unit_price"]; ?></td>
<td align="center"><?php echo $row["unit_price"]*$row["quantity_needed"]; ?></td>
<?php 
$summ = $summ + $row["unit_price"]*$row["quantity_needed"];

?>
<td align="center">
<a href="editproduct1.php?id=<?php echo $row["id"]; ?>">Edit Quantity</a>
</td>
<td align="center">
<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>

</td>
</tr>
<?php $count++; } 
// echo "$summ";
?>


</tbody>
</table>
</div>

<div class="container">
<p class="bg-dark text-white">Your total bill is:<?php echo $summ ?></p>
<br><br>
</div>


<input type="button" value="Buy items" onclick="location='buy1.php'" />



</body>
</html>

</div>



    <!-- <hr> -->
    <div class="container-fluid">
            <br>
            <div class="row">
                <img class="about" src="05.jpg"class="responsive">
            </div>
        </div>

<br><br>



<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:0px;" class="responsive"><br><br><br>
    
  <!-- <p>Footer Text</p> -->
</footer>

</body>
</html>

