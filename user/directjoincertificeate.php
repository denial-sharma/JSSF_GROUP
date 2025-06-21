<?php
$userid = $_GET['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $profiledt = $fetchrecordobj->profiledata($userid);
} else {
  header('Location: index.php'); //redirect URL
}

?>
<?php include 'head.php' ?>


<style>


  .card {
    width: 80%;
    color: black;
  }

  .img {
    position: absolute;
    top: 55px;
    left: 24px;
  }
  .img img {
      width: 120px;
      height: 120px;
    }

  .card-header {
    display: block !important;
    border: 1px solid #f9ac7a;
    /* background-color: #f9ac7a !important; */
  }

  .card-title {
    text-align: center;
    margin-left: 30%;
    margin-top: 8px;
    color: black;
  }

  .discription {
    text-align: center;
    margin-left: 32%;
    color: black;
  }

  .auth {
    text-align: end;
    margin-top: 16px;
  }

  .card-foter {
    /* background-color: #595bc1; */
    text-align: center;
    margin-top: -12px;
    color: white;
  }

  .logo_image {
    position: absolute;
    top: 40%;
    left: 70%;
  }

  @media screen and (max-width:760px) {
    .card {
      width: 100% !important;
      color: black;
    }

    .img {
      position: absolute;
      top: 43px;
      left: 15px;
    }

    .img img {
      width: 80px;
      height: 80px;
    }

    .card .card-header {
      height: 90px;
    }

    .card-title {
      font-size: 15px;
    }

    .discription {
      font-size: 10px;
      margin-top: -12px;
    }

    .user-font {
      font-size: 15px !important;
    }

    .user-id {
      font-size: 11px !important;
    }

    .user_details {
      font-size: 13px !important;
      margin-top:10px !important;
    }

    .logo_image {
      position: absolute;
      top: 40%;
      left: 70%;
    }

    .logo_image img {
      width: 80px;
      height: 80px;
    }

    .card-foter span {
      font-size: 11px;
    }

    .auth h6{
      font-size: 12px;
      margin-top: 16px;
    }
  }

</style>
<div class="card" style="width: 50%;">
  <div class="img">
    <img src="../img/logo/jssf-logo 2.jpg" alt="" style="border: 1px solid black;">
  </div>
  <div class="card-header" style="background-color:#f9ac7a">
    <h5 class="card-title">JSSF GROUP</h5>
    <p class="discription">Swaroop Nagar, Sikatiha, Lakhimpur-Kheri - 262701, Uttar Pradesh</p>
  </div>
  <div class="card-body">
    <div class="usrid" style="text-align: center;">
      <span style="font-size: x-large;">User-Id: </span><span style="font-size: larger;"><?php echo $profiledt['user_uid'] ?></span>
    </div>
    <div class="user_details" style="font-size:large; margin-top: 36px;">
      <span> Name:</span> <span><?php echo $profiledt['user_name'] ?></span><br>
      <span> Address:</span> <span><?php echo $profiledt['user_add1'] ?></span>
      <span><?php echo $profiledt['user_city'] ?> ,</span>
      <span><?php echo $profiledt['pincode'] ?>,</span>
      <span><?php echo $profiledt['user_state'] ?></span>
    </div>
    <!-- <div class="logo_image">
      <img src="../img/logo/jssf-logo 2.jpg" width="150" height="150" alt="">
    </div> -->
    <div class="auth">
      <h6>Authorised By - JSSF GROUP</h6>
    </div>

  </div>
  <div class="card-foter" style="background-color: #595bc1;">
    <span>+91 6386975018 , 9555369212 | jssfgroup@gmail.com</s>
  </div>
</div>
<center><input type="button" value="Print" id="printForm" onclick="printpage()"></center>


<script type="text/javascript">
  function printpage() {
    var printButton = document.getElementById("printForm");
    printButton.style.visibility = 'hidden';
    window.print()
    printButton.style.visibility = 'visible';
  }
</script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js'></script> -->