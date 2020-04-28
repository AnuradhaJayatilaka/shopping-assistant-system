<?php
$dbhost = '127.0.0.1:3308';
$db_user = 'root';
$db_pass ='';
$db_name = 'singhe_super';
 
$db = new PDO("mysql:host=$dbhost;dbname=$db_name", $db_user,$db_pass);
echo 'ok';
//$db-> setAttribut(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>