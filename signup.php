</php
require_once('mysqlconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        User Registration
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php
        if(isset($_POST["create"])){
            echo "User Submitted.";
        }
        ?>
    </div>

    <div>
        <form action="signup.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Sign Up</h1>
                        <p>Fill up all the fields</p>
                        <hr class= "mb-3">
                        <label for="user_name"><b>User Name</b></label>
                        <input class="form-control" type="text" name="user_name" requiered>

                        <label for="email_address"><b>E-mail Address</b></label>
                        <input class="form-control" type="email" name="email_address" requiered>

                        <label for="NIC"><b>NIC</b></label>
                        <input class="form-control" type="text" name="NIC" requiered>

                        <label for="user_type"><b>User Type</b></label>
                        <input class="form-control" type="text" name="user_type" requiered>

                        <label for="mobile_number"><b>Mobile Number</b></label>
                        <input class="form-control" type="text" name="mobile_number" requiered>

                        <label for="title"><b>Title</b></label>
                        <input class="form-control" type="text" name="title" requiered>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" name="password" requiered>
                        <hr class= "mb-3">
                        <input class="btn btn-primary" type= "submit" name="create" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>