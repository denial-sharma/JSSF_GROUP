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
    $ttLreUser = $fetchrecordobj->ttLreUser();
} else {
    header('Location: index.php'); //redirect URL
}

?>

<div class="main-content" style="padding-top: 100px;">

    <section class="section">
        <div class="section-body">
            <h4>Add Bank Details</h4>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div id="chart-container" class="bg-white"></div>
                        <div class="card mt-4 card-primary">
                            <div class="card-header">
                                <h4> Bank Details</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <form method="POST" id="addBankDetails">
                                            <div class="form-group row">
                                                <input type="hidden" name="userid" value="<?php echo $_SESSION['username'] ?>">
                                                <input type="hidden" id="id" name="id">
                                                <label for="email" class="col-sm-4 col-form-label">Bank Names <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="bankname" name="bankname">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">IFSC Code <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ifsc" name="ifsc">
                                                </div>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label">A/c Number <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="acnumber" name="acnumber">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">A/c Holder Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="holdername" name="hodername">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 text-center">
                                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-4">
                        <div class="card card-primary" style="height:200px; overflow:scroll;">
                            <div class="card-header">
                                <h4>Bank Details List</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr class="bg-dark">
                                            <th class="text-white">Id</th>
                                            <th class="text-white">Bank Name</th>
                                            <th class="text-white">Account Number</th>
                                            <th class="text-white">ISFC code</th>
                                            <th class="text-white">Holder Name</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                        <?php $fetchrecordobj->getbankdetails(); ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>
</section>
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
        <!-- <span class="float-element">
      <i class="material-icons">chat</i>
    </span> -->
    </div>
</div>
</div>

<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.min.js"></script>
<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.orgchart.js"></script>
<script>
    $('#addBankDetails').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "ajax_page/addbankdetails.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // alert(data)
                if (data == '001') {
                    Swal.fire(
                        'Congratulation',
                        'Bank Details Added Successfully ',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "add_bank_details.php";
                        }
                    })

                }
                if (data == '002') {
                    Swal.fire(
                        'Congratulation',
                        'Bank Details Updated Successfully ',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "add_bank_details.php";
                        }
                    })

                }
                if (data == '003') {
                    Swal.fire(
                        'Warning',
                        'You Have Already Added Bank Details. You Can Updated Only ',
                        'Warning'
                    ).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "add_bank_details.php";
                        }
                    })
                }
                // data = JSON.parse(data)

            }
        });

    });

    function editbankdetails(id){
        $.ajax({
            url:'ajax_page/editbankdetails.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                const myArray = data.split(",");
                $('#id').val(myArray[0]);
                $('#bankname').val(myArray[1]);
                $('#ifsc').val(myArray[2]);
                $('#acnumber').val(myArray[3]);
                $('#holdername').val(myArray[4]);
            }
        })
    }
</script>

<?php include('footer.php'); ?>