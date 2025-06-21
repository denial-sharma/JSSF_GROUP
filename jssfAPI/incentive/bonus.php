<?php
require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';
require '../connection/dbconnection.php';

// Initialize bonus income
$bonusIncome = 0;

// Check if decoded token is set
if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userId = $yourArray['user_id'];  // Get user id from the decoded token

    global $bonusIncome;

    $sqls = "SELECT master_user.*, node.userid as reflerId FROM master_user
    JOIN node ON master_user.user_uid = node.userid
    WHERE node.refid = :userId
    AND master_user.status = 'A'
    AND master_user.created_at BETWEEN '2023-12-01' AND '2023-12-30'";

    $results = $conn->prepare($sqls);
    $results->execute([':userId' => $userId]);
    $rows = $results->fetchAll();

    if ($results->rowCount() >= 20) {
        $sqls_bonus_income = "SELECT userid FROM master_user
        JOIN node ON master_user.user_uid = node.userid
        WHERE node.refid = :userId
        AND master_user.status = 'A'
        AND master_user.created_at BETWEEN '2023-12-01' AND '2023-12-31'";

        $results_bonus_income = $conn->prepare($sqls_bonus_income);
        $results_bonus_income->execute([':userId' => $userId]);
        $data = array();

        while ($rows = $results_bonus_income->fetch()) {
            $userid = $rows['userid'];
            $data[] = $userid;

            $sql1 = $conn->prepare("SELECT amount FROM wallet WHERE userid = :userid");
            $sql1->execute([':userid' => $userid]);
            $row1 = $sql1->fetch();

            if ($row1 !== false) {
                $row2 = $row1['amount'];
                $getbonus = ($row2 * 5) / 100;
                $bonusIncome += $getbonus;
            }
        }

        echo json_encode(["status" => 200, "message" => $bonusIncome]);
    } else {
        echo json_encode(["status" => 200, "message" => 0]); // Bonus income is 0 if total count is less than 20
    }
} else {
    echo json_encode(["status" => 422, "message" => "Missing parameter: decoded_token"]);
}
?>
