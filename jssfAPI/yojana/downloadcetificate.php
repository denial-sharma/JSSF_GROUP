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



    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];
        $result = $conn->prepare("SELECT * FROM `yojna_data`  WHERE `userid`= '$userid' AND yojnaid = $id ");
        $result->execute();
        $row = $result->fetchAll();

        if ($row) {
            echo json_encode(['status' => 200, 'message' => $row]);
        } else {
            echo json_encode(['status' => 400, 'message' => 'No Data Found']);
        }

    } else {
        echo json_encode(['status' => 404, 'message' => 'Request_Method  not Supported']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => 422, 'message' => 'Missing parameter: decoded_token']));
}
