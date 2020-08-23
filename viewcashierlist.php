<?php
session_start();
require('mysqlconnect.php');
require("adminheader.php");


?>

<head>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;


        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: center;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>

</head>

<body>



    <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

    </div>
    <div class="row">
        <div class="column">
            <div class="vertical-menu">
                <a href="administratorhomepagenew">Administrator Home</a>
                <div class="subnav">
                    <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
                    <div class="subnav-content">
                        <a href="view.php">View Products</a>
                        <a href="insert.php">Add Product</a>

                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="order.php">View Ongoing List Orders</a>
                        <a href="completeorder.php">View Complete List Orders</a>
                        <a href="view_cartorder.php">View Ongoing cart orders </a>
                        <a href="view_completecartorder.php">View Complete cart orders </a>
                    </div>
                </div>
                <a href="cat.php">Manage Product Categories</a>
                <a href="displayoffers.php">Manage Offers</a>
                <a href="viewcashierlist.php" class="active">Manage Cashiers</a>

                <a href="ViewSuggestions.php">View Suggestions</a>


                <a href="viewfeedback1.php">View feedback</a>

                <a href="GenerateReports.php">Generate Reports</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
        <div class="column">

            <!-- <p><a href="AdministratorHomepage.php">Admin Home</a>||
<a href="signupcashiers.php">Add new cashier</a> 
| 
| <a href="logout.php">Logout</a></p> -->
            <h2>View Cashiers List</h2>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <!-- <th><strong>Number</strong></th> -->
                        <th><strong>E-mail Address</strong></th>
                        <th><strong>User name</strong></th>
                        <th><strong>NIC</strong></th>
                        <th><strong>User Type</strong></th>
                        <th><strong>Mobile Number</strong></th>
                        <th><strong>Title</strong></th>
                        <th><strong>Edit</strong></th>

                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $counta =1;
                        $countb=1;
                        $countc=1;
                    $sel_query = "Select * from users where user_type='Cashier' ORDER BY email_address desc;";
                    $result = mysqli_query($db, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { 
                        $myform = "myform" . $counta;
                        $openform = "openform" . $countb;
                        $closeform = "closeform" . $countc; 
                        ?>
                        <tr>
                            <td align="center"><?php echo $row["email_address"]; ?></td>
                            <td align="center"><?php echo $row["user_name"]; ?></td>
                            <td align="center"><?php echo $row["NIC"]; ?></td>
                            <td align="center"><?php echo $row["user_type"]; ?></td>
                            <td align="center"><?php echo $row["mobile_number"]; ?></td>
                            <td align="center"><?php echo $row["title"]; ?></td>
                            <td align="center">
                                <button class="open-button" onclick="<?php echo $openform ?>()">EDIT</button>

                                <div class="form-popup" id="<?php echo $myform ?>">
                                    <form action="editcashier.php" class="form-container">


                                        <label for="mobile_number"><b>Please enter the New phone number of <?php echo $row["user_name"]; ?></b></label>
                                        <input type="numeric" placeholder="Enter phone number" name="mobile_number"  minlength="10" maxlength="10" required>


                                        <button type="submit" class="btn">OK</button>
                                        <input type="hidden" name="email_address" id="email_address" value='<?php echo $row["email_address"] ?>'>

                                        <button type="button" class="btn cancel" onclick="<?php echo $closeform ?>()">Close</button>
                                    </form>
                                </div>

                                <script>
                                    function <?php echo $openform ?>() {
                                        document.getElementById("<?php echo $myform ?>").style.display = "block";
                                    }

                                    function <?php echo $closeform ?>() {
                                        document.getElementById("<?php echo $myform ?>").style.display = "none";
                                    }
                                </script>
                            </td>
                            <td align="center">
                                <a href="deletecashier.php?email_address=<?php echo $row["email_address"]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php $count++;
                    $counta++;
                    $countb++;
                    $countc++;
                    } ?>
                </tbody>
            </table>
            <div>


                <?php
                // Include config file
                require_once "mysqlconnect.php";

                // Define variables and initialize with empty values
                $email_address = $username = $mobile_number  =  $title = $NIC = $password = $confirm_password = "";
                $user_type = "Cashier";
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


                            // header("location: login.php");
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
                        mysqli_stmt_close($db);
                    }


                    // Close connection
                    mysqli_close($db);
                }
                ?>

                <!DOCTYPE html>
                <html lang="en">

                <head>

                </head>

                <body>
                    <div class="wrapper">

                        <h2>Register cashiers</h2>

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
                            <!-- <p>Already have an account? <a href="login.php">Login here</a>.</p> -->
                        </form>
                    </div>
                </body>

                </html>
            </div>









        </div>






    </div>




















    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
    </footer>

</body>

</html>