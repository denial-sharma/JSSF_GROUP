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

    
    $userList = $conn->prepare("SELECT * FROM master_user WHERE `user_uid` = '$userid' ");
    $userList->execute();
    $getuserList = $userList->fetch( \PDO::FETCH_ASSOC );
    $userEmail = $getuserList["user_email"];
    $usermobile = $getuserList["user_phone"];


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      
        $YojanList = $conn->prepare("SELECT * FROM `services` WHERE `id` = 11");
        $YojanList->execute();
        $getYojanList = $YojanList->fetchAll( \PDO::FETCH_ASSOC );

        if ($getYojanList) {
            echo json_encode(['status' => 200, 'message' => $getYojanList , 'userid' =>$userid , 'username' => $username , 'useremail' => $userEmail , 'usermobile' => $usermobile]);
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
