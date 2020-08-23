<?php
// Include config file
require_once "mysqlconnect.php";

// Define variables and initialize with empty values
$email_address = $username = $mobile_number  =  $title = $NIC = $password = $confirm_password = "";
$user_type = "Customer";
$email_address_err = $username_err  = $mobile_number_err = $user_type_err =  $title_err = $NIC_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["mobile_number"]))) {
        $username_err = "Please enter a mobile number.";
    } else {
        if (strlen($_POST['mobile_number']) == 10 && preg_match('/^\d+$/', $_POST['mobile_number'])) {
            $mobile_number = trim($_POST["mobile_number"]);
        } else {
            $mobile_number_err = "mobile number must contain only 10 digits";
        }
    }




    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter the title.";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["NIC"]))) {
        $title_err = "Please enter the NIC.";
    } else {



        if (strlen($_POST['NIC']) == 10 && preg_match('/^[0-9]{9}[vV]$/', $_POST['NIC'])) {
            $NIC = trim($_POST["NIC"]);
        }
        // if(empty(trim($_POST["NIC"]))==10){
        //     $NIC_err = "Please enter your NIC.";
        // }
        else {
            if (strlen($_POST['NIC']) == 12 && preg_match('/^[0-9]{11}[vV]$/', $_POST['NIC'])) {
                $NIC = trim($_POST["NIC"]);
            } else {
                $NIC_err = "Please enter a correct NIC.";
            }
        }
    }



    // Validate email
    if (empty(trim($_POST["email_address"]))) {
        $email_address_err = "Please enter.";
    } else {
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE email_address = ?";

        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email_address"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_address_err = "This email is already taken.";
                } else {
                    $email_address = trim($_POST["email_address"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($email_address_err) && empty($username_err)   && empty($mobile_number_err) && empty($title_err) && empty($NIC_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement

        // $sql = "INSERT INTO users(email_address, username, NIC, user_type, mobile_number, title, password )VALUES(?, ?, ?, ?, ?, ?, ?)";
        $param_email = $email_address;
        $sql = "insert into users (email_address,user_name, NIC, user_type,mobile_number,title,password) values ('$param_email','$username','$NIC','$user_type','$mobile_number','$title','$password')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            // $result = $stmtinsert->execute();
            // if($stmt = mysqli_prepare($db, $sql)){
            //     // Bind variables to the prepared statement as parameters
            //     mysqli_stmt_bind_param($stmt, "ss", $username, $param_password, $param_email,$NIC, $user_type, $mobile_number, $title);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            header("location: index.php");
        }

        // // Attempt to execute the prepared statement
        // // if(mysqli_stmt_execute($stmtinsert)){
        // //     // Redirect to login page
        // //     header("location: login.php");
        // } 
        else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($sql);
    }


    // Close connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="background.css">



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
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_address_err)) ? 'has-error' : ''; ?>">
                <label>E-Mail Address</label>
                <input type="email" name="email_address" class="form-control" value="<?php echo $email_address; ?>">
                <span class="help-block"><?php echo $email_address_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($NIC_err)) ? 'has-error' : ''; ?>">
                <label>NIC</label>
                <input type="text" name="NIC" class="form-control" minlength="10" maxlength="12" value="<?php echo $NIC; ?>">
                <span class="help-block"><?php echo $NIC_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($mobile_number_err)) ? 'has-error' : ''; ?>">
                <label>Mobile Number</label>
                <input type="numeric" name="mobile_number" class="form-control" minlength="10" maxlength="10" value="<?php echo $mobile_number; ?>">
                <span class="help-block"><?php echo $mobile_number_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                <span class="help-block"><?php echo $title_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p style="color:red">Already have an account? <a href="loginfinal.php" style="color:red">Login here</a>.</p>
        </form>
    </div>
</body>

</html>