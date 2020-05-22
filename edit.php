
<?php
require('mysqlconnect.php');
// include("auth.php");
$product_ID=$_REQUEST['product_ID'];
$query = "SELECT * from products where product_ID='".$product_ID."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$product_ID=$_REQUEST['product_ID'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['product_name'];
$age =$_REQUEST['unit_price'];
$submittedby = $_SESSION["product_name"];
$update="update new_record set trn_date='".$trn_date."',
product_name='".$name."', unit_price='".$age."',
submittedby='".$submittedby."' where product_ID='".$product_IDpr."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="product_ID" type="hidden" value="<?php echo $row['product_ID'];?>" />
<p><input type="text" name="product_name" placeholder="Enter Name" 
required value="<?php echo $row['product_name'];?>" /></p>
<p><input type="text" name="unit_price" placeholder="Enter Age" 
required value="<?php echo $row['unit_price'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>