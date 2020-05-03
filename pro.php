<?php
        
        require_once('mysqlconnect.php');
        
        
        
        if(isset($_POST["SaveProduct"])){
            $product_name = $_POST['product_name'];
            $product_ID = $_POST['product_ID'];
            $description = $_POST['description'];
            $unit_price = $_POST['unit_price '];
            $brand = $_POST['brand'];
            
            $sql = "INSERT INTO products( `product_name`, `product_ID`, `description`, `unit_price `, `brand` )VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([  $product_name, $product_ID,$description,  $unit_price , $brand]);
            if($result){
                echo 'Successfully saved';
            }
            else{
                echo 'there were errors';
            }
        }
        ?>