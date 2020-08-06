<?php
$dbhost = '127.0.0.1:3308';
$db_user = 'root';
$db_pass ='';
$db_name = 'users';
 
$db = mysqli_connect($dbhost, $db_user, $db_pass,$db_name);
if(!$db) {
    echo 'ERROR: ' . mysqli_connect_errno() . ': ' . mysqli_connect_error();
}
// echo'o';
?>