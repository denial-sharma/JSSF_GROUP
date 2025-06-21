<?php
require '../header_file.php';

require '../connection/dbconnection.php';

    // Use try-catch block to handle potential PDO exceptions
    try {
        $getadv = $conn->prepare("SELECT * FROM advertise;");
        $getadv->execute();

        // Check if the statement execution was successful
        if ($getadv) {
            $getadvList = $getadv->fetchall(PDO::FETCH_ASSOC);
            if ($getadvList) 

                echo json_encode(['status' => true, 'getadv' => $getadvList]);
            } else {
                http_response_code(404);  // Set response code to 404 Not Found
                echo json_encode(['status' => false, 'message' => "No data found"]);
            }
       
    } catch (PDOException $e) {
        http_response_code(500);  // Set response code to 500 Internal Server Error
        echo json_encode(['status' => false, 'message' => "PDO Exception: " . $e->getMessage()]);
    }


