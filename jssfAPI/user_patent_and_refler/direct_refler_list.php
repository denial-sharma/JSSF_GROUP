<?php
// Include the verifyToken file
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
        $getdirectRefler = $conn->prepare("SELECT node.refid, master_user.user_name, master_user.created_at, master_user.user_uid FROM node JOIN master_user ON node.userid = master_user.user_uid WHERE node.refid = :userid ORDER BY master_user.user_name ASC");
        $getdirectRefler->bindParam(':userid', $userid, PDO::PARAM_STR);
        $getdirectRefler->execute();

        // Check if the statement execution was successful
        if ($getdirectRefler) {
            $directReflerList = $getdirectRefler->fetchAll(PDO::FETCH_ASSOC);

            if ($directReflerList) {
                echo json_encode(['status' => true, 'directrefler' => $directReflerList]);
            } else {
                echo json_encode(['status' => false, 'message' => "No data found"]);
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
