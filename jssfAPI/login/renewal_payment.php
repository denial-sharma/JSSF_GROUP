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

        
    $payid = $_POST['payment_id'];      
    $amt = trim($_POST['amt']);
    $typeTrans = "renewal_payment";
    
   
    $sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount`,`type_trans`)VALUES(:uid,:transid,:amt,:ty)");
    $uploadtransition = $sql->execute([
            ':uid' => $userid,
            ':transid' => $payid,
            ':amt' => $amt,
            ':ty' => $typeTrans
        ]);

    if($uploadtransition){
         
        $result = $conn->query("UPDATE master_user set status = 'A' where user_uid = '$userid'; "); 
        $result->execute();  

        echo json_encode(['status' => 200, 'message' => 'Payment Successfully Done ']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    echo json_encode(['status' => 422, 'message' => 'REQUEST METHOD IS NOT POST ']);
}
}else{
    http_response_code(403);  // Set response code to 403 Forbidden
    echo json_encode(['status' => 403, 'message' => 'You are not authorized user.']);
    }
