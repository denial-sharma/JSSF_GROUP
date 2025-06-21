<?php

$autoPoolWallet = 0;
$levelCounter = 0;
$trvlist = array();
function geltraverslist()
{
    global $trvlist;
    $lvl_1 = ttlrefuser($_SESSION['username']);
    getchildlist($lvl_1, $trvlist);


    //  echo json_encode($output);
}

function ttlrefuser($refid)
{
    include("../configration/dbconnection.php");
    // $refid = $_POST['refid'];
    $result = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE node.sponcerid = '$refid' and master_user.status = 'A' ");
    $result->execute();
    $reflist = array();
    for ($i = 1; $row = $result->fetch(); $i++) {
        $reflist[] = array(
            "title" => $row['user_name'],
            "name" => $row['user_uid'],
            "parentid" => $refid,
            "status" => $row['status']
        );
    }
    return $reflist;
}

function getchildlist($lvl_1)
{
    global $trvlist;
    if (count($lvl_1) > 0) {
        $trvlist[] = $lvl_1;
        // echo json_encode($trvlist);
        $temp_arr = array();
        foreach ($lvl_1 as $value) {
            $temp_arr = array_merge($temp_arr,  ttlrefuser($value['name']));
        }

        getchildlist($temp_arr);
    } else {
        calculateAutoPoolWallet();
?>
        <script>
            const TRIVSELIST = <?php echo  json_encode($trvlist); ?>
            //   datascource.children = transformData(TRIVSELIST)
            console.log('TRIVSELIST', TRIVSELIST);
        </script>
<?php

    }
}

function calculateAutoPoolWallet()
{
    global $trvlist;
    global $autoPoolWallet;
    $maxLevel = 13;

    global $levelCounter;
    foreach ($trvlist as $levelList) {
        $levelCounter++;
        if ($levelCounter > $maxLevel) {
            break; // max 13 level allwoed for to get money
        }
        if (count($levelList) >= 3 ** $levelCounter) {
            $autoPoolWallet += count($levelList) * 5; // 5rs per person
        } else {
            break;
        }
        // echo  count($levelList).' '. $levelCounter.' '. 3**$levelCounter .'<br>';

    }
    //TODO minus the amount that have been withdraw by the user
}

geltraverslist();

?>
