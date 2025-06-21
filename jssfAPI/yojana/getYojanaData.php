<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';


if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      
        $YojanList = $conn->prepare("SELECT yojna_data.registration_no , transaction.type_trans , transaction.amount FROM `yojna_data` JOIN transaction ON transaction.userid = yojna_data.userid WHERE yojna_data.userid = '$userid'; ");
        $YojanList->execute();
        $getYojanList = $YojanList->fetch( \PDO::FETCH_ASSOC );
        $registration_no = $getYojanList['registration_no'];
        $getTypeTrans = $getYojanList['type_trans'];
        $getAmount = $getYojanList['amount'];

        if ($getYojanList) {
            echo json_encode(['status' => 200, 'yojna_data' => $registration_no , 'transaction' => $getTypeTrans , 'amount'=> $getAmount ]);
        } else {
            echo json_encode(['status' => 404, 'message' => 'No data found']);
        }
    } else {

        echo json_encode(['status' => 404, 'message' => 'Request_Method  not Supported']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
}
