<?php
session_start();
include('../../configration/dbconnection.php');
$uid = $_POST['userid'];
$tranid = $_POST['tranid'];
$amt = trim($_POST['amt']);
$renewalPayment = 'renewal_payment';
$rps = '1';
$current_date = date('d-m-Y');


$getdate = $conn->prepare("UPDATE  master_user set renewal_date = '$current_date' , renewal_status = '1' WHERE user_uid = '$uid'");
$getdate->execute();

$sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount`,`type_trans`,`renewal_payment_status`)VALUES(:uid,:transid,:amt,:ty , :rps)");
$uploadtransition = $sql->execute(array(
    ':uid' => $uid,
    ':transid' => $tranid,
    ':amt' => $amt,
    ':ty' => $renewalPayment,
    ':rps' => $rps
));

// $getdate = $conn->prepare("UPDATE  `transaction` set type_trans = '$renewalPayment',  renewal_payment_status = '1' , amount = $amt WHERE user_uid = '$uid' ");
// $getdate->execute();

echo '001';

