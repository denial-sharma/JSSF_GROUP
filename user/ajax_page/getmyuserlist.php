<?php
//header('Content-Type: application/json');
 include ("../../configration/dbconnection.php") ;
 $refid = $_POST['refid'];
 $result = $conn->prepare("SELECT id,userid FROM `node` WHERE `sponcerid` =  '$refid' and manual_pool is null ");
 $result->execute();
//  $reflist = array();
$output = "<option value=''>Choose User</option>";
 for ($i = 1; $row = $result->fetch(); $i++) {
  $output .= '<option value="'.$row['id'].'">'.$row['userid'].'</option>';
}
echo $output;
 ?>
