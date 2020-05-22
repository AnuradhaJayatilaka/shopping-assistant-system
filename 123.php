<!DOCTYPE html>
<html lang="en">
<head>

<!-- NO CAHCING -->
<!-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" /> -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Nav Vertical Alignment</title>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
<script src="../jquery/jquery-3.5.1.js"></script>
<!-- not sure -->
<script src="../popper-core/src/popper.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<script src="../bootstrap/dist/js/bootstrap.js"></script>
<style type="text/css">
    .bs-example{
        margin: 20px;        
    }
</style>
</head>
<body>
    <nav class="nav nav-pills">
        <a href="#" class="nav-item nav-link active">Home</a>
        <a href="#" class="nav-item nav-link">About Us</a>
        <a href="#" class="nav-item nav-link">Contact Us</a>
        <a href="searchProduct.php" class="nav-item nav-link">Search Product</a>
        <!-- <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a> -->
        <!-- <form class="form-inline ml-auto">
            
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search Product</button>
            
        </form> -->
    </nav>

    <!-- <nav class="nav">
        <a href="#" class="nav-item nav-link active">Home</a>
        <a href="#" class="nav-item nav-link">Profile</a>
        <a href="#" class="nav-item nav-link">Messages</a>
        <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a>
    </nav> -->

    <!-- <div class="bs-example">

        <nav class="nav-pills">
            <ul>
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Pprofile</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
              </ul>
        </nav> -->

    <!-- <nav class="nav nav-pills"> -->
        
    <!-- </nav> -->
<!-- <div class="bs-example">
    <ul class="nav nav-pills nav-stacked">
        ...
        
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <a href="#" class="nav-item nav-link">Profile</a>
        <a href="#" class="nav-item nav-link">Messages</a>
        <a href="#" class="nav-item nav-link" tabindex="-1">Reports</a>
         
    </ul> -->
<!-- </div> -->
</body>
</html>                            

<!-- <?php

 
// if(isset($_GET['product_name'])){
//     $host="localhost:3308";
//     $user="root";
//     $password="";
//     $db="singhe_super";
     
    
//     $connection=mysqli_connect($host,$user,$password);
//     mysqli_select_db($connection,$db);
    

//     $pname=$_GET['product_name'];
    
//     $sql="select * from products where product_name='".$pname."' limit 1";
    
//     $result=mysqli_query($connection,$sql);
    
//     if(mysqli_num_rows($result)==1){
//         echo " product is available";
//         exit();
//     }
//     else{
//         echo " product is unavailable";
//         exit();
//     }
        
// }
?> -->


<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: searchProduct.php");
//     exit;
// }
 
// Include config file
require_once "mysqlconnect.php";

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password,$user_type);
                    echo $hashed_password;


                    if(mysqli_stmt_fetch($stmt)){

                        echo "anu";

                        //if(password_verify($password, $hashed_password)){
                        if($password== $hashed_password){
                            
                            
                            // Password is correct, so start a new session
                            // session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            // $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            
                            if($user_type=="Administrator"){
                                header("location: admin.php");
                            }
                            if($user_type=="Customer"){
                                header("location: customer.php");
                            }
                            if($user_type=="Cashier"){
                                header("location: cashier.php");
                            }
                            // Redirect user to welcome page
                            // header("location: searchProduct.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>


    <div class="wrapper">
    
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group ">
            <!-- <?php echo (!empty($username_err)) ? 'has-error' : '';?> -->
            
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group ">
            <!-- <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> -->

                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signupfinal.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>