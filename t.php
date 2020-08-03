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
            <li ><a  href="cart.php">My Cart</a></li>
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
       
        <!-- <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="background.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        </head>
        <body>
            <!-- $product_ID="product_ID"; -->
        <div class="form">
        <p><a href="customer.php">Customer Home</a> 
        
        | <a href="logout.php">Logout</a></p>
        
        <table class="table table-stripped"><thead>
        <tr>
        <!-- <th><strong>Number</strong></th> -->
        <th><strong>Product ID</strong></th>
        <th><strong>Product Name</strong></th>
        <th><strong>unit price(Rs)</strong></th>
        <th><strong>Description</strong></th>
        <th><strong>Brand</strong></th>
        
        <th><strong>Add to cart</strong></th>
        
        </tr>
        </thead>
        <tbody>
        <?php
        $count=1;
       
        $pname=$_SESSION['product_name'];
        $sel_query1="Select * from products where product_name LIKE '%$pname%'";
        $result1 = mysqli_query($db,$sel_query1);
        $sel_query2="Select * from products where product_name LIKE '$pname%'";
        $result2 = mysqli_query($db,$sel_query2);
        $sel_query3="Select * from products where product_name LIKE '%$pname'";
        $result3 = mysqli_query($db,$sel_query3);
        $sel_query4="SELECT * FROM products WHERE REGEXP_LIKE(product_name, '^$pname$')";
        $result4 = mysqli_query($db,$sel_query4);
        $sel_query5="SELECT * FROM products WHERE REGEXP_LIKE(product_name, '$pname')";
        $result5 = mysqli_query($db,$sel_query5);
        if($result1==true){while($row = mysqli_fetch_assoc($result1)) { ?>
          <tr>
          <td align="center"><?php echo $row["product_ID"]; ?></td>
          <td align="center"><?php echo $row["product_name"]; ?></td>
          <td align="center"><?php echo $row["unit_price"]; ?></td>
          <td align="center"><?php echo $row["description"]; ?></td>
          <td align="center"><?php echo $row["brand"]; ?></td>
          
          <td align="center">
          <a href="quantity.php?product_ID=<?php echo $row["product_ID"]?>&product_name=<?php echo $row["product_name"]?>&unit_price=<?php echo $row["unit_price"]?>&description=<?php echo $row["description"]?>&brand=<?php echo $row["brand"]?>;">Add to cart</a>
          </td>
          
          </td>
          </tr>
          
          <?php $count++; }} 

          else if($result2==true){while($row = mysqli_fetch_assoc($result2)) { ?>
          <tr>
          <td align="center"><?php echo $row["product_ID"]; ?></td>
          <td align="center"><?php echo $row["product_name"]; ?></td>
          <td align="center"><?php echo $row["unit_price"]; ?></td>
          <td align="center"><?php echo $row["description"]; ?></td>
          <td align="center"><?php echo $row["brand"]; ?></td>
          
          <td align="center">
          <a href="quantity.php?product_ID=<?php echo $row["product_ID"]?>&product_name=<?php echo $row["product_name"]?>&unit_price=<?php echo $row["unit_price"]?>&description=<?php echo $row["description"]?>&brand=<?php echo $row["brand"]?>;">Add to cart</a>
          </td>
          
          </td>
          </tr>
          
          <?php $count++; }} 

          else if($result3==true){while($row = mysqli_fetch_assoc($result3)) { ?>
          <tr>
          <td align="center"><?php echo $row["product_ID"]; ?></td>
          <td align="center"><?php echo $row["product_name"]; ?></td>
          <td align="center"><?php echo $row["unit_price"]; ?></td>
          <td align="center"><?php echo $row["description"]; ?></td>
          <td align="center"><?php echo $row["brand"]; ?></td>
          
          <td align="center">
          <a href="quantity.php?product_ID=<?php echo $row["product_ID"]?>&product_name=<?php echo $row["product_name"]?>&unit_price=<?php echo $row["unit_price"]?>&description=<?php echo $row["description"]?>&brand=<?php echo $row["brand"]?>;">Add to cart</a>
          </td>
          
          </td>
          </tr>
          
          <?php $count++; }} 
          else if($result4==true){while($row = mysqli_fetch_assoc($result4)) { ?>
            <tr>
            <td align="center"><?php echo $row["product_ID"]; ?></td>
            <td align="center"><?php echo $row["product_name"]; ?></td>
            <td align="center"><?php echo $row["unit_price"]; ?></td>
            <td align="center"><?php echo $row["description"]; ?></td>
            <td align="center"><?php echo $row["brand"]; ?></td>
            
            <td align="center">
            <a href="quantity.php?product_ID=<?php echo $row["product_ID"]?>&product_name=<?php echo $row["product_name"]?>&unit_price=<?php echo $row["unit_price"]?>&description=<?php echo $row["description"]?>&brand=<?php echo $row["brand"]?>;">Add to cart</a>
            </td>
            
            </td>
            </tr>
            
            <?php $count++; }} 
            else if($result5==true){while($row = mysqli_fetch_assoc($result5)) { ?>
              <tr>
              <td align="center"><?php echo $row["product_ID"]; ?></td>
              <td align="center"><?php echo $row["product_name"]; ?></td>
              <td align="center"><?php echo $row["unit_price"]; ?></td>
              <td align="center"><?php echo $row["description"]; ?></td>
              <td align="center"><?php echo $row["brand"]; ?></td>
              
              <td align="center">
              <a href="quantity.php?product_ID=<?php echo $row["product_ID"]?>&product_name=<?php echo $row["product_name"]?>&unit_price=<?php echo $row["unit_price"]?>&description=<?php echo $row["description"]?>&brand=<?php echo $row["brand"]?>;">Add to cart</a>
              </td>
              
              </td>
              </tr>
              
              <?php $count++; }} ?>
        
        </tbody>
        </table>
        </div>
        </body>
        </html>
</div>



    <hr>
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

