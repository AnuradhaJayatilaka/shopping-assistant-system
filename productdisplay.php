

<!DOCTYPE html>

<html>

<head>

<style>

.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

  max-width: 300px;

  margin: auto;

  text-align: center;

  font-family: arial;

}

​

.price {

  color: grey;

  font-size: 22px;

}

​

.card button {

  border: none;

  outline: 0;

  padding: 12px;

  color: white;

  background-color: #000;

  text-align: center;

  cursor: pointer;

  width: 100%;

  font-size: 18px;

}

​

.card button:hover {

  opacity: 0.7;

}

</style>

</head>

<body>

​<?php
    require_once "mysqlconnect.php";
    session_start();
    $pname=$_SESSION['product_name'];
    $sql1="select * from products where product_name='salt'";
    $result1= mysqli_query($db,$sql1);
    $oneresult = $result1->fetch_object();
    $Product_name = $oneresult->product_name;
    $unit_price=$oneresult->unit_price;
    $description=$oneresult->description;
    $brand=$oneresult->brand;
    $quantity=$oneresult->quantity;
    

?>

<!-- <h2 style="text-align:center">"$Product_name"</h2> -->

​

<div class="card">

  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1><?php echo "$brand"?></h1>
  <h1><?php echo "$Product_name"?></h1>

  <p class="price">Rs.<?php echo "$unit_price"?></p>

  <p>Description:<?php echo "$description"?></p>
  <p>Available Quantity:<?php echo "$quantity"?></p>

  <p><button>Add to Cart</button></p>

</div>

​

</body>

</html>

​

