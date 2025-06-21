<?php
$totalIncomeMagicPool2 = 0;
function magicroom()
{
    include('../configration/dbconnection.php');
    $userId = $_SESSION['username'];
    $query  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
                                magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
                                where magic_pool_income_2.room1 = 3750 and master_user.status = 'A' order by master_user.created_at asc");
    $query->execute();
    while ($row = $query->fetch()) {
        $total_user_count = $row['count_userid'];
        if ($total_user_count == 1) {
            $sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room1` = 1250 where userid = '$userId'");
            $sql1->execute();
            break;
        } else if ($total_user_count == 2) {
            $sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room1` = 2500 where userid = '$userId' ");
            $sql2->execute();
            break;
        } else if ($total_user_count >= 3) {
            $sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room1` = 3750  where userid = '$userId' ");
            $sql3->execute();
        }
    }
    $getRoom1Income = $conn->prepare("SELECT room1 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom1Income->execute();
    $getResultRoom1Income = $getRoom1Income->fetch();
    $room1Income = $getResultRoom1Income['room1'];

    if ($room1Income == 3750) {
        $setroom2income = $conn->prepare("UPDATE magic_pool_income_2 SET `room2` = 1750 WHERE userid = '$userId'");
        $setroom2income->execute();
        $setWithdrawalAmount1 = $conn->prepare("UPDATE withdrawal SET `amount` = 110  WHERE userid = '$userId' ");
        $setWithdrawalAmount1->execute();
    }

    $query2  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room1 = 210 and master_user.status = 'A' order by master_user.created_at asc");
    $query2->execute();
    $row2 = $query2->fetch();
    $getcount_userid = $row2['count_userid'];
    if ($getcount_userid == 1) {
        $updateRoom2_Sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room2` = 100  where userid = '$userId'");
        $updateRoom2_Sql1->execute();
    } else if ($getcount_userid == 2) {
        $updateRoom2_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room2` = 200 where userid = '$userId' ");
        $updateRoom2_sql2->execute();
    } else if ($getcount_userid >= 3) {
        $updateRoom2_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room2` = 300  where userid = '$userId' ");
        $updateRoom2_sql3->execute();
    }

    $getRoom2Income = $conn->prepare("SELECT room2 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom2Income->execute();
    $getResultRoom2Income = $getRoom2Income->fetch();
    $room2Income = $getResultRoom2Income['room2'];

    if ($room2Income == 300) {
        $setroom3income = $conn->prepare("UPDATE magic_pool_income_2 SET `room3` = 150 WHERE userid = '$userId'");
        $setroom3income->execute();
        $setWithdrawalAmount2 = $conn->prepare("UPDATE withdrawal SET `amount` = 260  WHERE userid = '$userId' ");
        $setWithdrawalAmount2->execute();
    }


    $query3  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room2 = 300 and master_user.status = 'A' order by master_user.created_at asc");
    $query3->execute();
    $row3 = $query3->fetch();
    $getcountuserid = $row3['count_userid'];
    if ($getcountuserid == 1) {
        $updateRoom3_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room3` = 150  where userid = '$userId'");
        $updateRoom3_sql1->execute();
    } else if ($getcountuserid == 2) {
        $updateRoom3_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room3` = 300  where userid = '$userId' ");
        $updateRoom3_sql2->execute();
    } else if ($getcountuserid >= 3) {
        $updateRoom3_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room3` = 450  where userid = '$userId' ");
        $updateRoom3_sql3->execute();
    }

    $getRoom3Income = $conn->prepare("SELECT room3 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom3Income->execute();
    $getResultRoom3Income = $getRoom3Income->fetch();
    $room3Income = $getResultRoom3Income['room3'];

    if ($room3Income == 450) {
        $setroom4income = $conn->prepare("UPDATE magic_pool_income_2 SET `room4` = 250 WHERE userid = '$userId'");
        $setroom4income->execute();
        $setWithdrawalAmount3 = $conn->prepare("UPDATE withdrawal SET `amount` = 460 WHERE userid = '$userId' ");
        $setWithdrawalAmount3->execute();
    }

    $query4  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room3 = 450 and master_user.status = 'A' order by master_user.created_at asc");
    $query4->execute();
    $row4 = $query4->fetch();
    $get_countuserid = $row4['count_userid'];
    if ($get_countuserid == 1) {
        $updateRoom4_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room4` = 250  where userid = '$userId'");
        $updateRoom4_sql1->execute();
    } else if ($get_countuserid == 2) {
        $updateRoom4_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room4` = 500  where userid = '$userId' ");
        $updateRoom4_sql2->execute();
    } else if ($get_countuserid >= 3) {
        $updateRoom4_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room4` = 750  where userid = '$userId' ");
        $updateRoom4_sql3->execute();
    }

    $getRoom4Income = $conn->prepare("SELECT room4 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom4Income->execute();
    $getResultRoom4Income = $getRoom4Income->fetch();
    $room4Income = $getResultRoom4Income['room4'];

    if ($room4Income == 450) {
        $setroom5income = $conn->prepare("UPDATE magic_pool_income_2 SET `room5` = 350 WHERE userid = '$userId'");
        $setroom5income->execute();
        $setWithdrawalAmount4 = $conn->prepare("UPDATE withdrawal SET `amount` = 860 WHERE userid = '$userId' ");
        $setWithdrawalAmount4->execute();
    }

    $query5  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room4 = 750 and master_user.status = 'A' order by master_user.created_at asc");
    $query5->execute();
    $row5 = $query5->fetch();
    $getcountuserid5 = $row5['count_userid'];
    if ($getcountuserid5 == 1) {
        $updateRoom5_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room5` = 350  where userid = '$userId'");
        $updateRoom5_sql1->execute();
    } else if ($getcountuserid5 == 2) {
        $updateRoom5_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room5` = 700  where userid = '$userId' ");
        $updateRoom5_sql2->execute();
    } else if ($getcountuserid5 >= 3) {
        $updateRoom5_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room5` = 1050  where userid = '$userId' ");
        $updateRoom5_sql3->execute();
    }

    $getRoom5Income = $conn->prepare("SELECT room5 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom5Income->execute();
    $getResultRoom5Income = $getRoom5Income->fetch();
    $room5Income = $getResultRoom5Income['room5'];

    if ($room5Income == 1050) {
        $setroom6income = $conn->prepare("UPDATE magic_pool_income_2 SET `room6` = 450 WHERE userid = '$userId'");
        $setroom6income->execute();
        $setWithdrawalAmount4 = $conn->prepare("UPDATE withdrawal SET `amount` = 1460 WHERE userid = '$userId' ");
        $setWithdrawalAmount4->execute();
    }


    $query6  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room5 = 1050 and master_user.status = 'A' order by master_user.created_at asc");
    $query6->execute();
    $row6 = $query6->fetch();
    $getCountUserid = $row6['count_userid'];
    if ($getCountUserid == 1) {
        $updateRoom6_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room6` = 450  where userid = '$userId'");
        $updateRoom6_sql1->execute();
    } else if ($getCountUserid == 2) {
        $updateRoom6_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room6` = 900  where userid = '$userId' ");
        $updateRoom6_sql2->execute();
    } else if ($getCountUserid >= 3) {
        $updateRoom6_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room6` = 1350  where userid = '$userId' ");
        $updateRoom6_sql3->execute();
    }

    $getRoom6Income = $conn->prepare("SELECT room6 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom6Income->execute();
    $getResultRoom6Income = $getRoom6Income->fetch();
    $room6Income = $getResultRoom6Income['room6'];

    if ($room6Income == 1350) {
        $setroom7income = $conn->prepare("UPDATE magic_pool_income_2 SET `room7` = 550 WHERE userid = '$userId'");
        $setroom7income->execute();
        $setWithdrawalAmount5 = $conn->prepare("UPDATE withdrawal SET `amount` = 2260 WHERE userid = '$userId' ");
        $setWithdrawalAmount5->execute();
    }


    $query7  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room6 = 1350 and master_user.status = 'A' order by master_user.created_at asc");
    $query7->execute();
    $row7 = $query7->fetch();
    $getCountUserid_ = $row7['count_userid'];
    if ($getCountUserid_ == 1) {
        $updateRoom7_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room7` = 550  where userid = '$userId'");
        $updateRoom7_sql1->execute();
    } else if ($getCountUserid_ == 2) {
        $updateRoom7_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room7` = 1100 where userid = '$userId' ");
        $updateRoom7_sql2->execute();
    } else if ($getCountUserid_ >= 3) {
        $updateRoom7_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room7` = 1650  where userid = '$userId' ");
        $updateRoom7_sql3->execute();
    }

    $getRoom7Income = $conn->prepare("SELECT room7 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom7Income->execute();
    $getResultRoom7Income = $getRoom7Income->fetch();
    $room7Income = $getResultRoom7Income['room7'];

    if ($room7Income == 1650) {
        $setroom8income = $conn->prepare("UPDATE magic_pool_income_2 SET `room8` = 650 WHERE userid = '$userId'");
        $setroom8income->execute();
        $setWithdrawalAmount6 = $conn->prepare("UPDATE withdrawal SET `amount` = 3260 WHERE userid = '$userId' ");
        $setWithdrawalAmount6->execute();
    }

    $query8  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room7 = 1650 and master_user.status = 'A' order by master_user.created_at asc");
    $query8->execute();
    $row8 = $query8->fetch();
    $getCountUserid_8 = $row8['count_userid'];
    if ($getCountUserid_8 == 1) {
        $updateRoom8_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room8` = 650  where userid = '$userId'");
        $updateRoom8_sql1->execute();
    } else if ($getCountUserid_8 == 2) {
        $updateRoom8_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room8` = 1300  where userid = '$userId' ");
        $updateRoom8_sql2->execute();
    } else if ($getCountUserid_8 >= 3) {
        $updateRoom8_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room8` = 1950  where userid = '$userId' ");
        $updateRoom8_sql3->execute();
    }

    $getRoom8Income = $conn->prepare("SELECT room8 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom8Income->execute();
    $getResultRoom8Income = $getRoom8Income->fetch();
    $room8Income = $getResultRoom8Income['room8'];

    if ($room8Income == 1950) {
        $setroom9income = $conn->prepare("UPDATE magic_pool_income_2 SET `room9` = 750 WHERE userid = '$userId'");
        $setroom9income->execute();
        $setWithdrawalAmount7 = $conn->prepare("UPDATE withdrawal SET `amount` = 4460 WHERE userid = '$userId' ");
        $setWithdrawalAmount7->execute();
    }

    $query9  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
        magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
        where magic_pool_income_2.room8 = 1950 and master_user.status = 'A' order by master_user.created_at asc");
    $query9->execute();
    $row9 = $query9->fetch();
    $getCountUserid_9 = $row9['count_userid'];
    if ($getCountUserid_9 == 1) {
        $updateRoom9_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room9` = 750  where userid = '$userId'");
        $updateRoom9_sql1->execute();
    } else if ($getCountUserid_9 == 2) {
        $updateRoom9_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room9` = 1500  where userid = '$userId' ");
        $updateRoom9_sql2->execute();
    } else if ($getCountUserid_9 >= 3) {
        $updateRoom9_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room9` = 2250  where userid = '$userId' ");
        $updateRoom9_sql3->execute();
    }

    $getRoom9Income = $conn->prepare("SELECT room9 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom9Income->execute();
    $getResultRoom9Income = $getRoom9Income->fetch();
    $room9Income = $getResultRoom9Income['room9'];

    if ($room9Income == 2250) {
        $setroom10income = $conn->prepare("UPDATE magic_pool_income_2 SET `room10` = 850 WHERE userid = '$userId'");
        $setroom10income->execute();
        $setWithdrawalAmount8 = $conn->prepare("UPDATE withdrawal SET `amount` = 5860 WHERE userid = '$userId' ");
        $setWithdrawalAmount8->execute();
    }

    $query10  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
    magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
    where magic_pool_income_2.room9 = 2250 and master_user.status = 'A' order by master_user.created_at asc");
    $query10->execute();
    $row10 = $query10->fetch();
    $getCountUserid_10 = $row10['count_userid'];
    if ($getCountUserid_10 == 1) {
        $updateRoom10_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room10` = 850  where userid = '$userId'");
        $updateRoom10_sql1->execute();
    } else if ($getCountUserid_10 == 2) {
        $updateRoom10_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room10` = 1700  where userid = '$userId' ");
        $updateRoom10_sql2->execute();
    } else if ($getCountUserid_10 >= 3) {
        $updateRoom10_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room10` = 2550  where userid = '$userId' ");
        $updateRoom10_sql3->execute();
    }

    $getRoom10Income = $conn->prepare("SELECT room10 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom10Income->execute();
    $getResultRoom10Income = $getRoom10Income->fetch();
    $room10Income = $getResultRoom10Income['room10'];

    if ($room10Income == 2550) {
        $setroom11income = $conn->prepare("UPDATE magic_pool_income_2 SET `room11` = 950 WHERE userid = '$userId'");
        $setroom11income->execute();
        $setWithdrawalAmount9 = $conn->prepare("UPDATE withdrawal SET `amount` = 7460 WHERE userid = '$userId' ");
        $setWithdrawalAmount9->execute();
    }

    $query11  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
                magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
                where magic_pool_income_2.room10 = 2550 and master_user.status = 'A' order by master_user.created_at asc");
    $query11->execute();
    $row11 = $query11->fetch();
    $getCountUserid_11 = $row11['count_userid'];
    if ($getCountUserid_11 == 1) {
        $updateRoom11_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room11` = 950  where userid = '$userId'");
        $updateRoom11_sql1->execute();
    } else if ($getCountUserid_11 == 2) {
        $updateRoom11_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room11` = 1900  where userid = '$userId'");
        $updateRoom11_sql2->execute();
    } else if ($getCountUserid_11 >= 3) {
        $updateRoom11_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room11` = 2850  where userid = '$userId'");
        $updateRoom11_sql3->execute();
    }

    $getRoom11Income = $conn->prepare("SELECT room11 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom11Income->execute();
    $getResultRoom11Income = $getRoom11Income->fetch();
    $room11Income = $getResultRoom11Income['room11'];

    if ($room11Income == 2850) {
        $setroom12income = $conn->prepare("UPDATE magic_pool_income_2 SET `room12` = 1050 WHERE userid = '$userId'");
        $setroom12income->execute();
        $setWithdrawalAmount9 = $conn->prepare("UPDATE withdrawal SET `amount` = 9260 WHERE userid = '$userId' ");
        $setWithdrawalAmount9->execute();
    }

    $query12  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
                magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
                where magic_pool_income_2.room11 = 2850 and master_user.status = 'A' order by master_user.created_at asc");
    $query12->execute();
    $row12 = $query12->fetch();
    $getCountUserid_12 = $row12['count_userid'];
    if ($getCountUserid_12 == 1) {
        $updateRoom12_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room12` = 1050  where userid = '$userId'");
        $updateRoom12_sql1->execute();
    } else if ($getCountUserid_12 == 2) {
        $updateRoom12_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room12` = 1100  where userid = '$userId' ");
        $updateRoom12_sql2->execute();
    } else if ($getCountUserid_12 >= 3) {
        $updateRoom12_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room12` = 3150  where userid = '$userId' ");
        $updateRoom12_sql3->execute();
    }

    $getRoom12Income = $conn->prepare("SELECT room12 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom12Income->execute();
    $getResultRoom12Income = $getRoom12Income->fetch();
    $room12Income = $getResultRoom12Income['room12'];

    if ($room12Income == 3150) {
        $setroom13income = $conn->prepare("UPDATE magic_pool_income_2 SET `room13` = 1150 WHERE userid = '$userId'");
        $setroom13income->execute();
        $setWithdrawalAmount10 = $conn->prepare("UPDATE withdrawal SET `amount` = 11260 WHERE userid = '$userId' ");
        $setWithdrawalAmount10->execute();
    }

    $query13  = $conn->prepare(" SELECT  count(master_user.user_uid)as count_userid FROM  master_user join 
                magic_pool_income_2 on master_user.user_uid = magic_pool_income_2.userid 
                where magic_pool_income_2.room12 = 3150 and master_user.status = 'A' order by master_user.created_at asc");
    $query13->execute();
    $row13 = $query13->fetch();
    $getCountUserid_13 = $row13['count_userid'];
    if ($getCountUserid_13 == 1) {
        $updateRoom13_sql1 = $conn->prepare("UPDATE magic_pool_income_2 SET `room13` = 1150  where userid = '$userId'");
        $updateRoom13_sql1->execute();
    } else if ($getCountUserid_13 == 2) {
        $updateRoom13_sql2 = $conn->prepare("UPDATE magic_pool_income_2 SET `room13` = 2300  where userid = '$userId' ");
        $updateRoom13_sql2->execute();
    } else if ($getCountUserid_13 >= 3) {
        $updateRoom13_sql3 = $conn->prepare("UPDATE magic_pool_income_2 SET `room13` = 3450  where userid = '$userId' ");
        $updateRoom13_sql3->execute();
    }

    $getRoom13Income = $conn->prepare("SELECT room13 FROM magic_pool_income_2 WHERE userid = '$userId'");
    $getRoom13Income->execute();
    $getResultRoom13Income = $getRoom13Income->fetch();
    $room13Income = $getResultRoom13Income['room13'];

    if ($room13Income == 3450) {
        $setroom2_1_income = $conn->prepare("UPDATE magic_pool_income_2 SET `room1` = 1250 WHERE userid = '$userId'");
        $setroom2_1_income->execute();
        $setWithdrawalAmount10 = $conn->prepare("UPDATE withdrawal SET `amount` = 13460 WHERE userid = '$userId' ");
        $setWithdrawalAmount10->execute();
    }


    echo $getcount_userid;
?>
    <script>
        const userlists = <?php echo json_encode($getcount_userid) ?>
        console.log('data', userlists);
    </script>
<?php
}

function totalincome()
{

    global $totalIncomeMagicPool2;

    include('../configration/dbconnection.php');
    $user_Id = $_SESSION['username'];

    $sql = $conn->prepare("SELECT SUM(room1 + room2 + room3 + room4 + room5 + room6 + room7 + room8 + room9 + room10 + room11 + room12 + room13) AS total_sum FROM magic_pool_income_2 where userid = '$user_Id';");
    $sql->execute();
    $row = $sql->fetch();
    $totalIncomeMagicPool2 = $row['total_sum'];
}

totalincome();
magicroom();
?>