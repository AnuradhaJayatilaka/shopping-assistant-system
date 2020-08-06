<?php
    require('connect.php');
    $fname=$_GET['fname'];
    $sql="select age from names where fname='$fname'";
    $result=mysqli_query($db,$sql);
    $oneresult = $result->fetch_object();
    $age=$oneresult->age;
     echo  "my age is". $age;
?>