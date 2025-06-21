<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';


if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token

    // $data = json_decode(file_get_contents("php://input"), true);
       
    // $payid = $data['payment_id'];      
    // $amt = $data['amt'];
    // $tranType = 'donation';


    // $uid = trim($_POST['userid']);      
    $payid = trim($_POST['payment_id']);      
    $amt = trim($_POST['amt']);
    $tranType = 'donation';


    // Use try-catch block to handle potential PDO exceptions
    try {
        $insertDonation = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount` , `type_trans`)VALUES(:uid,:transid,:amt , :ty)");
        $uploadtransition = $insertDonation->execute([
            ':uid' => $userid,
            ':transid' => $payid,
            ':amt' => $amt,
            ':ty' => $tranType
        ]);

        if($uploadtransition){
            echo json_encode([ "status" => 200, "message" =>  "Transaction Successful"]);  
        }else{
            echo json_encode([ "status" => 404, "message"=> "Something went wrong! Transaction failed."]);    
        }
    
    } catch (PDOException $e) {
        http_response_code(500);  // Set response code to 500 Internal Server Error
        die(json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]));
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
}
