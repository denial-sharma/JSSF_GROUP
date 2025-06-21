<?php
//error_reporting(0);
//ini_set('display_errors', 0);
session_start();

$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
    require_once('include/function/spl_autoload_register.php');
    $userObj = new user_insert;
    $fetchrecordobj = new fetchrecord;
} else {

    header('Location: index.php'); //redirect URL
}
?>


<?php include("header.php") ?>
<style>
    #img-preview {
        display: none;
        width: 500px;
        height: 250px;
        border: 2px dashed #333;
        margin-bottom: 20px;
    }

    #img-preview img {
        width: 500px;
        height: 250px;
        display: block;
    }
</style>

<body>
    <?php include("loader.php") ?>
    <?php include("side_menu_bar.php") ?>

    <div class="main-content ">
        <section class="section">
            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card card-danger">
                            <form method="POST" enctype="multipart/form-data">

                                <?php $userObj->jssf_advertise() ?>
                                <input type="hidden" class="form-control " name="updatestatus" id="updatestatus">
                                <div class="card-header">
                                    <h4>Advertisement </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="b_name" id="bname" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Choose Image</label>
                                        <input type="file" class="form-control-file border upload-file" accept="image/*" data-max-size="1000000" name="b_image" id="logoimage" required>
                                        <div id="img-preview" name="imageprev">
                                            <img src="" name="examimage" id="examimage" alt="img" style="width:500;height:250px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-success" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card card-primary" style="overflow:scroll; height:360px">
                            <div class="card-header">
                                <h4>LIST</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr class="bg-light">
                                            <th>S.No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <?php $fetchrecordobj->jssf_list() ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- General JS Scripts -->

    <script>
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
                    alert('File size is not more then 200 KB');
                    return false;
                }
                if (files) {
                    const fileReader = new FileReader();
                    fileReader.readAsDataURL(files);
                    fileReader.addEventListener("load", function() {
                        imgPreview.style.display = "block";
                        document.getElementById('examimage').src = this.result;
                        document.getElementById('exlogo').value = this.result;

                    });
                }
            }
        }
    </script>
    <script src="../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../assets/js/custom.js"></script>
</body>

</html>