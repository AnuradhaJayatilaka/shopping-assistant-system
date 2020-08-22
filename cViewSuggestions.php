<?php
require("adminheader.php");
require("mysqlconnect.php");
?>

<head>

</head>

<body>



    <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

    </div>
    <div class="row">
        <div class="column">
            <div class="vertical-menu">
                <a href="cashier.php">Cashier Home</a>
                <div class="subnav">
                    <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
                    <div class="subnav-content">
                        <a href="cview.php">View Products</a>
                        <a href="cinsert.php">Add Product</a>

                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="corder.php">View Ongoing List Orders</a>
                        <a href="ccompleteorder.php">View Complete List Orders</a>
                        <a href="cview_cartorder.php">View Ongoing cart orders </a>
                        <a href="cview_completecartorder.php">View Complete cart orders </a>
                    </div>
                </div>
                <a href="ccat.php">Manage Product Categories</a>
                <a href="cdisplayoffers.php">Manage Offers</a>


                <a href="cViewSuggestions.php" class="active">View Suggestions</a>


                <a href="cviewfeedback1.php">View feedback</a>

                <a href="cGenerateReports.php">Generate Reports</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>

        <div class="column">
            <?php
            require('mysqlconnect.php');

            ?>
            <!DOCTYPE html>
            <html>

            <head>

            </head>

            <body>
                <h1>Suggestions</h1>
                <div class="form">
                    <h3>Following products are running out of stock it is better to re-fill the stocks</h3>

                    <table class="table table-stripped">
                        <thead>
                            <tr>

                                <th><strong>Product ID</strong></th>
                                <th><strong>product Name</strong></th>
                                <th><strong>Quantity available</strong></th>
                                <th><strong>Brand</strong></th>
                                <th><strong>Description</strong></th>
                                <th><strong>Image</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $count = 1;

                            $sql2 = "SELECT * FROM products  WHERE quantity<=50 ORDER BY product_ID";
                            $result = mysqli_query($db, $sql2);

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td align="center"><?php echo $row["product_ID"]; ?></td>
                                    <td align="center"><?php echo $row["product_name"]; ?></td>
                                    <td align="center"><?php echo $row["quantity"]; ?></td>
                                    <td align="center"><?php echo $row["brand"]; ?></td>
                                    <td align="center"><?php echo $row["description"]; ?></td>
                                    <td><img src='products/<?php echo $row["product_image"] ?>' style='width: 65px;'></td>


                                </tr>
                            <?php $count++;
                            } ?>


                        </tbody>
                    </table>
                </div>
            </body>

            </html>

        </div>



    </div>










    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br>

    <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
    </footer>
    </div>
</body>

</body>

</html>