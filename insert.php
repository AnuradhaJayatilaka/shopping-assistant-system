
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
            | <a href="view.php">View Records</a>
            | <a href="logout.php">Logout</a></p>
        <div>
            <h1>Insert New Record</h1>
            <form name="form" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="new" value="1" />
                <label>Product Name</label>
                <p><input type="text" name="product_name" placeholder="Enter product" required /></p>
                <label>Product ID</label>
                <p><input type="text" name="product_ID" placeholder="Enter product ID" required /></p>
                  <div class="form-group">
                  <label for="product_category">Category Type</label>
                  <select name="product_category" class="form-control"><!-- form-control Begin -->
                    
                    <option disabled selected> Select a Product Category </option>
                    
                    <?php 
                    require_once "mysqlconnect.php";
                    $get_item = "select product_category from category";
                    $run_item = mysqli_query($db,$get_item);
                    
                    while ($data= mysqli_fetch_array($run_item)){
                      
                     
                      
                      echo "<option value='". $data['product_category'] ."'>" .$data['product_category'] ."</option>";
                      
                    }
                    
                    ?>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="product_image">Product Image</label>
                  <input type="file" class="form-control" id="product_image" name="product_image">
                </div>
                
                <!-- <div class="form-group">
                  <label for="price">Price (LKR)</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                  <label for="delivery">Delivery (Days)</label>
                  <input type="text" class="form-control" id="delivery" name="delivery">
                </div> -->
                <div class="form-group">
                <p><input type="text" name="description" placeholder="Enter description" required /></p>
                <p><input type="text" name="unit_price" placeholder="unit price" required /></p>
                <p><input type="text" name="brand" placeholder="Enter brand" required /></p>
                <p><input type="text" name="quantity" placeholder="Enter Quantity" required /></p>
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
$product_name = "";
$product_ID = "";
$description = "";
$unit_price = "";
$brand = "";
$quantity="";
$product_category="";
if(isset($_POST['submit'])){
    // $trn_date = date("Y-m-d H:i:s");

    $product_name = $_REQUEST['product_name'];
    $product_ID = $_REQUEST['product_ID'];
    $description = $_REQUEST['description'];
    $unit_price = $_REQUEST['unit_price'];
    $brand = $_REQUEST['brand'];
    $quantity = $_REQUEST['quantity'];
    $product_category = $_REQUEST['product_category'];
    $product_image          = $_FILES['product_image']['name'];
    $productImg_temp        = $_FILES['product_image']['tmp_name'];
    // $submittedby = $_SESSION["username"];
 //------function for the img-------------------------

 move_uploaded_file($productImg_temp, "products/$product_image" );
 $product_image   = mysqli_real_escape_string($db, $product_image);

//  if(empty($product_name) || empty($product_ID) || empty($description)||empty($unit_price) ||empty($brand)||empty($quantity||empty($product_category)||empty($product_image)){

//   echo "Fields cannot be empty!";
// }

    $sql = "insert into products
    (product_category,product_name,product_ID,description,unit_price,brand,quantity,product_image)values
    ('$product_category','$product_name','$product_ID','$description','$unit_price','$brand','$quantity','$product_image')";
    $result = mysqli_query($db, $sql);

    if ($result) {

        // $trn_date=trn_date;
        // $product_name=product_name;
        // $product_ID=product_ID;
        // $description=description;
        // $unit_price=unit_price;
        // $brand=brand;

        $status = "New Record Inserted Successfully'";echo "$status";
         echo "<a href=\"view.php\"style=\"color:red\">view inserted record</a>";
    } else {
        die('Error, insert query failed with:');
    }
}
?>