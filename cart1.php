<?php
require('mysqlconnect.php');
$product_array1 = "SELECT * FROM products ORDER BY product_ID desc;";
$product_array = mysqli_query($db,$product_array1);
if(!empty($product_array)) { 
    $key= mysqli_fetch_array($product_array);
	foreach($key){

        if(!empty($_POST["needed_quantity"])) {
            $productByproduct_ID = $db->runQuery("SELECT * FROM product WHERE product_ID='" . $_GET["product_ID"] . "'");
            $itemArray = array($productByproduct_ID[0]["product_ID"]=>array('product_name'=>$productByproduct_ID[0]["product_name"], 'product_ID'=>$productByproduct_ID[0]["product_ID"], 'needed_quantity'=>$_POST["needed_quantity"], 'unit_price'=>$productByproduct_ID[0]["unit_price"]));
            
            // , 'image'=>$productByproduct_ID[0]["image"]

            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByproduct_ID[0]["product_ID"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByproduct_ID[0]["product_ID"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["needed_quantity"])) {
                                    $_SESSION["cart_item"][$k]["needed_quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["needed_quantity"] += $_POST["needed_quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        break;
}
}
?>

<html>
	<div class="product-item">
		<form method="post" action="cart2.php?action=add&product_ID=<?php echo $product_array[$key]["product_ID"]; ?>">
		<!-- <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div> -->
		<div class="product_name-footer">
		<div class="product_name"><?php echo $product_array[$key]["product_name"]; ?></div>
		<div class="unit_price"><?php echo "$".$product_array[$key]["unit_price"]; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="needed_quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>

</html>

<!-- case "add": -->
