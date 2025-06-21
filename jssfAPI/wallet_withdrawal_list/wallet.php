<?php
// Include the verifyToken file
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Now you can access the decoded token from the $_REQUEST array
global $getamt;

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token


    // Use try-catch block to handle potential PDO exceptions
    try {
        $getWalletAmt = $conn->prepare("SELECT amount FROM wallet WHERE `userid` = '$userid' ");
        $getWalletAmt->execute();

        // Check if the statement execution was successful
        if ($getWalletAmt) {
            $row = $getWalletAmt->fetch();
            $getamt = $row['amount'];

            if ($getamt) {

                echo json_encode(['status' => 200, 'message' => $getamt]);
            } else {
                echo json_encode(['status' => 404, 'message' => "No data found"]);
            }
        } else {
            echo json_encode(['status' => false, 'message' => "Error executing the query"]);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
}
