<?php include('head.php');?>
<body>
<?php session_start()?> 
<div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar sticky" style="background-color: #f3ffbf54;">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                                            collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                      
                        <li class="mt-3">
                            <h6>Welcome <?php echo $_SESSION['username']?></h6>
                        </li>
                    </ul>
                   
                </div>
                <ul class="navbar-nav navbar-right">
                   
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="../assets/img/download.png" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello <?php echo $_SESSION['title']?></div>
                           
                            <a href="profile.php" class="dropdown-item has-icon text-info"> <i
                                    class="fas fa-user"></i>
                                Profile
                            </a>
                            <a href="logout.php" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            

        