
<?php
session_start();
$y_id = $_GET['id'];
if (isset($y_id) && $y_id != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $profiledt = $fetchrecordobj->yojana_data($y_id);
} else {
  header('Location: index.php'); //redirect URL
}
?>
<link rel='shortcut icon' type='image/x-icon' href='../img/logo/jssf-logo.jpg'>
<title>JSSF GROUP </title>
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
      width: 8in;
      height: 5.1in;
      /* border: 1px solid #eee; */
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
    <div class="invoice-box w3-border w3-border-red" style="padding:5px">
      <table cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="top" >
            <td>
              <table width="100%" style="background:linear-gradient(to bottom, #ffffCC 0%, #ffED98 100%); border-bottom-style:solid; border-bottom-color:Black; border-bottom-width:1px">
                <tbody>                  
                  <tr>
                    <td width="100%">
                    <center><u><h3>पंजीकरण प्रमाण पत्र</h3></u></center>
                    <hr>
                      <div>                       
                          <div class="w3-row" style="margin-top:10px">                            
                            <div class="w3-col s9">
                              <div style="font-size:1em; color:#CC4400;margin-left:10px" class=" title">
                              <b>पंजीकरण संख्या - </b><?php echo $profiledt['registration_no'] ?></div>
                              <br>
                              <div style="font-size:1em;margin-left:10px " class="">
                              <b>लड़की का नाम - </b> <?php echo $profiledt['girl_name'];?>
                              <label style="margin-left: 100px;"><b>पिता का नाम - </b> <?php echo $profiledt['girl_f_n'];?></label>
                              </div>
                              <br>
                              <div style="font-size:1em;margin-left:10px " class="">
                              <b>पता - </b> <?php echo $profiledt['address'].", ".$profiledt['state'].", ".$profiledt['district']
                              .", ".$profiledt['tahsil'].", ".$profiledt['block'].", ".$profiledt['gram_panchayat']
                              .", ".$profiledt['gram_post'].", ".$profiledt['pincode'];?>
                              
                              </div>
                            </div>
                            <div class="w3-col s3 w3-center">
                              <img src="<?php echo $profiledt['girl_photo']?>" style="" alt="jssf_logo" width="50%">
                            </div>
                          </div>
                       
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
                    <td width="100%">                    
                      <div>                       
                          <div class="w3-row" style="margin-top:10px">                            
                            <div class="w3-col s9">
                            <center><u><h3>JSSF GROUP सदस्य आईडी कार्ड</h3></u></center>
                            </div>
                            <div class="w3-col s3 w3-center">
                              <img src="../assets/jssf-logo.jpg" style="" alt="jssf_logo" width="50%">
                            </div>
                          </div>                       
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="100%">
                    <hr>
                      <div>                       
                          <div class="w3-row" style="margin-top:10px">                            
                            <div class="w3-col s9">
                              <div style="font-size:1em;margin-left:10px " class="">
                              <b>नाम - </b> <?php echo $profiledt['applinename'];?>
                              <label style="margin-left: 50px;"><b>पिता का नाम - </b> <?php echo $profiledt['apply_f_n'];?></label>
                              <label style="margin-left: 50px;"><b>ID No - </b> <?php echo $profiledt['userid'];?></label>
                              </div>
                              <br>
                              <div style="font-size:1em;margin-left:10px " class="">
                              <label style=""><b>पता - </b> <?php echo $profiledt['address'].", ".$profiledt['state'].", ".$profiledt['district']
                              .", ".$profiledt['tahsil'].", ".$profiledt['block'].", ".$profiledt['gram_panchayat']
                              .", ".$profiledt['gram_post'].", ".$profiledt['pincode'];?>                              
                              </div>
                            </div>
                            <div class="w3-col s3 w3-center">
                              <img src="<?php echo $profiledt['appline_photo']?>" style="" alt="jssf_logo" width="50%">
                            </div>
                          </div>                       
                      </div>
                    </td>
                  </tr>
                  <tr>
            <td class="w3-red" style="height:20px">
              <center><h6>प्रधान कार्यालय</h6></center>
              <center><label style="font-size:0.70em;" class="w3-center w3-text-white"><b>+91 9555369212 |  स्वरूप नगर, सिकटिहा, लखीमपुर-खीरी - 262701, उत्तर प्रदेश</b></label></center>
            </td>
          </tr>                  
                </tbody>
              </table>
            </td>
          </tr>
         
        </tbody>
      </table>
    
    <center><input type="button" value="Print" id="printForm" onclick="printpage()"></center>
    </div>

<script type="text/javascript">
        function printpage() {
            var printButton = document.getElementById("printForm");
            printButton.style.visibility = 'hidden';
            window.print()
            printButton.style.visibility = 'visible';
        }
    </script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js'></script> -->