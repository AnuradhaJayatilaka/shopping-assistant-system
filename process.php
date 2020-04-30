<?php 
require_once('mysqlconnect.php'); 
?>
<?php
if(isset($_POST)){
    $user_name = $_POST['user_name'];
    $email_address = $_POST['email_address'];
    $mobile_number = $_POST['mobile_number'];
    $user_type = $_POST['user_type'];
    $title = $_POST['title'];
    $NIC = $_POST['NIC'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users(`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password` )VALUES(?, ?, ?, ?, ?, ?, ?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([ $email_address, $user_name, $NIC,$user_type,  $mobile_number, $title, $password]);
    if($result){
        echo 'Successfully saved';
    }
    else{
        echo 'there were errors';
    }
}
else{
    echo 'no data';
}
?>
