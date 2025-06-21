<?php

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

  if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $userid = json_decode(json_encode($decodedToken), true)['user_id'];

    $py = $conn->prepare("SELECT amount FROM `transaction` where `type_trans` = 'login_payment' AND userid = '$userid' ");
    $py->execute();
    $paymnet = $py->fetch();
    $getpaymnet = $paymnet['amount'];

    $statement = $conn->prepare("SELECT COUNT(node.id) AS countid  FROM `node`  INNER JOIN master_user ON master_user.user_uid = node.userid  WHERE `refid` = :userid AND `status` = 'A' ");
    $statement->execute(['userid' => $userid]);

    $refflerAmount = $statement->fetch()['countid'];

  $manualPoolWallet = ($getpaymnet == 700) ? $refflerAmount * 325 : $refflerAmount * 125;
    

    echo json_encode(['status' => 200, 'message' => $manualPoolWallet , 'getuserid' => $userid]);
  } else {
    echo json_encode(['status' => 422, 'message' => 'Missing parameter: decoded_token']);
  }
