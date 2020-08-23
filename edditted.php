<?php
if (!empty($_POST)) {
    if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
        // if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) 
        // {
        require('mysqlconnect.php');
        $product_ID = $_POST['product_ID'];

        // $product_name =$_REQUEST['product_name'];
        $unit_price = $_POST['unit_price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $update = "UPDATE products SET  unit_price='$unit_price', quantity=$quantity, description='$description' WHERE product_ID='$product_ID'";
        $result = mysqli_query($db, $update);
        if ($result) {
            header("Location:view.php");
        } else {
            die("error");
        }
    }
    // }
}
