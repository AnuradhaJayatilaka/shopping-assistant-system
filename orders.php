<?php
    require_once "mysqlconnect.php";
    $username=$order_items=$array=$orderid=" ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            //$username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        if(empty(trim($_POST["order_items"]))){
            //$order_items = "Please enter order items.";
        } else{
          $order_items=trim($_POST["order_items"]);
          $lines = explode("\n", $order_items);

          $sql="insert into orders (username) values ('$username')";
          if(mysqli_query($db, $sql)){
            echo "Records added successfully.";
            $sql="select count(orderid) from orders";
            if ($res = mysqli_query($db,$sql)) {
              $row = mysqli_fetch_row($res);
              $orderid = $row[0];
            }

            $product="";
            //$sql_od="insert into order_details (orderid,item) values ('$orderid','$product')";
            if ( !empty($lines) ) {
              foreach ( $lines as $line ) {
                
                $product= $line;
                $sql_od="insert into order_details (orderid,item) values ('$orderid','$product')";
                mysqli_query($db, $sql_od);
              }
            }  
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
          }
        }

    }
?>

<html>
  <head>
    <title>Order Form Example</title>
    <link href="order.css" rel="stylesheet">
  </head>
  <body>
    <h1>Order Form</h1>
    <form method="post" action="orders.php">
      <label for="username">Username:</label>
      <input type="text" name="username" required /> 
      <br><br>
      <label for="order_items">Type your items ..</label>
      <textarea name="order_items" required></textarea>
      <br><br>
      <input type="submit" value="Place Order"/>
    </form>
  </body>
</html>