<?php
session_start();
    require_once "mysqlconnect.php";
    // $product_ID=$_REQUEST['product_ID'];
    // $trn_date = date("Y-m-d H:i:s");
    $email= $_SESSION['email_address'];
    $sql1= "SELECT user_name FROM users WHERE email_address='$email'";
    $result=mysqli_query($db, $sql1);
    $oneresult= $result->fetch_object();
    $username= $oneresult->user_name;
    $_SESSION["user_name"] = $username; 

    // $user_category = "SELECT user_type FROM users WHERE email_address='$email'";
    //                         // echo "$user_type";
    //                         $result=mysqli_query($db, $user_category);
    //                         $oneresult= $result->fetch_object();
    //                         $user_type= $oneresult->user_type;
    //                         $_SESSION["user_type"] = $user_type;

    // $username= $_SESSION['username'];
    $order_items=$orderid=" ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
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