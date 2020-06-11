<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="background.css"><link rel="stylesheet" href="background.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Orders</h2>
<table class="table table-dark table-hover" id="table">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Order ID</strong></th>
<th><strong>Username</strong></th>
<th><strong>Date and Time</strong></th>
<th><strong>Total amount</strong></th>
<th><strong>Order Status</strong></th>
<th><strong>View Order Details</strong></th>
<th><strong>Change Order Status</strong></th>



</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from orders where order_status='incomplete';";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["orderid"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["date_time"]; ?></td>
<td align="center"><?php echo $row["amount"]; ?></td>
<td align="center"><?php echo $row["order_status"]; ?></td>
<td align="center">

<select name="status" id="status" onChange="OnSelectionChange(this)">
  <option value="incomplete">Incomplete</option>
  <option value="processing">Processing</option>
  <option value="packaging">Packaging</option>
  <option value="completed">Completed</option>
</select>
</td>
<td align="center">
<a href="order1.php?orderid=<?php echo $row["orderid"]; ?>">View details</a>
</td>


</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<script>

var orderid='';
  var table = document.getElementById('table');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         orderid=(this.cells[0].innerHTML);
                    };
                }
 function OnSelectionChange($this)
 {

  alert($this.value + " "+orderid);
  // jQuery.ajax({
  //   type: "POST",
  //   url: 'editstatus.php',
  //   dataType: 'json',
  //   data: {status:$this.value, order:orderid}
  
  // })
}

</script>
</body>
</html>