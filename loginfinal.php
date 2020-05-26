
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
        <form action="nextpage.php" method="GET">
            <div class="form-group ">
            
            
                <label>E mail</label>
                <input type="email" name="email_address" class="form-control" value="">
                
            </div>    
            <div class="form-group ">
            

                <label>Password</label>
                <input type="password" name="password" class="form-control">
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                
                
            </div>
            <p>Don't have an account? <a href="singupfinal.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>


 
