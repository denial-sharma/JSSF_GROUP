<?php
require '../header_file.php';
require '../connection/dbconnection.php';
// require('../phpjwt/src/CachedKeySet.php');
// require('../phpjwt/src/JWK.php');
require '../phpjwt/src/JWT.php';
// require('../phpjwt/src/JWTExceptionWithPayloadInterface.php');
// require('../phpjwt/src/Key.php');
// require('../phpjwt/src/SignatureInvalidException.php');



use Firebase\JWT\JWT;

// $data = json_decode(file_get_contents("php://input"), true);

// $userId = $data['username'];
// $password = $data['password'];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $userId =  trim($_POST['username']);
        $password =  trim($_POST['password']);
        
        
    
    $query = $conn->prepare(" SELECT * FROM master_user WHERE `user_uid` = '$userId' AND `user_password` = '$password' ");
    $query->execute();
    $masterUserData = $query->fetch();
    
    if ($query->rowCount() > 0 ) {
    
        // $verify = password_verify($password, $masterUserData['user_password']);
        $key = 'Ubro$oftJSSF';
    
        $payload = [
            "id" => $masterUserData['id'],
            "username" => $masterUserData["user_name"],
            "user_id" => $masterUserData['user_uid'],
            "useremail" => $masterUserData['user_email'],
            "userphone" => $masterUserData['user_phone'],
        ];
        // $status = $masterUserData['status'];
        if ($masterUserData) {

            if($masterUserData['status'] == 'A'){
                $jwt = JWT::encode($payload, $key, 'HS256');

                echo json_encode(["message" => "Login Successfully.", "status" => 200, "accessToken" => $jwt]);

            }else if($masterUserData['status'] == 'D' ){
                $jwt = JWT::encode($payload, $key, 'HS256');
                echo json_encode(["message" => "Your account is not active.", "status" =>201 , "accessToken" => $jwt ]);
            }
          
            
            // return $headerToken;
        } else {
           
            echo json_encode(["message" => " Password incorrect.", "status" => 401]);
        }
    } else {
       
        echo json_encode(["message" => "Email Or Password not Correct . ", "status" => 404]);
    }
    }
    //code...
} catch (\Throwable $th) {
    echo json_encode(["message" => "Error$th" , "status" => 400]);
}

