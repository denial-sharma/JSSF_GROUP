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
        $getdirectjoin = $conn->prepare("SELECT node.refid,node.userid , transaction.transaction_id,transaction.amount,  master_user.id, master_user.user_name , master_user.user_uid FROM node join master_user on node.userid = master_user.user_uid 
									join transaction transaction on master_user.user_uid = transaction.userid
													Where node.levelname = '2'; ;");
        $getdirectjoin->execute();

        // Check if the statement execution was successful
        if ($getdirectjoin) {
            $getdirectjoinList = $getdirectjoin->fetchall(PDO::FETCH_ASSOC);
            if ($getdirectjoinList)

                echo json_encode(['status' => true, 'directjoinList' => $getdirectjoinList]);
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
