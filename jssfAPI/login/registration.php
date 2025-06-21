<?php
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials:true');
header('Content-Type:application/json');

require '../phpjwt/src/JWT.php';
require '../connection/dbconnection.php';

use Firebase\JWT\JWT;

$uid = '1';
$spon_id = trim($_POST['spon_id']);
$ref_id = trim($_POST['ref_id']);
$user_Name = trim($_POST['user_name']);
$user_dob = trim($_POST['dob']);
$user_gender = trim($_POST['gender']);
$pincode = trim($_POST['pincode']);
$user_mob_no = trim($_POST['mobile_no']);
$user_email = trim($_POST['email_id']);
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
            ':u_name' => $user_Name,
            ':u_dob' => $user_dob,
            ':u_gender' => $user_gender,
            ':u_phone' => $user_mob_no,
            ':u_email' => $user_email,
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

    if ($user_Name != '') {
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

            $insertNode = "INSERT INTO `node`(`userid`, `refid`, `sponcerid`) VALUES (:u_master_id, :u_refid, :u_spon)";
            $node_detail = $conn->prepare($insertNode);
            $insert_node = $node_detail->execute(
                [
                    ':u_master_id' => $user_uid,
                    ':u_refid' => $ref_id,
                    ':u_spon' => $spon_id,
                ]
            );

            $insertBankDetail = "INSERT INTO `bankdetails`(`userid`) VALUES (:u_master_id)";
            $bankDetails = $conn->prepare($insertBankDetail);
            $bankDetails->execute(
                [
                    ':u_master_id' => $user_uid,
                ]
            );

            $sql_1 = $conn->prepare('SELECT * FROM magic_tree WHERE left_child IS NULL OR right_child IS NULL OR center_child IS NULL LIMIT 1');
            $sql_1->execute();
            $row = $sql_1->fetch();

            if ($row) {
                $getID = $row['id'];
                // Update left_child_id or right_child_id
                if ($row['left_child'] == null) {
                    $updatedField = 'left_child';
                } else if ($row['center_child'] == null) {
                    $updatedField = 'center_child';
                } else {
                    $updatedField = 'right_child';
                }
                // $updatedField = ($row['left_child_id'] === null) ? 'left_child_id' : 'right_child_id';
                // $newChildValue = 10; // Replace with the actual value you want to assign

                // Update the database
                $conn->query("UPDATE magic_tree SET $updatedField = '$user_uid' WHERE id = $getID");

                // Update the binary tree

            }

            $key = 'Ubro$oftJSSF';

            $payload = [
                "userId" => $user_uid,
                "phone" => $user_mob_no,
                "email" => $user_email,
                "username" => $user_Name,
            ];

            if ($insert_node) {
                $jwt = JWT::encode($payload, $key, 'HS256');

                echo json_encode(["message" => "User registered successfully.", "status" => 200, "accessToken" => $jwt, "userid"=>$user_uid]);
            } else {
                http_response_code(401);
                echo json_encode(["message" => "Failed to register user", "status" => 401]);
            }
        }
    } else {
        echo json_encode(["message" => "Please Fill all field", "status" => 401]);
    }
}
