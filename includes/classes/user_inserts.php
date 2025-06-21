<?php 

        class user_inserts {

    function annapurna_courses() {

        if(isset($_POST['submit'])){
            include('configration/dbconnection.php');
            // INPUT TEXT
            $course_status = $_POST['updatestatus'];
            $course_name = $_POST['cname'];
            $course_duration = $_POST['cduration'];
            $course_discription = $_POST['cdiscription'];
            // IMAGE FILE 
            $course_image_filename = $_FILES['cimage']['name'];
            $course_image_tempfile = $_FILES['cimage']['tmp_name'];
            $course_image_location = 'images/courses/'.$course_image_filename;
            $course_image_size = $_FILES['cimage']['size']/1024*1024;


            $course_image_type = pathinfo($course_image_filename, PATHINFO_EXTENSION);
            if(($course_image_type!='jpg') && ($course_image_type!='jpeg') && ($course_image_type!='png') && ($course_image_type!='webp')){
                echo "<script>alert( invaid type )</script>";
                exit();
            }
            if($course_image_size<1){
                echo "<script>alert( image size grather than 1MB )</script>";
                exit();
            }
            $coursesimages = move_uploaded_file($course_image_tempfile,$course_image_location);
            
           try{

            if(empty($course_status)){
              $sql = "INSERT INTO `courses`(`c_name`, `c_duration`, `c_image`, `c_discription`) 
            VALUES (:coursename, :courseduration, :courseimage, :coursediscription)";
            $result = $conn->prepare($sql);
          $courses = $result->execute(array(':coursename'=>$course_name, ':courseduration'=>$course_duration, ':courseimage'=>$course_image_location,'coursediscription'=>$course_discription));

          if($courses){
            $coursesimages;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          }
          else{
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }

          }
          else
          {
            $sqls = "UPDATE courses SET c_name='$course_name',c_duration='$course_duration',c_image='$course_image_location', c_discription='$course_discription' 
            WHERE id='$course_status' ";
         $results = $conn->prepare($sqls);
          $results->execute();
          $coursesimages;
       echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
          }
            
          $conn = null;
           }
           catch(PDOException $e){
            echo "".$e->getMessage();
           }
        }
    }


    function annapurna_facility() {

        if(isset($_POST['submit'])){
            include('configration/dbconnection.php');
            // INPUT TEXT
            $facility_updatestatus = $_POST['updatestatus'];
            $facility_name = $_POST['fname'];
            $facility_status = $_POST['fstatus'];

            // IMAGE FILE 
            $facility_image_filename = $_FILES['fimage']['name'];
            
            $facility_image_tempfile = $_FILES['fimage']['tmp_name'];
            $facility_image_location = 'images/facility/'.$facility_image_filename;
            $facility_image_size = $_FILES['fimage']['size']/1024*1024;


            $facility_image_type = pathinfo($facility_image_filename, PATHINFO_EXTENSION);
            if(($facility_image_type!='jpg') && ($facility_image_type!='jpeg') && ($facility_image_type!='png') && ($facility_image_type!='webp')){
                echo "<script>alert( invaid type )</script>";
                exit();
            }
            if($facility_image_size<1){
                echo "<script>alert( image size grather than 1MB )</script>";
                exit();
            }
            $imagefacility = move_uploaded_file($facility_image_tempfile,$facility_image_location);
           try{
            if(empty($facility_updatestatus)){

              $sql = "INSERT INTO `facility`(`f_name`,`f_image`, `f_status`) 
              VALUES (:facilityname, :facilityimage, :facilitystatus)";
              $result = $conn->prepare($sql);
            $facility = $result->execute(array(':facilityname'=>$facility_name, ':facilityimage'=>$facility_image_location,'facilitystatus'=>$facility_status));
  
            if($facility){
              $imagefacility;
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
              // header("Location: courses.php");
            }
            else{
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
            }
            }else{

              $sqls = "UPDATE facility SET f_name='$facility_name',f_image='$facility_image_location',f_status='$facility_status' 
                   WHERE id='$facility_updatestatus' ";
                $results = $conn->prepare($sqls);
                 $results->execute();
                 $imagefacility;
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
            }
           
          $conn = null;
           }
           catch(PDOException $e){
            echo "".$e->getMessage();
           }
        }
    }


    function annapurna_event() {

        if(isset($_POST['submit'])){
            include('configration/dbconnection.php');
            // INPUT TEXT
            $event_status = $_POST['updatestatus'];
            $event_name = $_POST['ename'];
            $event_details = $_POST['edetails'];
            $event_date = $_POST['edate'];
            $event_time = $_POST['etime'];
            $event_location = $_POST['elocation'];
            // IMAGE FILE 
            $event_image_filename = $_FILES['eimage']['name'];
            $event_image_tempfile = $_FILES['eimage']['tmp_name'];
            $event_image_location = 'images/event/'.$event_image_filename;
            $event_image_size = $_FILES['eimage']['size']/1024*1024;


            $event_image_type = pathinfo($event_image_filename, PATHINFO_EXTENSION);
            if(($event_image_type!='jpg') && ($event_image_type!='jpeg') && ($event_image_type!='png') && ($event_image_type!='webp')){
                echo "<script>alert( invaid type )</script>";
                exit();
            }
            if($event_image_size<1){
                echo "<script>alert( image size grather than 1MB )</script>";
                exit();
            }
            
            $eventimages = move_uploaded_file($event_image_tempfile, $event_image_location);

           try{
            if(empty($event_status)){
              $sql = "INSERT INTO `event`(`e_name`,`e_date`, `e_time`,`e_image`,`e_location`,`e_details`) 
              VALUES (:eventname,:eventdate, :eventtime, :eventimage, :eventlocation, :eventdetails)";
              $result = $conn->prepare($sql);
            $event = $result->execute(array(':eventname'=>$event_name, ':eventdate'=>$event_date, ':eventtime'=>$event_time, ':eventimage'=>$event_image_location, ':eventlocation'=>$event_location, ':eventdetails'=>$event_details,));
  
            if($event){
              $eventimages;
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
              // header("Location: courses.php");
            }
            else{
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
            }
            }else{
              $sqls = " UPDATE event SET e_name='$event_name', e_date='$event_date', e_time='$event_time',e_image='$event_image_location'
                , e_location='$event_location', e_details='$event_details' WHERE id='$event_status'" ;
                $results = $conn->prepare($sqls); 
                $results->execute();
                $eventimages;
              echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
                
            }
            
          $conn = null;
           }
           catch(PDOException $e){
            echo "".$e->getMessage();
           }
        }
    }


  //   function annapurna_admission() {

  //     if(isset($_POST['submit'])){
  //         include('configration/dbconnection.php');
        
  //         $student_reg_id = $_POST['stdid'];
  //         $student_name = $_POST['stdname'];
  //         $student_class = $_POST['stdclass'];
  //         $student_date = $_POST['stddob'];
  //         $student_fathername = $_POST['stdfathername'];
  //         $student_address = $_POST['stdaddress'];
  //         $student_contact = $_POST['stdcontact'];
          
  //        try{
  //         $sql = "INSERT INTO `admission`(`reg_id`,`std_name`, `class`,`dob`,`father_name`,`address`,`contact`) 
  //         VALUES (:studentregid,:studentname,:studentclass, :studentdate, :studentfathername, :studentaddress, :studentcontact)";
  //         $result = $conn->prepare($sql);
  //       $student = $result->execute(array(':studentregid'=>$student_reg_id,':studentname'=>$student_name, ':studentclass'=>$student_class,':studentdate'=>$student_date,':studentfathername'=>$student_fathername, ':studentaddress'=>$student_address, ':studentcontact'=>$student_contact));

  //       if($student){
         
  //         echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
          
  //       }
  //       else{
  //         echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
  //       }
  //       $conn = null;
  //        }
  //        catch(PDOException $e){
  //         echo "".$e->getMessage();
  //        }
  //     }
  // }


  function annapurna_gallery() {

    if(isset($_POST['submit'])){
        include('configration/dbconnection.php');
        // IMAGE FILE 
        $gallery_image_filename = $_FILES['gimage']['name'];
        $gallery_image_tempfile = $_FILES['gimage']['tmp_name'];
        $gallery_image_location = 'images/gallery/'.$gallery_image_filename;
        $gallery_image_size = $_FILES['gimage']['size']/1024*1024;


        $gallery_image_type = pathinfo($gallery_image_filename, PATHINFO_EXTENSION);
        if(($gallery_image_type!='jpg') && ($gallery_image_type!='jpeg') && ($gallery_image_type!='png') && ($gallery_image_type!='webp')){
            echo "<script>alert( invaid type )</script>";
            exit();
        }
        if($gallery_image_size<2){
            echo "<script>alert( image size grather than 1MB )</script>";
            exit();
        }

        $imagegallery = move_uploaded_file($gallery_image_tempfile,$gallery_image_location);
         

       try{
        $sql = "INSERT INTO `gallery`(`g_image`) VALUES (:galleryimage)";
        $result = $conn->prepare($sql);
      $gallery = $result->execute(array(':galleryimage'=>$gallery_image_location));

      if($gallery){
        $imagegallery;
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
        // header("Location: courses.php");
      }
      else{
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
      }
      $conn = null;
       }
       catch(PDOException $e){
        echo "".$e->getMessage();
       }
    }
}

function annapurna_slide_show() {

  if(isset($_POST['submit'])){
      include('configration/dbconnection.php');
      // INPUT TEXT
      $slider_status = $_POST['updatestatus'];
      $slider_header = $_POST['sheader'];
      $slider_discription = $_POST['sdiscription'];

      // IMAGE FILE 
      $slider_image_filename = $_FILES['simage']['name'];
      
      $slider_image_tempfile = $_FILES['simage']['tmp_name'];
      $slider_image_location = 'images/slideshow/'.$slider_image_filename;
      $slider_image_size = $_FILES['simage']['size']/1024*1024;


      $slider_image_type = pathinfo($slider_image_filename, PATHINFO_EXTENSION);
      if(($slider_image_type!='jpg') && ($slider_image_type!='jpeg') && ($slider_image_type!='png') && ($slider_image_type!='webp')){
          echo "<script>alert( invaid type )</script>";
          exit();
      }
      if($slider_image_size<1){
          echo "<script>alert( image size grather than 1MB )</script>";
          exit();
      }
      $slidershow = move_uploaded_file($slider_image_tempfile,$slider_image_location);
      
     try{
      if(empty($slider_status)){
        $sql = "INSERT INTO `slide_show`(`slide_heading`,`slide_discription`, `slide_image`) 
        VALUES (:sliderheader, :sliderdiscription, :sliderimage)";
        $result = $conn->prepare($sql);
      $slider = $result->execute(array(':sliderheader'=>$slider_header, ':sliderdiscription'=>$slider_discription, ':sliderimage'=>$slider_image_location));
  
      if($slider){
       $slidershow;
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
        // header("Location: courses.php");
      }
      else{
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
      }

      }
      else{
        $sqls = "UPDATE slide_show SET slide_heading='$slider_header',slide_discription='$slider_discription', slide_image='$slider_image_location' 
        WHERE id='$slider_status' ";
     $results = $conn->prepare($sqls);
      $results->execute();
      $slidershow;
   echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        
      }
      
    $conn = null;
     }
     catch(PDOException $e){
      echo "".$e->getMessage();
     }
  }
}


function annapurna_library() {

  if(isset($_POST['submit'])){
      include('configration/dbconnection.php');
      // INPUT TEXT
      $book_status = $_POST['updatestatus'];
      $book_name = $_POST['b_name'];
      

      // IMAGE FILE 
      $book_image_filename = $_FILES['b_image']['name'];
      
      $book_image_tempfile = $_FILES['b_image']['tmp_name'];
      $book_image_location = 'images/library/'.$book_image_filename;
      $book_image_size = $_FILES['b_image']['size']/1024*1024;


      $book_image_type = pathinfo($book_image_filename, PATHINFO_EXTENSION);
      if(($book_image_type!='jpg') && ($book_image_type!='jpeg') && ($book_image_type!='png') && ($book_image_type!='webp')){
          echo "<script>alert( invaid type )</script>";
          exit();
      }
      if($book_image_size<1){
          echo "<script>alert( image size grather than 1MB )</script>";
          exit();
      }
      $library = move_uploaded_file($book_image_tempfile,$book_image_location);
      
     try{

      if(empty($book_status)){
        $sql = "INSERT INTO `library`(`book_name`, `book_image`) 
      VALUES (:bookname, :bookimage)";
      $result = $conn->prepare($sql);
    $labrary = $result->execute(array(':bookname'=>$book_name, ':bookimage'=>$book_image_location));

    if($labrary){
      $library;
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
      // header("Location: courses.php");
    }
    else{
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
    }
      }
      else{
        $sqls = "UPDATE library SET book_name='$book_name',book_image='$book_image_location' 
        WHERE id='$book_status' ";
     $results = $conn->prepare($sqls);
      $results->execute();
      $library;
   echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";

      }
      
    $conn = null;
     }
     catch(PDOException $e){
      echo "".$e->getMessage();
     }
  }
}


function annapurna_news() {

  if(isset($_POST['submit'])){
      include('configration/dbconnection.php');
      // INPUT TEXT
      $news_status = $_POST['updatestatus'];
      $news_name = $_POST['nname'];
      $news_start_date = $_POST['nsdate'];
      $news_end_date = $_POST['nedate'];
      $news_details = $_POST['ndetails'];
      // IMAGE FILE 
      $news_image_filename = $_FILES['nimage']['name'];
      $news_image_tempfile = $_FILES['nimage']['tmp_name'];
      $news_image_location = 'images/news/'.$news_image_filename;
      $news_image_size = $_FILES['nimage']['size']/1024*1024;


      $news_image_type = pathinfo($news_image_filename, PATHINFO_EXTENSION);
      if(($news_image_type!='jpg') && ($news_image_type!='jpeg') && ($news_image_type!='png') && ($news_image_type!='webp')){
          echo "<script>alert( invaid type )</script>";
          exit();
      }
      if($news_image_size<1){
          echo "<script>alert( image size grather than 1MB )</script>";
          exit();
      }
      $news = move_uploaded_file($news_image_tempfile,$news_image_location);
      
     try{
      if(empty($news_status)){
        $sql = "INSERT INTO `news`(`n_name`,`news_start_date`, `news_end_date`,`n_details`,`n_image`) 
        VALUES (:newsname,:newsstartdate, :newsenddate, :newsdetails,:newsimage)";
        $result = $conn->prepare($sql);
      $news = $result->execute(array(':newsname'=>$news_name, ':newsstartdate'=>$news_start_date, ':newsenddate'=>$news_end_date, ':newsdetails'=>$news_details, ':newsimage'=>$news_image_location ));
  
      if($news){
        $news;
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
        // header("Location: courses.php");
      }
      else{
        echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
      }
      }
      else{
        $sqls = "UPDATE news SET n_name='$news_name',news_start_date='$news_start_date',news_end_date='$news_end_date',n_details='$news_details', n_image='$news_image_location' 
        WHERE id='$news_status' ";
     $results = $conn->prepare($sqls);
      $results->execute();
      $news;
   echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
      }
      
    $conn = null;
     }
     catch(PDOException $e){
      echo "".$e->getMessage();
     }
  }
}

function annapurna_testimonial(){

  if(isset($_POST['submit'])){
    include('configration/dbconnection.php');
    // INPUT TEXT
    $testimonial_status = $_POST['updatestatus'];
    $testimonial_name = $_POST['tmname'];
    $testimonial_details = $_POST['tmdiscription'];
    // IMAGE FILE 
    $testimonial_image_filename = $_FILES['tmimage']['name'];
    $testimonial_image_tempfile = $_FILES['tmimage']['tmp_name'];
    $testimonial_image_location = 'images/testimonial/'.$testimonial_image_filename;
    $testimonial_image_size = $_FILES['tmimage']['size']/1024*1024;


    $testimonial_image_type = pathinfo($testimonial_image_filename, PATHINFO_EXTENSION);

    if(($testimonial_image_type!='jpg') && ($testimonial_image_type!='jpeg') && ($testimonial_image_type!='png') && ($testimonial_image_type!='webp')){
        echo "<script>alert( invaid type )</script>";
        exit();
    }
    if($testimonial_image_size<1){
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
    }
    $testimonial = move_uploaded_file($testimonial_image_tempfile,$testimonial_image_location);
    
   try{
    if(empty($testimonial_status)){
      $sql = "INSERT INTO `testimonial`(`tm_name`,`tm_discription`,`tm_image`) 
      VALUES (:testimonialname,:testimonialdiscription,:testimonialimage)";
      $result = $conn->prepare($sql);
    $testimonial = $result->execute(array(':testimonialname'=>$testimonial_name,':testimonialdiscription'=>$testimonial_details, ':testimonialimage'=>$testimonial_image_location ));

    if($testimonial){
      $testimonial;
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
      // header("Location: courses.php");
    }
    else{
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
    }
    }
    else{
      $sqls = "UPDATE testimonial SET tm_name='$testimonial_name',tm_discription='$testimonial_details', tm_image='$testimonial_image_location' 
      WHERE id='$testimonial_status' ";
   $results = $conn->prepare($sqls);
    $results->execute();
    $testimonial;
 echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
    }
    
  $conn = null;
   }
   catch(PDOException $e){
    echo "".$e->getMessage();
   }
} 
}

function annapurna_about(){

  if(isset($_POST['submit'])){
    include('configration/dbconnection.php');
    // INPUT TEXT
    $about_status = $_POST['updatestatus'];
    $about_name = $_POST['aboutname'];
    $about_details = $_POST['aboutdiscription'];
    $about_points = $_POST['aboutpoint'];
    // IMAGE FILE 
    $about_image_filename = $_FILES['aboutimage']['name'];
    $about_image_tempfile = $_FILES['aboutimage']['tmp_name'];
    $about_image_location = 'images/about/'.$about_image_filename;
    $about_image_size = $_FILES['aboutimage']['size']/1024*1024;


    $about_image_type = pathinfo($about_image_filename, PATHINFO_EXTENSION);

    if(($about_image_type!='jpg') && ($about_image_type!='jpeg') && ($about_image_type!='png') && ($about_image_type!='webp')){
        echo "<script>alert( invaid type )</script>";
        exit();
    }
    if($about_image_size<1){
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
    }
    $aboutimg = move_uploaded_file($about_image_tempfile,$about_image_location);
    
   try{
    if(empty($about_status)){
      $sql = "INSERT INTO `about`(`about_title`,`about_discription`,`about_point`,`about_image`) 
      VALUES (:aboutname,:aboutdiscription,:aboutpoint,:aboutimage)";
      $result = $conn->prepare($sql);
    $about = $result->execute(array(':aboutname'=>$about_name,':aboutdiscription'=>$about_details,':aboutpoint'=>$about_points, ':aboutimage'=>$about_image_location ));

    if($about){
      $aboutimg;
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
      // header("Location: courses.php");
    }
    else{
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
    }
    }
    else{
      $sqls = "UPDATE about SET about_title='$about_name',about_discription='$about_details',about_point='$about_points', about_image='$about_image_location' 
      WHERE id='$about_status' ";
   $results = $conn->prepare($sqls);
    $results->execute();
    $aboutimg;
 echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
    }
    
  $conn = null;
   }
   catch(PDOException $e){
    echo "".$e->getMessage();
   }
} 
}


function annapurna_teacher(){
  if(isset($_POST['submit'])){
    include('configration/dbconnection.php');
    // INPUT TEXT
    $teacher_status = $_POST['updatestatus'];
    $teacher_name = $_POST['teachername'];
    $teacher_details = $_POST['teacherdiscription'];
    $teacher_positions = $_POST['teacherposition'];
    // IMAGE FILE 
    $teacher_image_filename = $_FILES['teacherimage']['name'];
    $teacher_image_tempfile = $_FILES['teacherimage']['tmp_name'];
    $teacher_image_location = 'images/teacher/'.$teacher_image_filename;
    $teacher_image_size = $_FILES['teacherimage']['size']/1024*1024;


    $teacher_image_type = pathinfo($teacher_image_filename, PATHINFO_EXTENSION);

    if(($teacher_image_type!='jpg') && ($teacher_image_type!='jpeg') && ($teacher_image_type!='png') && ($teacher_image_type!='webp')){
        echo "<script>alert( invaid type )</script>";
        exit();
    }
    if($teacher_image_size<1){
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
    }
    $teacherimg = move_uploaded_file($teacher_image_tempfile,$teacher_image_location);
    
   try{
    if(empty($teacher_status)){
      $sql = "INSERT INTO `teacher`(`teacher_name`,`teacher_position`,`teacher_discription`,`teacher_image`) 
      VALUES (:teachername,:teacherposition, :teacherdiscription, :teacherimage)";
      $result = $conn->prepare($sql);
    $teacher = $result->execute(array(':teachername'=>$teacher_name,':teacherposition'=>$teacher_positions,':teacherdiscription'=>$teacher_details, ':teacherimage'=>$teacher_image_location ));

    if($teacher){
      $teacherimg;
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
      // header("Location: courses.php");
    }
    else{
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
    }
    }
    else{
      $sqls = "UPDATE teacher SET teacher_name='$teacher_name',teacher_position='$teacher_positions',teacher_discription='$teacher_details', teacher_image='$teacher_image_location' 
      WHERE id='$teacher_status' ";
   $results = $conn->prepare($sqls);
    $results->execute();
    $teacherimg;
 echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
    }
    
  $conn = null;
   }
   catch(PDOException $e){
    echo "".$e->getMessage();
   }
} 
}

function annapurna_coursetype(){
  if(isset($_POST['submit'])){
    include('configration/dbconnection.php');
    // INPUT TEXT
    $coursetype_status = $_POST['updatestatus'];
    $coursestype_name = $_POST['coursetypeid'];

   try{
    if(empty($coursetype_status)){
      $sql = "INSERT INTO `courses_type`(course_type_name) 
      VALUES (:coursestypename)";
      $result = $conn->prepare($sql);
    $coursetype = $result->execute(array(':coursestypename'=>$coursestype_name));

    if($coursetype){
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
      // header("Location: courses.php");
    }
    else{
      echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
    }
    }
    else{
      $sqls = "UPDATE courses_type SET course_type_name='$coursestype_name
      WHERE id='$teacher_status' ";
   $results = $conn->prepare($sqls);
    $results->execute();
    
 echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
    }
    
  $conn = null;
   }
   catch(PDOException $e){
    echo "".$e->getMessage();
   }
} 
}



        }

?>