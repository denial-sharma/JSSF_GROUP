<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token
    $username = $yourArray['username'];



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $payid = trim($_POST['payment_id']);
        $amt = trim($_POST['amt']);
        $tranType = 'Yojana';

        $sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount` , `type_trans`)VALUES(:uid,:transid,:amt , :ty)");
        $uploadtransition = $sql->execute(array(
            ':uid' => $userid,
            ':transid' => $payid,
            ':amt' => $amt,
            ':ty' => $tranType
        ));

        if ($uploadtransition) {
            echo json_encode(['status' => 200, 'message' => 'Payment Successfully Done']);
        } else {
            echo json_encode(['status' => 400, 'message' => 'Payment UnSuccessfully ']);
        }
    } else {

        echo json_encode(['status' => 404, 'message' => 'Request_Method  not Supported']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
}
