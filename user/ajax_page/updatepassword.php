<?php
include('../../configration/dbconnection.php');

$getpass = $_POST['getpass'];
$userid = $_POST['userid'];

$updatePassword = $conn->prepare("UPDATE `master_user` SET `user_password` = '$getpass' WHERE `user_uid` = '$userid'");
$updatePassword->execute();

if($updatePassword){
    echo '002';
}




?>