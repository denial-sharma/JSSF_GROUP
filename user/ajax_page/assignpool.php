<?php
include('../../configration/dbconnection.php');

$userid = $_POST['userid'];
$refid = trim($_POST['refidid']);
$insert = $conn->query("UPDATE `node` SET `manual_pool`= '$refid' WHERE `id` = $userid"); 
$insert->execute();
if($insert){ 
echo "Update Successfully";
}else{ 
echo "Something Went Wrong!!";
}
?>