<?php
// Initialize the session
require_once "mysqlconnect.php";
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
session_start();
$email = $_GET['email_address'];
$password = $_GET['password'];


$_SESSION["email_address"] = $email;
$_SESSION["password"] = $password;
$email_check="SELECT * FROM users WHERE email_address='$email'";
$resulte = mysqli_query($db, $email_check);
$rows=mysqli_num_rows($resulte);
// $d=$resulte->fetch_object();
// $e=$d->user_name;
if (mysqli_num_rows($resulte) < 1){
    header("location:loginfinal2.php");
}
else{
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

$uname = "SELECT user_name FROM users WHERE email_address='$email'";
$result3 = mysqli_query($db, $uname);
$oneresult3 = $result3->fetch_object();
$username = $oneresult3->user_name;
$_SESSION["user_name"] = $username;

if ($password == $hashPassword) {
    // print_r($oneresult);
    // print_r($result);
    if ($result) {
        if ($user_type == "Administartor") {
            header("location: Administratorhomepagenew.php");
            // echo "<a href=\"AdministratorHomepage.php\">This is a link</a>";
        } 
         if ($user_type == "Customer") {
            header("location: customer1.php");
            // echo "<a href=\"customer.php\">This is a link</a>";
        }
        if ($user_type == "Cashier") {
            header("location: cashier.php");
            // echo "<a href=\"cashier.php\">This is a link</a>";
        }
        // Redirect user to welcome page
        // header("location: searchProduct.php");
        
    }
    
}
else{
    header("location:loginfinal2.php");
    }
}

// Close statement



echo "end of program"; ?>

