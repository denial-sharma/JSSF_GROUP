<?php

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token


if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Get user id from the decoded token

    // $data = json_decode(file_get_contents("php://input"), true);

    // $userid = $data['userid'];
    // $userName = $data['user_name'];
    // $user_dob = $data['dob'];
    // $user_gender = $data['gender'];
    // $pincode = $data['pincode'];
    // $user_mob_no = $data['mobile_no'];
    // $user_email = $data['email_id'];
    // $user_address1 = $data['address_1'];
    // $user_address2 = $data['address_2'];
    // $user_city = $data['city'];
    // $user_state = $data['state'];
    // $user_doc_no = $data['doc_no'];
    // $user_nomi_name = $data['nomi_name'];
    // $user_image = $data['profiledata'];

    // $userid = trim($_POST['userid']);
    $userName = trim($_POST['user_name']);
    $user_dob = trim($_POST['dob']);
    $user_gender = trim($_POST['gender']);
    $pincode = trim($_POST['pincode']);
    $user_mob_no = trim($_POST['mobile_no']);
    $user_email = trim($_POST['email_id']);
    $user_address1 = trim($_POST['address_1']);
    $user_address2 = trim($_POST['address_2']);
    $user_city = trim($_POST['city']);
    $user_state = trim($_POST['state']);
    $user_doc_no = trim($_POST['doc_no']);
    $user_nomi_name = trim($_POST['nomi_name']);
    $user_image = trim($_POST['profiledata']);


    try {
        if (!empty($userid)) {

            $insert = $conn->query("UPDATE `master_user` SET `user_name`= '$userName' , `photo` = '$user_image', `user_dob`= '$user_dob' , `user_gender`= '$user_gender' , `user_phone`= '$user_mob_no'
            ,`user_email`= '$user_email' , `user_add1`= '$user_address1', `user_add2`= '$user_address2' ,`user_city`= '$user_city', `user_state`= '$user_state' , `pincode` = $pincode WHERE `user_uid` = '$userid' "); 
            $insert->execute();
            
            $insert_KYC = $conn->query("UPDATE `kyc` SET  `kyc_docnumber`= '$user_doc_no' WHERE `masteruser_uid` = '$userid'"); 
            $insert_KYC->execute();
            
            $insert_nomies = $conn->query("UPDATE `reg_user` SET  `nomini_name`= '$user_nomi_name' WHERE `masteruser_uid` = '$userid'"); 
            $insert_nomies->execute();
            
                    http_response_code(200);  
                    echo json_encode(["message" => "Profile Update Successfully.", "status" => 200]);
                } else {
                    http_response_code(404); 
                    echo json_encode(['status' => 404, 'message' => 'User Profile  updated Unsuccessfully']);
                }
        
    } catch (Exception $e) {
        http_response_code(500);  // Set response code to 500 Internal Server Error
        die(json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]));
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
}
}else{
http_response_code(403);  // Set response code to 403 Forbidden
die(json_encode(['status' => false, 'message' => 'You are not authorized user.']));
}