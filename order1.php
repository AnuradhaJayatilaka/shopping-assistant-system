


<?php
session_start();
// $email= $_SESSION['email_address'];
// $username= $_SESSION['user_name'];


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
            <div class="vertical-menu">
            <a href="administratorhomepagenew.php" >Administrator Home</a>
            <a href="order.php" class="active">Manage orders</a>
            
            <a href="view.php">Manage Inventory</a>
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
        </div>
        <div class="column">
        <?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>

</head>
<body>
<div class="form">
<a href="order.php">Back to order list</a>
<h1>Order details</h1>
<table class="table table-stripped">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<!-- <th><strong>Order ID</strong></th> -->
<th><strong>Items</strong></th>
<!-- <th><strong>Item id</strong></th> -->
<th><strong>Product_status</strong></th>
<th><strong>Update product status</strong></th>

</tr>
</thead>
<tbody>
<?php 


$order_ID=$_GET['orderid'];
$_SESSION["orderid"] = $order_ID;
$count=1;
$sql_query="Select * from order_details where orderid='$order_ID';";
$result = mysqli_query($db,$sql_query);
while($row = mysqli_fetch_assoc($result)) { 
    
    // echo "<tr>";
    // $line="<td align=\"center\">".$row["orderid"]."</td>";
    // echo $line;
    $line="<td align=\"center\">".$row["item"]."</td>";
    echo $line;
    // $line="<td align=\"center\">".$row["item_number"]."</td>";
    // echo $line;
    $line="<td align=\"center\">".$row["product_status"]."</td>";
    echo $line;
    $line="<td align=\"center\">"."<form action= \"order2.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"added\" class=\"btn-Search\"/></form>"."<form action= \"order5.php\" method=\"GET\">
    <input type=\"hidden\" name=\"product_status\" >
    <input type=\"hidden\" name=\"item_number\" value=$row[item_number]>
    <input type=\"submit\" type=\"submit\" value=\"not added\" class=\"btn-Search\"/></form>"."</td>";
    echo $line;
    echo "</tr>";  
    $count++; 
    }
  ?>
</tbody>
</table> 

</div>
</body>
</html>

    </div>
</div>
<br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br>
<br><br><br>
<div class="container">
  <footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</div>
</footer>
</div>

</body>
</html>

