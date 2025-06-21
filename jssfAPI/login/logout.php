<?php
require '../header_file.php';
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform logout actions
    // You might want to clear the user's session or token here

    // For example, if using sessions:
    session_start();
    session_destroy();

    // Respond with a success message
    echo json_encode([ 'status'=>200 , 'message' => 'Logout successful']);
} else {
    // Respond with an error for unsupported methods
   
    echo json_encode(['error' => 'Method Not Allowed']);
}
