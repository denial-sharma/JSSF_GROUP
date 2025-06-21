<?php
session_start();
include('../configration/dbconnection.php');
$uid = $_POST['userid'];
$payid = $_POST['tranid'];
$amt = trim($_POST['amt']);
$typeTrans = "login_payment";
$renewalPayment = 'renewal_payment';
$current_date =date('d-m-Y');

$sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount`,`type_trans`)VALUES(:uid,:transid,:amt,:ty)");
$uploadtransition = $sql->execute(array(
    ':uid' => $uid,
    ':transid' => $payid,
    ':amt' => $amt,
    ':ty' => $typeTrans
));

if ($uploadtransition) {

    $result = $conn->query("UPDATE master_user set status = 'A' where user_uid = '$uid' ");
    $result->execute();
    echo '001';
}


$getdate = $conn->prepare(" SELECT type_trans , renewal_payment_status FROM `transaction` WHERE user_uid = '$user_uid' AND renewal_payment_status = '0' ");
$getdate->execute();
$date = $getdate->fetch();

    $typeTrans = $date['type_trans'];
    $renewalPayment = $date['renewal_payment_status'];

