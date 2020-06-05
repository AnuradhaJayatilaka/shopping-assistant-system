
<?php
session_start();
 $product_ID = $_GET['product_ID'];
 $_SESSION["product_ID"] = $product_ID;
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
    
        <h2>Quantity</h2>
        
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