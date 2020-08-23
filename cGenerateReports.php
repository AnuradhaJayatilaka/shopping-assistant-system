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


                <a href="cViewSuggestions.php">View Suggestions</a>


                <a href="cviewfeedback1.php">View feedback</a>

                <a href="cGenerateReports.php" class="active">Generate Reports</a>
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
                <h1>Sales Details</h1>
                <div>
                    <form action="cGenerateReports.php" method="GET">
                        <label>Starting date</label>
                        <input type="Date" name="start" id="start" />
                        <label>Ending Date</label>
                        <input type="date" name="end" id="end" />
                        <input name="submit" type="submit" value="Submit" />
                    </form>
                </div>
                <div class="row">
                    <panel>
                    <div class="column">
                        <div class="form">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th><strong>Order ID</strong></th>
                                        <th><strong>Total amount</strong></th>
                                        <th><strong>Order Date</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalsales1 = 0;
                                    $nooforders1 = 0;
                                    if (isset($_GET['submit'])) {
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
                                            $endtime = new DateTime($edate->format('Y-m-d') . ' ' . $etime->format('H:i:s'));
                                            $e = $endtime->format('Y-m-d H:i:s');
                                            $sql1 = "SELECT * FROM cartorder WHERE porder_date_time BETWEEN '$s' AND '$e'";
                                            $result1 = mysqli_query($db, $sql1);
                                            $nooforders1 = mysqli_num_rows($result1);
                                            while ($row = mysqli_fetch_assoc($result1)) { ?>
                                                <tr>
                                                    <td align="center"><?php echo $row["cartorderid"]; ?></td>
                                                    <td align="center"><?php echo $row["amount"]; ?></td>
                                                    <td align="center"><?php echo $row["porder_date_time"]; ?></td>
                                                    <?php $totalsales1 = $totalsales1 + $row["amount"]; ?>
                                                    <p>Total Number of orders placed by the cart:<?php echo $nooforders1; ?></p>
                                                    <p>Total sales revenue of cart orders:<?php echo $totalsales1; ?></p>
                                                </tr>
                                            <?php $count++;
                                            } ?>
                                            </tr>
                                        <?php $count++;
                                        }
                                    } else {
                                        $count = 1; ?>
                                        <h2>The sales details of last 24 hours</h2>
                                        <?php
                                        $sql2 = "SELECT * FROM cartorder   WHERE cartorder.porder_date_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                                        $result2 = mysqli_query($db, $sql2);
                                        $nooforders1 = mysqli_num_rows($result2);
                                        while ($row = mysqli_fetch_assoc($result2)) { ?>
                                            <tr>
                                                <td align="center"><?php echo $row["cartorderid"]; ?></td>
                                                <td align="center"><?php echo $row["amount"]; ?></td>
                                                <td align="center"><?php echo $row["porder_date_time"]; ?></td>
                                                <?php $totalsales1 = $totalsales1 + $row["amount"]; ?>

                                            </tr>
                                        <?php $count++;
                                        } ?>
                                        <p>Total Number of orders placed by the cart:<?php echo $nooforders1; ?></p>
                                        <p>Total sales revenue of cart orders:<?php echo $totalsales1; ?></p>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <br><br><br>
                        </div>
                    </div>
                    <div class="column"><br><br><br><br><br><br><br><br><br></div>
                    <div class="column">
                        <?php
                        require('mysqlconnect.php');
                        ?>
                        <div class="form">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th><strong>Order ID</strong></th>
                                        <th><strong>Total amount</strong></th>
                                        <th><strong>Order Date</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalsales2 = 0;
                                    $nooforders2 = 0;
                                    if (isset($_GET['submit'])) {
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
                                            $endtime = new DateTime($edate->format('Y-m-d') . ' ' . $etime->format('H:i:s'));
                                            $e = $endtime->format('Y-m-d H:i:s');
                                            $sql1 = "SELECT * FROM orders WHERE date_time BETWEEN '$s' AND '$e' and order_status='Complete'";
                                            $result1 = mysqli_query($db, $sql1);
                                            $nooforders2 = mysqli_num_rows($result1);
                                            while ($row = mysqli_fetch_assoc($result1)) { ?>
                                                <tr>
                                                    <td align="center"><?php echo $row["orderid"]; ?></td>
                                                    <td align="center"><?php echo $row["amount"]; ?></td>
                                                    <td align="center"><?php echo $row["date_time"]; ?></td>
                                                    <?php $totalsales2 = $totalsales2 + $row["amount"]; ?>

                                                </tr>
                                            <?php $count++;
                                            } ?>
                                            <p>Total Number of orders placed as list:<?php echo $nooforders2; ?></p>
                                            <p>Total sales revenue of list orders:<?php echo $totalsales2; ?></p>
                                            </tr>
                                        <?php $count++;
                                        }
                                    } else {
                                        $count = 1; ?>
                                        <h2>The sales details of last 24 hours</h2>
                                        <?php
                                        $sql2 = "SELECT * FROM orders   WHERE orders.date_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY) and order_status='Complete'";
                                        $result2 = mysqli_query($db, $sql2);
                                        $nooforders2 = mysqli_num_rows($result2);
                                        while ($row = mysqli_fetch_assoc($result2)) { ?>
                                            <tr>
                                                <td align="center"><?php echo $row["orderid"]; ?></td>
                                                <td align="center"><?php echo $row["amount"]; ?></td>
                                                <td align="center"><?php echo $row["date_time"]; ?></td>
                                                <?php $totalsales2 = $totalsales2 + $row["amount"]; ?>

                                            </tr>
                                        <?php $count++;
                                        } ?>
                                        <p>Total Number of orders placed as list:<?php echo $nooforders2; ?></p>
                                        <p>Total sales revenue of list orders:<?php echo $totalsales2; ?></p>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br><br><br>
                        </div>
                                </panel>

                    </div>
                </div>
            </body>

            </html>
            <div class="row"> <?php
                                $totalsales = $totalsales1 + $totalsales2;
                                $nooforders = $nooforders1 + $nooforders2;
                                ?>
                <br><br><br>
                <?php
                if (isset($_GET['submit'])) {
                    if (!empty($_GET)) {
                        $start = $_GET['start'];
                        $end = $_GET['end']; ?>
                        <h3>Summary of sales between<?php echo $start ?> and <?php echo $end ?></h3>
                        <p>Total Number of orders :<?php echo $nooforders; ?></p>
                        <p>Total sales revenue:<?php echo $totalsales; ?></p>
                    <?php }
                } else {
                    ?>
                    <h3>Summary of sales of last 24 hours</h3>
                    <p>Total Number of orders :<?php echo $nooforders; ?></p>
                    <p>Total sales revenue:<?php echo $totalsales; ?></p>
                <?php

                } ?>
            </div>
            
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