
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert New Offer</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="background.css">
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | <a href="displayoffers.php">View Records</a>
            | <a href="logout.php">Logout</a></p>
        <div>
            <h1>Insert New Offer</h1>
            <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1" />
                <p><input type="text" name="offer" placeholder="Enter offer description" required /></p>
                <p><input type="text" name="conditions" placeholder="Enter conditions of the offer" required /></p>
                
                <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            
        </div>
    </div>
</body>

</html>

<?php
require_once "mysqlconnect.php";
// include("auth.php");
$status = "";
$result = "";
$offer = "";
$conditions = "";

if (isset($_POST['new']) && $_POST['new'] == 1) {
    // $trn_date = date("Y-m-d H:i:s");

    $offer = $_REQUEST['offer'];
    $conditions = $_REQUEST['conditions'];
   
    // $submittedby = $_SESSION["username"];

    $sql = "INSERT into offers (offer,conditions) VALUES ('$offer','$conditions')";
    $result = mysqli_query($db, $sql);

    if ($result) {

        // $trn_date=trn_date;
        // $product_name=product_name;
        // $product_ID=product_ID;
        // $description=description;
        // $unit_price=unit_price;
        // $brand=brand;

        $status = "New offer Inserted Successfully'";echo "$status";
         echo "<a href=\"displayoffers.php\"style=\"color:red\">view inserted offer</a>";
    } else {
        die('Error, insert query failed with:');
    }
}
?>