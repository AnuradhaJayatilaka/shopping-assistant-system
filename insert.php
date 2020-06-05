<?php
require_once "mysqlconnect.php";
// include("auth.php");
$status = "";
$result = "";
$product_name = "";
$product_ID = "";
$description = "";
$unit_price = "";
$brand = "";
$quantity="";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    // $trn_date = date("Y-m-d H:i:s");

    $product_name = $_REQUEST['product_name'];
    $product_ID = $_REQUEST['product_ID'];
    $description = $_REQUEST['description'];
    $unit_price = $_REQUEST['unit_price'];
    $brand = $_REQUEST['brand'];
    $quantity = $_REQUEST['quantity'];
    // $submittedby = $_SESSION["username"];

    $sql = "insert into products
    (product_name,product_ID,description,unit_price,brand,quantity)values
    ('$product_name','$product_ID','$description','$unit_price','$brand','$quantity')";
    $result = mysqli_query($db, $sql);

    if ($result) {

        // $trn_date=trn_date;
        // $product_name=product_name;
        // $product_ID=product_ID;
        // $description=description;
        // $unit_price=unit_price;
        // $brand=brand;

        $status = "New Record Inserted Successfully.
        </br></br><a href='view.php'>View Inserted Record</a>";
    } else {
        die('Error, insert query failed with:');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert New Record</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | <a href="view.php">View Records</a>
            | <a href="logout.php">Logout</a></p>
        <div>
            <h1>Insert New Record</h1>
            <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1" />
                <p><input type="text" name="product_name" placeholder="Enter product" required /></p>
                <p><input type="text" name="product_ID" placeholder="Enter ID" required /></p>
                <p><input type="text" name="description" placeholder="Enter description" required /></p>
                <p><input type="text" name="unit_price" placeholder="unit price" required /></p>
                <p><input type="text" name="brand" placeholder="Enter brand" required /></p>
                <p><input type="text" name="quantity" placeholder="Enter Quantity" required /></p>
                <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            <p style="color:#FF0000;"><?php echo $status; ?></p>
        </div>
    </div>
</body>

</html>