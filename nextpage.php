<?php
// Initialize the session
require_once "mysqlconnect.php";
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
session_start();
$email = $_GET['email_address'];
$password = $_GET['password'];


$_SESSION["email_address"] = $email;
$_SESSION["password"] = $password;
$user_category = "SELECT user_type FROM users WHERE email_address='$email'";
$result = mysqli_query($db, $user_category);
$oneresult = $result->fetch_object();
$user_type = $oneresult->user_type;
$_SESSION["user_type"] = $user_type;
// $_SESSION["password"] = $hashPassword;
$hashed_password = "SELECT password FROM users WHERE email_address='$email'";
$resulttwo = mysqli_query($db, $hashed_password);
$oneresulttwo = $resulttwo->fetch_object();
$hashPassword = $oneresulttwo->password;
$_SESSION["password"] = $hashPassword;

if ($password == $hashPassword) {
    // print_r($oneresult);
    // print_r($result);
    if ($result) {
        if ($user_type == "Administartor") {
            // header("location: AdministratorHomepage.php");
            echo "<a href=\"AdministratorHomepage.php\">This is a link</a>";
        } 
         if ($user_type == "Customer") {
            echo "<a href=\"customer.php\">This is a link</a>";
        }
        if ($user_type == "Cashier") {
            echo "<a href=\"cashier.php\">This is a link</a>";
        }
        // Redirect user to welcome page
        // header("location: searchProduct.php");
        
    }
    
}
else{
    echo "<a href=\"loginfinal2.php\">This is a link</a>";
    $password_err = "The password you entered was not valid.";
            echo "$password_err";
    }
// Close statement



echo "end of program"; ?>

