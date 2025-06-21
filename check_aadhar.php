<?php
 include ("configration/dbconnection.php") ;
 $id = $_POST['aid'];
 $status = 'A';
 $update_user = $conn->query("UPDATE `master_user` SET  `status` = '$status' WHERE id = $id");

 echo 'User Actived';
?>