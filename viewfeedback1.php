<?php
require('mysqlconnect.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Feedbacks</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="background.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="form">
<p><a href="AdministratorHomepage.php">Admin Home</a> 
|  
| <a href="logout.php">Logout</a></p>
<h2>View Customer Feedback</h2>
<table class="table table-dark table-hover">
<thead>
<tr>

<th><strong>Customer Name</strong></th>
<th><strong>Feedback Date</strong></th>
<th><strong>Feedback on products</strong></th>
<th><strong>Feedback on staff and services</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from feedback ORDER BY date_time desc;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["date_time"]; ?></td>
<td align="center"><?php echo $row["productfeedback"]; ?></td>
<td align="center"><?php echo $row["stafffeedback"]; ?></td>


</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>