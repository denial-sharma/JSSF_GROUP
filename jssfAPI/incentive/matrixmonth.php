<?php
// Include the verifyToken file
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';



$matrixIncome = 0;

function getincome()
{
    require '../connection/dbconnection.php';
    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token'];
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token

        $userList = array();
        $user = getmatrixincome($userid);
        matrixincome($user, $userList);
    } else {
        http_response_code(422);  // Set response code to 422 Unprocessable Entity
        die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
    }
}

function getmatrixincome($userUid)
{

    require '../connection/dbconnection.php';

    $stateDate = date('2023-08-01');
    $endDate = date('2025-12-30');

    $sql = "SELECT created_at , refid , userid 
            FROM master_user 
            JOIN node ON master_user.user_uid = node.userid 
            where node.refid = '$userUid' 
            AND master_user.status = 'A' 
            AND master_user.created_at BETWEEN '$stateDate' AND '$endDate'";
    $matrix = $conn->prepare($sql);
    $matrix->execute();

    // $stroge = "INSERT INTO wallet(`userid`,`type_income`)VALUES('$userUid' , '$matrixincome')";
    // $setInDataBase = $conn->prepare($stroge);
    // $setInDataBase->execute();

    $userlist = array();
    for ($i = 1; $row = $matrix->fetch(); $i++) {
        $userlist[] = array(
            'ref' => $row['refid'],
            'user' => $row['userid'],
            'date' => $row['created_at'],

        );
    }
    return $userlist;
}

function matrixincome($user, $userlist)
{
    global $matrixIncome;

    $userlist[] = $user;
    $users = count($user);
    if ($user != 0) {
        $getvalue = $users / 3;
        $matrixIncome = (int)$getvalue * 100;
        
        echo json_encode(['status' => true, 'message' => $matrixIncome]);
    }
   
}



getincome();
?>