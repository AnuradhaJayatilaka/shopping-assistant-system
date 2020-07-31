<?php
require('mysqlconnect.php');

?>

<?php
$status = "";

$offerid=$_REQUEST['offerid'];

$offer =$_REQUEST['offer'];
$conditions =$_REQUEST['conditions'];


$update="UPDATE offers SET 
offer='$offer', conditions='$conditions'
 where offerid='$offerid'";
$result=mysqli_query($db, $update);
if($result){
    $status = "Record Updated Successfully. </br></br>
    <a href='displayoffers.php'>View Updated Record</a>";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
} 

else { die ( "error");}

// }
?>