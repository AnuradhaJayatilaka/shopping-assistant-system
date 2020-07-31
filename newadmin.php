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
  footer {
    background-color: #f2f2f2;
    padding: 25px;
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
          <a class="navbar-brand" href="#">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
          <li><a href="view.php" class="nav-item nav-link">Manage Inventory</a></li>
              <li> <a href="order.php" class="nav-item nav-link">Manage Orders</a></li>
              <li><a href="cat.php" class="nav-item nav-link">Add product category</a></li>
              <li><a href="ViewSuggestions.php" class="nav-item nav-link">View Suggestions</a> </li>
              <li> <a href="viewfeedback1.php" class="nav-item nav-link">view Customer Feedback</a></li>
              <li> <a href="displayoffers.php" class="nav-item nav-link">Manage Offers</a></li>
              <li> <a href="GenerateReports.php" class="nav-item nav-link">Generate Reports</a></li>
              <li><a href="Advertise.php" class="nav-item nav-link">Advertise</a></li>
              <li><a href="ViewPayments.php" class="nav-item nav-link">View Payments</a></li>
              <!-- <li><a href="signupcashiers.php" class="nav-item nav-link">Register new cashiers</a></li>
              <li><a href="viewcashierlist.php" class="nav-item nav-link">view cashiers</a></li>
              <li><a href="logout.php" class="nav-item nav-link">Log Out</a></li>                       -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="02.jpg" alt="Image">
          <div class="carousel-caption">
            <!-- <h3>Sell $</h3>
            <p>Money Money.</p> -->
          </div>      
        </div>

        <div class="item">
          <img src="01.jpg" alt="Image">
          <div class="carousel-caption">
            <!-- <h3>More Sell $</h3>
            <p>Lorem ipsum...</p> -->
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br>


    <hr>
    <div class="container-fluid">
     <h1> Shop Here</h1> 
     <br>
     <div class="row">
      <div class="col-sm-3" >
        <a href="dairyproducts.php" style="color: #000;">
       <div class="card" >
        <img src="images\Dairy_1.jpg" alt="Dairy Products" style="width:320px;height: 250px; " >
        <h2 align="center">Dairy Products</h2>
        <p >You can buy dairy products of various brands here.Dairy products includes fresh milk, toghurt, cheese, ice cream, curd etc....</p> 
      </div>
    </a>
    </div>

    <div class="col-sm-3">
      <a href="sanitaryitems.php" style="color: #000;">
     <div class="card">
      <img src="images/cleaning-products-supply-flat-icons-260nw-610941368.jpg" alt="Sanitary products"  style="width:320px;height: 250px;">
      <h2 align="center">Sanitary items</h2>
      <p>You can buy Sanitary products of various brands here.Sanitary products includes soap, shampoo, washing powders and liquids, tile cleaners, sanitary napkins etc.....</p>
    </div>
  </a>
  </div>

  <div class="col-sm-2">
    <a href="stationery.php" style="color: #000;">
   <div class="card">
    <img src="images\stationery.jfif" alt="Denim Jeans" style="width:320px;height: 250px;">
    <h2 align="center">Stationery</h2>
      <p>You can buy stationery products of various brands here.Stationery products includes books, accessories, pens, pencils, color pencils etc....</p>
    </div>
  </a>
  </div>

  <div class="col-sm-2">
    <a href="spices.php" style="color: #000;">
   <div class="card">
     <img  src="images/spices.jfif" alt="Spices" style="width:320px;height: 250px;">
     <h2>Spices</h2>
     <p>You can buy spices of various brands here.Spices includes salt,pepper,chillie powder,curry powder etc....</p>
   </div>
 </a>
 </div>

 <div class="col-sm-2">
    <a href="Beverages.php" style="color: #000;">
   <div class="card">
     <img  src="images\beverages.jpg" alt="Denim Jeans" style="width:320px;height: 250px;">
     <h2>Beverages</h2>
     <p>You can buy beverages of various brands here.beverages includes carbonated drinks, fruit juice, energy drinks etc....</p>
   </div>
 </a>
 </div>

 <!-- <div class="col-sm-2">
    <a href="snaacks&sweets.php" style="color: #000; padding:10px">
   <div class="card">
     <img  src="images\snacks.jfif" alt="Snacks and sweets" style="width:320px;height: 250px;">
     <h2>Snacks and Sweets</h2>
     <p>You can buy snacks and sweets of various brands here.snacks and sweets includes biscuits, cakes, chocolates, toffees etc....</p>
   </div>
 </a>
 </div> -->

</div>
</div>
</div>
</div>

<!-- <div class="container-fluid">
 <h1> Categories</h1> 
 <br>
 <div class="row">
  <div class="col-sm-3" >
   <div class="card" >
    <a href="#" style="color: #000;">
    <img class="card_img" src="img/categories/cactus3.jpg" alt="Denim Jeans" style="width:320px;height: 250px; " >
    <h2 align="center">Cactus Plants</h2>
    <p >There's no denying that cactus look fabulous on display in your room,office cabin etc. They are awesome plants: colorful, diverse, and famously easy to keep alive (just in case you forget to water them for a month). .And also You can also give as a eco gift for any functions.</p> 
  </div>
</a>
</div>

<div class="col-sm-3">
  <a href="#" style="color: #000;">
 <div class="card">
  <img src="img/categories/tassels2.jpg" alt="Denim Jeans"  style="width:320px;height: 250px;">
  <h2 align="center">Tassels</h2>
  <p>Nowadays tassel earrings became so popular. They look so sophisticated and a truly versatile piece that you can style with literally any outfit.In addition, you can wear them with your boho looks, professional attire, to music festivals or just to make your outfit prettier and more stylish on a daily basis.</p>
</div>
</a>
</div>

<div class="col-sm-3">
  <a href="#" style="color: #000;">
 <div class="card">
  <img src="img/categories/dream1.jpg" alt="Denim Jeans" style="width:320px;height: 250px;">
  <h2 align="center">Dream Catchers</h2>
    <p>Dreamcatchers have become so popular as home decorations.you can use it as a Beautiful bedroom wall art decor and great gift! Plus for Wedding, Bridal Shower, Engagement Party, Baby Shower, Kids Bedroom, Sitting Room, Balcony, Party Decorative Wall Hanging Ornaments</p>
  </div>
</a>
</div>

<div class="col-sm-3">
  <a href="#" style="color: #000;">
 <div class="card">
   <img  src="img/categories/batik.jpg" alt="Denim Jeans" style="width:320px;height: 250px;">
   <h2>Batik</h2>
   <p>100% cotton hand crafted batik Tshirts - made with the most traditional fiber art techniques for batik. Street inspired original designs. The soft fabric is preshrunk and easy to care for.  Check the size chart in the description for measurements. Be Unique. Shop batik t-shirts</p>
 </div>
</a>
</div>
</div>
</div>
</div>
</div> -->

<br><br>



<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br>
</footer>

</body>
</html>





