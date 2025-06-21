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
  $userobj = new user_insert;
  $profiledt = $fetchrecordobj->profiledata($userid);
} else {
  header('Location: index.php'); //redirect URL
}
?>
<style>
    #img-preview {
        display: block;
        width: 250px;
        height: 200px;
        border: 2px dashed #333;
        margin-bottom: 20px;
    }

    #img-preview img {
        width: 250px;
        height: 200px;
        display: block;
    }
</style>
<div class="main-content " style="padding-top: 100px;">
    <div class="container-fluid card p-2">
      <form method="post" id="profileUpdateDate"  enctype="multipart/form-data">
      
        <div class="row">
        <h6 class="text-dark col-12 col-md-6">Edit Profile Details</h6>
        <h6 class="text-success col-12 col-md-6">Member Id : <?php echo $_SESSION['username']?></h6>
        </div>
        <hr>
        <div class="form-group row">
          <div class="col-md-8 row">
          <label class="form-label col-sm-2">Name<label class="clr-red">*</label></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter Name" name="user_name" value="<?php echo $profiledt['user_name']?>" required />
          </div>
          <label class="form-label col-sm-2 ">Dob<label class="clr-red">*</label></label>
          <div class="col-sm-4">
            <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" value="<?php echo $profiledt['user_dob']?>" required />
          </div>
          <label class="form-label col-sm-2 ">Gender<label class="clr-red">*</label></label>
          <div class="col-sm-4 ">
            <input type="text" class="form-control" placeholder="Enter Date of Birth" name="gender" value="<?php echo $profiledt['user_gender']?>" required />
          </div>
          <label class="form-label col-sm-2 ">Mobile<label class="clr-red">*</label></label>
          <div class="col-sm-4 ">
            <input type="text" maxlength="10" class="form-control" placeholder="Enter Mobile Number" name="mobile_no" id="mobile_no" value="<?php echo $profiledt['user_phone']?>" required />
          </div>
          <label class="form-label col-sm-2 mt-2">Email-ID<label class="clr-red">*</label></label>
          <div class="col-sm-4 mt-2">
            <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" value="<?php echo $profiledt['user_email']?>" required />
          </div>
          <label class="form-label col-sm-2 mt-2">Pincode<label class="clr-red">*</label></label>
          <div class="col-sm-4 mt-2">
            <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode" value="<?php echo $profiledt['pincode']?>" required />
          </div>
          <label class="form-label col-sm-2 mt-2">City<label class="clr-red">*</label></label>
          <div class="col-sm-4 mt-2">
            <input type="text" class="form-control" placeholder="Enter City" name="city"  value="<?php echo $profiledt['user_city']?>" required />
          </div>
          <label class="form-label col-sm-2 mt-2">State<label class="clr-red">*</label></label>
          <div class="col-sm-4 mt-2">
            <input type="text" class="form-control" placeholder="Enter State" name="state"  value="<?php echo $profiledt['user_state']?>" required />
          </div>
          <label class="form-label col-sm-2 mt-2">Address 1<label class="clr-red">*</label></label>
          <div class="col-sm-10 mt-2">
            <textarea class="form-control" placeholder="Enter Address 1" name="address_1" required><?php echo $profiledt['user_add1']?></textarea>
          </div>          
          <label class="form-label col-sm-2 mt-2">Address 2<label class="clr-red">*</label></label>
          <div class="col-sm-10 mt-2">
            <textarea class="form-control" placeholder="Enter Address 2" name="address_2"  required><?php echo $profiledt['user_add2']?></textarea>
          </div>
        </div>
        <div class="col-md-4 row">
        <label class="form-label col-sm-2 mt-2">Photo</label>
          <div class="col-sm-10 mt-2">
              <input type="file" class="form-control-file border upload-file" accept="image/*" data-max-size="1000000" name="b_image" id="logoimage" required>
              <div id="img-preview" name="imageprev">
                <img src="<?php echo $profiledt['photo']?>" name="examimage" id="examimage" alt="img" style="width:245px;height:195px" />
                <input type="hidden" id="profiledata" name="profiledata" value="<?php echo $profiledt['photo']?>" />
              </div>
          </div>
        </div>
      </div>
        
      

        <h6>KYC Details</h6>
        <div class="form-group row ">
          <label class="form-label col-sm-2 ">Document Number<label class="clr-red">*</label></label>
          <div class="col-sm-2 ">
            <input type="text" class="form-control" placeholder="Enter Document Number" name="doc_no"  value="<?php echo $profiledt['kyc_docnumber']?>" required />
          </div>
          <label class="form-label col-sm-2 ">Nominee Name<label class="clr-red">*</label></label>
          <div class="col-sm-2 ">
            <input type="text" class="form-control" placeholder="Enter Nominee Name" name="nomi_name"  value="<?php echo $profiledt['nomini_name']?>" required />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5"></div>
          <div class="col-sm-2">
            <button class="btn form-control bg-primary text-white" type="submit" name="submit">Update</button>
          </div>
          <div class="col-sm-5"></div>
        </div>
      </form>
    </div>
</div>
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
                        document.getElementById('profiledata').value = this.result;

                    });
                }
            }
        }
</script>
<script>
   $('#profileUpdateDate').on('submit', function(event) {
      event.preventDefault();


    $.ajax({
      url: "ajax_page/profileUpdate.php",
      type: "POST",
      data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
      success: function(msg) {
        alert(msg)
        window.location = 'profile.php';
      }
     

    })
  })
</script>

<?php include('footer.php'); ?>