



<?php
session_start();
require('mysqlconnect.php');
// $email= $_SESSION['email_address'];
// $username= $_SESSION['user_name'];


?>
<head>


 <!-- <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
 <style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  .footer{
background-color:#003366;
margin:0;
padding:0;
width:90vw;
height:22.5vh;
float:right;
}

  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  
  .bs-example{
    margin: 20px;        
  }
  div.ex1 {
  width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
}
.column {
  float: left;
}

.left {
  width: 25%;
}

.right {
  width: 75%;
}
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.vertical-menu {
  width: 200px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #4CAF50; /* Add a green color to the "active/current" link */
  color: white;
}




.subnav {
  float: in-line;
  overflow: hidden;
}

/* Subnav button */
.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: black;
  padding: 14px 90px;
  background-color: #ccc;
  font-family: inherit;
  margin: 0;
  
}

/* Add a red background color to navigation links on hover */
.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: green;
}

/* Style the subnav content - positioned absolute */
.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: green;
  width: 30%;
  z-index: 1;
}

/* Style the subnav links */
.subnav-content a {
  float: inline-start;
  color: black;
  text-decoration: none;
}

/* Add a grey background color on hover */
.subnav-content a:hover {
  background-color: green;
  color: black;
}

/* When you move the mouse over the subnav container, open the subnav content */
.subnav:hover .subnav-content {
  display: block;
}
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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
  position: relative;
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
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
table, th, td { border: 1px solid black; border-collapse: collapse; } th, td { padding: 5px; } th { text-align: center; }
label { display: inline-block; width: 200px; }
</style>
 
  </head>
  <body>



<div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>
  
</div>
<div class="row">
  <div class ="column">
<div class="vertical-menu">
  <a href="administratorhomepagenew" >Administrator Home</a>
  <a href="order.php">Manage orders</a>
  
  <a href="view.php">Manage Inventory</a>
  <a href="cat.php">Manage Product Categories</a>
  <a href="displayoffers.php">Manage Offers</a>
  <a href="viewcashierlist.php" class="active">Manage Cashiers</a>

  <a href="ViewSuggestions.php">View Suggestions</a>
  
  
  <a href="viewfeedback1.php">View feedback</a>
  <!-- <a href="ViewPayments.php">View Payments</a> -->
  <a href="Advertise.php">Advertise</a>
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
$count=1;
$sel_query="Select * from users where user_type='Cashier' ORDER BY email_address desc;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["email_address"]; ?></td>
<td align="center"><?php echo $row["user_name"]; ?></td>
<td align="center"><?php echo $row["NIC"]; ?></td>
<td align="center"><?php echo $row["user_type"]; ?></td>
<td align="center"><?php echo $row["mobile_number"]; ?></td>
<td align="center"><?php echo $row["title"]; ?></td>
<td align="center">
<button class="open-button" onclick="openForm()">EDIT</button>

<div class="form-popup" id="myForm">
  <form action="editcashier.php" class="form-container">
    

    <label for="mobile_number"><b>Please enter the New phone number</b></label>
    <input type="int" placeholder="Enter phone number" name="mobile_number" required>


    <button type="submit" class="btn">OK</button>
    <input type="hidden" name="email_address" id="email_address" value='<?php echo $row["email_address"]?>'>
    
     <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</td>
<td align="center">
<a href="deletecashier.php?email_address=<?php echo $row["email_address"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<div>


<?php
// Include config file
require_once "mysqlconnect.php";
 
// Define variables and initialize with empty values
 $email_address = $username = $mobile_number  =  $title = $NIC = $password = $confirm_password = "";
 $user_type="Cashier";
 $email_address_err = $username_err  = $mobile_number_err = $user_type_err =  $title_err = $NIC_err = $password_err = $confirm_password_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }
        else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["mobile_number"]))){
            $mobile_number_err = "Please enter a mobile.";
        }
            else{
                $mobile_number = trim($_POST["mobile_number"]);
            }

            /*if(empty(trim($_POST["user_type"]))){
                $user_type_err = "Please enter a .";
            }
                else{
                    $user_type = trim($_POST["user_type"]);
                }*/

                if(empty(trim($_POST["title"]))){
                    $title_err = "Please enter a username.";
                }
                    else{
                        $title = trim($_POST["title"]);
                    }

                    if(empty(trim($_POST["NIC"]))){
                        $NIC_err = "Please enter a username.";
                    }
                        else{
                            $NIC = trim($_POST["NIC"]);
                        }
                    
    
    // Validate email
    if(empty(trim($_POST["email_address"]))){
        $email_address_err = "Please enter.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE email_address = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email_address"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_address_err = "This email is already taken.";
                } else{
                    $email_address = trim($_POST["email_address"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty ($email_address_err)&& empty($username_err)   && empty ($mobile_number_err) && empty ($title_err) && empty ($NIC_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        
        // $sql = "INSERT INTO users(email_address, username, NIC, user_type, mobile_number, title, password )VALUES(?, ?, ?, ?, ?, ?, ?)";
       $param_email = $email_address;
       $sql="insert into users (email_address,user_name, NIC, user_type,mobile_number,title,password) values ('$param_email','$username','$NIC','$user_type','$mobile_number','$title','$password')";
       $result=mysqli_query($db,$sql);
       if($result){
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
            else{
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
                <input type="text" name="NIC" class="form-control" value="<?php echo $NIC; ?>">
                <span class="help-block"><?php echo $NIC_err; ?></span>
            </div>   
            <!-- <div class="form-group <?php //echo (!empty($user_type_err)) ? 'has-error' : ''; ?>">
                <label>User Type</label>
                <input type="text" name="user_type" class="form-control" value="<?php //echo $user_type; ?> ">
                <span class="help-block"><?php //echo $user_type_err; ?></span>
            </div> -->
            <div class="form-group <?php echo (!empty($mobile_number_err)) ? 'has-error' : ''; ?>">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control" value="<?php echo $mobile_number; ?>">
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
                <!-- <input type="reset" class="btn btn-reset" value="Reset"> -->
            </div>
            <!-- <p>Already have an account? <a href="login.php">Login here</a>.</p> -->
        </form>
    </div>    
</body>
</html>
</div>









</div>






</div>




















<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>

</body>
</html>

