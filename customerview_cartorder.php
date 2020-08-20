<?php
session_start();
$email = $_SESSION['email_address'];
$username = $_SESSION['user_name'];


?>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product_cat').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });

        function loadPage() {
            var cat = document.getElementById("product_cat").value;
            switch (cat) {
                case 'Spices':
                    window.location.href = "spices.php";
                    break;
                default:
                    break;
            }
        }
    </script>


    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        .footer {
            position: left;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }

        .carousel-inner img {
            width: 100%;
            /* Set width to 100% */
            margin: auto;
            min-height: 200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }


        .bs-example {
            margin: 20px;
        }

        .responsive {
            max-width: 100%;
            height: auto;
        }


        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: center;
        }
    </style>
    <!-- <script src="https://kit.fontawesome.com/42deadbeef.js"></script>
    <link rel="stylesheet" href="AdministratorHomepage.css"> -->
</head>

<body>

    <div class="jumbotron" style="background-image:url(home.jpg); padding-bottom:57px;"><br><br>

        <div class="container text-center"><br><br>

            <!-- <h1>Singhe Super</h1>      
        <p>kawruth danna thena</p> -->
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="customer1.php">Home</a></li>
                    <li><a href="viewoffers.php">View Offers</a></li>
                    <li><a href="addFeedback.php">Add Feedback</a></li>
                    <li class=" nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> List Orders</a>
                        <ul class="dropdown-menu">
                            <li><a href="listorders" class="dropdown-item">place orders as a list</a></li>
                            <li><a href="vieworder" class="dropdown-item">View list orders</a></li>
                            

                        </ul>
                    </li>
                    <li class=" nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> view products</a>



                        <ul class="dropdown-menu">
                            <?php
                            require('mysqlconnect.php');
                            $getCategory = "select product_category from category";
                            $run_item = mysqli_query($db, $getCategory);

                            while ($data = mysqli_fetch_array($run_item)) {



                                $cat1 = '<li><a href="viewproducts.php?product_category=';
                                $cata = $data['product_category'];
                                $catd = '" class="dropdown-item">';
                                $catb = $data['product_category'];
                                $catc = '</a></li>';
                                $cat1 = $cat1 . $cata . $catd . $catb . $catc;
                                echo "$cat1";
                            }

                            ?>

                        </ul>
                    </li>
                    <li class=" nav-item dropdown active">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> Cart</a>
                        <ul class="dropdown-menu">
                            <li><a href="cart.php" class="dropdown-item">My Cart</a></li>
                            <li><a href="customerview_cartorder.php" class="dropdown-item">View Cart orders</a></li>
                        </ul>
                    </li>

                    <li>
                        <form class="navbar-form navbar-left" action="searchproduct.php" method="GET">
                            <div class="form-group">
                                <input type="text" name="product_name" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class=" nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="glyphicon glyphicon-user"></span> Hi <?php echo $_SESSION['user_name'] ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="" class="dropdown-item">Log Out</a></li>
                            <!-- <li><a href="" class="dropdown-item">Manage Account</a></li>                          -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">



        <?php
        require('mysqlconnect.php');
        // include("auth.php");
        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>View Cart orders</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">

        </head>

        <body>
            <!-- $product_ID="product_ID"; -->
            <div class="form">

                <h2>View Cart Orders</h2>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <!-- <th><strong>Number</strong></th> -->

                            <th><strong>Date and Time</strong></th>
                            <th><strong>Total amount</strong></th>
                            <th><strong>Order Status</strong></th>
                            <th><strong>View Order Details</strong></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;

                        $email = $_SESSION['email_address'];
                        $user = "select user_name from users where email_address='$email'";
                        $result = mysqli_query($db, $user);
                        $oneresult = $result->fetch_object();
                        $user_na = $oneresult->user_name;
                        $_SESSION["user_name"] = $user_na;
                        $sel_query = "Select * from cartorder where email_address='$email';";
                        $result = mysqli_query($db, $sel_query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>

                                <td align="center"><?php echo $row["porder_date_time"]; ?></td>
                                <td align="center"><?php echo $row["amount"]; ?></td>
                                <td align="center"><?php echo $row["cart_order_status"]; ?></td>
                                <td align="center">
                                    <a href="customerview_cartorderdetails.php?cartorderid=<?php echo $row["cartorderid"]; ?>">View details</a>
                                </td>


                            </tr>
                        <?php $count++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </body>

        </html>
    </div>



    <hr>
    <div class="container-fluid">
        <br>
        <div class="row">
            <img class="about" src="05.jpg" class="responsive">
        </div>
    </div>

    <br><br>



    <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:0px;" class="responsive"><br><br><br>

            <!-- <p>Footer Text</p> -->
    </footer>

</body>

</html>