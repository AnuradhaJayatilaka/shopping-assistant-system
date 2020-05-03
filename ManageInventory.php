
<!DOCTYPE html>
<html>
<head>
    <title>
        Manage Inventory
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
    
        <?php
        
        require_once('mysqlconnect.php');
        
        
        
        if(isset($_POST["SaveProduct"])){
            $product_name = $_POST['product_name'];
            $product_ID = $_POST['product_ID'];
            $description = $_POST['description'];
            $unit_price = $_POST['unit_price '];
            $brand = $_POST['brand'];
            
            $sql = "INSERT INTO products( `product_name`, `product_ID`, `description`, `unit_price `, `brand` )VALUES(?, ?, ?, ?, ?, ?, ?)";
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
            }          $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([  $product_name, $product_ID,$description,  $unit_price , $brand]);
            if($result){
                echo 'Successfully saved';
            }
            else{
                echo 'there were errors';
            }
        }
        ?>
    </div>

    <div>
        <form action="ManageInventory.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Manage Products</h1>
                        <p>Fill up all the fields</p>
                        <hr class= "mb-3">
                        <label for="product_name"><b>Product Name</b></label>
                        <input class="form-control" type="text" id="product_name" name="product_name" requiered>

                        <label for="product_ID"><b>Product ID</b></label>
                        <input class="form-control" type="text" id="product_ID" name="product_ID" requiered>

                        <label for="description"><b>Description</b></label>
                        <input class="form-control" type="text" id="description" name="description" requiered>

                        <label for="unit_price"><b>Unit Price</b></label>
                        <input class="form-control" type="text" id="unit_price" name="unit_price" requiered>

                        <label for="brand"><b>Brand</b></label>
                        <input class="form-control" type="text" id="brand" name="brand" requiered>

                        
                        <hr class= "mb-3">
                        <input class="btn btn-primary" type= "submit" id="SaveProduct" name="Save Product" value="Save Product">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type= "text/javascript">
        $(function(){
            $('#create').click(function(e){

                 var valid= this.form();
                if(!valid.checkValidity){

            var product_name = $('#product_name').val();
               var product_ID = $('#product_ID').val();
               var description = $('#description').val();
               var unit_price = $('#unit_price').val();
               var brand = $('#brand').val();
               
                    e.preventDefault();
                   
                    $.ajax({
                        type: 'POST',
                        url: 'pro.php',
                        data: {product_name: product_name, product_ID: product_ID, description: description, unit_price: unit_price, brand: brand},
                        success: function(data){
                            Swal.fire({
                                title: 'successful',
                                text: data,
                                type:- 'success'
                            })
                             },
                        error: function(data){
                            Swal.fire({
                                title: 'errors',
                                text: 'errors while saving data',
                                type:- 'error'
                            })
                        }             
                    });
                
                    }
                else{
                
                }

               
            });
            
            
        });
        </script> -->
</body>
</html>