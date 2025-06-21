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
    @media screen and (max-width:1040px)and (min-width:320px) {
        .barcode {
            width: 100% !important;
        }
    }
</style>

<div class="main-content" style="padding-top: 100px;">
    <section class="section">
        <div class="section-body">
            <h5 class="mb-4 bg-dark p-2 text-white">To Participate in Bhagya Lakshmi. you have Pay 20rs to join.</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Bhagya Lakshmi Barcode</h4>
                        </div>
                        <div class="card-body ">
                            <div class="text-center mb-3 ">

                                <img src="../img/barcode.jpg" class="text-center barcode border p-1 border-dark" style="width:40%;">

                            </div>
                            <!-- <div class="row mt-3">
                                <input type="text" name="uid" id="uid" value="<?php echo $_SESSION['username'] ?>" style="display:none;">
                                <input type="text" name="uname" id="uname" value="<?php echo $profiledt['user_name']; ?>" style="display:none;">
                                <input type="text" name="uemail" id="uemail" value="<?php echo $profiledt['user_email']; ?>" style="display:none;">
                                <input type="text" name="uphone" id="uphone" value="<?php echo $profiledt['user_phone']; ?>" style="display:none;">
                                <div class="col-md-3">
                                    <label for="transId" class="mt-2"><strong class="text-danger">Donate Here</strong></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" value="20" class="form-control mb-3" id="amount" name="amount" placeholder="Enter Donation Amount" required>
                                </div>
                                <div class="col-md-2 text-center">
                                    <button id="jssf_rzp_button" class="btn btn-primary"> Pay</button>
                                </div>
                            </div> -->
                            <div class="text-center">
                                <p style="font-size:20px"> After Paying Enter The Details</p>
                            </div>
                            <div class="row mt-3">
                            <input type="text" name="uid" id="uid" value="<?php echo $_SESSION['username'] ?>" style="display:none;">
                                <div class="col-md-2">
                                    <label for="transId" class="mt-2"><strong class="text-danger">Donate Here</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number"  class="form-control mb-3" id="amount" name="amount" placeholder="Enter Donation Amount" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control mb-3" id="tranid" name="tranid" placeholder="Enter Transcation Id" required>
                                </div>
                                <div class="col-md-2 text-center">
                                    <button onclick="submit_payment()" class="btn btn-primary"> save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-primary" style="overflow:scroll; height:450px">
                        <div class="card-header">
                            <h4>Bhagya Lakshmi List</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-center">
                                            <th class="text-white">S.no</th>
                                            <th class="text-white">Transcation Id</th>
                                            <th class="text-white">Amount</th>
                                            <th class="text-white">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $fetchrecordobj->bhagyalakshmi() ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </section>




</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
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
    document.getElementById('jssf_rzp_button').onclick = function(e) {
        var amt = $('#amount').val();
        if (amt < 20) {
            alert("Minimum Amount is Rs. 20/-")
            return;
        }
        rzp1.open();
    }
</script>
<script>
    function savetoserver(payid) {
        var userid = $('#uid').val();
        var amt = $('#amount').val();
        $.ajax({
            type: "POST",
            url: "ajax_page/uploadbhagytransition.php",
            data: {
                userid: userid,
                amt: amt,
                payment_id: payid
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
                            window.location.href = "bhagyalakshmiparticipet.php";
                        }
                    })
                }
            }
        });
    }
</script>
<script>
    function submit_payment() {
        var userid = $('#uid').val();
        var amt = $('#amount').val();
        var tranid = $('#tranid').val();
        $.ajax({
            type: "POST",
            url: "ajax_page/uploadbhagytransition.php",
            data: {
                userid: userid,
                amt: amt,
                tranid: tranid
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
                            window.location.href = "bhagyalakshmiparticipet.php";
                        }
                    })
                }
            }
        });
    }
</script>

<!-- General JS Scripts -->
<?php include('footer.php'); ?>