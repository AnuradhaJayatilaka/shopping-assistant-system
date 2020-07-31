<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Offer</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="background.css">
</head>

<body>
    <div class="form">
        <p><a href="AdministratorHomepage.php">Admin Home</a> 
            | <a href="insertoffers.php">Insert New Offer</a>
            |<a href="displayoffers.php">View Offers</a>
            | <a href="logout.php">Logout</a></p>
        <h1>Update Record</h1>

        <div>
            <form name="form" method="get" action="eddittedoffer.php">
                <!-- <input type="hidden" name="new" value="1" /> -->
                <!-- <input name="product_ID" type="hidden" value="BIS2222" /> -->
                <?php 
$offerid=$_REQUEST['offerid'];
// $sql="select* from products where product_ID='$product_ID'";

echo "<input name=\"offerid\" type=\"hidden\" value=\"$offerid\" />";
?>
                <p><input type="text" name="offer" placeholder="type offer details" required /></p>
                <p><input type="text" name="conditions" placeholder="type conditions of the offer" required /></p>
                
                <p><input name="submit" type="submit" value="Update" /></p>
            </form>

        </div>
    </div>
</body>

</html>