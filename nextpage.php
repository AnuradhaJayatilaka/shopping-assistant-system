<?php
// Initialize the session
require_once "mysqlconnect.php";
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";
session_start();
$email= $_GET['email_address'];
$password= $_GET['password'];
 
// Define variables and initialize with empty values


                            
                            
                            // Password is correct, so start a new session
                            // session_start();
                            
                            // Store data in session variables
                            // $_SESSION["loggedin"] = true;
                            // $_SESSION["id"] = $id;
                            $_SESSION["email_address"] = $email;     
                            $_SESSION["password"] = $password;                         
                            $user_category = "SELECT user_type FROM users WHERE email_address='$email'";
                            // echo "$user_type";
                            $result=mysqli_query($db, $user_category);
                            $oneresult= $result->fetch_object();
                            $user_type= $oneresult->user_type;
                            $_SESSION["user_type"] = $user_type;   
                            // print_r($oneresult);
                            // print_r($result);
                            if($result){
                            if($user_type=="Administartor"){
                                // header("location: AdministratorHomepage.php");
                                echo "<a href=\"AdministratorHomepage.php\">This is a link</a>";
                            }
                            else if($user_type=="Customer"){
                               echo "<a href=\"customer.php\">This is a link</a>";
                            }
                            if($user_type=="Cashier"){
                                echo "<a href=\"cashier.php\">This is a link</a>";
                            }
                            // Redirect user to welcome page
                            // header("location: searchProduct.php");
                        else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                   

            // Close statement
            
        
    
    
    // Close connection
    

?>