<?php
include('../configration/dbconnection.php');

$userid = $_POST['userid'];

$result = $conn->query("SELECT * FROM `node` INNER JOIN
master_user on master_user.user_uid = node.userid 
WHERE node.refid = '$userid' and master_user.`status`='A'  "); 
$result->execute();
// Check if there are any records
if ($result->rowCount() > 0) {
    $users = array();
    
    // Fetch the results and store them in an array
    while ($row = $result->fetch()) {
        $users[] = $row;
    }
    
    // Convert the array to JSON and send it as the API response
    header("Content-Type: application/json");
    echo json_encode($users);
} else {
    // No records found
    echo "No users found.";
}

?>