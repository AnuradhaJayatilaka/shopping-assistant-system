
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
<link rel="stylesheet" href="background.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- $product_ID="product_ID"; -->
<div class="form">
    
<p><a href="AdministratorHomepage.php">Admin Home</a> 
| <a href="insertoffers.php">Insert New offer</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Offers</h2>
<table class="table table-dark table-hover">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Offer ID</strong></th>
<th><strong>Offer</strong></th>
<th><strong>Conditions</strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from offers ORDER BY offerid desc;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["offerid"]; ?></td>
<td align="center"><?php echo $row["offer"]; ?></td>
<td align="center"><?php echo $row["conditions"]; ?></td>

<td align="center">
<a href="editoffer.php?offerid=<?php echo $row["offerid"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteoffer.php?offerid=<?php echo $row["offerid"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>