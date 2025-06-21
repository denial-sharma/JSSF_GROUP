<?php
require '../header_file.php';
require '../connection/dbconnection.php';



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $aadhar = $_POST['getAN'];

    $getUserId = $conn->prepare(" SELECT masteruser_uid FROM `kyc` WHERE kyc_docnumber = $aadhar ");
    $getUserId->execute();
    $row = $getUserId->fetch();
    $mamberUserId = $row['masteruser_uid'];
    
    echo json_encode(["message" => $mamberUserId , "status" => 200]);
    } else {
        echo json_encode(["message" => "Aadhar card Not Found", "status" => 404]);
    }

