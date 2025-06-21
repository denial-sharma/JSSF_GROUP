<?php

// $matrixIncome = 0;
// $noUserMatrixIcome = 0;
$bonusIncome = 0;

// $date = date('Y-01-m');

// function getincome()
// {
//     include("../configration/dbconnection.php");
//     $userUid = $_SESSION['username'];

//     $userList = array();
//     $user = getmatrixincome($userUid);
//     matrixincome($user, $userList);
// }

// function getmatrixincome($userUid)
// {

//     include("../configration/dbconnection.php");

//     $stateDate = date('2024-01-01');
//     $endDate = date('2024-01-30');

//     $sql = "SELECT created_at , refid , userid 
//             FROM master_user 
//             JOIN node ON master_user.user_uid = node.userid 
//             where node.refid = '$userUid' 
//             AND master_user.status = 'A' 
//             AND master_user.created_at BETWEEN '$stateDate' AND '$endDate'";
//     $matrix = $conn->prepare($sql);
//     $matrix->execute();

//     // $stroge = "INSERT INTO wallet(`userid`,`type_income`)VALUES('$userUid' , '$matrixincome')";
//     // $setInDataBase = $conn->prepare($stroge);
//     // $setInDataBase->execute();

//     $userlist = array();
//     for ($i = 1; $row = $matrix->fetch(); $i++) {
//         $userlist[] = array(
//             'ref' => $row['refid'],
//             'user' => $row['userid'],
//             'date' => $row['created_at'],

//         );
//     }
//     return $userlist;
// }

// function matrixincome($user, $userlist)
// {
//     global $matrixIncome;

//     $userlist[] = $user;
//     $users = count($user);
//     if ($user != 0) {
//         $getvalue = floor($users / 3) * 3;
//         $matrixIncome = $getvalue * 100;
//     }
//     //  echo $matrixIncome .'/'.  $getvalue;


// }


function bonus()
{

    $year = date('Y');
    $month = date('m');

    include("../configration/dbconnection.php");
    $userUid = $_SESSION['username'];
    global $bonusIncome;
    $sqls = "SELECT master_user.* , node.userid as reflerId FROM master_user
    JOIN node ON master_user.user_uid = node.userid
    WHERE node.refid = '$userUid'
    AND master_user.status = 'A'
    AND master_user.created_at BETWEEN '2023-12-01' AND '2023-12-30'";

    $results = $conn->prepare($sqls);
    $results->execute();
    $rows = $results->fetchAll();
    

    if ($results->rowCount() >= 20) {
        // echo 'hello';

        $sqls_bonus_income = "SELECT userid  FROM master_user
        JOIN node ON master_user.user_uid = node.userid
        WHERE node.refid = '$userUid'
        AND master_user.status = 'A'
        AND master_user.created_at BETWEEN '2023-12-01' AND '2023-12-31'";

        $results_bonus_income = $conn->prepare($sqls_bonus_income);
        $results_bonus_income->execute();
        $data = array();


        for ($i = 0; $rows = $results_bonus_income->fetch(); $i++) {
            //  echo 'hello';
            $userid = $rows['userid'];
            $data[] = $userid;

            $sql1 = $conn->prepare("SELECT amount FROM wallet WHERE userid = '$userid' ");
            $sql1->execute();
            $row1 = $sql1->fetch();
            $row2 = $row1['amount'];
            $getbonus = ($row2 * 5) / 100;
            $bonusIncome += $getbonus;


        }



        // Now $bonusIncome contains the total bonus income for the selected users

        // echo $bonusIncome . '/' . $userid . '/' . $year;
    }
?>
    <!-- <script>
        const userlistsss = <?php //echo json_encode($data) ?>;
        console.log('data', userlistsss);
    </script> -->

<?php
    // echo $total_count;
}



bonus();
// getincome();
?>