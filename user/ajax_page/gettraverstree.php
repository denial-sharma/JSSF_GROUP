<?php
header('Content-Type: application/json');


 $prentu_id = $_POST['refid'];
 geltraverslist($prentu_id);
 
 function geltraverslist($prentu_id){
  $trvlist = array();
  $lvl_1 = ttlrefuser($prentu_id);
getchildlist($lvl_1,$trvlist);
//  echo json_encode($output);
}

function ttlrefuser($refid)
{
  include ("../../configration/dbconnection.php") ;
  // $refid = $_POST['refid'];
  $result = $conn->prepare("SELECT master_user.id, master_user.user_uid FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE `sponcerid` = '$refid' ");
  $result->execute();
  $reflist = array();
  for ($i = 1; $row = $result->fetch(); $i++) {
      $reflist[] = array(
          "userid" => $row['user_uid'],
          "parentid" => $refid
      );
  }
  return $reflist;
}

function getchildlist($lvl_1,$trvlist){
  
  if(count($lvl_1) > 0){
     $trvlist[] = $lvl_1;
    // echo json_encode($trvlist);
      $temp_arr = array();
      foreach ($lvl_1 as $value) {
        $temp_arr = array_merge($temp_arr,  ttlrefuser( $value['userid']));
      }
    
     getchildlist($temp_arr,$trvlist);

  }
 else{
  // $trvlist[] = $temp_arr;
  echo json_encode($trvlist);
    
 }
}

// $del1 = {
//   'name': 'JSSF001',
//   'title': 'Manish Pal',
//   'className': 'even',
//   'children': [
//       {
//           'name': 'JSSF002', 'title': 'department manager', 'className': 'odd',
//           'children': [
//               { 'name': 'JSSF004', 'title': 'senior engineer', 'className': 'even' },
//               {
//                   'name': 'JSSF005', 'title': 'senior engineer', 'className': 'even',
//                   'children': [
//                       { 'name': 'JSSF008', 'title': 'engineer', 'className': 'odd' },
//                       { 'name': 'JSSF009', 'title': 'engineer', 'className': 'odd' },
//                       { 'name': 'JSSF010', 'title': 'engineer', 'className': 'odd' }
//                   ]
//               }
//           ]
//       },
//       {
//           'name': 'JSSF003', 'title': 'department manager', 'className': 'odd',
//           'children': [
//               { 'name': 'JSSF011', 'title': 'senior engineer', 'className': 'even' },
//               { 'name': 'JSSF012', 'title': 'senior engineer', 'className': 'even' }
//           ]
//       }
//   ]
// }
 ?>
