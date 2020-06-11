<?php
// Initialize the session
session_start();


require_once "mysqlconnect.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage.css">

    <style type="text/css">
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }
    </style>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
            
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="searchProduct.php">Search Product</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <!-- <p>Please fill in your credentials to login.</p>
                            <h2>Login</h2> -->
        <p>Please fill in your credentials to login.</p>
        <form action="nextpage.php" method="GET">
        <div class="form-label-group">
                                    
                                    <input type="email" id="email_address" name="email_address" class="form-control" placeholder="email_address" required autofocus>
                                    <label for="email_address">E-mail</label>
                                    
                                </div>    
            <div class="form-label-group">
                                    
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    
                                </div>
            <div class="form-group">
            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Login">
                
                
            </div>
            <p>Don't have an account? <a href="signupfinal.php">Sign up now</a>.</p>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>