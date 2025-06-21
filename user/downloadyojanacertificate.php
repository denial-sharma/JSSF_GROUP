<?php include('head.php') ?>
<?php
session_start();

$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  // $ttluser = $fetchrecordobj->ttlrefuser();
  $profiledt = $fetchrecordobj->profiledata($userid);
} else {
  header('Location: index.php'); //redirect URL
}

require_once('include/function/spl_autoload_register.php');

$fetchrecordobj = new fetchrecord;
$id = $_GET['id'];
?>
<div class="container" style="border:5px solid black; border-radius:50px ;margin-top:20px; border-style: double;">
   <?php $fetchrecordobj->getyojanasdata()?>
</div>

<script>
    $("#print").on('click', function() {
        $('#print').hide();
        window.print();
    });

    window.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'p') {
            isPrinting = true;
            $('#print').hide();
        }
    });
</script>