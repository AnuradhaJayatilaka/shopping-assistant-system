<?php
require('mysqlconnect.php');

?>

<?php
$status = "";

$product_ID=$_REQUEST['product_ID'];

$product_name =$_REQUEST['product_name'];
$unit_price =$_REQUEST['unit_price'];
$quantity =$_REQUEST['quantity'];

$update="UPDATE products SET 
product_name='$product_name', unit_price='$unit_price', quantity='$quantity'
 where product_ID='$product_ID'";
$result=mysqli_query($db, $update);
if($result){
    $status = "Record Updated Successfully. </br></br>
    <a href='view.php'>View Updated Record</a>";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
} 

else { die ( "error");}

// }
?>