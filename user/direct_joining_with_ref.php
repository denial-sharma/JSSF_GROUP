<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
include("loader.php");

include("side_menu_bar.php");

$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  // $ttluser = $fetchrecordobj->ttlrefuser();
} else {
  header('Location: index.php'); //redirect URL
}
?>
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

  .card-header {
    display: block !important;
    border: 1px solid #f9ac7a;
    background-color: #f9ac7a !important;
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
    background-color: #595bc1;
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
      margin-top: 10px !important;
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

    .auth h6 {
      font-size: 12px;
      margin-top: 16px;
    }
  }
</style>
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-primary" style="height:500px; overflow:scroll;">
            <div class="card-header">
              <h4>Direct Join List</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                  <tr class="bg-dark text-center">
                    <th class="text-white">Id</th>
                    <th class="text-white">Name</th>
                    <th class="text-white">User Id</th>
                    <th class="text-white">Refferal Id</th>
                    <th class="text-white">Payment</th>
                    <th class="text-white">Download Join Certificate</th>
                  </tr>
                  <?php $fetchrecordobj->getdirectjoinref(); ?>
                </table>
              </div>
            </div>
          </div>

          <!-- <div class="col-8 col-md-8">
            <div class="card" style="width: 80%;">
              <div class="img">
                <img src="../img/logo/jssf-logo 2.jpg" alt="" width="150" height="150" style="border: 1px solid black;">
              </div>
              <div class="card-header">
                <h5 class="card-title">JSSF GROUP</h5>
                <p class="discription">Swaroop Nagar, Sikatiha, Lakhimpur-Kheri - 262701, Uttar Pradesh</p>
              </div>
              <div class="card-body">
                <div class="usrid" style="text-align: center;">
                  <span style="font-size: x-large;">userid: </span><span style="font-size: larger;">hrllo</span>
                </div>
                <div class="user_details" style="font-size:large; margin-top: 36px;">
                  <span> Name:</span> <span style="text-decoration: underline;">___________________________</span><br>
                  <span> Address:</span> <span style="text-decoration: underline;">___________________________</span><br>
                  <span style="text-decoration: underline;">___________________________________________</span>
                </div>
                <div class="logo_image">
                  <img src="../img/logo/jssf-logo 2.jpg" width="150" height="150" alt="">
                </div>
                <div class="sign" style="margin-top: 20px;">
                  <h6>Signature</h6>
                </div>
                <div class="auth">
                  <h6>Authorised By-</h6>
                </div>
              </div>
              <div class="card-foter">
                <span>+91 6386975018 , 9555369212 | jssfgroup@gmail.com</s>
              </div>
            </div>
          </div> -->
        </div>

        <div class="floating-container">
          <div class="floating-button">+</div>
          <div class="element-container">
            <a href="https://api.whatsapp.com/send?text=https://jssfgroup.com/register.php?UId=<?php echo $_SESSION['username'] ?>">
              <span class="float-element tooltip-left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
                  <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>
              </span>
            </a>
          </div>
        </div>
      </div>

  </section>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Direct Join Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card" id="getjoindetails">
        </div>

       
      </div>
    </div>
  </div>

  <script>
    function assginreflerid(id) {
      $('#userid').val(id);
    }

    $('#assginid').on('submit', function(event) {
      event.preventDefault();


      $.ajax({
        url: "ajax_page/assignpool.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
          alert(msg)
          window.location = 'manual_pool.php';
        }


      });
    });

    function downloadjoincertificate(id) {
      $.ajax({
        url: "ajax_page/downloadjoincertificate.php",
        type: "POST",
        data: {
          id: id
        },
        success: function(msg) {
          console.log(msg)
          $('#getjoindetails').html(msg);
        }


      });
    }
  </script>
  <!-- General JS Scripts -->
  <?php include('footer.php'); ?>