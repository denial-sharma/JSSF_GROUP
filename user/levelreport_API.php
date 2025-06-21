<?php
include('../configration/dbconnection.php');
$userid = $_SESSION['username'];

$sql = "SELECT * from node join master_user on node.userid = master_user.user_uid where node.refid = '$userid' and master_user.status = 'A' ";
$result = $conn->query($sql);

$organizedArray = array();
$totalValuesCount = 0;
$arrayPosition = 0;


$recordsInEachElement = 3;

if ($result->rowCount() > 0) {

    for ($i = 0; $row = $result->fetch(); $i++) {

        $organizedArray[$arrayPosition][] = $row;

        if (count($organizedArray[$arrayPosition]) >= $recordsInEachElement) {
            $arrayPosition++;
            $recordsInEachElement *= 3;
        }
    }
    ?>
    <script>

        const array = <?php echo json_encode($organizedArray);?>;
        console.log(array);
       
    </script>
    <?php
} else {
    echo "No records found.";
}
