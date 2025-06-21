<?php
 include ("../../configration/dbconnection.php") ;
 $id = $_POST['id'];
 $sql = $conn->prepare("SELECT * FROM bankdetails WHERE id=$id");
 $sql->execute();
 $row = $sql->fetch();
 echo $row['id'].",".$row['bankname'].",".$row['ifsc_code'].",".$row['account_no'].",".$row['holdername'];
?>