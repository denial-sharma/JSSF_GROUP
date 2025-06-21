<?php
session_start();
$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
    require_once('include/function/spl_autoload_register.php');
    $fetchrecordobj = new fetchrecord;
    $profiledt = $fetchrecordobj->profiledata($userid);
} else {
    header('Location: index.php'); //redirect URL
}
?>
<?php include("head.php") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<body>
    <div class="c-app flex-row align-items-center " style="margin-top: 1rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card mx-4">
                        <div class="card-body p-4">
                            <h4>Pay Here</h4>
                            <div class="form-group row ">
                                <label class="form-label col-sm-3 ">Name</label>
                                <div class="col-sm-9">
                                    <!-- <input type="hidden" name="uid" id="uid" class="form-control" value="<?php //echo $profiledt['user_uid']; 
                                                                                                                ?>" readonly> -->
                                    <input type="text" name="uname" id="uname" class="form-control" value="<?php echo $profiledt['user_name']; ?>" readonly>
                                </div>
                                <label class="form-label col-sm-3">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="uemail" id="uemail" class="form-control" value="<?php echo $profiledt['user_email']; ?>" readonly>
                                </div>
                                <label class="form-label col-sm-3">Mobile No.</label>
                                <div class="col-sm-9">
                                    <input type="text" name="uphone" id="uphone" class="form-control" value="<?php echo $profiledt['user_phone']; ?>" readonly>
                                </div>
                                <label class="form-label col-sm-3">Enter Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control mb-3" id="amount" name="amount" placeholder="Enter Amount Here" value="101">
                                </div>
                                <div class="col-sm-12">
                                    <!-- <center><button class="btn btn-primary" id="jssf_rzp_button">Pay</button></center> -->
                                    <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pay</button></center>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Renewal Payment Barcode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="text-center mb-3 ">
                                <img src="../img/barcode.jpg" class="text-center barcode border p-1 border-dark" style="width:70%;">
                            </div>
                            <div class="text-center">
                                <p style="font-size:20px"> After Paying Enter The Details</p>
                            </div>
                            <div class="row mt-3">
                                <input type="text" name="uid" id="uid" value="<?php echo $_SESSION['username'] ?>" style="display:none;">
                                <div class="col-md-12">
                                    <label for="transId" class="mt-2"><strong class="text-danger">Pay Here</strong></label>
                                </div>
                                <div class="col-md-12">
                                    <input type="number" class="form-control mb-3" id="amount" value="101" name="amount" placeholder="Enter Donation Amount" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control mb-3" id="tranid" name="tranid" placeholder="Enter Transcation Id" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button onclick="submit_payment()" class="btn btn-primary"> save</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- <script>
        var options = {
            "key": "rzp_live_NIfqVOgPHIYf8o",
            "amount": $('#amount').val() * 100,
            "currency": "INR",
            "name": "JSSF GROUP",

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
            Swal.fire(
                'Payment Failed !!',
                'Something Went Wrong',
                'warnings'
            ).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "renewal_payment.php";
                }
            })
            // alert(response.error.code);
            // alert(response.error.description);
            // alert(response.error.source);
            // alert(response.error.step);
            // alert(response.error.reason);
            // alert(response.error.metadata.order_id);
            // alert(response.error.metadata.payment_id);
        });
        document.getElementById('jssf_rzp_button').onclick = function(e) {
            var amt = $('#amount').val();
            if (amt < 101) {
                alert("Minimum Amount is Rs. 101/-")
                return;
            }
            rzp1.open();
        }
    </script> -->
    <!-- <script>
        function savetoserver(payid) {
            var userid = $('#uid').val();
            var amt = $('#amount').val();
            $.ajax({
                type: "POST",
                url: "ajax_page/renwalpayment.php",
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
                                window.location.href = "dashboard.php";
                            }
                        })
                    }
                }
            });
        }
    </script> -->

    <script>
        function submit_payment() {
            var userid = $('#uid').val();
            var amt = $('#amount').val();
            var tranid = $('#tranid').val();
            $.ajax({
                type: "POST",
                url: "ajax_page/renwalpayment.php",
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
                                window.location.href = "dashboard.php";
                            }
                        })
                    }
                }
            });
        }
    </script>