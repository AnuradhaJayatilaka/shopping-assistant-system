

<html>
  <head>
    <title>Order Form Example</title>
    <link href="order.css" rel="stylesheet">
    <link rel="stylesheet" href="background.css">
    
  </head>
  <body>

  <a href="customer.php">Customer Home</a>
    <h1>Type your list</h1>
    <form method="post" action="listOrders2.php">
      <!-- <label for="username">Username:</label>
      <input type="text" name="username" required /> 
      <br><br> -->
       
      <label for="order_items">Type your items with the needed quantities. Example: Prima Flour 2kg. please Press enter after each item</label>
      <textarea name="order_items" required></textarea>
      <br><br>
      <input type="submit" value="Place Order"/>
    </form>
  </body>
</html>