

<!DOCTYPE html>
<html>
<head>

</head>

</html>





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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  
 
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
table, th, td { border: 1px solid black; border-collapse: collapse; } th, td { padding: 5px; } th { text-align: center; }
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
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> List Orders</a>
              <ul class="dropdown-menu">          
                <li><a href="listorders" class="dropdown-item">place orders as a list</a></li>
                <li><a href="vieworder" class="dropdown-item">View list orders</a></li>
                <!-- <li><a href="" class="dropdown-item">Manage Account</a></li>                          -->
              </ul>
            </li>
            <li class=" nav-item dropdown">
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">  view products</a>
                <ul class="dropdown-menu"> 
                  <?php
                    require('mysqlconnect.php');
                    $getCategory="select product_category from category";
                    $run_item = mysqli_query($db,$getCategory);
                      
                      while ($data= mysqli_fetch_array($run_item)){
                        $cat1='<li><a href="viewproducts.php?product_category=';
                        $cata=$data['product_category'];
                        $catd='" class="dropdown-item">';
                        $catb=$data['product_category'];
                        $catc='</a></li>';
                        $cat1=$cat1.$cata.$catd.$catb.$catc;
                        echo "$cat1";
                      }
                 ?>
              
              </ul>
            </li>
            <li class="active"><a class="navbar-brand" href="cart.php">My Cart</a></li>
            <li><form class="navbar-form navbar-left" action="searchproduct.php" method="GET">
      <div class="form-group">
        <input type="text" name="product_name" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=" nav-item dropdown">
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="glyphicon glyphicon-user"></span>  Hi <?php echo $_SESSION['user_name'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">          
                <li><a href="logout.php" class="dropdown-item">Log Out</a></li>
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
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

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
              <button class="open-button" onclick="openForm()">Edit Quantity</button>

<div class="form-popup" id="myForm">
  <form action="editproduct1.php" class="form-container">
    

    <label for="quantity_needed"><b>Please enter the Needed Quantity from your selected product</b></label>
    <input type="text" placeholder="Enter qunatity" name="quantity_needed" required>


    <button type="submit" class="btn">OK</button>
    <input type="hidden" name="id" id="id" value='<?php echo $row["id"]?>'>
   
     <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
             
              </td>
              
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


<input type="button" value="Buy items" onclick="location='buy.php'" />



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

