<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JSSF GROUP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo/jssf-logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    body{
      font-size: small;
    }
  </style>
</head>

<body class="bg-light">
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
                        <h4 class="text-center">User Login Form</h4>

                        <form method="POST" action="loginuser.php">

                            <div class="input-group mb-3">
                                <input id="email" name="username" type="text" class="form-control" required autocomplete="email" autofocus placeholder="Enter User Id" value="">

                            </div>

                            <div class="input-group mb-3">
                                <input id="password" name="password" type="password" class="form-control" required placeholder="Enter Password">

                            </div>

                            

                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-4" value='Login' name="logged">
                                </div>
                                <div class="col-6 text-right">
                                    <a href="forgetpassword.php" class="btn btn-link px-0" style="font-size:small;">
                                        Forgot your password?
                                    </a><br>

                                </div>
                                <div class="col-12 mt-2">
                                    <span>Click Here to Register
                                    <a href="../register.php">
                                      SignUp
                                    </a></span>

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

</html>