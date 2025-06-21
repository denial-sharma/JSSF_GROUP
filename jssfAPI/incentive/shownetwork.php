<?php


require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';


require '../connection/dbconnection.php';

$CHILDLIST =array();

    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token'];
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token
        $userName = $yourArray['username'];

        $trvList = [];
        $level_1 = ttLreUser($userid);
        getChildList($level_1, $trvList);
        echo json_encode(['userID' => $userid,'userName' => $userName, 'child'=>$CHILDLIST[0]]);

    } else {

        echo json_encode(['status' => 400, 'message' => 'Missing parameter: decoded_token']);
    }


function ttLreUser($refid)
{
    require '../connection/dbconnection.php';

        // $refid = $_POST['refid'];
        $assginResult = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status FROM `node` INNER JOIN
                master_user on master_user.user_uid = node.userid 
                WHERE node.manual_pool = '$refid' and master_user.`status`='A' ");
        $assginResult->execute();
        $refList = array();
        for ($i = 1; $row = $assginResult->fetch(); $i++) {
            $refList[] = [
            "title" => $row['user_name'],
            "name" => $row['user_uid'],
            "parentid" => $refid,
            "status" => $row['status']
        ];
        }

        return $refList;
    
}

function getChildList($level_1, $trvList)
{
  global $CHILDLIST;
    if (count($level_1) > 0) {
        $trvList[] = $level_1;
        // echo json_encode($trvList);
        $temp_Arr = array();
        foreach ($level_1 as $value) {
            $temp_Arr = array_merge($temp_Arr,  ttLreUser($value['name']));
        }

        getChildList($temp_Arr, $trvList);
        
    } else {
        // $trvList[] = $temp_Arr;
      
        $CHILDLIST[] =  $trvList;
    }
}

