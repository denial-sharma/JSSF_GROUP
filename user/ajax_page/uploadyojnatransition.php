<?php 

    include('../../configration/dbconnection.php');
    $uid = trim($_POST['userid']);      
    $payid = trim($_POST['payment_id']);      
    $amt = trim($_POST['amt']);
    $setPayStatus = trim($_POST['getpayid']);
    $tranType = 'Yojana';
   
    $sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount` , `type_trans`)VALUES(:uid,:transid,:amt , :ty)");
    $uploadtransition = $sql->execute(array(
        ':uid'=>$uid,
        ':transid'=>$payid,
        ':amt'=>$amt,
        ':ty' => $tranType
    ));

    if($uploadtransition){
        $sql = $conn->prepare("UPDATE `yojna_data` SET `status` = 1  WHERE `id` =  $setPayStatus");

        echo '001';
    }else{
        echo "404";
    }
?>