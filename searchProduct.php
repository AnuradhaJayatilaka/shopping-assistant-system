<?php
session_start();
 
if(isset($_GET['product_name'])){
    $host="localhost:3308";
    $user="root";
    $password="";
    $db="singhe_super";
     
    
    $connection=mysqli_connect($host,$user,$password);
    mysqli_select_db($connection,$db);
    

    $pname=$_GET['product_name'];
    $_SESSION["product_name"] = $pname;
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$pname%' LIMIT 0, 30 ";
// $result = $conn->query($sql);
//     $sql="select * from products where product_name='".$pname."' limit 1";
    
    $result=mysqli_query($connection,$sql);
    
    if(mysqli_num_rows($result)==1){
        

        // echo " product is available";
        header("location:sdisplay.php");
        
       
    }
    else{
        echo " product is unavailable";
        exit();
    }
        
}
?>


<!DOCTYPE html>
<html>
<head>
 <title> Search Product </title>
 <link rel="stylesheet" href="background.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!-- <img src="searchProduct.jpg"/> -->
</head>
<body>
<div class="form">
<p><a href="customer.php">Customer Home</a> ||
||
<!-- | <a href="cart.php">My Cart</a>  -->
<a href="logout.php">Logout</a></p>
<div class="container">
         <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Search Product</h5>
 
 <form method="GET" >
     
 <div class="form-input">
 <input type="text" name="product name" placeholder="Enter the product name" required autofocus/> 
 </div>
 <!-- <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div> -->
 <input type="submit" type="submit" value="SEARCH" class="btn btn-secondary"/>
 </form>
 </div>
</body>
</html>