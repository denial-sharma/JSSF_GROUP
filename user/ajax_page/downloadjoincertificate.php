<?php
include("../../configration/dbconnection.php");
$id = $_POST['id'];
$sql = $conn->prepare("SELECT * FROM master_user WHERE id=$id");
$sql->execute();
$row = $sql->fetch();
echo '
              <div class="img">
                <img src="../img/logo/jssf-logo 2.jpg" alt="" width="150" height="150" style="border: 1px solid black;">
              </div>
              <div class="card-header">
                <h5 class="card-title">JSSF GROUP</h5>
                <p class="discription">Swaroop Nagar, Sikatiha, Lakhimpur-Kheri - 262701, Uttar Pradesh</p>
              </div>
              <div class="card-body" >
                <div class="usrid" style="text-align: center;">
                  <span class="user-font" style="font-size: x-large;">User-Id: </span><span class="user-id" style="font-size: larger;">' . $row['user_uid'] . '</span>
                </div>
                <div class="user_details" style="font-size:large; margin-top: 36px;">
                  <span> Name:</span> <span >' . $row['user_name'] . '</span><br>
                  <span> Address:</span> <span >'. $row['user_add1'] . '</span>
                  <span>' . $row['user_city'] . ' ,</span>
                  <span>' . $row['pincode'] . ' ,</span>
                  <span>' . $row['user_state'] . '</span>
                </div>
                 <div class="auth">
      <h6>Authorised By - JSSF GROUP</h6>
    </div>
              </div>
              <div class="card-foter">
                <span>+91 6386975018 , 9555369212 | jssfgroup@gmail.com</s>
              </div> 
              </div>
              <div class="modal-footer">
         <a href="directjoincertificeate.php?id=' . $row['id'] . '"><button type="button" class="btn btn-primary">Print</button></a>
        </div>                             
 
                              ';
