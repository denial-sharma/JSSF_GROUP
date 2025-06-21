<?php
//  error_reporting(0);
// ini_set('display_errors', 0);
require_once('includes/function/spl_autoload_register.php');
$fetchrecordobj = new fetchrecords;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jssf Group</title>


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php include('header.php') ?>
    <!--Main Wrapper Start-->
    <div class="as-mainwrapper">
        <!--Bg White Start-->
        <div class="bg-white">
            <!--Breadcrumb Banner Area Start-->
            <div class="breadcrumb-banner-area" style="padding: 30px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-text">
                                <div class="breadcrumb-bar">
                                    <ul class="breadcrumb text-center">
                                        <li><a href="index.php">Home</a></li>
                                        <li>Services</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Breadcrumb Banner Area-->

            <!--yojan Area Start-->
            <div class="course-area  mt-4 mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-wrapper">
                                <div class="section-title">
                                    <h3>JSSF YOJNA</h3>
                                </div>
                            </div>
                        </div>
                        
                         <?php $fetchrecordobj->jssf_services() ?>
                       
                       
                        
                    </div>
                </div>
            </div>
            <!--End of yojna Area-->
        </div>
        <!--End of Bg White-->
    </div>
    <!--End of Main Wrapper Area-->

    <?php include('footer.php');?>