<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="background.css">
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | <a href="insert.php">Insert New Record</a>
            | <a href="logout.php">Logout</a></p>
        <h1>Update Record</h1>

        <div>
            <form name="form" method="get" action="edditted.php">
                <!-- <input type="hidden" name="new" value="1" /> -->
                <!-- <input name="product_ID" type="hidden" value="BIS2222" /> -->
                <?php 
$product_ID=$_REQUEST['product_ID'];
// $sql="select* from products where product_ID='$product_ID'";

echo "<input name=\"product_ID\" type=\"hidden\" value=\"$product_ID\" />";
?>
                <p><input type="text" name="product_name" placeholder="product_name" required /></p>
                <p><input type="text" name="unit_price" placeholder="unit_price" required /></p>
                <p><input type="text" name="quantity" placeholder="quantity" required /></p>
                <p><input name="submit" type="submit" value="Update" /></p>
            </form>

        </div>
    </div>
</body>

</html>