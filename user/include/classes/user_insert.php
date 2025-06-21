<?php

class user_insert
{



  function editprofile()
  {

    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $book_status = $_POST['updatestatus'];
      $title = $_POST['b_name'];

      // IMAGE FILE 
      $book_image_filename = $_FILES['b_image']['name'];

      $book_image_tempfile = $_FILES['b_image']['tmp_name'];
      $book_image_location = 'image/advertise/' . $book_image_filename;
      $book_image_size = $_FILES['b_image']['size'] / 1024 * 1024;


      $book_image_type = pathinfo($book_image_filename, PATHINFO_EXTENSION);
      if (($book_image_type != 'jpg') && ($book_image_type != 'jpeg') && ($book_image_type != 'png') && ($book_image_type != 'webp')) {
        echo "<script>alert( invaid type )</script>";
        exit();
      }
      if ($book_image_size < 1) {
        echo "<script>alert(Image size grather than 1MB )</script>";
        exit();
      }
      $library = move_uploaded_file($book_image_tempfile, $book_image_location);

      try {

        if (empty($book_status)) {
          $sql = "INSERT INTO `advertise`(`title`, `image`)VALUES (:title, :img)";
          $result = $conn->prepare($sql);
          $labrary = $result->execute(array(':title' => $title, ':img' => $book_image_location));

          if ($labrary) {
            $library;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE advertise SET `title`='$title',`image`='$book_image_location' WHERE id='$book_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();
          $library;
          echo "<div style='color:#990000' class='alert alert-success' role='alert'>Records Updated Successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }


  function annapurna_news()
  {

    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $news_status = $_POST['updatestatus'];
      $news_name = $_POST['nname'];
      $news_start_date = $_POST['nsdate'];
      $news_end_date = $_POST['nedate'];
      $news_details = $_POST['ndetails'];
      // IMAGE FILE 
      $news_image_filename = $_FILES['nimage']['name'];
      $news_image_tempfile = $_FILES['nimage']['tmp_name'];
      $news_image_location = 'images/news/' . $news_image_filename;
      $news_image_size = $_FILES['nimage']['size'] / 1024 * 1024;


      $news_image_type = pathinfo($news_image_filename, PATHINFO_EXTENSION);
      if (($news_image_type != 'jpg') && ($news_image_type != 'jpeg') && ($news_image_type != 'png') && ($news_image_type != 'webp')) {
        echo "<script>alert( invaid type )</script>";
        exit();
      }
      if ($news_image_size < 1) {
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
      }
      $news = move_uploaded_file($news_image_tempfile, $news_image_location);

      try {
        if (empty($news_status)) {
          $sql = "INSERT INTO `news`(`n_name`,`news_start_date`, `news_end_date`,`n_details`,`n_image`) 
        VALUES (:newsname,:newsstartdate, :newsenddate, :newsdetails,:newsimage)";
          $result = $conn->prepare($sql);
          $news = $result->execute(array(':newsname' => $news_name, ':newsstartdate' => $news_start_date, ':newsenddate' => $news_end_date, ':newsdetails' => $news_details, ':newsimage' => $news_image_location));

          if ($news) {
            $news;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE news SET n_name='$news_name',news_start_date='$news_start_date',news_end_date='$news_end_date',n_details='$news_details', n_image='$news_image_location' 
        WHERE id='$news_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();
          $news;
          echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }

  function jssf_advertise()
  {

    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $testimonial_status = $_POST['updatestatus'];
      $testimonial_name = $_POST['b_name'];
      // IMAGE FILE 
      $testimonial_image_filename = $_FILES['b_image']['name'];
      $testimonial_image_tempfile = $_FILES['b_image']['tmp_name'];
      $testimonial_image_location = 'image/advertise/' . $testimonial_image_filename;
      $testimonial_image_size = $_FILES['b_image']['size'] / 1024 * 1024;


      //$testimonial_image_type = pathinfo($testimonial_image_filename, PATHINFO_EXTENSION);

      // if (($testimonial_image_type != 'jpg') && ($testimonial_image_type != 'jpeg') && ($testimonial_image_type != 'png') && ($testimonial_image_type != 'webp')) {
      //   echo "<script>alert( invaid type )</script>";
      //   exit();
      // }
      // if ($testimonial_image_size < 1) {
      //   echo "<script>alert( image size grather than 1MB )</script>";
      //   exit();
      // }
      $testimonial = move_uploaded_file($testimonial_image_tempfile, $testimonial_image_location);

      try {
        if (empty($testimonial_status)) {
          $sql = "INSERT INTO `advertise`(`title`,`image`) 
      VALUES (:testimonialname,:testimonialimage)";
          $result = $conn->prepare($sql);
          $testimonial = $result->execute(array(':testimonialname' => $testimonial_name, 
          ':testimonialimage' => $testimonial_image_location));

          if ($testimonial) {
            $testimonial;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE advertise SET title='$testimonial_name', image='$testimonial_image_location' 
      WHERE id='$testimonial_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();
          $testimonial;
          echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }

  function annapurna_about()
  {

    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $about_status = $_POST['updatestatus'];
      $about_name = $_POST['aboutname'];
      $about_details = $_POST['aboutdiscription'];
      $about_points = $_POST['aboutpoint'];
      // IMAGE FILE 
      $about_image_filename = $_FILES['aboutimage']['name'];
      $about_image_tempfile = $_FILES['aboutimage']['tmp_name'];
      $about_image_location = 'images/about/' . $about_image_filename;
      $about_image_size = $_FILES['aboutimage']['size'] / 1024 * 1024;


      $about_image_type = pathinfo($about_image_filename, PATHINFO_EXTENSION);

      if (($about_image_type != 'jpg') && ($about_image_type != 'jpeg') && ($about_image_type != 'png') && ($about_image_type != 'webp')) {
        echo "<script>alert( invaid type )</script>";
        exit();
      }
      if ($about_image_size < 1) {
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
      }
      $aboutimg = move_uploaded_file($about_image_tempfile, $about_image_location);

      try {
        if (empty($about_status)) {
          $sql = "INSERT INTO `about`(`about_title`,`about_discription`,`about_point`,`about_image`) 
      VALUES (:aboutname,:aboutdiscription,:aboutpoint,:aboutimage)";
          $result = $conn->prepare($sql);
          $about = $result->execute(array(':aboutname' => $about_name, ':aboutdiscription' => $about_details, ':aboutpoint' => $about_points, ':aboutimage' => $about_image_location));

          if ($about) {
            $aboutimg;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE about SET about_title='$about_name',about_discription='$about_details',about_point='$about_points', about_image='$about_image_location' 
      WHERE id='$about_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();
          $aboutimg;
          echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }

  function annapurna_teacher()
  {
    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $teacher_status = $_POST['updatestatus'];
      $teacher_name = $_POST['teachername'];
      $teacher_details = $_POST['teacherdiscription'];
      $teacher_positions = $_POST['teacherposition'];
      // IMAGE FILE 
      $teacher_image_filename = $_FILES['teacherimage']['name'];
      $teacher_image_tempfile = $_FILES['teacherimage']['tmp_name'];
      $teacher_image_location = 'images/teacher/' . $teacher_image_filename;
      $teacher_image_size = $_FILES['teacherimage']['size'] / 1024 * 1024;


      $teacher_image_type = pathinfo($teacher_image_filename, PATHINFO_EXTENSION);

      if (($teacher_image_type != 'jpg') && ($teacher_image_type != 'jpeg') && ($teacher_image_type != 'png') && ($teacher_image_type != 'webp')) {
        echo "<script>alert( invaid type )</script>";
        exit();
      }
      if ($teacher_image_size < 1) {
        echo "<script>alert( image size grather than 1MB )</script>";
        exit();
      }
      $teacherimg = move_uploaded_file($teacher_image_tempfile, $teacher_image_location);

      try {
        if (empty($teacher_status)) {
          $sql = "INSERT INTO `teacher`(`teacher_name`,`teacher_position`,`teacher_discription`,`teacher_image`) 
      VALUES (:teachername,:teacherposition, :teacherdiscription,:teacherimage)";
          $result = $conn->prepare($sql);
          $teacher = $result->execute(array(':teachername' => $teacher_name, ':teacherposition' => $teacher_positions, ':teacherdiscription' => $teacher_details, ':teacherimage' => $teacher_image_location));

          if ($teacher) {
            $teacherimg;
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE teacher SET teacher_name='$teacher_name',teacher_position='$teacher_positions',teacher_discription='$teacher_details', teacher_image='$teacher_image_location' 
      WHERE id='$teacher_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();
          $teacherimg;
          echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }

  function annapurna_coursetype()
  {
    if (isset($_POST['submit'])) {
      include('../configration/dbconnection.php');
      // INPUT TEXT
      $coursetype_status = $_POST['updatestatus'];
      $coursestype_name = $_POST['coursetypeid'];

      try {
        if (empty($coursetype_status)) {
          $sql = "INSERT INTO `courses_type`(course_type_name) 
      VALUES (:coursestypename)";
          $result = $conn->prepare($sql);
          $coursetype = $result->execute(array(':coursestypename' => $coursestype_name));

          if ($coursetype) {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Insert Successfully </div>";
            // header("Location: courses.php");
          } else {
            echo "<div style='color:#990000' class='alert alert-success' role='alert'>Data Not Insert </div>";
          }
        } else {
          $sqls = "UPDATE courses_type SET course_type_name='$coursestype_name
      WHERE id='$teacher_status' ";
          $results = $conn->prepare($sqls);
          $results->execute();

          echo "<div style='color:#990000' class='alert alert-success' role='alert'>records updated successfully </div>";
        }

        $conn = null;
      } catch (PDOException $e) {
        echo "" . $e->getMessage();
      }
    }
  }
}
