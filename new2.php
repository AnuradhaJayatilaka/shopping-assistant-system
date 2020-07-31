


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
        width: 1540px !important; 
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
            <a class="navbar-brand" href="#">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class=" nav-item dropdown">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">  view products</a>
                <ul class="dropdown-menu">
                <div class="form-group">
                    <label for="product_category">Category Type</label>
                    <select name="product_category" class="form-control"><!-- form-control Begin -->
                        
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
                    </div>
                </ul>
                
                </li>
                
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="container-fluid" id="sign">

                        <form action="signupfinal.php" method="post" >
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>  
                            <div class="form-group <?php echo (!empty($email_address_err)) ? 'has-error' : ''; ?>">
                                <label>E-Mail Address</label>
                                <input type="email" name="email_address" class="form-control" value="<?php echo $email_address; ?>">
                                <span class="help-block"><?php echo $email_address_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($NIC_err)) ? 'has-error' : ''; ?>">
                                <label>NIC</label>
                                <input type="text" name="NIC" class="form-control" minlength="10" maxlength="12" value="<?php echo $NIC; ?>">
                                <span class="help-block"><?php echo $NIC_err; ?></span>
                            </div>   
                            <div class="form-group <?php echo (!empty($mobile_number_err)) ? 'has-error' : ''; ?>">
                                <label>Mobile Number</label>
                                <input type="numeric" name="mobile_number" class="form-control" minlength="10" maxlength="10" value="<?php echo $mobile_number; ?>">
                                <span class="help-block"><?php echo $mobile_number_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                                <span class="help-block"><?php echo $title_err; ?></span>
                            </div>
                            
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                            <p style="color:red">Already have an account? <a href="loginfinal.php" style="color:red">Login here</a>.</p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="container-fluid">
                            <p>Put your content 1 here</p>
                        </div>
                        <div class="container-fluid">
                            <p>Put your content 2 here</p>
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
                <img class="about" src="05.jpg">
            </div>
        </div>

        <div class="container-fluid">
            <br>
            <div class="row">
                <footer class="container-fluid text-center">
                    <div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:0px;" class="responsive"></div><br><br><br>
                </footer>
            </div>
        </div>
    </body>
</html>




