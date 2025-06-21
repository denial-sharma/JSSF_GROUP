<?php
include('../configration/dbconnection.php');

$userid = $_POST['childId'];
$manual_pool = $_POST['preantId'];
$result = $conn->query("UPDATE node set manual_pool = '$manual_pool' where userid = '$userid'; "); 
$result->execute();

if($result){
    echo "success";
}else{
    echo "not Success";
}
?>