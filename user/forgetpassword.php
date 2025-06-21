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

    <div class="c-app flex-row align-items-center " style="margin-top: 10rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 ">
                    <div class="card mx-4">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="../index.php">
                                    <img src="../img/logo/jssf-logo.jpg" width="35%" height="" class="text-center">
                                </a>
                            </div>
                            <h4 class="text-center">Forget Password Form</h4>

                            <form method="POST" id="forgetPassword">


                                <div class="mt-3">
                                    <label> Enter Aadher Card Number</label>
                                </div>
                                <div class="input-group  mb-2">
                                    <input id="aadharno" name="aadharno" type="text" class="form-control" placeholder="Enter your Aadhar Number"  >

                                </div>

                                <div id="getLabelUserId" style="display:none">
                                    <label> Your UserId :</label><label class="text-success font-weight-bold" id="showUserId"></label>
                                </div>

                                <div id="enterpass" class="mt-3" style="display:none">
                                    <label> Enter New Password</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter New Password" style="display:none">
                                </div>

                                <div id="confirmpass" class="mt-3" style="display:none">
                                    <label> Confirm Password</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input id="conformpassword" name="conformpassword" type="text" class="form-control" placeholder="Enter Confirm Password" style="display:none">

                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <input id="valid" type="button" class="btn btn-primary px-4" value='Verify' name="logged">
                                        <input id="update" type="submit" class="btn btn-primary px-4" value='Update' name="update" style="display:none">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="../assets/js/custom.js"></script>
<script>
    $(document).ready(function() {
        // Attach a change event handler to the select element
        $("#question_type").change(function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Perform an action based on the selected value
            if (selectedValue == "Your favourite Food") {
                $("#Answer").css('display', 'block');
            }
            if (selectedValue == "Your first school name") {
                $("#Answer").css('display', 'block');
            }
        });
    });

    $('#valid').click(function() {
        var getAadharNumber = $('#aadharno').val();
        if(getAadharNumber == ''){
            swal.fire("Warning", "Please Enter Your Aadhar Number", "warning", {
                button: "Done",
            })
        }else{
            $.ajax({
            url: "ajax_page/getAadharNumber.php",
            method: "POST",
            data: {
                getAN: getAadharNumber
            },
            success: function(data) {
                $('#getLabelUserId').css('display', 'block');
                $('#showUserId').empty();
                $('#showUserId').append(data);
                $('#enterpass').css('display', 'block');
                $('#password').css('display', 'block');
                $('#confirmpass').css('display', 'block');
                $('#conformpassword').css('display', 'block');
                $('#valid').css('display', 'none');
                $('#update').css('display', 'block');

            }
        });
        }
       

    });

    $('#forgetPassword').submit(function(event) {
        event.preventDefault();

        var pass = $('#password').val();
        var conformpass = $('#conformpassword').val();
        var userid = document.getElementById('showUserId').innerHTML;

        if (pass != conformpass) {

            swal.fire("Warning", "conform Password Do Not Match  Enter Password", "warning", {
                button: "Done",
            })
        } else {
            $.ajax({
                url: "ajax_page/updatepassword.php",
                method: "POST",
                data: {
                    getpass: pass,
                    userid: userid
                },
                success: function(data) {
                        if (data == '002') {
                            swal.fire("Success", "Password Update Successfully", "success", {
                                button: "Done",
                            }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php?userid=" + userid;
                        }
                    })
                        } else {
                            swal.fire("warning", "Some Think is Worng", "warning", {
                                button: "Done",
                            })
                        }

                    }
            });
        }

    });
</script>

</html>