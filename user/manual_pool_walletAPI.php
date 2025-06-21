<?php 
error_reporting(0);
include('matrix_bonus_income_api.php');
include('magic_pool_1_API.php');
  $manualPoolWallet = 0;
  $levelIncome = 0;
function getTraversList()
{
  include("../configration/dbconnection.php");
    $userUid = $_SESSION['username'];

    $py = $conn->prepare("SELECT amount FROM `transaction` where `type_trans` = 'login_payment' AND userid = '$userUid' ");
    $py->execute();
    $paymnet = $py->fetch();
    $getpaymnet = $paymnet['amount'];

    $SQL = "SELECT count(node.id) as countid  FROM `node` INNER JOIN
    master_user on master_user.user_uid = node.userid 
   WHERE `refid` = '$userUid' and `status` = 'A' ;";
    $restul = $conn->prepare($SQL);
   $restul->execute();

    $refflerAmount = $restul->fetch();
    
    global $manualPoolWallet ;

    if($getpaymnet === 700){
      $manualPoolWallet += $refflerAmount['countid']*125; //per reffler 125rs to be asgin 
    }else{
      $manualPoolWallet += $refflerAmount['countid']*125; //per reffler 125rs to be asgin 
    }
   

  $trvlist = array();
  $lvl_1 = ttlrefuser_($userUid);
  getchildlist_($lvl_1 , $trvlist);


  //  echo json_encode($output);
}

function ttlrefuser_($refid)
{
  include("../configration/dbconnection.php");

  // $refid = $_POST['refid'];
  $result = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status, master_user.created_at FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE node.manual_pool = '$refid' and master_user.status = 'A' ");
   
  $result->execute();
  $reflist = array();
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
     ?>
<script>
const TRIVSELIST_ = <?php echo json_encode($trvlist)?>;
console.log('TRIVSELIST', TRIVSELIST_);
</script>
<?php
     
  }
}

function calculatemanualPoolWallet($trvlist){

  include("../configration/dbconnection.php");
  $userUid = $_SESSION['username'];

   

    global $manualPoolWallet;
    global $levelIncome ; 
   
		global $bonusIncome;
    global $totalRoomEncome;
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
    //TODO minus the amount that have been withdraw by the user

    $sql = "SELECT SUM(amount) as amount FROM matrix WHERE `userid` =  '$userUid'";
		$matrix = $conn->prepare($sql);
		$matrix->execute();
		$row = $matrix->fetch();
    $matrixIncome = $row['amount'];
    // echo "amount:". $matrixIncome;
    // $totalAmount = 0; 
    $totalAmount = $manualPoolWallet + $levelIncome + $matrixIncome + $bonusIncome + $totalRoomEncome; 
    //  echo  $matrixIncome . $levelIncome . '<br>';
  
    $query = $conn->prepare("SELECT * FROM wallet WHERE `userid` = '$userUid' ");
		$query->execute();
    $status = 'P';
    if($query->rowCount()==0){

        $insertwithdrawal = $conn->prepare("INSERT INTO wallet(`userid`,`amount`)VALUES('$userUid',$totalAmount)");
        $insertwithdrawal->execute();
    }else{
      $_query = $conn->prepare("SELECT * FROM wallet WHERE `userid` = '$userUid' ");
		  $_query->execute();
      $result = $_query -> fetch();
      $walletAmount = $result['amount'];
      $sql1 = $conn->prepare("UPDATE wallet SET amount = $walletAmount WHERE userid = '$userUid' ");
      $sql1->execute();
      }
      
        $query1 = $conn->prepare("SELECT sum(amount) as amounts FROM withdrawal WHERE `userid` = '$userUid' ");
        $query1->execute();
        $getrow = $query1->fetch();
        $getAmount = $getrow['amounts'];
        $updateWalletAmt = $totalAmount-$getAmount;
        $sql = $conn->prepare("UPDATE wallet SET amount = $updateWalletAmt WHERE userid = '$userUid' ");
        $sql->execute();
    
}

getTraversList();


?>