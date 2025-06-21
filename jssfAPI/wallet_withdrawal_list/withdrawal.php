<?php

// Include the verifyToken file
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Now you can access the decoded token from the $_REQUEST array
global $getamt;

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token

    // $data = json_decode(file_get_contents("php://input"), true);

    // $amtWithrawal = $data['amtWithrawal'];

    $amtWithrawal = trim($_POST['amtWithrawal']);



    // Use try-catch block to handle potential PDO exceptions
    try {
        // check database if bank details add or not 
        $getBankDetails = $conn->prepare("SELECT * FROM bankdetails WHERE userid = '$userid' ");
        $getBankDetails->execute();

        //After Execute Check weather  there is rows in the database or not
        if ($getBankDetails->rowCount() < 0) {
            echo json_encode([
                'status' => 201,
                '$message' => "Bank Details Not Added"
            ]);
        } else {
            //Now Check whether any Withdrawal Are in Padding.

            $getWithdrawalDetails = $conn->prepare("SELECT * FROM withdrawal WHERE `userid`= '$userid' AND `status` = 'P'");
            $getWithdrawalDetails->execute();
            if ($getWithdrawalDetails->rowCount() > 0) {
                echo json_encode([
                    "status" => 202,
                    "message" => "You have already made a withdrawal request After Clearing The Panding Amount. You can Withdrawal New Amount"
                ]);
            } else {
                //Checking Whether The User Have Enough Money In His/Her Wallet Or Not?
                $selectWalletAmount = $conn->prepare("SELECT amount FROM wallet WHERE `userid` = '$userid' ");
                $selectWalletAmount->execute();
                $getrow = $selectWalletAmount->fetch();
                $getamount = $getrow['amount'];
                $totalAmount = $getamount - $amtWithrawal;

                $selectWalletRefler = $conn->prepare("SELECT count(*) as countActiveUser FROM `master_user` JOIN node ON master_user.user_uid = node.userid WHERE master_user.status = 'A' AND node.refid = '$userid'");
                $selectWalletRefler->execute();

                $refId = $selectWalletRefler->fetch();
                $Active = $refId['countActiveUser'];
                if ($Active <= 3) {
                    echo json_encode([
                        "status" => 203,
                        "message" => "You can Withdrawal Amount Minimum Join 3 Direct Refler With Active Only"
                    ]);
                } else {
                    // After update  the amount of wallet after withdrawal .
                    if ($totalAmount >= 0) {
                        $updateWallet = $conn->prepare("UPDATE wallet SET `amount` = $totalAmount WHERE userid = '$userid' ");
                        $updateWallet->execute();

                        //Insert withdrawal Amount in withdrawal in database  table
                        if ($updateWallet) {
                            $insertWithdrawal = $conn->prepare("INSERT INTO withdrawal(`userid` , `amount` , `status`)VALUES('$userid',$amtWithrawal,'P')");
                            $insertWithdrawal->execute();
                            echo json_encode([
                                "status" => 200,
                                "message" => "Amount Withdrawal Successfully"
                            ]);
                        }
                    } else {
                        echo json_encode([
                            "status" => 204,
                            "message" => "Enter Amount is Smaller Then Total Amount. Please Enter Correct Amount'"
                        ]);
                    }
                }
            }
        }
    } catch (PDOException $e) {

        echo json_encode(['status' => 404, 'message' => "PDO Exception: " . $e->getMessage()]);
    }
} else {

    echo json_encode(['status' => 500, 'message' => 'Missing parameter: decoded_token']);
}
