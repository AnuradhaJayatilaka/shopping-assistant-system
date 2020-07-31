
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert New Record</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="background.css">
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | 
            | <a href="logout.php">Logout</a></p>
        <div>
            <h1>Insert New Product Category</h1>
            <form name="form" method="post" action="" enctype ="multipart/form-data">
                <input type="hidden" name="new" value="1" />
                <p><input type="text" name="product_category" placeholder="Enter product category" required /></p>
                <p><input type="text" name="cat_code" placeholder="Enter cat_code" required /></p>
                <p><input type="text" name="cat_description" placeholder="Give a brief description" required /></p>
                <p><input type="file" name="cat_image" required /></p>
                
                <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            <!-- <p style="color:#FF0000;"><?php echo $status; ?></p> -->
        </div>
    </div>
</body>

</html>

<?php
require_once "mysqlconnect.php";
// include("auth.php");
$status = "";
$result = "";

$product_category="";
$cat_code="";
$cat_description="";
$cat_image="";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    // $trn_date = date("Y-m-d H:i:s");

    $product_category = $_REQUEST['product_category'];
    $cat_code = $_REQUEST['cat_code'];

    $cat_description = $_REQUEST['cat_description']; 
    $cat_image             = $_FILES['cat_image']['name'];
    $cat_imagetemp        = $_FILES['cat_image']['tmp_name'];
    // $cat_image = $_REQUEST['cat_image'];
       // $submittedby = $_SESSION["username"];
       move_uploaded_file($cat_imagetemp, "img2/$cat_image" );

    $sql = "insert into category
    (product_category,cat_code,cat_description,cat_image)values
    ('$product_category','$cat_code','$cat_description','$cat_image')";
    $result = mysqli_query($db, $sql);

    if ($result) {

        // $trn_date=trn_date;
        // $product_name=product_name;
        // $product_ID=product_ID;
        // $description=description;
        // $unit_price=unit_price;
        // $brand=brand;

        $status = "New Record Inserted Successfully'";echo "$status";
         echo "<a href=\"view_categories.php\"style=\"color:red\">view inserted record</a>";
    } else {
        die('Error, insert query failed with:');
    }
}
?>