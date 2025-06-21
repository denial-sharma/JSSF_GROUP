<?php

/* Database config */
// $db_host = '89.117.188.28';
// $db_database = 'u937865059_jssfdb';
// $db_user = 'u937865059_jssfadmin';
// $db_pass = 'Ubro@2412!';

// $db_host = 'localhost';
// $db_database = 'u937865059_jssfdb';
// $db_user = 'root';
// $db_pass = '';

$db_host = 'localhost';
$db_database = 'jssf_server_db';
$db_user = 'root';
$db_pass = 'mySQL@1234';


try{
    $conn = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    date_default_timezone_set('Asia/Kolkata');
   //echo " connection successfully";
}
catch(PDOException $e){
    echo "connection faild";
}
?>