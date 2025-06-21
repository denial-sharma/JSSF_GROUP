<?php
include('../../configration/dbconnection.php');
$asgnid = $_POST['asgnid'];
$upid = $_POST['upid'];
$insert = $conn->query("UPDATE `node` SET `manual_pool`= '$asgnid' WHERE `id` = $upid"); 
$insert->execute();
if($insert){ 
echo "Update Successfully";
}else{ 
echo "Something Went Wrong!!";
}
?>