


<html>
    <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script> 
    $(function(){
      $("#includedContent").load("signupfinal.php"); 
    });
    </script> 
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }

    .imgcontact{
        width: 1000px !important; 
        height: 300px !important; 
    }
    .imgabout{
        width: 1000px !important; 
        height: 300px !important; 
    }

    .about{
        width: 1200px !important; 
        height: 300px !important; 
    }
    

    #sign{
        width:80%;
        position:left;
        text-align:left;
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
        min-height:150px;
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
<?php session_start(); ?>
        <div class="jumbotron" style="background-image:url(home.jpg); padding-bottom:60px;" class="responsive"><br><br>
        
        <div class="container text-center"><br><br>
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
                    <li><a class="navbar-brand" href="./">Home</a></li>
                    <li><a href="#About_us">About us</a></li>
                    <li><a href="#Contact_us">Contact Us</a></li>
                    <li><a href="#Sign_up">Sign Up</a></li>
                    <!--  -->
                    <li><li class=" nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">  view products
                        </a>    
                            <ul class="dropdown-menu"> 
                                <?php
                                    require('mysqlconnect.php');
                                    $getCategory="select product_category from category";
                                    $run_item = mysqli_query($db,$getCategory);
                                        while ($data= mysqli_fetch_array($run_item)){
                                            $cat1='<li><a href="homepageviewproducts.php?product_category=';
                                            $cata=$data['product_category'];
                                            $catd='" class="dropdown-item">';
                                            $catb=$data['product_category'];
                                            $catc='</a></li>';
                                            $cat1=$cat1.$cata.$catd.$catb.$catc;
                                            echo "$cat1";                                        
                                        }
                                ?>                            
                            </ul>
                    </li></li>
                    <li><form class="navbar-form navbar-left" action="searchproduct1.php" method="GET">
                        <div class="form-group">
                            <input type="text" name="product_name" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="login-container">
                        <form action="nextpage.php" method="GET">
                            <input type="text" placeholder="E-mail address" name="email_address">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </ul>
                </ul>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <div class="container-fluid">


            <?php
                require('mysqlconnect.php');
                
            ?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
        <style>

.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

  max-width: 300px;

  margin: auto;

  text-align: center;

  font-family: arial;

}

​

.price {

  color: grey;

  font-size: 22px;

}

​

.card button {

  border: none;

  outline: 0;

  padding: 12px;

  color: white;

  background-color: #000;

  text-align: center;

  cursor: pointer;

  width: 100%;

  font-size: 18px;

}

​

.card button:hover {

  opacity: 0.7;

}

</style>
        
        </head>
        <body>
            
        <div class="form">
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

        
        if($result1==true){
            while($row = mysqli_fetch_assoc($result1)) 
            {       
                
                $Product_name = $row['product_name'];
                $unit_price=$row['unit_price'];
                $description=$row['description'];
                $brand=$row['brand'];
                $quantity=$row['quantity'];?>         

            <td><tr><div class="card">
                <img src="products/<?php echo $row["product_image"]?>"  style="width:50%">
                <h1><?php echo "$brand"?></h1>
                <h1><?php echo "$Product_name"?></h1>
                <p class="price">Rs.<?php echo "$unit_price"?></p>
                <p>Description:<?php echo "$description"?></p>
                <p>Available Quantity:<?php echo "$quantity"?></p>
                <!-- <p><button>Add to Cart</button></p> -->
            </div></tr></td>
          <?php $count++; }}
           

            else if($result2==true){
            while($row = mysqli_fetch_assoc($result2)) 
            {       
                
                $Product_name = $row['product_name'];
                $unit_price=$row['unit_price'];
                $description=$row['description'];
                $brand=$row['brand'];
                $quantity=$row['quantity'];?>         

            <td><tr><div class="card">
                <img src="products/<?php echo $row["product_image"]?>"  style="width:50%">
                <h1><?php echo "$brand"?></h1>
                <h1><?php echo "$Product_name"?></h1>
                <p class="price">Rs.<?php echo "$unit_price"?></p>
                <p>Description:<?php echo "$description"?></p>
                <p>Available Quantity:<?php echo "$quantity"?></p>
                <!-- <p><button>Add to Cart</button></p> -->
            </div></tr></td>
          <?php $count++; }}
           else if($result3==true){
            while($row = mysqli_fetch_assoc($result3)) 
            {       
                
                $Product_name = $row['product_name'];
                $unit_price=$row['unit_price'];
                $description=$row['description'];
                $brand=$row['brand'];
                $quantity=$row['quantity'];?>         

            <td><tr><div class="card">
                <img src="products/<?php echo $row["product_image"]?>"  style="width:50%">
                <h1><?php echo "$brand"?></h1>
                <h1><?php echo "$Product_name"?></h1>
                <p class="price">Rs.<?php echo "$unit_price"?></p>
                <p>Description:<?php echo "$description"?></p>
                <p>Available Quantity:<?php echo "$quantity"?></p>
                <!-- <p><button>Add to Cart</button></p> -->
            </div></tr></td>
          <?php $count++; }}
           else if($result4==true){
            while($row = mysqli_fetch_assoc($result4)) 
            {       
                
                $Product_name = $row['product_name'];
                $unit_price=$row['unit_price'];
                $description=$row['description'];
                $brand=$row['brand'];
                $quantity=$row['quantity'];?>         

            <td><tr><div class="card">
                <img src="products/<?php echo $row["product_image"]?>"  style="width:50%">
                <h1><?php echo "$brand"?></h1>
                <h1><?php echo "$Product_name"?></h1>
                <p class="price">Rs.<?php echo "$unit_price"?></p>
                <p>Description:<?php echo "$description"?></p>
                <p>Available Quantity:<?php echo "$quantity"?></p>
                <!-- <p><button>Add to Cart</button></p> -->
            </div></tr></td>
          <?php $count++; }}
           else if($result5==true){
            while($row = mysqli_fetch_assoc($result5)) 
            {       
                
                $Product_name = $row['product_name'];
                $unit_price=$row['unit_price'];
                $description=$row['description'];
                $brand=$row['brand'];
                $quantity=$row['quantity'];?>         

            <td><tr><div class="card">
                <img src="products/<?php echo $row["product_image"]?>"  style="width:50%">
                <h1><?php echo "$brand"?></h1>
                <h1><?php echo "$Product_name"?></h1>
                <p class="price">Rs.<?php echo "$unit_price"?></p>
                <p>Description:<?php echo "$description"?></p>
                <p>Available Quantity:<?php echo "$quantity"?></p>
                <!-- <p><button>Add to Cart</button></p> -->
            </div></tr></td>
          <?php $count++; }}
           ?>

          
        </div>
        </body>
        </html>
</div>
                                
        <br>


        <hr>

       

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container-fluid" id="sign">
                    <h1><a name="Sign_up">Sign Up</h1>

                        <form action="signupfinal.php" method="post" >
                            <div class="form-group <?php ?>">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="">
                                <span class="help-block"><?php ?></span>
                            </div>  
                            <div class="form-group <?php?>">
                                <label>E-Mail Address</label>
                                <input type="email" name="email_address" class="form-control" value="">
                                <span class="help-block"><?php ?></span>
                            </div>
                            <div class="form-group <?php ?>">
                                <label>NIC</label>
                                <input type="text" name="NIC" class="form-control" minlength="10" maxlength="12" value="">
                                <span class="help-block"><?php ?></span>
                            </div>   
                            <div class="form-group <?php  ?>">
                                <label>Mobile Number</label>
                                <input type="numeric" name="mobile_number" class="form-control" minlength="10" maxlength="10" value="">
                                <span class="help-block"><?php?></span>
                            </div>
                            <div class="form-group <?php ?>">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="">
                                <span class="help-block"><?php?></span>
                            </div>
                            
                            <div class="form-group <?php  ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="">
                                <span class="help-block"><?php ?></span>
                            </div>
                            <div class="form-group <?php?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" value="">
                                <span class="help-block"><?php ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                            <!-- <p style="color:red">Already have an account? <a href="loginfinal.php" style="color:red">Login here</a>.</p> -->
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="container-fluid">
                            <h1><a name="About_us">About US</h1>
                            <p>Singhe is a reputed and well established supermarket with outlets in Digana, Manikhinna, Theldeniya, Pallekele & Katugastota.Shopping for groceries is much easier with Singhe Super Center; Sri Lanka’s premier supermarket is the one stop shop for all your grocery & household needs.A good retail super market.So far the best super market in Digana, smaller parking, but security officer always helps.</p>
                            <p> Opening Hours :<br>
Monday: 8:00 AM – 10:00 PM<br>
Tuesday: 8:00 AM – 10:00 PM<br>
Wednesday: 8:00 AM – 10:00 PM<br>
Thursday: 8:00 AM – 10:00 PM<br>
Friday: 8:00 AM – 10:00 PM<br>
Saturday: 8:00 AM – 10:00 PM<br>
Sunday: 8:00 AM – 10:00 PM </p>
                        </div>
                        <div class="container-fluid">
                            <h1><a name="Contact_us">Contact Us</h1>
                            <p>Contacts phone: +94 812 375 091<br>
Website: singhesuper.business.site<br>
Latitude: 7.3109515, Longitude: 80.7637147</p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="container">

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <br>
            <div class="row">
                <img class="about" src="05.jpg"class="responsive">
            </div>
        </div>

        <div class="container-fluid">
            <br>
            <div class="row">
                <footer class="container-fluid text-center">
                    <div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:50px;" class="responsive"></div><br><br><br>
                </footer>
            </div>
        </div>
    </body>
</html>





