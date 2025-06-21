<?php
include('../../configration/dbconnection.php');

$user_uid = $_POST['userUid'];

$getdate = $conn->prepare(" SELECT renewal_date FROM `master_user` WHERE user_uid = '$user_uid' AND renewal_status = '0' ");
$getdate->execute();
$date = $getdate->fetch();
$joingdate = $date['renewal_date'];
$getjoingdate = date("d-m-Y", strtotime($joingdate));
echo $joingdate;

?>