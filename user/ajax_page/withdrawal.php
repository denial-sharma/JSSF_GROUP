<?php

include('../../configration/dbconnection.php');

$userid = $_POST['userid'];
$amts = $_POST['amtWithrawal'];

$selectWalletRefler = $conn->prepare("SELECT count(*) as countActiveUser FROM `master_user` JOIN node ON master_user.user_uid = node.userid WHERE master_user.status = 'A' AND node.refid = '$userid' ");
$selectWalletRefler->execute();

$refId = $selectWalletRefler->fetch();
$Active = $refId['countActiveUser'];
if ($Active <= 3) {
  echo '105';
  return;
}

$getBankDetails = $conn->prepare("SELECT * FROM bankdetails");
$getBankDetails->execute();
if ($getBankDetails->rowCount() < 0) {
  echo '103';
  return;
}
$getWithdrawalDetails = $conn->prepare("SELECT * FROM withdrawal WHERE `userid`= '$userid' AND `status` = 'P'");
$getWithdrawalDetails->execute();
if ($getWithdrawalDetails->rowCount() > 0) {
  echo '104';
  return;
} else {
  $sql = $conn->prepare("SELECT amount FROM wallet WHERE `userid` = '$userid' ");
  $sql->execute();
  $getrow = $sql->fetch();
  $getamount = $getrow['amount'];
  $totalAmount = $getamount - $amts;

  if ($totalAmount >= 0) {
    $updateWallet = $conn->prepare("UPDATE wallet SET `amount` = $totalAmount WHERE userid = '$userid' ");
    $updateWallet->execute();
    if ($updateWallet) {
      $insertWithdrawal = $conn->prepare("INSERT INTO withdrawal(`userid` , `amount` , `status`)VALUES('$userid',$amts,'P')");
      $insertWithdrawal->execute();
      echo '101';
    }
  } else {
    echo '102';
  }
}
