<?php

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token'];
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token


        try {

            $result = $conn->query("SELECT * FROM `node` INNER JOIN master_user on master_user.user_uid = node.userid  WHERE node.refid = '$userid' and master_user.`status`='A'  ");
            $result->execute();
            // Check if there are any records
            if ($result->rowCount() > 0) {
                $users = [];

                // Fetch the results and store them in an array
                while ($row = $result->fetch()) {
                    $users[] = $row;
                }

                // Convert the array to JSON and send it as the API response
                echo json_encode(['status' => 200, 'message' => $users]);
            } else {
                // No records found
                echo json_encode(['status' => 400, 'message' => 'No users found']);
            }
        } catch (\Throwable $th) {
            echo json_encode(['status' => 404, 'message' => "PDO Exception: " . $th->getmessage()]);
        }
    } else {

        echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
    }
} else {

    echo json_encode(['status' => false, 'message' => 'Request Method are Not Supported']);
}
