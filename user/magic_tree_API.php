<?php
include('../configration/dbconnection.php');


try {
    $getmaster_user = $conn->prepare('SELECT user_uid FROM master_user WHERE user_uid != "JSSF0001" ' );
    $getmaster_user->execute();
    while($masterUser = $getmaster_user->fetch()){
        $getuserId = $masterUser['user_uid'];

        $sql4 = "INSERT INTO `magic_tree`(`userid`) VALUES(:u_master_id)";
                    $node_detail = $conn->prepare($sql4);
                    $insert_node = $node_detail->execute(
            [
                ':u_master_id' => $getuserId,
            ]
            );

    $sql = $conn->prepare('SELECT * FROM magic_tree WHERE left_child IS NULL OR right_child IS NULL OR center_child IS NULL LIMIT 1');
    $sql->execute();
    $row = $sql->fetch();

    if ($row) {
        $getID =$row['id'];
        // Update left_child_id or right_child_id
        if($row['left_child'] == null){
            $updatedField = 'left_child';
        }
        else if($row['center_child'] == null){
            $updatedField = 'center_child';
        }
        else{
            $updatedField = 'right_child';
        }
        // $updatedField = ($row['left_child_id'] === null) ? 'left_child_id' : 'right_child_id';
        // $newChildValue = 10; // Replace with the actual value you want to assign
    
        // Update the database
        $conn->query("UPDATE magic_tree SET $updatedField = '$getuserId' WHERE id = $getID");
    
        // Update the binary tree
       
    }
}
   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>