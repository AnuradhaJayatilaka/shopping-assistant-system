<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update quantity</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="background.css">
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | 
            | <a href="logout.php">Logout</a></p>
        <h1>Update quantity</h1>

        <div>
            <form name="form" method="get" action="editproduct2.php">
                <!-- <input type="hidden" name="new" value="1" /> -->
                <!-- <input name="product_ID" type="hidden" value="BIS2222" /> -->
                <?php 
$id=$_REQUEST['id'];
echo "<input name=\"id\" type=\"hidden\" value=\"$id\" />";
?>
                <!-- <p><input type="text" name="product_name" placeholder="Enter product" required /></p>
                <p><input type="text" name="unit_price" placeholder="Enter price" required /></p> -->
                <p><input type="text" name="quantity_needed" placeholder="Enter quantity" required /></p>
                <p><input name="submit" type="submit" value="Update" /></p>
            </form>

        </div>
    </div>
</body>

</html>