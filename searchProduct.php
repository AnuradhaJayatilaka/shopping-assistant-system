<?php

 
if(isset($_GET['product_name'])){
    $host="localhost:3308";
    $user="root";
    $password="";
    $db="singhe_super";
     
    
    $connection=mysqli_connect($host,$user,$password);
    mysqli_select_db($connection,$db);
    

    $pname=$_GET['product_name'];
    
    $sql="select * from products where product_name='".$pname."' limit 1";
    
    $result=mysqli_query($connection,$sql);
    
    if(mysqli_num_rows($result)==1){
        echo " product is available";
        exit();
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
 <link rel="stylesheet" a href="SearchProduct.css">
 
</head>
<body>
 <div class="container">
 <img src="searchProduct.jpg"/>
 <form method="GET" >
 <div class="form-input">
 <input type="text" name="product name" placeholder="Enter the product name"/> 
 </div>
 <!-- <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div> -->
 <input type="submit" type="submit" value="SEARCH" class="btn-Search"/>
 </form>
 </div>
</body>
</html>