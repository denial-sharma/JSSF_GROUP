<?php
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials:true');
header('Content-Type:application/json');

require '../phpjwt/src/JWT.php';
require '../connection/dbconnection.php';

use Firebase\JWT\JWT;

$uid = '1';
// $spon_id = trim($_POST['spon_id']);
$ref_id = trim($_POST['ref_id']);
$username = trim($_POST['user_name']);
$user_dob = trim($_POST['dob']);
$user_gender = trim($_POST['gender']);
$pincode = trim($_POST['pincode']);
$userphone = trim($_POST['mobile_no']);
$useremail = trim($_POST['email_id']);
$user_address1 = trim($_POST['address_1']);
$user_address2 = trim($_POST['address_2']);
$user_city = trim($_POST['city']);
$user_state = trim($_POST['state']);
$user_password = trim($_POST['password']);
$status = 'P';
$user_doc_no = trim($_POST['doc_no']);
$user_nomi_name = trim($_POST['nomi_name']);

$kycValidation = $conn->prepare("SELECT `kyc_docnumber` FROM kyc where `kyc_docnumber` = $user_doc_no ");
// $kycValidation->bindParam(':user_doc_no', $user_doc_no, PDO::PARAM_STR);
$kycValidation->execute();

if ($kycValidation->rowCount() > 0) {
    echo json_encode(["message" => "Document no already exists", "status" => 401]);
} else {
    $sql = "INSERT INTO `master_user`(`user_name`, `user_dob`, `user_gender`, `user_phone`,`user_email`, `user_add1`,`user_add2`,
            `pincode`, `user_city`,`user_state`,`user_uid`,`user_password`,`status`) VALUES
            (:u_name, :u_dob, :u_gender, :u_phone, :u_email, :u_add1, :u_add2, :u_pin, :u_city, :u_state, :uid ,:u_pass ,:sts)";
    $new_user = $conn->prepare($sql);
    $insertvisitor = $new_user->execute(
        [
            ':u_name' => $username,
            ':u_dob' => $user_dob,
            ':u_gender' => $user_gender,
            ':u_phone' => $userphone,
            ':u_email' => $useremail,
            ':u_add1' => $user_address1,
            ':u_add2' => $user_address2,
            ':u_pin' => $pincode,
            ':u_city' => $user_city,
            ':u_state' => $user_state,
            ':uid' => $uid,
            ':u_pass' => $user_password,
            ':sts' => $status
        ]
    );

    if ($username != '') {
        $lastInstedID = $conn->lastInsertId();
        $user_uid = 'JSSF' . str_pad($lastInstedID, 4, '0', STR_PAD_LEFT);
        $update_masterUser = $conn->query("UPDATE `master_user` SET  `user_uid` = '$user_uid' WHERE id = $lastInstedID");
        $update_masterUser->execute();

        if ($update_masterUser) {

            $insertKyc = "INSERT INTO `kyc`(`masteruser_uid`, `kyc_docnumber`) VALUES(:u_master_id, :u_doc_num)";
            $kyc_details = $conn->prepare($insertKyc);
            $insert_kyc = $kyc_details->execute(
                [
                    ':u_master_id' => $user_uid,
                    ':u_doc_num' => $user_doc_no
                ]
            );


            $insertNomini = "INSERT INTO `reg_user`(`masteruser_uid`, `nomini_name`) VALUES(:u_master_id, :u_nomi_name)";
            $nominee_details = $conn->prepare($insertNomini);
            $insert_nominee = $nominee_details->execute(
                [
                    ':u_master_id' => $user_uid,
                    ':u_nomi_name' => $user_nomi_name
                ]
            );

            $insertNode = "INSERT INTO `node`(`userid`, `refid`, `levelname`) VALUES (:u_master_id, :u_refid, :u_lvl)";
            $node_detail = $conn->prepare($insertNode);
            $insert_node = $node_detail->execute(
                [
                    ':u_master_id' => $user_uid,
                    ':u_refid' => $ref_id, 
                    ':u_lvl' => '2'
                ]
            );

            $insertBankDetail = "INSERT INTO `bankdetails`(`userid`) VALUES (:u_master_id)";
            $bankDetails = $conn->prepare($insertBankDetail);
            $bankDetails->execute(
                [
                    ':u_master_id' => $user_uid,
                ]
            );

           

            $key = 'Ubro$oftJSSF';

            $payload = [
                "userId" => $user_uid,
                "phone" => $userphone,
                "email" => $useremail,
                "username" => $username,
            ];

            if ($insert_node) {
                $jwt = JWT::encode($payload, $key, 'HS256');

                echo json_encode(["message" => "User registered successfully.", "status" => 200, "accessToken" => $jwt, "userid" => $user_uid]);
            } else {
                http_response_code(401);
                echo json_encode(["message" => "Failed to register user", "status" => 401]);
            }
        }
    } else {
        echo json_encode(["message" => "Please Fill all field", "status" => 401]);
    }
}
