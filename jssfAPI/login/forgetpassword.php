<?php
require '../header_file.php';
require '../connection/dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$getpass = $_POST['getpass'];
$userid = $_POST['userid'];

$updatePassword = $conn->prepare("UPDATE `master_user` SET `user_password` = '$getpass' WHERE `user_uid` = '$userid'");
$updatePassword->execute();

if($updatePassword){
    echo json_encode(["message" => "Password Update Successfuly" , "status" => 200]);
}else{
echo json_encode(["message" => "Something Went Wrong" , "status" => 404]);
}
} else {
    echo json_encode(["message" => "Request Method Is Not Post", "status" => 403]);
}



?>