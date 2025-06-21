<div class="main-sidebar sidebar-style-2" style="background-color:#f9ac7a">
               <aside id="sidebar-wrapper">
                   <div class="sidebar-brand">
                       <a href="dashboard.php">
                           <!-- <img alt="image" src="assets/img/jssf-logo.jpg" class="header-logo" /> -->
                           <span>JSSF GROUP</span>
                       </a>
                   </div>
                   <ul class="sidebar-menu">
                       <li class="menu-header">Main</li>
                       <?php
                       include('../configration/dbconnection.php');
                       $uid = $_SESSION['id'];
                        $result = $conn->prepare("SELECT created_at FROM `master_user` where id = $uid and `status` = 'A' OR `status` = 'D' ");
                        $result->execute();
                        $row = $result->fetch();                        
                        $dt = $row['created_at'];
                        
                        $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt)) . " + 365 day"));
                        $todaydt = date("Y-m-d");
                        if ($todaydt == $newEndingDate) { ?>
                            <li class="dropdown">
                                <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                            </li>
                       <?php }else{?>
                        <li class="dropdown">
                           <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                       </li>                       
                       <li class="dropdown">
                           <a href="manual_pool.php" class="nav-link"><i data-feather="monitor"></i><span>My Network</span></a>
                       </li>
                        <li class="dropdown">
                           <a href="yojana.php" class="nav-link"><i data-feather="monitor"></i><span>Yojna</span></a>
                       </li>
                       <!-- <li class="dropdown">
                           <a href="manual_pool_wallet.php" class="nav-link"><i data-feather="monitor"></i><span>Manual Pool Wallet</span></a>
                       </li> -->
                       <!-- <li class="dropdown">
                           <a href="auto_pool_wallet.php" class="nav-link"><i data-feather="monitor"></i><span>Auto Pool Wallet</span></a>
                       </li> -->
                       <li class="dropdown">
                            <a href="magic_pool_1.php" class="nav-link"><i
                                    data-feather="monitor"></i><span>Magic Helping Room 1</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="magic_pool_2.php" class="nav-link"><i
                                    data-feather="monitor"></i><span>Magic Helping Room 2</span></a>
                        </li>
                       
                       <li class="dropdown">
                           <a href="direct_ref.php" class="nav-link"><i data-feather="monitor"></i><span>My Direct Refferal</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="donation.php" class="nav-link"><i data-feather="monitor"></i><span>Donation</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="bhagyalakshmiparticipet.php" class="nav-link"><i data-feather="monitor"></i><span>Bhagya Lakshmi Participate</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="direct_joining_with_ref.php" class="nav-link"><i data-feather="monitor"></i><span>Direct Joining</span></a>
                       </li>

                       <li class="dropdown">
                           <a href="wallet.php" class="nav-link"><i data-feather="monitor"></i><span>Wallet</span></a>
                       </li>

                       <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown "><i data-feather="monitor"></i><span>Profile</span></a>
                            <ul class="dropdown-menu">
                               
                                <li><a href="profile.php" class="nav-link text-white" >Edit Profile</a></li>
                                <li><a href="add_bank_details.php" class="nav-link text-white">Add Bank Details</a></li>
                                <li><a href="id_card.php" class="nav-link text-white">My Id Card</a></li>
                                <li><a href="levelreport.php" class="nav-link text-white">Level Report</a></li>
                            </ul>
                        </li>


                 <?php }?>     
                   </ul>
               </aside>
           </div>