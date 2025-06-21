<?php include("header.php")?>
<body>
    <?php include("loader.php")?>
   
    <?php include("side_menu_bar.php")?>
    <?php 
    require_once('include/function/spl_autoload_register.php');
      $fetchrecordobj = new fetchrecord;
    ?>

    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>InActive User List</h4>
                  </div>
                  <div class="card-body table-responsive " >                                             
                        <table class='table table-bordered table-striped'>
                            <thead class="bg-dark">
                            <tr>
                                    <th class="text-white">#ID</th>
                                    <th class="text-white">User Id</th>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Email Id</th>
                                    <th class="text-white">Contact No</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $fetchrecordobj->getInActiveuser(); ?>
                            </tbody>
                        </table>
                   </div>                
                </div>
              </div>
            </div>
          </div>
        </section>
</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>
</html>