<?php
session_start();
if (isset($_POST['logged'])) {

   define('DB_SERVER', 'localhost');
   // define('DB_USERNAME', 'root');
   // define('DB_PASSWORD', '');
   // define('DB_DATABASE', 'u937865059_jssfdb');

   //  define('DB_SERVER', '89.117.188.28');
   //  define('DB_USERNAME', 'u937865059_jssfadmin');
   //  define('DB_PASSWORD', 'Ubro@2412!');
   //  define('DB_DATABASE', 'u937865059_jssfdb');

    define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'mySQL@1234');
   define('DB_DATABASE', 'jssf_server_db');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   $myusername = mysqli_real_escape_string($db,$_POST['username']);
   $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
   
   $sql = "SELECT id,user_uid,user_name,status FROM `master_user` WHERE `user_uid` = '$myusername' AND `user_password`='$mypassword'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //$active = $row['active'];
   $count = mysqli_num_rows($result);
   // If result matched $myusername and $mypassword, table row must be 1 row
   if($count == 1) {
    //   session_register("myusername");
      $_SESSION['id']  = $row['id'];
      $_SESSION['title']  = $row['user_name'];
      $_SESSION['username'] = $row['user_uid'];
      if($row['status'] == "A"  || $row['status'] == 'D'){

      // }
      // $userid = $row['user_uid'];
      // $sqlcheck = "SELECT * FROM `transaction` WHERE `userid` = '$userid'";
      // $resultcheck = mysqli_query($db,$sqlcheck);
      // $rowcheck = mysqli_fetch_array($resultcheck,MYSQLI_ASSOC);
      // //$active = $row['active'];
      // $paycount = mysqli_num_rows($resultcheck);
      // if($paycount == 1){
         header("Location: dashboard.php");        
      }else{      
         header("Location: payment.php");
      }
      //header("Location: sitemantanis.php");
   }else {
      $error = "Your Login Userid or Mobile Number is invalid";
      header("Location: index.php");
   }
    
}

?>