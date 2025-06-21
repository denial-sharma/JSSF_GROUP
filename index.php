<?php
//  error_reporting(0);
// ini_set('display_errors', 0);
require_once('includes/function/spl_autoload_register.php');
$fetchrecordobj = new fetchrecords;
$visitor = $fetchrecordobj->visitor_count();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Jssf Group</title>


  <meta content="" name="description">
  <meta content="" name="keywords">

   <!--Favicons -->
  <link href="img/logo/jssf-logo.jpg" rel="icon">


   <!--Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

   <!--Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

   <!--Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <?php include('header.php') ?>
   <!--======= Clients Section ======= -->
  <section id="clients" class="clients section-bg mt-5 my-0">
    <div class="container" data-aos="fade-up">

      <div class="clients-slider swiper" data-aos="fade-up">
        <div class="swiper-wrapper align-items-center">
          <?php $fetchrecordobj->jssf_adver() ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>
   End Clients Section 
  <main id="main" style="margin-top:-20px;">
    <marquee class="bg-danger text-white font-weight-bold p-1" behavior="silde" direction="left" style="height:30px;">
      You have to donate every quarter minimum Rs. 10 and maximum as per your wish. <?php $fetchrecordobj->marquee() ?></marquee>

    <div class="container bg-info ">
      <br>
      <h2 class="text-center fw-bold">Our Partner Hospitals</h2>
      <div class="row p-4">
      <div class="col-md-3 col-6">        
        <select class="form-control " id="state" name="state" onchange="getdistrict()">
          <?php $fetchrecordobj->StateName(); ?>
        </select>
      </div>

      <div class="col-md-3 col-6">        
        <select class="form-control" id="district" name="district" required onchange="getcity()">
        <option selected value="" >Choose District</option>
        </select>
      </div>
      <div class="col-md-3 col-12">        
      <select class="form-control" id="city" name="city" required>
        <option selected value="" >Choose City</option>
        </select>
      </div>

      <div class="col-md-1 col-12">        
        <center>
          <button class="btn btn-primary" value="submit" name="save" onclick="hospitallist('city',$('#city').val())">SUBMIT</button>
        </center>
      </div>
      <div class="col-md-12">
        <div id="hospitallist">
          
        </div>        
      </div>
      </div>
    </div>

     <!--======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center mt-0 bg-white">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>TOTAL VISITORS-<SPAN style="color:red;">&nbsp; <?php echo $visitor['cnt'] ?></SPAN></h1>
            <h2>सहयोग से समृद्धि की और</h2>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img">
            <img src="img/logo/jssf-logo 2.jpg" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- End Hero -->

     <!--======= About Section ======= -->
    <section id="about" class="about mt-4">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="img/logo/jssf-logo.jpg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h1 data-aos="fade-up">JSSF ग्रुप का उदेश्य</h1>
            <p style="font-size: 20px;" data-aos="fade-up" data-aos-delay="100">
              JSSF ग्रुप का उद्देश्य रोजगार परक योजनाएं बनाकर अपने सदस्यों को रोजगार उपलब्ध कराना है तथा अपने सदस्यों के जीवन में सामाजिक और आर्थिक परिवर्तन लाकर उनके जीवन स्तर को बदलना है।
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up">
                <i class="bx bx-receipt"></i>
                <h4>सामाजिक संवाद निधि:</h4>
                <p>समुदाय से संवाद का केंद्र, समस्याओं का समाधान</p>
              </div>
              <div class="col-md-6" data-aos="fade-up">
                <i class="bx bx-cube-alt"></i>
                <h4>योजना विकास: </h4>
                <p> सकारात्मक परिवर्तन के लिए नई राह, रोजगार और सामाजिक न्याय की अग्रणी योजनाएं।</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
     <!--End About Section -->

     <!--======= Services Section ======= -->
    <section id="services" class="services ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="text-black">Our Facility & Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch" style="background-color: #fd511c6e; padding: 40px;" data-aos="zoom-in">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Donate Here</a></h4>
              <p class="description"> Please donate minimum 10rs and maximum as per your wish.</p>
              <div class="text-center border">
                <img src="img/barcode.jpg" class=" img-fluid">
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch" style="padding: 40px; background-color: #88acd130;" data-aos="zoom-in">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Bhagya Lakshmi Bhagya Shali Member Zone</a></h4>
              <p class="description">Bhagya Shali Member Of The Week</p>
              <marquee behavior="silde" direction="left" class="bg-danger text-white p-2 mt-3" style="font-size:20px;"> Winner Will be Announces Every Sunday </marquee>
              <div class="text-center border" style="margin-top: 200px;">
                <img src="img/commingsoon.gif" class=" img-fluid">
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
     <!--End Services Section -->

     <!--======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2 class="text-black">Gallery</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member">
              <img src="img/yojna/sadi 1.PNG" class="img-fluid" alt="">
            </div>
          </div>
<!-- 
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="member">
              <img src="img/yojna/about.PNG" class="img-fluid" alt="">
            </div>
          </div> -->

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="member">
              <img src="img/yojna/health.PNG" class="img-fluid" alt="">
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

     <!--======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Swaroop Nagar, Sikatiha, Lakhimpur-Kheri - 262701, Uttar Pradesh</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>jssfgroup@gmail.com </p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><span>9555369212</span>,  <span>6386975018</span></p>
               
                
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3524.7427135406506!2d80.787961176042!3d27.940531715167307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399f34de5681634d%3A0x89919bd601d9f181!2sShiv%20swroop%20Mandir!5e0!3m2!1sen!2sin!4v1695276198711!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <script>
    function getdistrict() {
        var statecode = $("#state").val();
        $.ajax({
            url: "admin/ajax_page/delete_pages/statecode.php",
            method: "POST",
            data: {
                scode: statecode
            },
            success: function(data) {
                $('#district').empty();
                $('#district').append(data);
            }
        });
    };

    function getcity() {
        var dist = $("#district").val();
        $.ajax({
            url: "district.php",
            method: "POST",
            data: {
              dist: dist
            },
            success: function(data) {
                $('#city').empty();
                $('#city').append(data);
            }
        });
    }
  </script>
  <?php include('footer.php'); ?>