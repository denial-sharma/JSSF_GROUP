<?php
include('../../configration/dbconnection.php');
session_start();
$userid = $_SESSION['id'];
$uname =  $_SESSION['username'];
$userName = $_POST['user_name'];
$dob = trim($_POST['dob']);
$gender = trim($_POST['gender']);
$mobile_no = trim($_POST['mobile_no']);
$email_id = trim($_POST['email_id']);

$city = trim($_POST['city']);
$state = trim($_POST['state']);
$address_1 = trim($_POST['address_1']);
$address_2 = trim($_POST['address_2']);
$doc_no = trim($_POST['doc_no']);
$nomi_name = trim($_POST['nomi_name']);
$user_image = trim($_POST['profiledata']);

$insert = $conn->query("UPDATE `master_user` SET `user_name`= '$userName' , `photo` = '$user_image', `user_dob`= '$dob' , `user_gender`= '$gender' , `user_phone`= '$mobile_no'
,`user_email`= '$email_id' , `user_add1`= '$address_1', `user_add2`= '$address_2' ,`user_city`= 'city', `user_state`= '$state' WHERE `id` = $userid"); 
$insert->execute();

$insert_KYC = $conn->query("UPDATE `kyc` SET  `kyc_docnumber`= '$doc_no' WHERE `masteruser_uid` = '$uname'"); 
$insert_KYC->execute();

$insert_nomies = $conn->query("UPDATE `reg_user` SET  `nomini_name`= '$nomi_name' WHERE `masteruser_uid` = '$uname'"); 
$insert_nomies->execute();


echo "Update Successfully";

?>