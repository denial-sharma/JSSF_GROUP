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
  $profiledt = $fetchrecordobj->profiledata($userid);
} else {
  header('Location: index.php'); //redirect URL
}
?>
<style>
  @media only screen and (max-width: 600px) {
    div.ex1 {
      height: 700px !important;
      overflow: scroll;
      overflow-x: hidden
    }
  }

  #img-preview {
    display: none;
    width: 100px;
    height: 80px;
    border: 2px dashed #333;
    margin-bottom: 20px;
  }

  #img-preview img {
    width: 90px;
    height: 75px;
    display: block;
  }

  #front-preview {
    display: none;
    width: 100px;
    height: 80px;
    border: 2px dashed #333;
    margin-bottom: 20px;
  }

  #front-preview img {
    width: 90px;
    height: 75px;
    display: block;
  }

  #back-preview {
    display: none;
    width: 100px;
    height: 80px;
    border: 2px dashed #333;
    margin-bottom: 20px;
  }

  #back-preview img {
    width: 90px;
    height: 75px;
    display: block;
  }

  #girl-preview {
    display: none;
    width: 100px;
    height: 80px;
    border: 2px dashed #333;
    margin-bottom: 20px;
  }

  #girl-preview img {
    width: 90px;
    height: 75px;
    display: block;
  }
</style>
<!-- Modal -->
<div class="modal" style="display: none;" id="yojnamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <center>
          <h5 class="modal-title text-white" id="exampleModalLabel">बेटी विवाह अनुदान योजना पंजीकरण फॉर्म</h5>
        </center>
        <button type="button" class="close" onclick="closemdl()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ex1" style="height: 500px;overflow-y:scroll;">
        <form method="post" id="ApplyYojnaForm" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-3 col-6">
              <input type="hidden" name="yojnaid" id="yojnaid" />
              <label for="sponcerid">पंजीकरण कर्ता का नाम</label>
              <input type="text" class="form-control" name="user_nm" value="<?php echo $_SESSION['title'] ?>" required readonly>
            </div>
            <div class="col-lg-3 col-6">
              <label for="sponcerid">पिता का नाम</label>
              <input type="text" class="form-control" name="user_f_n" required>
            </div>
            <div class="col-lg-3 col-6">
              <label for="sponcerid">JSSF सदस्य आईडी</label>
              <input type="text" class="form-control" name="userid" value="<?php echo $_SESSION['username'] ?>" required readonly>
            </div>
            <div class="col-lg-3 col-6">
              <label for="sponcerid">Photo</label>
              <input type="file" class="form-control-file border upload-file" accept="image/*" data-max-size="10000" name="b_image" id="logoimage" required>
              <div id="img-preview" name="imageprev">
                <img src="" name="userimage" id="userimage" alt="img" style="width:90px;height:75px" />
                <input type="hidden" id="profiledata" name="profiledata" value="" />
              </div>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">लड़की का नाम</label>
              <input type="text" class="form-control" name="girlname" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">लड़की फोटो</label>
              <input type="file" class="form-control-file border upload-file-3" accept="image/*" data-max-size="10000" name="b_image_3" id="logoimage-3" required>
              <div id="girl-preview" name="imageprev_3">
                <img src="" name="girlimage" id="girlimage" alt="img" style="width:90px;height:75px" />
                <input type="hidden" id="photogirl" name="photogirl" value="" />
              </div>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">पिता का नाम</label>
              <input type="text" class="form-control" name="girl_f_n" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">माता का नाम</label>
              <input type="text" class="form-control" name="girl_m_n" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">जन्मतिथि</label>
              <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">पता</label>
              <textarea class="form-control" name="address" id="address"></textarea>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">राज्य</label>
              <input type="text" class="form-control" name="state" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">ज़िला</label>
              <input type="text" class="form-control" name="district" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">तहसील</label>
              <input type="text" class="form-control" name="tehsil" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">ब्लॉक</label>
              <input type="text" class="form-control" name="block" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">ग्राम पंचायत</label>
              <input type="text" class="form-control" name="gram_panchayat" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">ग्राम पोस्ट</label>
              <input type="text" class="form-control" name="gram_post" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">पिन कोड</label>
              <input type="number" class="form-control" name="pincode" required>
             
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">आधार नंबर</label>
              <input type="number" class="form-control" name="aadhar_no" required>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">आधार फ्रंट फोटो</label>
              <input type="file" class="form-control-file border upload-file-1" accept="image/*" data-max-size="10000" name="b_image_1" id="logoimage-1" required>
              <div id="front-preview" name="imageprev_1">
                <img src="" name="frontimage" id="frontimage" alt="img" style="width:90px;height:75px" />
                <input type="hidden" id="aadharfront" name="aadharfront" value="" />
              </div>
            </div>
            <div class="col-lg-3 mt-1 col-6">
              <label for="sponcerid">आधार बैक फोटो</label>
              <input type="file" class="form-control-file border upload-file-2" accept="image/*" data-max-size="10000" name="b_image_2" id="logoimage-2" required>
              <div id="back-preview" name="imageprev_2">
                <img src="" name="backimage" id="backimage" alt="img" style="width:90px;height:75px" />
                <input type="hidden" id="aadharback" name="aadharback" value="" />
              </div>
            </div>
            <div class="col-lg-12 mt-1 col-12">
              <button type="submit" name="submit" class="btn btn-primary mt-4 form-control">Save</button>

            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

  <div class="modal"  id="payYojana" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <center>
            <h5 class="modal-title text-white" id="exampleModalLabel1">Pay Now</h5>
          </center>
          <button type="button" class="close" onclick="closemdl_1()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ex1">
          <div class="row mt-3">
            <input type="text" name="uid" id="uid" value="<?php echo $_SESSION['username'] ?>" style="display:none;">
            <input type="text" name="uname" id="uname" value="<?php echo $profiledt['user_name']; ?>" style="display:none;">
            <input type="text" name="uemail" id="uemail" value="<?php echo $profiledt['user_email']; ?>" style="display:none;">
            <input type="text" name="uphone" id="uphone" value="<?php echo $profiledt['user_phone']; ?>" style="display:none;">
            <div class="col-md-3">
              <label for="transId" class="mt-2"><strong class="text-danger">Enter Amount</strong></label>
            </div>
            <div class="col-md-7">
              <input type="number" value="1" class="form-control mb-3" id="amount" name="amount" placeholder="Enter Donation Amount" required>
            </div>
            <div class="col-md-2 text-center">
              <button id="jssf_rzp_button" class="btn btn-primary"> Pay</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  

  <div class="main-content" style="padding-top: 100px;">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-primary" style="overflow:scroll;">
              <div class="card-header">
                <h4>Yojana</h4>
                
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-md">
                    <tr class="bg-dark">
                      <th class="text-white">#</th>
                      <th class="text-white">Name</th>
                      <th class="text-white">Action</th>
                    </tr>
                    <?php $fetchrecordobj->jssf_yojna(); ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="card card-primary" style="overflow:scroll;">
              <div class="card-header">
                <h4>Yojana List</h4>
                <input type="hidden" class="form-control" id="getpayid" name="getpayid" >
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-md">
                    <tr class="bg-dark">
                      <th class="text-white">#</th>
                      <th class="text-white">Registration No</th>
                      <th class="text-white">Appline Name</th>
                      <th class="text-white">Girl Name</th>
                      <th class="text-white"> Girl Photo</th>
                      <th class="text-white">Action</th>
                    </tr>
                    <?php //$fetchrecordobj->getyojanadetails(); ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="floating-container">
          <div class="floating-button">+</div>
          <div class="element-container">
            <a href="https://api.whatsapp.com/send?text=https://jssfgroup.com/register.php?UId=<?php //echo $_SESSION['username'] 
                                                                                                ?>">
              <span class="float-element tooltip-left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
                  <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>
              </span>
            </a>
          </div>
        </div> -->
      </div>
    </section>
  </div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  function closemdl() {
    $('#yojnamodal').css('display', 'none');
    $('#exampleModal1').css('display', 'none');
  }
  function closemdl_1() {
    $('#payYojana').css('display', 'none');
  }


  function applyyojna(id) {
    $('#yojnaid').val(id);
    $('#yojnamodal').val(id)
    $('#yojnamodal').css('display', 'block');

  }

  function payforyojana(id) {
    $('#payYojana').css('display', 'block');
    $('#getpayid').val(id);
  }



  $('#ApplyYojnaForm').on('submit', function(event) {
    event.preventDefault();
    const saveButton = document.getElementById('save');
    const payButton = document.getElementById('pay');
   
    $.ajax({
      url: "ajax_page/yojnaformdata.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(msg) {
        if(msg === '404'){

          Swal.fire("warning", "Aadher Number Already Exites","warning")
        }
        if(msg === '200'){

          Swal.fire("Congratulation", " Registered Successfully",
          "success").then((result) => {
          if (result.isConfirmed) {
            $('#save').addClass('d-none');
            $('#pay').addClass('d-block');
            $('#yojnamodal').css('display', 'none');
          }
        });
        }
        //
        // swal("Congratulation", "Registration Id: " + msg + " Registered Successfully", "success", {
        //       button: "Done",
        //     }).then(function(isConfirm) {
        //       if (isConfirm) {
        //         window.location.href = "yojana.php";
        //       }
        //     });
        //window.location = 'yojana.php';
      }


    })
  })

  const chooseFile = document.getElementById("logoimage");
  const imgPreview = document.getElementById("img-preview");
  chooseFile.addEventListener("change", function() {
    getImgData();
  });

  function getImgData() {
    const files = chooseFile.files[0];

    var fileInput = $('.upload-file');
    var maxSize = fileInput.data('max-size');
    if (fileInput.get(0).files.length) {
      var fileSize = fileInput.get(0).files[0].size; // in bytes
      if (fileSize > maxSize) {
        alert('File size is not more then 100 KB');
        return false;
      }
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
          imgPreview.style.display = "block";
          document.getElementById('userimage').src = this.result;
          document.getElementById('profiledata').value = this.result;

        });
      }
    }
  }

  const FrontchooseFile = document.getElementById("logoimage-1");
  const imgPreviewFront = document.getElementById("front-preview");
  FrontchooseFile.addEventListener("change", function() {
    getFrontData();
  });

  function getFrontData() {
    const files = FrontchooseFile.files[0];

    var fileInput = $('.upload-file-1');
    var maxSize = fileInput.data('max-size');
    if (fileInput.get(0).files.length) {
      var fileSize = fileInput.get(0).files[0].size; // in bytes
      if (fileSize > maxSize) {
        alert('File size is not more then 100 KB');
        return false;
      }
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
          imgPreviewFront.style.display = "block";
          document.getElementById('frontimage').src = this.result;
          document.getElementById('aadharfront').value = this.result;

        });
      }
    }
  }

  const BackchooseFile = document.getElementById("logoimage-2");
  const imgPreviewBack = document.getElementById("back-preview");
  BackchooseFile.addEventListener("change", function() {
    getBackData();
  });

  function getBackData() {
    const files = BackchooseFile.files[0];

    var fileInput = $('.upload-file-2');
    var maxSize = fileInput.data('max-size');
    if (fileInput.get(0).files.length) {
      var fileSize = fileInput.get(0).files[0].size; // in bytes
      if (fileSize > maxSize) {
        alert('File size is not more then 100 KB');
        return false;
      }
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
          imgPreviewBack.style.display = "block";
          document.getElementById('backimage').src = this.result;
          document.getElementById('aadharback').value = this.result;

        });
      }
    }
  }

  const GirlchooseFile = document.getElementById("logoimage-3");
  const imgPreviewGirl = document.getElementById("girl-preview");
  GirlchooseFile.addEventListener("change", function() {
    GirlgetBackData();
  });

  function GirlgetBackData() {
    const files = GirlchooseFile.files[0];

    var fileInput = $('.upload-file-3');
    var maxSize = fileInput.data('max-size');
    if (fileInput.get(0).files.length) {
      var fileSize = fileInput.get(0).files[0].size; // in bytes
      if (fileSize > maxSize) {
        alert('File size is not more then 100 KB');
        return false;
      }
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
          imgPreviewGirl.style.display = "block";
          document.getElementById('girlimage').src = this.result;
          document.getElementById('photogirl').value = this.result;

        });
      }
    }
  }


  
  document.getElementById('jssf_rzp_button').onclick = function(e) {
    var amt = $('#amount').val();
    if (amt < 1099) {
      alert("Minimum Amount is Rs. 1100/-")
      return;
    }

    var options = {
    "key": "rzp_live_NIfqVOgPHIYf8o",
    "amount": $('#amount').val() * 100,
    "currency": "INR",
    "name": "JSSF GROUP",
    "description": "सहयोग से समृद्धि की और",
    "image": "https://jssfgroup.com/assets/jssf-logoo.jpg",
    "handler": function(response) {
      savetoserver(response.razorpay_payment_id);
    },
    "prefill": {
      "name": $('#uname').val(),
      "email": $('#uemail').val(),
      "contact": $('#uphone').val()
    },
    "theme": {
      "color": "#3399cc"
    }
  };

  var rzp1 = new Razorpay(options);

  rzp1.on('payment.failed', function(response) {
    alert(response.error.code);
    alert(response.error.description);
    alert(response.error.source);
    alert(response.error.step);
    alert(response.error.reason);
    alert(response.error.metadata.order_id);
    alert(response.error.metadata.payment_id);
  });

    rzp1.open();
  }

</script>
<script>
  function savetoserver(payid) {
    var userid = $('#uid').val();
    var amt = $('#amount').val();
    var getpayid =  $('#getpayid').val();
    $.ajax({
      type: "POST",
      url: "ajax_page/uploadyojnatransition.php",
      data: {
        userid: userid,
        amt: amt,
        payment_id: payid,
        getpayid:getpayid
      },
      success: function(data) {
        console.log(data)
        if (data == '001') {
          Swal.fire(
            'Congratulation',
            'Payment Successfully Done',
            'success'
          ).then((result) => {
            if (result.isConfirmed) {
              $('#pay').removeClass('d-block');
            $('#pay').addClass('d-none');
            $('#certificate').addClass('d-block');
            $('#payYojana').css('display', 'none');
              // window.location.href = "yojana.php";
            }
          })
        }
      }
    });
  }
</script>
<!-- General JS Scripts -->
<?php include('footer.php'); ?>