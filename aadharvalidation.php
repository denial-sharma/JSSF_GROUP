<?php

include('configration/dbconnection.php');

$kycValidation = $conn->prepare("SELECT kyc_docnumber FROM kyc");
     $kycValidation->execute();
     $kycVRow = $kycValidation->fetch();

     $jsonData = json_encode($kycVRow);
     echo $jsonData;
?>