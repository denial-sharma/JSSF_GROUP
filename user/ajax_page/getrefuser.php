<?php
header('Content-Type: application/json');
 include ("../../configration/dbconnection.php") ;
 $refid = $_POST['refid'];
 $result = $conn->prepare("SELECT master_user.id, master_user.user_uid, master_user.user_name FROM `node` INNER JOIN
  master_user on master_user.user_uid = node.userid WHERE `refid` = '$refid' ");
 $result->execute();
 $reflist = array();

 for ($i = 1; $row = $result->fetch(); $i++) {
  $reflist[] = array(
    "username"=>$row['user_name'],
    "userid"=>$row['user_uid']
  );

}
echo json_encode($reflist);
 ?>
