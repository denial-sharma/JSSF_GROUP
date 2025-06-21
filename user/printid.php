
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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!--style>
        /*@media print
        {
            @page
            {
                size:3.375in 2.175in;
            }
        }*/
    </style-->
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
                          <div class="w3-row" style="margin-top:10px">
                            <div class="w3-col s3 w3-center">
                              <img src="../assets/jssf-logoo.jpg" alt="jssf_logo" width="75%">
                            </div>
                            <div class="w3-col s9">
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
                                <img src="<?php echo $profiledt['photo']?>" id="staffPhoto" class="w3-round-large" style="width:39.8%; border-style:solid; border-width:1px;" alt="pic"><br>
                                <br>
                                <b>Member Id :</b> <span id="lblBloodGroup" class="w3-text-red" style="font-weight:bold;"><?php echo $profiledt['user_uid']?></span>
                                <br>
                              </center>
                            </td>
                          </tr>
                          <tr>
                            <td><b style="margin-left:2px">Name:</b></td>
                            <td style="text-align:left; white-space:nowrap">
                              <span id="lblName" style="font-weight:bold;"><?php echo $profiledt['user_name']?></span>
                            </td>
                          </tr>
                          <tr>
                            <td ><b style="margin-left:2px">Email:</b></td>
                            <td style="text-align:left">
                              <span id="lblEmail"><?php echo $profiledt['user_email']?></span>
                            </td>
                          </tr>
                          <tr>
                            <td ><b style="margin-left:2px">Phone:</b></td>
                            <td style="text-align:left">
                              <span id="lblMobile"><?php echo $profiledt['user_phone']?></span>
                            </td>
                          </tr>
                          <tr>
                            <td ><b style="margin-left:2px">Design:</b></td>
                            <td style="text-align:left">
                              <span id="lblDesign">Jssf Member</span>
                            </td>
                          </tr>
                          <tr>
                            <td ><b style="margin-left:2px">DOB:</b></td>
                            <td style="text-align:left">
                              <span id="lblDob"><?php echo $profiledt['user_dob']?></span>
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
            <td class="w3-red" style="height:20px">
              <center><label style="font-size:0.60em;" class="w3-center w3-text-white"><b>+91 6386975018 , 9555369212 |  jssfgroup@gmail.com</b></label></center>
            </td>
          </tr>
        </tbody>
      </table>
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