<?php


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function verifyToken($token) {
    try {
        // Your secret key used for encoding the JWT
        $key = 'Ubro$oftJSSF';
        
        // Decode the token using the secret key
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        // If decoding is successful, return the decoded data
        return $decoded;
    } catch (\Firebase\JWT\ExpiredException $e) {
        // Token has expired
        return null;
    } catch (\Exception $e) {
        // An error occurred during decoding
        return null;
    }
}

// Get the Authorization header
$headers = getallheaders();
$authorizationHeader = isset($headers['Authorization']) ? $headers['Authorization'] : (isset($headers['authorization']) ? $headers['authorization'] : '');

// Extract the token from the header
$token = str_replace('Bearer ', '', $authorizationHeader);

// Verify the token
$decodedToken = verifyToken($token);

if ($decodedToken !== null) {
    // Token is valid, set the decoded value in the request
    $_REQUEST['decoded_token'] = $decodedToken;
} else {
    // Token is invalid or has expired
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(['status' => false, 'message' =>'Invalid or expired token', 'token' => $token ]);
    exit;
}
