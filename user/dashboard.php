<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
?>
<link rel="stylesheet" href="../css/floatingbtn.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<style>
  .usercard {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  .activecard {
    color: white;
    background-color: orange;
  }
</style>


<?php include("loader.php");

$userid = $_SESSION['id'];
?>

<?php //include('matrix_bonus_income_api.php');
?>
<?php include("side_menu_bar.php") ?>
<?php //include('magic_tree_API.php')
?>
<?php include('manual_pool_walletAPI.php') ?>
<?php include('matrix.php') ?>
<?php

if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $ttluser = $fetchrecordobj->ttLreUser();
  $checksubscription = $fetchrecordobj->checkusersubscription();
} else {
  header('Location: index.php'); //redirect URL
}


?>

<style>
  /* Style for the flash popup */
  #flashPopup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f44336;
    color: white;
    padding: 100px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    z-index: 1001;
    /* Higher z-index than the overlay */
    font-family: Arial, sans-serif;
    text-align: center;
  }

  #flashPopup button {
    background-color: #fff;
    color: #f44336;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
  }

  #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 1);
    z-index: 1000;
    /* One layer below the popup */
  }

  #logoutdiv {
    padding: 7px;
    text-align: end;
    position: absolute;
    top: 4%;
    left: 78%;
    background-color: aliceblue;
    border-radius: 14px;
  }

  #joindatediv {
    padding: 7px;
    text-align: end;
    position: absolute;
    top: 4%;
    left: 3%;

    border-radius: 14px;
  }


  /* Disable scrolling when popup is active */
  body.no-scroll {
    overflow: hidden;
  }
</style>


<div class="main-content" style="padding-top: 100px;">

  <div id="overlay">
    <div id="flashPopup">
      <div id="logoutdiv"><a href="logout.php" style="text-decoration:none;"> <i
            class="fas fa-sign-out-alt"></i>
          Logout
        </a>
      </div>
      <div id="joindatediv">
        <label id="joingdate">Joining Date = <?php $fetchrecordobj->joiningDate() ?></label>
      </div>
      Your subscription is 1 year old. <br> <strong>Renew your subscription to continue...</strong>
      <br><br>
      <button><a href="renewal_payment.php">Click Hear</button></a>
    </div>
  </div>

  <section class="section">
    <div class="section-body">



      <div class="row">
        <?php $dt = $checksubscription['created_at'];
        $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt)) . " + 365 day"));
        $todaydt = date("Y-m-d");
        if ($todaydt == $newEndingDate) { ?>
          <div class="col-sm-12 col-lg-12 ">
            <div class="alert alert-danger row">
              <input type="text" class="form-control alert-link font-weight-bold col-8" value="Please renew your account to get premium features" readonly>
              <label class="col-1"></label>
              <button class="btn btn-success col-2 form-control font-weight-bold" onclick="">Upgrade Now</button>
            </div>
          </div>
        <?php } else { ?>
          <div class="col-lg-8 col-sm-8">
            <div class="alert alert-warning">
              <input type="text" class="form-control alert-link font-weight-bold" value="https://jssfgroup.com/register.php?UId=<?php echo $_SESSION['username'] ?>" id="myInput" readonly>
              <input type="hidden" id='userid' value="<?php echo $_SESSION['username'] ?>">
            </div>
            <script>
              function copyreflerlink() {
                // Get the text field
                var copyText = document.getElementById("myInput");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                alert("Copied the text: " + copyText.value);
              }
            </script>
          </div>
          <div class="col-lg-4 col-sm-2">
            <div class="alert alert-primary">
              <button class="btn btn-secondary form-control font-weight-bold" onclick="copyreflerlink()">Copy Refferal Link</button>
            </div>
          </div>
      </div>

    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-4">
        <div class="card" style="background-color:#cdf9d487;height:450px">
          <div class="card-header"> My Profile</div>
          <div class="card-body">
            <?php $fetchrecordobj->profileList() ?>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-8">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#9bf3da">
              <div class="card-header">
                <h4> Wallet </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php $fetchrecordobj->setwallet()
                  ?>
                </h4>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#9bf3da">
              <div class="card-header">
                <h4> Withdrawal </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php $fetchrecordobj->totalCountWithdrawal()
                  ?>
                </h4>


              </div>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-md-3">
              <div class="card" style="background-color:#e53b5c42">
                <div class="card-header"> <h4>  Auto Pool Income </h4></div>
                <div class="card-body">
                  <h4>&#x20B9;
                  <?php //global $autoPoolWallet;
                  //echo $autoPoolWallet;
                  ?>
                  </h4>
                  
                </div>
              </div>
            </div> -->
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#e59aff6e">
              <div class="card-header">
                <h4> Network Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php
                  global $manualPoolWallet;
                  echo $manualPoolWallet;
                  ?>
                </h4>

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#49ff67">
              <div class="card-header">
                <h4> Level Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php
                  global $levelIncome;
                  echo $levelIncome;
                  ?>
                </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#abb2ffd9">
              <div class="card-header">
                <h4> Matrix Month Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php $fetchrecordobj->getmatrixincome()
                  ?>
                </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#54dfedb5">
              <div class="card-header">
                <h4> Bonus Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php
                  global $bonusIncome;
                  echo $bonusIncome;
                  ?>
                </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#bdc764b0">
              <div class="card-header">
                <h4> Magic Room 1 Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php
                  global $totalRoomEncome;
                  echo $totalRoomEncome;
                  ?>

                </h4>

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#e59aff6e">
              <div class="card-header">
                <h4> Magic Room 2 Incentive </h4>
              </div>
              <div class="card-body">
                <h4>&#x20B9;
                  <?php
                  // global $manualPoolWallet;
                  // echo $manualPoolWallet;
                  echo 0;
                  ?>
                </h4>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#e59aff6e">
              <div class="card-header">
                <h4 style="font-size:16px"> Direct Joining </h4>
              </div>
              <div class="card-body">
                <!--<div class="row">-->
                  <!--<div class="col-6 text-center">-->
                  <?php //$fetchrecordobj->directjoint() ?>
                  <!--</div>-->
                  <!--<div class="col-12 text-center">-->
                      
                  <?php $fetchrecordobj->directjointtotalamount() ?>
                <!--  </div>-->
                <!--</div>-->
              
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#9bf3da">
              <div class="card-header">
                <h4> Patent </h4>
              </div>
              <div class="card-body">
                <?php $fetchrecordobj->patentlist()
                ?>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#3ae4f366">
              <div class="card-header">
                <h4> Refferel </h4>
              </div>
              <div class="card-body">
                <?php $fetchrecordobj->reffrallist()
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#c8fbc4">
              <div class="card-header">
                <h4> Active Network </h4>
              </div>
              <div class="card-body">

                <?php $fetchrecordobj->activeuserlist()
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color:#fba76ee3">
              <div class="card-header">
                <h4> Inactive Network </h4>
              </div>
              <div class="card-body">
                <?php $fetchrecordobj->inactiveuserlist()
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  <?php } ?>
</div>


<div class="floating-container">
  <div class="floating-button">+</div>
  <div class="element-container">

    <a href="https://wa.me/?text=https://jssfgroup.com/register.php?UId=<?php echo $_SESSION['username'] ?>" target="_black">

      <span class="float-element tooltip-left">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
          <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
      </span>
    </a>

  </div>
</div>
</section>

</div>

<script>
  $(document).ready(function() {
    var clipboard = new ClipboardJS('#copyButton');

    clipboard.on('success', function(e) {
      alert('Text copied Open a Whatsapp And paste your Refferl Id');
      e.clearSelection();
    });

    clipboard.on('error', function(e) {
      console.error('Unable to copy text:', e.action);
    });
  });
</script>


<script>
  var userlistdiv = document.getElementById('refdiv');

  $(document).ready(function() {
    var userUid = $('#userid').val();


    $.ajax({
      type: "POST",
      url: "ajax_page/getjoingdate.php",
      data: {
        userUid: userUid
      },
      success: function(msg) {
        console.log("Subscription date from server: ", msg);

        // Ensure the server returns a proper date string, such as 'YYYY-MM-DD'
        var currentDate = new Date();
        console.log("Current Date: ", currentDate);

        // Parse the subscription date
        var subscriptionDate = new Date(msg);
        console.log("Subscription Date: ", subscriptionDate);

        // Check if subscriptionDate is valid
        if (isNaN(subscriptionDate.getTime())) {
          console.error("Invalid subscription date");
          return;
        }

        // Calculate the time difference in milliseconds
        var timeDiff = currentDate.getTime() - subscriptionDate.getTime();

        // Convert the time difference to days
        var daysDiff = timeDiff / (1000 * 3600 * 24);
        console.log("Days Difference: ", daysDiff);

        // Only show the popup if one year (365 days) has passed
        if (daysDiff >= 365) {
          showPopup();
        } else {
          console.log("Less than 1 year since subscription.");
        }
      },
      error: function(xhr) {
        sweetAlert("Error", xhr, "warning");
      }
    });

  });



  function showPopup() {
    document.getElementById('flashPopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    document.body.classList.add('no-scroll');
  }


  function hidePopup() {
    document.getElementById('flashPopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.body.classList.remove('no-scroll');
  }

  function gettraverslist(refid) {
    $.ajax({
      type: "POST",
      url: "ajax_page/gettraverslist.php",
      data: {
        refid: refid
      },
      success: function(msg) {
        console.log(msg);
      },
      error: function(xhr) {
        sweetAlert("Error", xhr, "warning");
      }
    });
  }


  function getrefuser(refid, _userlvl) {
    //alert(refid);
    $.ajax({
      type: "POST",
      url: "ajax_page/getrefuser.php",
      data: {
        refid: refid
      },
      success: function(msg) {
        removeuserrow(_userlvl)
        adduserrow(msg, _userlvl);
        setactivecard(refid)
        // $('#refdiv').empty();
        // $('#refdiv').append(msg);
      },
      error: function(xhr) {
        sweetAlert("Error", xhr, "warning");
      }
    })

  }

  function setactivecard(id) {
    try {
      var activecard = document.getElementsByClassName('activecard');
      if (activecard.length > 0) {
        const element = document.getElementsByClassName('activecard')[0];
        element.classList.remove("activecard");
      }

      var rmrow = document.getElementById("card_" + id);
      if (rmrow) {
        rmrow.classList.add("activecard");
      }
    } catch (error) {
      console.log("setactivecard", error)
    }


  }

  function adduserrow(userlist, userlvl) {
    userlvl++;
    console.log(userlist, userlvl);
    var row = document.createElement('div');
    row.classList.add("row");
    row.id = "userrw" + userlvl;
    var rowdt = "";
    userlist.forEach(element => {
      rowdt = rowdt + `<div class="col-4 col-lg-4 ">
            <div class="card"   id="card_${element.userid}">
              <div class="card-body">
                <div class="usercard">
                  <span>${element.username}</span>
                  <span>${element.userid}</span>
                  <span class="btn btn-sm  btn-info" onclick="getrefuser('${element.userid}',${userlvl})">View</span>
                </div>
              </div>
            </div>
          </div>`
    });
    row.innerHTML = rowdt;
    userlistdiv.append(row)
  }

  function removeuserrow(id) {

    let divrowcnt = userlistdiv.childElementCount;
    if (id < divrowcnt) {
      for (id; id <= divrowcnt; id++) {
        var rmrow = document.getElementById("userrw" + (id + 1));
        if (rmrow) {
          rmrow.remove();
        }
        console.log("removeuserrow", id + 1, divrowcnt)
      }
    }

  }

  function showPopup() {
    document.getElementById('flashPopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    document.body.classList.add('no-scroll'); // Disable scrolling in the background
  }

  // Function to unlock background and hide popup after subscription renewal
  function hidePopup() {
    document.getElementById('flashPopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.body.classList.remove('no-scroll'); // Re-enable scrolling
  }
</script>
<!-- General JS Scripts -->
<?php include('footer.php'); ?>