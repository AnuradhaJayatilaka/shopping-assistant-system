<?php
require("mysqlconnect.php");
require("adminheader.php")

?>

<head>

</head>

<body>



    <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

    </div>
    <div class="row">
        <div class="column">
            <div class="vertical-menu">
                <a href="administratorhomepagenew">Administrator Home</a>
                <div class="subnav">
                    <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
                    <div class="subnav-content">
                        <a href="view.php">View Products</a>
                        <a href="insert.php">Add Product</a>

                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="order.php">View Ongoing List Orders</a>
                        <a href="completeorder.php">View Complete List Orders</a>
                        <a href="view_cartorder.php">View Ongoing cart orders </a>
                        <a href="view_completecartorder.php">View Complete cart orders </a>
                    </div>
                </div>
                <a href="cat.php">Manage Product Categories</a>
                <a href="displayoffers.php">Manage Offers</a>
                <a href="viewcashierlist.php">Manage Cashiers</a>

                <a href="ViewSuggestions.php">View Suggestions</a>


                <a href="viewfeedback1.php">View feedback</a>

                <a href="GenerateReports.php" class="active">Generate Reports</a>
                <a href="viewcustomerdetails.php">View Customer details</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
        <div class="column">
        <div >
            <br>
            <a href="GenerateReports.php"> GO BACK </a>
            <form name="form" method="GET" action="report.php" enctype="multipart/form-data">
            <label>Starting date</label>
                  <input type="Date" name="start" id="start" />
                  <label>Ending Date</label>
                  <input type="date" name="end" id="end" />
                  <input name="submit" type="submit" value="Submit" />
            </form>
            </div>
            <?php if (isset($_GET['submit'])) {
                if (!empty($_GET)) {
                  require('mysqlconnect.php');
                  $count = 1;
                  $start = $_GET['start'];
                  $sdate = new DateTime($start);
                  $stime = new DateTime('00:00:00');

                  // Solution 1, merge objects to new object:
                  $starttime = new DateTime($sdate->format('Y-m-d') . ' ' . $stime->format('H:i:s'));

                  $s = $starttime->format('Y-m-d H:i:s');

                  $end = $_GET['end'];
                  $edate = new DateTime($end);
                  $etime = new DateTime('23:59:59');

                  // Solution 1, merge objects to new object:
                  $enddate = new DateTime($edate->format('Y-m-d') . ' ' . $etime->format('H:i:s'));

                  $e = $enddate->format('Y-m-d H:i:s');
                  $sql1 = "SELECT product_ID,product_name, sum(quantity) as total, COUNT(product_name) as `value_occurrence` FROM cartorder_details WHERE porder_date_time BETWEEN '$s' AND '$e' GROUP BY `product_name` ORDER BY `value_occurrence`  DESC LIMIT 1";
                 $result1= mysqli_query($db, $sql1);
                 ?>
                 <p> MOST SOLD PRODUCT  </p>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th><strong>Product ID</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>No Of Orders </strong></th </tr> </thead> <tbody>
                        <?php
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result1)) { ?>
                            <tr>
                                <td align="center"><?php echo $row["product_ID"]; ?></td>
                                <td align="center"><?php echo $row["product_name"]; ?></td>
        
                                <td align="center"><?php echo $row["total"]; ?></td>
                                <td align="center"><?php echo $row["value_occurrence"]; ?></td>
        
                            </tr>
                        <?php
                                    $count++;
                                } ?></tbody></table>
                    <h2>View Sales Records of Products</h2>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th><strong>Product ID</strong></th>
                                <th><strong>Product Name</strong></th>
                                <th><strong>Quantity</strong></th>
                                <th><strong>No Of Orders </strong></th>
                             </tr> </thead> <tbody>
                                <?php
                                $count = 1;
        
                                $sql = "SELECT product_ID,product_name, sum(quantity) as total, COUNT(product_name) as `value_occurrence` FROM cartorder_details   WHERE porder_date_time BETWEEN '$s' AND '$e' GROUP BY `product_name` ORDER BY `value_occurrence` ";
                                $result = mysqli_query($db, $sql);
        
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td align="center"><?php echo $row["product_ID"]; ?></td>
                                <td align="center"><?php echo $row["product_name"]; ?></td>
        
                                <td align="center"><?php echo $row["total"]; ?></td>
                                <td align="center"><?php echo $row["value_occurrence"]; ?></td>
        
                            </tr>
                        <?php
                                    $count++;
                                } ?>
                        </tbody>
                    </table>
<?php 
                }}
                else{ ?>
        <p> MOST SOLD PRODUCT  </p>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th><strong>Product ID</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>No Of Orders </strong></th> </tr> </thead> <tbody>
                        <?php
                        $count = 1;
           
                 $sql1 = "SELECT product_ID,product_name, sum(quantity) as total, COUNT(product_name) as `value_occurrence` FROM cartorder_details GROUP BY `product_name` ORDER BY `value_occurrence` DESC LIMIT 1";
                 $result1= mysqli_query($db, $sql1);
                 while ($row = mysqli_fetch_assoc($result1)) { ?>
                    <tr>
                        <td align="center"><?php echo $row["product_ID"]; ?></td>
                        <td align="center"><?php echo $row["product_name"]; ?></td>

                        <td align="center"><?php echo $row["total"]; ?></td>
                        <td align="center"><?php echo $row["value_occurrence"]; ?></td>

                    </tr>
                <?php
                            $count++;
                        } ?></tbody></table>
            <h2>View Sales Records of Products</h2>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th><strong>Product ID</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>No Of Orders </strong></th </tr> </thead> <tbody>
                        <?php
                        $count = 1;

                        $sql = "SELECT product_ID,product_name, sum(quantity) as total, COUNT(product_name) as `value_occurrence` FROM cartorder_details GROUP BY `product_name` ORDER BY `value_occurrence` ";
                        $result = mysqli_query($db, $sql);

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $row["product_ID"]; ?></td>
                        <td align="center"><?php echo $row["product_name"]; ?></td>

                        <td align="center"><?php echo $row["total"]; ?></td>
                        <td align="center"><?php echo $row["value_occurrence"]; ?></td>

                    </tr>
                <?php
                            $count++;
                        } ?>
                </tbody>
            </table>
                    <?php } ?>
            
                
            
            
        </div>
    </div> 
