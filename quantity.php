
<?php
session_start();
 $product_ID = $_GET['product_ID'];
 $unit_price = $_GET['unit_price'];
 
 $_SESSION["product_ID"] = $product_ID;
 $_SESSION["unit_price"] = $unit_price;
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="background.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>


<div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
  <div class="card card-signin my-5">
       <div class="card-body">
                            <h5 class="card-title text-center">Quantity</h5>
<!--     
        <h2>Quantity</h2> -->
        
        <form action="quantity2.php" method="GET">
            <div class="form-group ">
            
            
                <label>Quantity</label>
                <input type="text" name="quantity_needed" class="form-control" value="">
                
            </div>    
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="OK">
                
                
            </div>
           
    </div>    
</body>
</html>