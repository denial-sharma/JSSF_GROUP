<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Now you can access the decoded token from the $_REQUEST array



    if (isset($_REQUEST['decoded_token'])) {
        $decodedToken = $_REQUEST['decoded_token']; 
        $yourArray = json_decode(json_encode($decodedToken), true);
        $userid = $yourArray['user_id'];  // Get user id from the decoded token
      
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Use try-catch block to handle potential PDO exceptions
            try {
                $sql = $conn->prepare("SELECT master_user.* , kyc.kyc_docnumber , reg_user.nomini_name FROM `master_user` join `kyc` on master_user.user_uid = kyc.masteruser_uid join reg_user on master_user.user_uid = reg_user.masteruser_uid WHERE `user_uid` = '$userid'");
                $sql->execute();
    
                // Check if the statement execution was successful
                if ($sql) {
                    $result = $sql->fetch(PDO::FETCH_ASSOC);
    
                    // Check if the result is not empty
                    if ($result) {
    
                        echo json_encode(['status' => 200, 'userData' => $result]);
    
                    } else {
                        http_response_code(404);  // Set response code to 404 Not Found
                        die(json_encode(['status' => false, 'message' => "No data found"]));
                    }
                } else {
                    http_response_code(500);  // Set response code to 500 Internal Server Error
                    die(json_encode(['status' => false, 'message' => "Error executing the query"]));
                }
            } catch (PDOException $e) {
                http_response_code(500);  // Set response code to 500 Internal Server Error
                die(json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]));
            }
        } else{
            echo json_encode(["message" => "Request method not supported"]);
            http_response_code(405);  // Method Not Allowed
            exit();
        }

}   else {
    http_response_code(422);  // Set response code to 422 Unprocessable Entity
    die(json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']));
 }




