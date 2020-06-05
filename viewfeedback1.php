<?php
require('mysqlconnect.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Feedbacks</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    
<div class="form">
<p><a href="AdministratorHomepage.php">Admin Home</a> 
|  
| <a href="logout.php">Logout</a></p>
<h2>View Customer Feedback</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
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