<?php 

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';

//  include('matrix_bonus_income_api.php');

//  include('matrix.php');
  $manualPoolWallet = 0;
  $levelIncome = 0;
function getTraversList()
{
    require '../connection/dbconnection.php';

    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token']; 
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token

  $trvlist = [];
  $lvl_1 = ttlrefuser_($userid);
  getchildlist_($lvl_1 , $trvlist);

} else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
 }
  //  echo json_encode($output);
}

function ttlrefuser_($refid)
{
  require '../connection/dbconnection.php';

  // $refid = $_POST['refid'];
  $result = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status, master_user.created_at FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE node.manual_pool = '$refid' and master_user.status = 'A' ");
   
  $result->execute();
  $reflist = [];
  for ($i = 1; $row = $result->fetch(); $i++) {
    $reflist[] = array(
      "title" => $row['user_name'],
      "name" => $row['user_uid'],
      "parentid" => $refid,
      "status" => $row['status'],
      "joining_Date" => $row['created_at']
    );
  }
  return $reflist;
}

function getchildlist_($lvl_1 , $trvlist)
{
  
  if (count($lvl_1) > 0) {
    $trvlist[] = $lvl_1;
    // echo json_encode($trvlist);
    $temp_arr = array();
    foreach ($lvl_1 as $value) {
      $temp_arr = array_merge($temp_arr,  ttlrefuser_($value['name']));
    }

    getchildlist_($temp_arr , $trvlist);
  }
   else {
    calculatemanualPoolWallet($trvlist);
     
     
  }
}

function calculatemanualPoolWallet($trvlist){

    require '../connection/dbconnection.php';

    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token']; 
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token
  
  $magic_income = $conn->prepare("SELECT sum(income) as income FROM magic_pool_income_1 WHERE `userid` = '$userid' ");
		$magic_income->execute();
    $getincome = $magic_income->fetch();
    $magicIncome = $getincome['income'];


    global $manualPoolWallet;
    global $levelIncome ; 
    global $matrixIncome;
		global $bonusIncome;
    $maxLevel = 13;
    $levelCounter = 0;
    foreach ($trvlist as $levelList) {
        $levelCounter++;
        if($levelCounter > $maxLevel){
            break; // max 13 level allwoed for to get money
        }
        //  if($levelCounter == 1){
        //      $manualPoolWallet += count($levelList) * 125; // 125rs per person  at 1st level
           
        //  }
        //  $manualPoolWallet += count($levelList) * 125; // 125rs per person 
         $levelIncome += count($levelList)*10; // 10rs per person for level income 
         
        
        
      //  echo count($levelList).' /'. $levelCounter.'<br>';
    }
    echo json_encode(['message'=>$levelIncome,'status'=>200]);
    //TODO minus the amount that have been withdraw by the user

    
    // $totalAmount = 0;
    $totalAmount = $manualPoolWallet + $levelIncome + $matrixIncome + $bonusIncome + $magicIncome;
    //  echo  $matrixIncome . $levelIncome . '<br>';
  
    $query = $conn->prepare("SELECT * FROM wallet WHERE `userid` = '$userid' ");
		$query->execute();
   
    if($query->rowCount()==0){

        $insertwithdrawal = $conn->prepare("INSERT INTO wallet(`userid`,`amount`)VALUES('$userid',$totalAmount)");
        $insertwithdrawal->execute();
    }else{
      $_query = $conn->prepare("SELECT * FROM wallet WHERE `userid` = '$userid' ");
		  $_query->execute();
      $result = $_query -> fetch();
      $walletAmount = $result['amount'];
      $sql1 = $conn->prepare("UPDATE wallet SET amount = $walletAmount WHERE userid = '$userid' ");
      $sql1->execute();
      }
     } else {
    echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
 }
}


getTraversList();


