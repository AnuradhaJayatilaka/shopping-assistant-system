<?php 
require("adminheader.php");
?>
<?php
              require('mysqlconnect.php');
            // include("auth.php");
            ?>
            <!DOCTYPE html>
            <html>
                <head></head>
                <body>

                    <div class="form">                   
                
                      <h2>View Records</h2>
                      <table class="table table-dark table-hover">
                      <thead>
                        <tr>
                        <!-- <th><strong>Number</strong></th> -->
                          <th><strong>Product ID</strong></th>
                          <th><strong>Product Name</strong></th>
                          <th><strong>unit price(Rs)</strong></th>
                          <th><strong>Description</strong></th>
                          <th><strong>Brand</strong></th>
                          <th><strong>Quantity</strong></th>
                          <th><strong>Image</strong></th>
                          <th><strong>Edit</strong></th>
                          <th><strong>Delete</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                <?php
                $count=1;
                $sel_query="Select * from products ORDER BY product_ID desc;";
                $result = mysqli_query($db,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                <td align="center"><?php echo $row["product_ID"]; ?></td>
                <td align="center"><?php echo $row["product_name"]; ?></td>
                <td align="center"><?php echo $row["unit_price"]; ?></td>
                <td align="center"><?php echo $row["description"]; ?></td>
                <td align="center"><?php echo $row["brand"]; ?></td>
                <td align="center"><?php echo $row["quantity"]; ?></td>
                <td><img src='products/<?php echo $row["product_image"]?>' style='width: 65px;' ></td>
                <td align="center">
                <a href="edit.php?product_ID=<?php echo $row["product_ID"]; ?>">Edit</a>
                </td>
                <td align="center">
                <a href="delete.php?product_ID=<?php echo $row["product_ID"]; ?>">Delete</a>
                </td>
                </tr>
                <?php $count++; } ?>
                </tbody>
                </table>
                <!-- </div>
                    </div> -->
                </div>
              
  
  </div></body>




    </div>
                </div>






    <!-- <br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> -->
<div class="row">
<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
</footer>
</div>
</body>
</html>