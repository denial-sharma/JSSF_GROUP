<?php error_reporting(E_ERROR | E_PARSE);?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>JSSF GROUP</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/jssf-logo.jpg">

  <!-- Google Fonts
		============================================ -->
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Color Swithcer CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="css/color-switcher.css"> -->

  <!-- Fontawsome CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->

  <!-- Metarial Iconic Font CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="css/material-design-iconic-font.min.css"> -->

  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Plugins CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="css/plugins.css"> -->

  <!-- Style CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="style.css"> -->

  <!-- Color CSS
		============================================ -->
  <!-- <link rel="stylesheet" href="css/color.css"> -->

  <!-- Responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .clr-red {
      color: red;
      margin-left: 5px;
    }

    #img-preview {
      display: block;
      width: 140px;
      height: 140px;
      border: 2px dashed #333;
      margin-bottom: 20px;
    }

    #img-preview img {
      width: 140px;
      height: 140px;
      display: block;
    }

    .loader {
      background: url('newloader.gif') no-repeat;
      align-items: center;
    }

    .hidden {
      display: none;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h3 class="text-center mb-4"><b>Direct Register Here</b></h3>
        <form id="candi_registration" method="post" >

          <h6>Personal Details</h6>
          <div class="form-group row mt-2">
          
            <label class="form-label col-sm-2 mt-2">Refferel Id<label style="color:red">*</label></label>
            <div class="col-sm-4 mt-2">
              <input type="text" class="form-control" placeholder="Enter Refferel Id" name="ref_id" value="<?php echo $_GET['UId']; ?>"  />
            </div>
          </div>
          <div class="form-group row mt-2">
            <label class="form-label col-sm-1 mt-2">Name<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="text" class="form-control" placeholder="Enter Name" name="user_name" required />
            </div>
            <label class="form-label col-sm-1 mt-2">Dob<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" required />
            </div>
            <label class="form-label col-sm-1 mt-2">Gender<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <select class="form-control" name="gender" required>
                <option value="">Choose Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <label class="form-label col-sm-1 mt-2">Mobile<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
            

              <input type="text" maxlength="10" class="form-control" placeholder="Enter Mobile Number" name="mobile_no" id="mobile_no" required />
            </div>
            <label class="form-label col-sm-1 mt-2">Email-ID<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" required />
            </div>
            <label class="form-label col-sm-1 mt-2">Pincode<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode" required />
            </div>
            <label class="form-label col-sm-1 mt-2">City<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="text" class="form-control" placeholder="Enter City" name="city" required />
            </div>
            <label class="form-label col-sm-1 mt-2">State<label style="color:red">*</label></label>
            <div class="col-sm-2 mt-2">
              <input type="text" class="form-control" placeholder="Enter State" name="state" required />
            </div>
            <label class="form-label col-sm-1 mt-2">Add-1<label style="color:red">*</label></label>
            <div class="col-sm-5 mt-2">
              <textarea class="form-control" placeholder="Enter Address 1" name="address_1" required></textarea>
            </div>
            <label class="form-label col-sm-1 mt-2">Add-2<label style="color:red">*</label></label>
            <div class="col-sm-5 mt-2">
              <textarea class="form-control" placeholder="Enter Address 2" name="address_2" required></textarea>
            </div>
          </div>


         
          <h6>KYC Details</h6>
          <div class="form-group row ">
            <label class="form-label col-sm-2 "><label style="color:red"></label></label>
            <div class="col-md-2">
              <select name="" id="" class="form-control">
              <option selected value=""> Select Document</option>
                <option  value=""> Aadhar Card</option>
                <option value="">Driving Licence</option>
                <option value="">Voter Id Card</option>
                <option value="">Pan Card</option>
              </select>
            </div>

            <div class="col-sm-2 ">
              <input type="text" class="form-control" placeholder="Enter Aadhar Number" name="doc_no" required />
            </div>
            <label class="form-label col-sm-2 ">Nominee Name<label style="color:red">*</label></label>
            <div class="col-sm-2 ">
              <input type="text" class="form-control" placeholder="Enter Nominee Name" name="nomi_name" required />
            </div>
          
          </div>

          <!-- <h6>Password</h6>
          <div class="form-group row ">
            <label class="form-label col-sm-2 "><label style="color:red"></label></label>
            <label class="form-label col-sm-2 ">Enter Password<label style="color:red">*</label></label>
            <div class="col-sm-2 ">
              <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required />
            </div>
            <label class="form-label col-sm-2 ">Confirm Password<label style="color:red">*</label></label>
            <div class="col-sm-2 ">
              <input type="text" class="form-control" placeholder="Confirm Password" id="conformpassword" name="conformpassword" required />
            </div>
          </div> -->

          <div class="row mt-2">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <button class="btn form-control bg-primary text-white" type="submit" name="submit">Register</button>
              <!-- <span class="text-center">Already Register Click Here <a href="user/index.php" class="text-primary">Login</a></span> -->
            </div>
            <div class="col-sm-4"></div>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
<script>
    $(document).ready(function() {

      $("#mobile_no").on("blur", function() {
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

        if (filter.test(mobNum)) {
          if (mobNum.length == 10) {
            alert("valid");
            $("#mobile-valid").removeClass("hidden");
            $("#folio-invalid").addClass("hidden");
          } else {
            alert('Please put 10  digit mobile number');
            $("#folio-invalid").removeClass("hidden");
            $("#mobile-valid").addClass("hidden");
            return false;
          }
        } else {
          alert('Not a valid number');
          $("#folio-invalid").removeClass("hidden");
          $("#mobile-valid").addClass("hidden");
          return false;
        }

      });

    });

    // Disable form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();



    $('#conformpassword').change(function() {
      var pass = $('#password').val();
      var conformpass = $('#conformpassword').val();

      if (pass != conformpass) {
        swal("Warning", "Confirm Password Do Not Match Enter Password", "warning", {
          button: "Done",
        })
      }
    })



    function addPara(text) {
      var p = document.createElement("p");
      p.textContent = text;
      document.body.appendChild(p);
    }

    function validateEmail(emailField) {
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

      if (reg.test(emailField.value) == false) {
        alert('Invalid Email Address');
        return false;
      }
      return true;
    }

    // const chooseFile = document.getElementById("logoimage");
    // chooseFile.addEventListener("change", function() {
    //   getImgData();
    // });

    // function getImgData() {
    //   const files = chooseFile.files[0];

    //   var fileInput = $('.upload-file');
    //   var maxSize = fileInput.data('max-size');
    //   if (fileInput.get(0).files.length) {
    //     var fileSize = fileInput.get(0).files[0].size; // in bytes
    //     if (fileSize > maxSize) {
    //       alert('File size is not more then 200 KB');
    //       return false;
    //     }
    //     // if (files) {
    //     //   const fileReader = new FileReader();
    //     //   fileReader.readAsDataURL(files);
    //     //   fileReader.addEventListener("load", function() {
    //     //     imgPreview.style.display = "block";
    //     //     document.getElementById('examimage').src = this.result;
    //     //     document.getElementById('exlogo').value = this.result;
    //     //   });
    //     // }
    //   }
    // }

    $('#candi_registration').on('submit', function(event) {
      event.preventDefault();

      $.ajax({
        url: "direct_joing_register_upload.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
           
          if (data == 406) {
            swal("Warning", "This Aadhar Number Already Used", "warning", {
              button: "Done",
            })
            return
          } else {
            swal("Congratulation", "User Id: " + data + " Registered Successfully", "success", {
              button: "Done",
            }).then(function(isConfirm) {
              if (isConfirm) {
                window.location.href = "user/direct_payment.php";
                //window.location.href = "register.php";
              }
            });
          }
          // data = JSON.parse(data)

        }
      });


    });
  </script>
  <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

<!-- popper JS
  ============================================ -->
<!-- <script src="js/popper.min.js"></script> -->

<!-- bootstrap JS
  ============================================ -->
<script src="js/bootstrap.min.js"></script>

<!-- AJax Mail JS
  ============================================ -->
<!-- <script src="js/ajax-mail.js"></script> -->

<!-- plugins JS
  ============================================ -->
<!-- <script src="js/plugins.js"></script> -->

<!-- StyleSwitch JS
  ============================================ -->
<!-- <script src="js/styleswitch.js"></script> -->

<!-- main JS
  ============================================ -->
<!-- <script src="js/main.js"></script> -->
</body>

</html>
</html>