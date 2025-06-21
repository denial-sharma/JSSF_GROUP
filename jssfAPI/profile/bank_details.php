<?php
require '../header_file.php';
require '../connection/dbconnection.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';


if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];
   
    // $data = json_decode(file_get_contents("php://input"), true);

    // $bankName = $data['bankname'];  
    // $bankIFSC = $data['ifsc'];
    // $acountNumber = $data['acnumber'];
    // $holderName = $data['hodername'];

    $bankName = trim($_POST['bankname']);
    $bankIFSC = trim($_POST['ifsc']);
    $acountNumber = trim($_POST['acnumber']);
    $holderName = trim($_POST['hodername']);

    try {

        if ($userid != " ") {

            $update_masterUser = $conn->query("UPDATE `bankdetails` SET `bankname`= '$bankName', `ifsc_code` = '$bankIFSC',  `account_no`= '$acountNumber' , `holdername`= '$holderName' WHERE `userid` = '$userid' ");
            $update_masterUser->execute();

            if ($update_masterUser) {

                echo json_encode(['status' => 200, 'message' => ' User Bank Details updated successfully']);
            } else {
                echo json_encode(['status' => 404, 'message' => 'User Bank Details  updated Unsuccessfully']);
            }
        } else {

            echo json_encode(['status' => 402, 'message' => 'User ID Not Found']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 500, 'message' => "PDO Exception: " . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 422, 'message' => 'Missing parameter: decoded_token']);
}
