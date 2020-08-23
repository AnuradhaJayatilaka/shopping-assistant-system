<?php

?>

<head><style>
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




/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
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
  float:inline-start;
  overflow: hidden;
  text-align: left;
  font-family: inherit;
}

/* Subnav button */
.subnav .subnavbtn {
  font-size: 16px;
  text-align:left;
  font-display: left;
  border: none;
  outline: none;
  color: black;
  padding: 14px 90px;
  background-color: #eee;
  font-family: inherit;
  margin: 0;
 
}
.subnav .subnavbtn .active{
  background-color: #ccc;
}

/* Add a green background color to navigation links on hover */
.navbar a:hover, .subnav:hover .subnavbtn {
  background-color:#ccc;
}

/* Style the subnav content - positioned absolute */
.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: #ccc;
  width: 20%;
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
  background-color: #ccc;
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
    <div class="row">
        <div class="column">
            <div class="vertical-menu">
                <a href="administratorhomepagenew">Administrator Home</a>
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

                <a href="GenerateReports.php" class="active">Generate Reports</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>

        <div class="column">