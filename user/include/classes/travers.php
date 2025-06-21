<?php

/**
 * 
 */ 

class travers
{
    function geltraverslist($prentu_id){
        $trvlist = array();
        $lvl_1 = $this->ttlrefuser($prentu_id);
      $output =  $this->getchildlist($lvl_1,$trvlist);
       echo json_encode($output);
    }

    function ttlrefuser($refid)
    {
        include('../configration/dbconnection.php');
        // $refid = $_POST['refid'];
        $result = $conn->prepare("SELECT master_user.id, master_user.user_uid FROM `node` INNER JOIN master_user on master_user.id = node.userid WHERE `refid` = '$refid' ");
        $result->execute();
        $reflist = array();
        for ($i = 1; $row = $result->fetch(); $i++) {
            $reflist[] = array(
                "userid" => $row['user_uid']
            );
        }
        return $reflist;
    }

    function getchildlist($lvl_1,$trvlist){
        if(count($lvl_1) > 0){
           $trvlist[] = $lvl_1;
            $temp_arr = array();
            foreach ($lvl_1 as $value) {
              $temp_arr[] =   $this->ttlrefuser($value->userid);
            }
            $this->getchildlist($temp_arr,$trvlist);
        }
        else{
            return $trvlist;
        }
    }

    
}
