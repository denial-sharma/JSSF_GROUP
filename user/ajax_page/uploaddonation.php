<?php 

    include('../../configration/dbconnection.php');
    $uid = trim($_POST['userid']);      
    $tranid = trim($_POST['tranid']);      
    $amt = trim($_POST['amt']);
    $tranType = 'donation';
   
    $sql = $conn->prepare("INSERT INTO `transaction`(`userid`,`transaction_id`,`amount` , `type_trans`)VALUES(:uid,:transid,:amt , :ty)");
    $uploadtransition = $sql->execute(array(
        ':uid'=>$uid,
        ':transid'=>$tranid,
        ':amt'=>$amt,
        ':ty' => $tranType
    ));

    if($uploadtransition){
        echo '001';
    }else{
        echo "404";
    }
?>