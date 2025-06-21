<?php

include('configration/dbconnection.php');
session_start();
$uid = '1';
// $spon_id = trim($_POST['spon_id']);
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
// $user_password = trim($_POST['password']);
$status = 'P';
$user_doc_no = trim($_POST['doc_no']);
$user_nomi_name = trim($_POST['nomi_name']);


$kycValidation = $conn->prepare("SELECT `kyc_docnumber` FROM kyc where `kyc_docnumber` = '$user_doc_no' ");
$kycValidation->execute();
if ($kycValidation->rowCount() > 0) {
    echo "406 ";
} else {
    $sql = "INSERT INTO `master_user`(`user_name`, `user_dob`, `user_gender`, `user_phone`,`user_email`, `user_add1`,`user_add2`,
            `pincode`, `user_city`,`user_state`,`user_uid`,`status`) VALUES
        (:u_name, :u_dob, :u_gender, :u_phone, :u_email, :u_add1, :u_add2, :u_pin, :u_city, :u_state, :uid ,:sts)";
    $new_user = $conn->prepare($sql);
    $insertvisitor = $new_user->execute(
        array(
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
            ':sts' => $status
        )
    );

    if ($insertvisitor) {

        $last_id = $conn->lastInsertId();
        $_SESSION['id']  = $last_id;
        // $user_uid = 'jssf_'.$last_id;
        $user_uid = 'JSSF' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        // $user_sponser = 'JSSF_SPON' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        // $user_refid = 'JSSF_REF' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        $u_lvl = 2;
	$_SESSION['username']  = $user_uid;
        $update_user = $conn->query("UPDATE `master_user` SET  `user_uid` = '$user_uid' WHERE id = $last_id");
        if ($update_user) {
            $sql2 = "INSERT INTO `kyc`(`masteruser_uid`, `kyc_docnumber`) VALUES(:u_master_id, :u_doc_num)";
                $kyc_details = $conn->prepare($sql2);
                $insert_kyc = $kyc_details->execute(
                    array(
                        ':u_master_id' => $user_uid,
                        ':u_doc_num' => $user_doc_no
                    )
                );

            $sql3 = "INSERT INTO `reg_user`(`masteruser_uid`, `nomini_name`) VALUES(:u_master_id, :u_nomi_name)";
                $nominee_details = $conn->prepare($sql3);
                $insert_nominee = $nominee_details->execute(
                    array(
                        ':u_master_id' => $user_uid,
                        ':u_nomi_name' => $user_nomi_name
                    )
                );

            $sql4 = "INSERT INTO `node`(`userid`, `refid`, `levelname`) VALUES (:u_master_id, :u_refid, :u_lvl)";
                $node_detail = $conn->prepare($sql4);
                $insert_node = $node_detail->execute(
                    array(
                        ':u_master_id' => $user_uid,
                        ':u_refid' => $ref_id,
                        ':u_lvl' => $u_lvl
                    )
                );

                
            
            echo $user_uid;

        }
    }
}
