<!DOCTYPE html>
<html lang="en" class="semi-dark">
<?php session_start(); ?>
<?php include('head.php') ?>

<body>

    <?php
    require_once('include/function/spl_autoload_register.php');
    $fetchrecordobj = new fetchrecord;
    
    ?>
    <div class="  container mt-2 ">
        <div class="row ">
            <div class="col-6">
                <img  src="../img/logo/jssf-logo.jpg" alt="" width="100"  class="img-fluid">
            </div>
            <div class="col-6 mt-4 text-right" >
                <h6>user Name: <label></label></h6>
                <h6>user Id: <label></label></h6>
            </div>
            
        </div>
    </div>

    <div class=" container mt-4 border rounded-5  padding contain" style="background-color:rgb(255, 112, 2); padding: 3rem;">
        <div class="row">
            <div class="col-4 text-center">
                <div>
                    <?php //echo $fetchrecordobj->todayTotalEarning() 
                    ?>
                    <div>
                        <h5 class="text-dark">
                            ₹00
                        </h5>
                        <h5 class=" text-dark font-size">Auto Pool Earning</h5>
                    </div>
                </div>

            </div>
            <div class="col-4 text-center">
                <div>

                    <div>
                       
                        <h5 class="text-dark">
                            ₹00
                        </h5>
                       
                        <h5 class=" text-dark font-size">Manual Pool Earning</h5>
                    </div>


                </div>

            </div>
            <div class="col-4 text-center">
            <h5 class="text-dark">
                            00
                        </h5>
                       
                        <h5 class=" text-dark font-size">Total Network User </h5>
            </div>


        </div>

    </div>


    <div class=" container mt-4">
        <div class="row">
            <div class="col-3 text-center">
                <a href="recharge.php" class="text-decoration-none">
                    <div class="card  " style="background-color: #003049;">
                        <div class="card-body rounded-4">
                        <!-- <i class="bi bi- text-white  fontsize" aria-hidden="true" style="font-size:46px;""></i> -->
                            <i class="fas fa-clipboard-check text-white  fontsize" aria-hidden="true" style="font-size:46px;"></i>
                        </div>
                    </div>
                    <h5 class="mt-2 font-size text-dark"> Assgin Manual Pool </h5>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href=" withdrawal.php" class="text-decoration-none">
                    <div class="card" style="background-color: #003049;">
                        <div class="card-body">
                            <i class='fa  fa-money fontsize text-white' style="font-size: 46px;"></i>
                        </div>
                    </div>
                    <h5 class="font-size mt-2 text-dark"></h5>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="" class="text-decoration-none">
                    <div class="card" style="background-color: #003049;">
                        <div class="card-body">
                            <i class='fa fa-wordpress fontsize text-white' style="font-size: 46px;"></i>
                        </div>
                    </div>
                    <h5 class="font-size mt-2 text-dark">Withdrawal</h5>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href=" withdrawalist.php" class="text-decoration-none">
                    <div class="card" style="background-color: #003049;">
                        <div class="card-body">
                            <i class='fas fa-receipt fontsize text-white' style="font-size: 46px;"></i>
                        </div>
                    </div>
                    <h5 class="font-size mt-2 text-dark">Withdrawal Record</h5>
                </a>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-lg-6 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody class=" ">
                            <tr>
                                <th> <i class='fas fa-wallet fontsize' style="font-size: 46px; color:rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href=" Wallet.php" class="text-decoration-none text-dark">
                                        <h4 class="font-size">My Wallet</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th> <i class=" fas fa-user-check fontsize" style="font-size: 46px; color:rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="" class="text-decoration-none text-dark">
                                        <h4 class="font-size">Active Network</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th> <i class="fa fontsize" style="font-size: 46px; color:rgb(255, 112, 2);">&#xf19c;</i></th>
                                <td>
                                    <a href="acountKYC.php" class="text-decoration-none text-dark">
                                        <h4 class="font-size">Add Bank Details</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th> <i class="fa fa-key fontsize" style="font-size: 46px; color:rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="paymentpin.php" class="text-decoration-none text-dark">
                                        <h4 class="font-size">Payment Password</h4>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody class="">
                            <tr>
                                <th> <i class="fa fa-share-square-o fontsize" style="font-size: 46px; color: rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="invitationcode.php" class="text-decoration-none text-dark">
                                        <h4 class="font-size">My Invitation code</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th> <i class="fas fa-user-times ml-3 fontsize" style="font-size: 46px; color: rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="" class="text-decoration-none text-dark">
                                        <h4 class="font-size">Inactive Network</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th><i class='fa fa-unlock-alt fontsize' style="font-size: 46px; color: rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="changepassword.php" class="text-decoration-none text-dark">
                                        <h4 class="font-size">Change Password</h4>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fa  fa-user-plus fontsize" style="font-size: 46px; color: rgb(255, 112, 2);"></i></th>
                                <td>
                                    <a href="" class="text-decoration-none text-dark">
                                        <h4 class="font-size">My Direct Reffler</h4>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <div class="row mb-4">
            <div class=" col-12 text-center ">
                <a href="logout.php"> <button class="btn   text-white p-3 font-size" style="background-color: rgb(255, 112, 2); ">LogOut</button></a>
            </div>
        </div>

        
    
    </div>
    <?php include('footer.php')?>


    <!-- <div class=" container-fluid p-3 rounded fixed-bottom " style="background-color: #eaecf2; ">
       
    </div> -->

</body>



</html>