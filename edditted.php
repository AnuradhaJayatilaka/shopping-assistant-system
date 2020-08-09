<?php
                if(!empty($_POST)){
                    if (isset($_POST['submit']) && $_POST['submit'] == 'Update')
                        {
                            if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) 
                            {
                                require('mysqlconnect.php');
                                $product_ID=$_POST['product_ID'];

                                // $product_name =$_REQUEST['product_name'];
                                $unit_price =$_POST['unit_price'];
                                $quantity =$_POST['quantity'];
                                $brand =$_POST['brand'];
                                $description=$_POST['description'];

                                $product_image= $_FILES['product_image']['name'];
                                $productImg_temp= $_FILES['product_image']['tmp_name'];
                                move_uploaded_file($productImg_temp, "products/$product_image" );
                                $product_image   = mysqli_real_escape_string($db, $product_image);

                                $update="UPDATE products SET brand='$brand', unit_price='$unit_price', quantity=$quantity, description='$description', product_image='$product_image' WHERE product_ID='$product_ID'";
                                $result=mysqli_query($db, $update);
                                if($result){
                                    header("Location:view.php");
                                } 

                                else { die ( "error");}
                            }
                        }
                }
            ?>