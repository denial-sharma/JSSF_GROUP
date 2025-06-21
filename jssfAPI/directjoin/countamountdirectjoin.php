<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Now you can access the decoded token from the $_REQUEST array

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token


    // Use try-catch block to handle potential PDO exceptions
    try {

        $sql = $conn->prepare("SELECT count(userid) as directjoin  FROM node where refid = '$userid' AND levelname = '2' ");
        $sql->execute();
        $row = $sql->fetch();

        // Check if the statement execution was successful
        if ($sql) {
           $totalUser = $row['directjoin'] ;
        //    $totalAmount = $row * 25;
       
            if ($row)
                echo json_encode(['status' => true, 'message' => $totalUser]);
        } else {
            http_response_code(404);  // Set response code to 404 Not Found
            echo json_encode(['status' => false, 'message' => "No data found"]);
        }
    } catch (PDOException $e) {
        http_response_code(500);  // Set response code to 500 Internal Server Error
        echo json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
}
