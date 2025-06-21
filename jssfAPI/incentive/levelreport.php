<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';


if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token


    try {
       
        $sql = "SELECT * from node join master_user on node.userid = master_user.user_uid where node.refid = '$userid' and master_user.status = 'A' ";
        $result = $conn->query($sql);

        $organizedArray = array();
        $totalValuesCount = 0;
        $arrayPosition = 0;


        $recordsInEachElement = 3;

        if ($result->rowCount() > 0) {

            for ($i = 0; $row = $result->fetch(); $i++) {

                $organizedArray[$arrayPosition][] = $row;

                if (count($organizedArray[$arrayPosition]) >= $recordsInEachElement) {
                    $arrayPosition++;
                    $recordsInEachElement *= 3;
                }
                
            }
            echo json_encode(['status' => 200, 'message' => $organizedArray ]);
        } else {
            echo "No records found.";
        }
    } catch (\Throwable $th) {
        echo json_encode(['status' => 404, 'message' => "PDO Exception: " . $th->getmessage()]);
    }
} else {

    echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
}
