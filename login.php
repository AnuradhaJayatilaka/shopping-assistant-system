<?php
$host="localhost";
$user="root";
$password="";
$db="singhe_super";
 
$connection=mysqli_connect($host,$user,$password);
mysqli_select_db($connection,$db);
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from users where user_name='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($sql);
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>

<!DOCTYPE html>
<html>
<head>
 <title> Login Form </title>
 <link rel="stylesheet" a href="login.css">
 
</head>
<body>
 <div class="container">
 <img src="image/login.png"/>
 <form method="post" >
 <div class="form-input">
 <input type="text" name="text" placeholder="Enter the User Name"/> 
 </div>
 <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div>
 <input type="submit" type="submit" class="btn-login"/>
 </form>
 </div>
</body>
</html>