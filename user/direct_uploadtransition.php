<?php
session_start();
include('../configration/dbconnection.php');
$uid = $_POST['userid'];
$payid = $_POST['tranid'];
$amt = trim($_POST['amt']);
$typeTrans = "directjoin_payment";
$direct_ref_amount = '25';
$current_date = date('d-m-Y');

$sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount`,`type_trans`)VALUES(:uid,:transid,:amt,:ty)");
$uploadtransition = $sql->execute(array(
    ':uid' => $uid,
    ':transid' => $payid,
    ':amt' => $amt,
    ':ty' => $typeTrans
));

if ($uploadtransition) {

    $result = $conn->query("UPDATE master_user set status = 'D' where user_uid = '$uid'; ");
    $result->execute();

    $getTranstionByDirectJoin = $conn->query("SELECT refid FROM node WHERE userid = '$uid' AND levelname = '2' ");
    $getTranstionByDirectJoin->execute();
    $getDate = $getTranstionByDirectJoin->fetch();

    $getrefId = $getDate['refid'];

    $sql = $conn->prepare("SELECT amount FROM wallet WHERE `userid` = '$getrefId' ");
    $sql->execute();
    $getrow = $sql->fetch();
    $getamount = $getrow['amount'];

    $getamount = $direct_ref_amount + $getamount;


    $results = $conn->query("UPDATE wallet set amount = '$getamount' where userid = '$getrefId'; ");
    $results->execute();

    echo '001';

    // $getdates = $conn->prepare(" SELECT type_trans , renewal_payment_status FROM `transaction` WHERE userid = '$uid' AND renewal_payment_status = '0' ");
    // $getdates->execute();
    // $date = $getdates->fetch();

    // $typeTrans = $date['type_trans'];
    // $renewalPayment = $date['renewal_payment_status'];
}
