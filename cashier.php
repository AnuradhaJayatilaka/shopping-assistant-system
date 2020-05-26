<?php
// Initialize the session
session_start();
require_once "mysqlconnect.php";
$email= $_SESSION['email_address'];
$user_name = "SELECT username FROM users WHERE email_address='$email'";
                            // echo "$user_type";
                            $result=mysqli_query($db, $user_name);
                            $oneresult= $result->fetch_object();
                            $username= $oneresult->username;
                            $_SESSION["username"] = $username;

                            if($result){ echo "hi ";}
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    
// }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <!-- <a href="ResetPassword.php" class="btn btn-warning">Reset Your Password</a> -->
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </p>
</body>
</html>