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

$yojnaid = trim($_POST['yojnaid']);
$userid = trim($_POST['userid']);
$uname =  trim($_POST['user_nm']);
$u_f_n =  trim($_POST['user_f_n']);
$user_image = trim($_POST['profiledata']);
$girlname = trim($_POST['girlname']);
$girl_f_n= trim($_POST['girl_f_n']);
$girl_m_n = trim($_POST['girl_m_n']);
$dob = trim($_POST['dob']);
$address = trim($_POST['address']);
$state = trim($_POST['state']);
$district = trim($_POST['district']);
$tehsil = trim($_POST['tehsil']);
$block = trim($_POST['block']);
$gram_panchayat = trim($_POST['gram_panchayat']);
$gram_post = trim($_POST['gram_post']);
$pincode = trim($_POST['pincode']);
$aadhar_no = trim($_POST['aadhar_no']);
$aadharfront = trim($_POST['aadharfront']);
$aadharback = trim($_POST['aadharback']);
$girl_photo = trim($_POST['photogirl']);
$applydate = date("d/m/Y");




$sql = "INSERT INTO `yojna_data`(`userid`, `yojnaid`, `applinename`, `apply_f_n`, `appline_photo`, `girl_name`,
        `girl_photo`, `girl_f_n`, `girl_m_n`, `girl_dob`, `apply_date`, `address`, `state`, `district`, `tahsil`, `block`,
        `gram_panchayat`, `gram_post`, `pincode`, `aadhar_no`, `aadhar_front_photo`, `aadhar_back_photo`) VALUES
        (:usid, :yojnaid, :u_name, :user_f_n, :userimg, :girl_nm, :girl_photo, :girl_f_n, :girl_m_n, :dob, :applydate,
         :addres, :states, :district, :tahsil, :blocks, :gram_panch, :gram_post, :pincode, :aadhar ,:front, :back)";
    $new_user = $conn->prepare($sql);
    $insertvisitor = $new_user->execute(
        array(
            ':usid' => $userid,
            ':yojnaid' => $yojnaid,
            ':u_name' => $uname,
            ':user_f_n' => $u_f_n,
            ':userimg' => $user_image,
            ':girl_nm' => $girlname,
            ':girl_photo' => $girl_photo,
            ':girl_f_n' => $girl_f_n,
            ':girl_m_n' => $girl_m_n,
            ':dob' => $dob,
            ':applydate' => $applydate,
            ':addres' => $address,
            ':states' => $state,
            ':district' => $district,
            ':tahsil' => $tehsil,
            ':blocks' => $block,
            ':gram_panch' => $gram_panchayat,
            ':gram_post' => $gram_post,
            ':pincode' => $pincode,
            ':aadhar' => $aadhar_no,
            ':front' => $aadharfront,
            ':back' =>$aadharback
        )
    );

    if ($insertvisitor) {

        $last_id = $conn->lastInsertId();
        $_SESSION['id']  = $last_id;
        // $user_uid = 'jssf_'.$last_id;
        $reg_no = 'JSSF/BVY/' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        // $user_sponser = 'JSSF_SPON' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        // $user_refid = 'JSSF_REF' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        $u_lvl = 1;

        $update_user = $conn->query("UPDATE `yojna_data` SET  `registration_no` = '$reg_no' WHERE id = $last_id");
        if ($update_user) {
            echo json_encode(['status' => 200, 'message' => $reg_no]);
        }else{
            echo json_encode(['status'=> 400,'message'=> 'Registration Failed']);
        }
    }
  } else {

        echo json_encode(['status' => 404, 'message' => 'Request_Method  not Supported']);
    }
} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    ECHO json_encode(['status' => 422, 'message' => 'Missing parameter: decoded_token']);
}
