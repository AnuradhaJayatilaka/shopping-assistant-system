<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="background.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login Form</h5>

                        <!-- <h2>Login</h2> -->
                        <p>Please fill in your credentials to login.</p>
                        <form action="nextpage.php" method="GET">
                            <div class="form-group ">


                                <label>E mail</label>
                                <input type="email" name="email_address" class="form-control" value="">

                            </div>
                            <div class="form-group ">


                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <p> The password you entered is incorrect.please re-enter the correct password </p>

                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Login">


                            </div>
                            <!-- <p style="color:red">Don't have an account? <a href="singupfinal.php">Sign up now</a>.</p> -->
                        </form>
                    </div>
</body>

</html>