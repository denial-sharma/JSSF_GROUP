<?php
include('../../configration/dbconnection.php');

$aadhar = $_POST['getAN'];

$getUserId = $conn->prepare(" SELECT masteruser_uid FROM `kyc` WHERE kyc_docnumber = $aadhar ");
$getUserId->execute();
$row = $getUserId->fetch();
$mamberUserId = $row['masteruser_uid'];
echo $mamberUserId;

?>