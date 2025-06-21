<?php

// Include the verifyToken file
require '../vendor/autoload.php';
require './login/verifyToken.php';

// Now you can access the decoded token from the $_REQUEST array
if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    print_r($decodedToken);
} else {
    echo 'Decoded token not available';
}