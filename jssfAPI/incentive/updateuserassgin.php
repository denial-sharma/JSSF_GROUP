<?php

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            //code...
            $manual_pool = trim($_POST['preantId']);
            $getUserId = trim($_POST['childId']);

            $result = $conn->query("UPDATE node set manual_pool = '$manual_pool' where userid = '$getUserId'; ");
            $result->execute();

            if ($result) {
                echo json_encode(['status' => 200, 'message' => 'User Assgin']);
            } else {
                echo json_encode(['status' => 404, 'message' => 'user Not Assgin']);
            }
        } catch (\Throwable $th) {
            echo json_encode(['status' => 404, 'message' => "PDO Exception: " . $th->getmessage()]);
        }
    } else {

        echo json_encode(['status' => 404, 'message' => 'Request_Method  not Supported']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
}
