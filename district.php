<?php
include ("configration/dbconnection.php") ;
$dist = $_POST['dist'];
$result = $conn->prepare("SELECT * FROM `city` where `dist_id` = $dist");
$result->execute();
?>
<option value="">Choose City</option>
<?php
for($i=0 ; $row=$result->fetch(); $i++ ){
    echo "<option value=".$row['id'].">".$row['city_name']."</option>";
}
?>