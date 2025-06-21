<?php 

    include('../../configration/dbconnection.php');
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $bankName = $_POST['bankname'];  
    $bankIFSC = $_POST['ifsc'];
    $acountNumber = $_POST['acnumber'];
    $holderName = $_POST['hodername'];

    if(!empty($id)){
        //update bank details
        $updateBankDetails = $conn->prepare("UPDATE bankdetails SET `bankname` = '$bankName' , `ifsc_code` =  '$bankIFSC' , `account_no` = $acountNumber , `holdername` = '$holderName'
                                    WHERE `id` = $id");
        $updateBankDetails->execute();
        if($updateBankDetails){
            echo '002';
        }
      
    }
    else{
        //insert new bank details
        
    $sql = $conn->prepare("SELECT * FROM bankdetails Where userid = '$userid'");
    $sql->execute();
    if($sql->rowCount() > 0){
        echo '003';
    }else{
        $sql = $conn->prepare("INSERT INTO `bankdetails`(`userid`,`bankname`,`ifsc_code` , `account_no`,`holdername`)VALUES(:uid,:bname,:bifsc ,:baccountno,:hname)");
        $uploadtransition = $sql->execute(array(
            ':uid'=>$userid,
            ':bname'=>$bankName,
            ':bifsc'=>$bankIFSC,
            ':baccountno' => $acountNumber,
            ':hname' => $holderName
        ));
    
        if($uploadtransition){
            echo '001';
        }
    }

   
    }
       
   
?>