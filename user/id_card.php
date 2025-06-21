<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
?>
<?php include("loader.php") ?>
<?php include("side_menu_bar.php") ?>
<?php
$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $profiledt = $fetchrecordobj->profiledata($userid);
} else {
  header('Location: index.php'); //redirect URL
}
?>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<style>
  .invoice-box {
    /*width: 3.375in;
        height:2.175in;*/
    width: 2.375in;
    height: 3.575in;
    border: 1px solid #eee;
    margin-left: 50px;
    margin-top: 50px;
    padding: 0px;
    line-height: 20px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #333;
  }

  .invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
  }

  .invoice-box table td {
    padding: 0px;
    vertical-align: top;
  }

  .invoice-box table tr td:nth-child(2) {
    text-align: left;
  }

  .invoice-box table tr.top table td {
    padding-bottom: 10px;
  }

  .invoice-box table tr.top table td.title {
    font-size: 40px;
    line-height: 40px;
    color: #333;
  }

  .invoice-box table tr.information table td {
    padding-bottom: 40px;
  }

  .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
  }

  .invoice-box table tr.details td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
  }

  .invoice-box table tr.item.last td {
    border-bottom: none;
  }

  .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
    }

    .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  }

  /** RTL **/
  .rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  }

  .rtl table {
    text-align: right;
  }

  .rtl table tr td:nth-child(2) {
    text-align: left;
  }
</style>
<div class="main-content " style="padding-top: 100px;">
  <div class="container-fluid card p-2">
    <div class="row">
      <h6 class="text-dark col-12 col-md-6">Edit Profile Details</h6>
      <h6 class="text-success col-12 col-md-6">Member Id : <?php echo $_SESSION['username'] ?></h6>
    </div>
    <hr>
    <div class="invoice-box w3-border w3-border-red" style="padding:0px">
      <table cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="top">
            <td>
              <table width="100%" style="background:linear-gradient(to bottom, #ffffCC 0%, #ffED98 100%); border-bottom-style:solid; border-bottom-color:Black; border-bottom-width:1px">
                <tbody>
                  <tr>
                    <td width="100%">
                      <div>
                        <center>
                          <div class="row" style="margin-top:10px">
                            <div class="col-sm-2 w3-center">
                              <img src="../assets/jssf-logoo.jpg" alt="jssf_logo" width="50">
                            </div>
                            <div class="col-sm-10">
                              <div style="font-size:1em; color:#CC4400; margin-bottom:-3px;" class="w3-center title"><b>JSSF GROUP</b></div>
                              <div style="font-size:0.550em; margin-bottom:-10px;" class="w3-center"><b>Swaroop Nagar, Sikatiha, Lakhimpur-Kheri - 262701, Uttar Pradesh</b></div>
                            </div>
                          </div>
                        </center>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td style="border-bottom-style:solid; border-bottom-color:Black; border-bottom-width:1px; padding:0px; background-color:#FFF5CD">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td>
                      <table style="font-size:0.8em;" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="2">
                              <center>
                                <br>
                                <img src="<?php echo $profiledt['photo'] ?>" id="staffPhoto" class="w3-round-large" style="width:39.8%; border-style:solid; border-width:1px;" alt="pic"><br>
                                <br>
                                <b>Member Id :</b> <span id="lblBloodGroup" class="w3-text-red" style="font-weight:bold;"><?php echo $_SESSION['username'] ?></span>
                                <br>
                              </center>
                            </td>
                          </tr>
                          <tr>
                            <td><b style="margin-left:2px">Name:</b></td>
                            <td style="text-align:left; white-space:nowrap">
                              <span id="lblName" style="font-weight:bold;"><?php echo $profiledt['user_name'] ?></span>
                            </td>
                          </tr>
                          <tr>
                            <td width="30%"><b style="margin-left:2px">Email:</b></td>
                            <td width="70%" style="text-align:left">
                              <span id="lblEmail"><?php echo $profiledt['user_email'] ?></span>
                            </td>
                          </tr>
                          <tr>
                            <td width="30%"><b style="margin-left:2px">Phone:</b></td>
                            <td width="70%" style="text-align:left">
                              <span id="lblMobile"><?php echo $profiledt['user_phone'] ?></span>
                            </td>
                          </tr>
                          <tr>
                            <td width="30%"><b style="margin-left:2px">Design:</b></td>
                            <td width="70%" style="text-align:left">
                              <span id="lblDesign">Jssf Member</span>
                            </td>
                          </tr>
                          <tr>
                            <td width="30%"><b style="margin-left:2px">DOB:</b></td>
                            <td width="70%" style="text-align:left">
                              <span id="lblDob"><?php echo $profiledt['user_dob'] ?></span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td style="background-color:Red">
              <center><label style="font-size:0.60em; margin-top:3.5px" class="w3-center text-white"><b>+91  6386975018 , 9555369212 | jssfgroup@gmail.com</b></label></center>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <center><a href="printid.php?id=<?php echo $userid ?>" target="_blank">
        <button class="btn btn-info">Print</button></a></center>



  </div>

</div>

<div class="floating-container">
  <div class="floating-button">+</div>
  <div class="element-container">
    <a href="https://api.whatsapp.com/send?text=https://jssfgroup.com/register.php?UId=<?php echo $_SESSION['username'] ?>">
      <!-- <span class="float-element tooltip-left">
      <i class="material-icons">phone
      </i>
    </span> -->
      <span class="float-element tooltip-left">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
          <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
      </span>
    </a>

  </div>
</div>
<?php include('footer.php'); ?>