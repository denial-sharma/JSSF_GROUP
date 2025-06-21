<?php
// Include the verifyToken file
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Now you can access the decoded token from the $_REQUEST array

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token']; 
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token
  
    

        // Use try-catch block to handle potential PDO exceptions
        try {
            $sql = $conn->prepare("SELECT count(*) as countActiveUser FROM `master_user` JOIN node ON master_user.user_uid = node.userid WHERE master_user.status = 'A' AND node.refid = '$userid'");
            $sql->execute();

            // Check if the statement execution was successful
            if ($sql) {
                $result = $sql->fetch(PDO::FETCH_ASSOC);

                // Check if the result is not empty
                if ($result) {
                    $countuser = $result["countActiveUser"];
                    echo json_encode(['status' => true, 'message' => $countuser]);
                } else {
                    // Set response code to 404 Not Found
                    echo json_encode(['status' => false, 'message' => "No data found"]);
                }
            } else {
                 // Set response code to 500 Internal Server Error
                 echo json_encode(['status' => false, 'message' => "Error executing the query"]);
            }
        } catch (PDOException $e) {
            // Set response code to 500 Internal Server Error
            echo json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]);
        }
    } else {
         // Set response code to 422 Unprocessable Entity
         echo json_encode(['status' => false, 'message' => 'Missing parameter: decoded_token']);
     }

