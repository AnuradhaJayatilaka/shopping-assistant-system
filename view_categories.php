
<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>

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
| <a href="add_category.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Categories</h2>
<table class="table table-dark table-hover">
<thead>
<tr>
<!-- <th><strong>Number</strong></th> -->
<th><strong>Product Category</strong></th>
<th><strong>Category code</strong></th>
<th><strong>category description</strong></th>
<th><strong>image</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;






$sel_query="Select * from category ORDER BY cat_code desc;";
$result = mysqli_query($db,$sel_query);


$oneresult3 = $result->fetch_object();
$cat_image = $oneresult3->cat_image;

// while($run=mysqli_fetch_array($result)){
//     $cat_image=$run["cat_image"];
// }
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["product_category"]; ?></td>
<td align="center"><?php echo $row["cat_code"]; ?></td>
<td align="center"><?php echo $row["cat_description"]; ?></td>

<td align="center"><?php echo "<img src='img2/$cat_image' style='width:100x;'>";?> </td>
    </tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>