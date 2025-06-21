<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>JSSF GROUP</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">

    <link rel="stylesheet" href="../css/floatingbtn.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel='shortcut icon' type='image/x-icon' href='../img/logo/jssf-logo.jpg'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
<div class="c-app flex-row align-items-center " style="margin-top: 1rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <div class="text-center">
                           
                            <img src="../img/logo/jssf-logo.jpg" width="10%" height="" class="text-center">
                           
                        </div>
                        <h4 class="text-center">Registration Form</h4>

                        <form id="candi_registration" method="post" enctype="multipart/form-data">

            
                            <h6>Personal Details</h6>
                            <div class="form-group row mt-2">
                              <label class="form-label col-sm-2 mt-2"> Parent Id<label class="clr-red">*</label></label>
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" placeholder="Enter Parent Id" name="spon_id" value="<?php echo $_GET['UId'];?>" required />
                              </div>
                              <label class="form-label col-sm-2 mt-2">Refferel Id<label class="clr-red">*</label></label>
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" placeholder="Enter Refferel Id" name="ref_id"  value="<?php echo $_GET['UId'];?>" required />
                              </div>
                            </div>
                            <div class="form-group row mt-2">
                              <label class="form-label col-sm-1 mt-2">Name<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control" placeholder="Enter Name" name="user_name" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">Dob<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">Gender<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <select class="form-control" name="gender" required>
                                  <option value="">Choose Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                              <label class="form-label col-sm-1 mt-2">Mobile<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <span id="mobile-valid" class="hidden mob">
                                  <i class="fa fa-check pwd-valid"></i>Valid Mobile No
                                </span>
                                <span id="folio-invalid" class="hidden mob-helpers">
                                  <i class="fa fa-times mobile-invalid"></i>Invalid mobile No
                                </span>
                
                                <input type="text" maxlength="10" class="form-control" placeholder="Enter Mobile Number" name="mobile_no" id="mobile_no" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">Email-ID<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">Pincode<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">City<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control" placeholder="Enter City" name="city" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">State<label class="clr-red">*</label></label>
                              <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control" placeholder="Enter State" name="state" required />
                              </div>
                              <label class="form-label col-sm-1 mt-2">Address 1<label class="clr-red">*</label></label>
                              <div class="col-sm-5 mt-2">
                                <textarea class="form-control" placeholder="Enter Address 1" name="address_1" required></textarea>
                              </div>
                              <label class="form-label col-sm-1 mt-2">Address 2<label class="clr-red">*</label></label>
                              <div class="col-sm-5 mt-2">
                                <textarea class="form-control" placeholder="Enter Address 2" name="address_2" required></textarea>
                              </div>
                            </div>
                
                            <h6>KYC Details</h6>
                            <div class="form-group row ">
                              <label class="form-label col-sm-2 "><label class="clr-red"></label></label>
                             
                              <label class="form-label col-sm-2 ">Enter Aadhar Number<label class="clr-red">*</label></label>
                              <div class="col-sm-2 ">
                                <input type="text" class="form-control" placeholder="Enter Aadhar Number" name="doc_no" required />
                              </div>
                              <label class="form-label col-sm-2 ">Nominee Name<label class="clr-red">*</label></label>
                              <div class="col-sm-2 ">
                                <input type="text" class="form-control" placeholder="Enter Nominee Name" name="nomi_name" required />
                              </div>
                            </div>
                            <h6>Password</h6>
                            <div class="form-group row ">
                            <label class="form-label col-sm-2 "><label class="clr-red"></label></label>
                            <label class="form-label col-sm-2 ">Enter Password<label class="clr-red">*</label></label>
                              <div class="col-sm-2 ">
                                <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required />
                              </div>
                              <label class="form-label col-sm-2 ">Confirm Password<label class="clr-red">*</label></label>
                              <div class="col-sm-2 ">
                                <input type="text" class="form-control" placeholder="Enter Conform Password" id="conformpassword" name="conformpassword" required />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-5"></div>
                              <div class="col-sm-2">
                              <button class="btn form-control bg-primary text-white" type="submit" name="submit">Register</button>
                              <center><a href="index.php" class="btn btn-link px-0">Login Here</a></center>
                              </div>
                              <div class="col-sm-5"></div>
                            </div>
                
                
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>