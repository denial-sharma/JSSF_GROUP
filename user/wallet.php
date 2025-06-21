<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
include("loader.php");

include("side_menu_bar.php");

$userid = $_SESSION['id'];
$user_Uid = $_SESSION['username'];
if (isset($userid) && $userid != "") {
    require_once('include/function/spl_autoload_register.php');
    $fetchrecordobj = new fetchrecord;
    // $ttluser = $fetchrecordobj->ttlrefuser();
} else {
    header('Location: index.php'); //redirect URL
}
?>
<?php //include('matrix_bonus_income_api.php'); 
?>
<?php //include('magic_pool_1_API.php') 
?>
<?php //include('manual_pool_walletAPI.php') 
?>

<div class="main-content" style="padding-top: 100px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Wallet</h4>
                        </div>
                        <div class="card-body">
                            <h5>Total Amount : ₹<?php
                                                $fetchrecordobj->setwallet()
                                                ?> </h5>

                            <div class="withdrwal mt-4">
                                <h6>Withdrawal Amount :</h6>
                                <form method="post" id="withdrwalAmt">
                                    <input type="hidden" name="userid" value="<?php echo $user_Uid ?>">
                                    <input type="number" class="form-control" placeholder="Enter Amount to Withdrwal" name="amtWithrawal" id="amtWithrawal" required>
                                    <button type="submit" name="withdrawal" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Withdrawal List</h5>
                        </div>
                        <div class="card-body" style="height:500px; overflow:scroll;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" bg-dark">
                                        <tr>
                                            <th class="text-white">S.no</th>
                                            <th class="text-white">Amount</th>
                                            <th class="text-white">Date</th>
                                            <th class="text-white">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $fetchrecordobj->getwithdrawallist() ?>
                                    </tbody>
                                </table>
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
        </div>
    </section>
</div>

<script>
    $('#withdrwalAmt').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "ajax_page/withdrawal.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg) {
                if (msg == '103') {
                    Swal.fire(
                        'Warning',
                        'Bank Details Not Added  ',
                        'warning'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "add_bank_details.php";
                        }
                    })

                }
                if (msg == '104') {
                    Swal.fire(
                        'Warning',
                        'After Clearing The Panding Amount. You can Withdrawal New Amount',
                        'warning'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "wallet.php";
                        }
                    })

                }
                if (msg == '101') {
                    Swal.fire(
                        'Success',
                        'Amount Withdrawal Successfully',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "wallet.php";
                        }
                    })

                }
                if (msg == '102') {
                    Swal.fire(
                        'Warning',
                        'Enter Amount is Smaller Then Total Amount. Please Enter Correct Amount',
                        'warning'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "wallet.php";
                        }
                    })

                }
                if (msg == '105') {
                    Swal.fire(
                        'Warning',
                        'Withdrawal is not allowed. Minimum 3 active users required.',
                        'warning'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "wallet.php";
                        }
                    })

                }
            }


        })
    })
</script>
<!-- General JS Scripts -->
<?php include('footer.php'); ?>