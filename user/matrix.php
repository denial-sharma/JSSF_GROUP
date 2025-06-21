<?php
include("../configration/dbconnection.php");
$userUid = $_SESSION['username'];
$monthMatrix = date('m');
$yearMatrix = date('Y');

// Query to get count of users
$sql = "SELECT COUNT(*) as count
        FROM master_user 
        JOIN node ON master_user.user_uid = node.userid 
        WHERE node.refid = '$userUid' 
        AND master_user.status = 'A' 
        AND master_user.created_at BETWEEN '$yearMatrix-$monthMatrix-01' AND '$yearMatrix-$monthMatrix-31'";

$result = $conn->prepare($sql);
$result->execute();
$row = $result->fetch();
$count = $row["count"];
// echo "count:" . $count . "//";

if ($result->rowCount() >= 0) {
    // Fetching count value
    //  echo "heelo 1";
    $month = date('m');
    $year = date('Y');
    // $month = 03;
    // $year = 2024;
    $getvalue = 0;
    $number_array = [3, 6, 9, 12, 15, 18, 21];
    $current_date = "2024-05-07";
    $current_month = date("m", strtotime($current_date));

    // Check if count 
    // if (in_array($count, $number_array)) {
    // echo "heelo 2";
    // Give reward of 100rs
    // Insert new record into reward_table
    $rowCount_martix = $conn->prepare("SELECT * FROM matrix WHERE `userid` = '$userUid' AND `month` = $month AND `year` = $year ");
    $rowCount_martix->execute();
    // echo "heelo3";
    if ($rowCount_martix->rowCount() == 0) {
        // echo "hekko 2 // ";
        $getvalues = floor($count / 3) * 100;
        $getvalue = $getvalues;
        // echo  "getvalues = " . $getvalues;

        $insertCountMatrix = "INSERT INTO matrix(`userid`,`amount`,`month`,`year`) VALUES (:userid, :amount, :month, :year)";
        $results = $conn->prepare($insertCountMatrix);
        $matrix = $results->execute(array(':userid' => $userUid, ':amount' => $getvalue, ':month' => $month, ':year' => $year));

    } else {
         // echo $getvalue , $getvalues , $count;
        $getMartix = $conn->prepare("SELECT * FROM matrix WHERE `userid` = '$userUid' AND `month` = $month AND `year` = $year ");
        $getMartix->execute();
        $rows = $getMartix->fetch(PDO::FETCH_ASSOC);
        $matrix_month = $rows['month'];
        $matrix_year = $rows['year'];
        $getvalues = floor($count / 3) * 100;
        $getvalue = $getvalues;
        //   echo $matrix_month ."//". $matrix_year ."//". $month ."//". $year ."//". $getvalue ;


        if ($matrix_month == $month && $matrix_year == $year) {
            $updateMatrix = $conn->prepare("UPDATE `matrix` SET `amount` = $getvalue WHERE `userid` = '$userUid' AND `month` = $month AND `year` = $year  ");
            $updateMatrix->execute();
            //         // echo "heelo4 //" ;
        } 
        // else {

            // $getMartix_1 = $conn->prepare("SELECT * FROM matrix WHERE `userid` = '$userUid'");
            // $getMartix_1->execute();
            // $rows_1 = $getMartix_1->fetch(PDO::FETCH_ASSOC);
            // $matrix_amt = $rows_1['amount'];

            // if($matrix_amt != 0){
            //     $insertMatrix_month_year_amount = "INSERT INTO matrix(`userid`,`amount`,`month`,`year`) VALUES (:userid, :amount, :month, :year)";
            //     $insertResult = $conn->prepare($insertMatrix_month_year_amount);
            //     $matrixResult = $insertResult->execute(array(':userid' => $userUid, ':amount' => $getvalue, ':month' => $month, ':year' => $year));
            // }else{
            //     $updateMatrix_1 = $conn->prepare("UPDATE `matrix` SET `month`= $month , `year` = $year WHERE `userid` = '$userUid' ");
            //     $updateMatrix_1->execute();
            // }

            //         // echo "heelo 5 //" ;
            //         // $updateMatrix_month_year_amount = $conn->prepare("UPDATE `matrix` SET `amount` = $getvalue , `month` = $month , `year` = $year WHERE `userid` = $userUid");
            //         // $updateMatrix_month_year_amount->execute();
        // }
    }
} else {
    echo "0";
}
