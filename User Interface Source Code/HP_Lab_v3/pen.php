<?php 
    include("fetch_pen.php"); // Include the "fetch_pen.php" file to get data from database
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Inspection Page | HP LAB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Bootstrap CSS ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS =========================================== -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- owl.carousel CSS ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <!-- animate CSS ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- normalize CSS ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- meanmenu icon CSS ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- main CSS ============================================ -->
        <link rel="stylesheet" href="css/main.css">
        <!-- dropzone CSS ============================================ -->
        <link rel="stylesheet" href="css/dropzone/dropzone.css">
        <!-- educate icon CSS ============================================ -->
        <link rel="stylesheet" href="css/educate-custon-icon.css">
        <!-- morrisjs CSS ============================================ -->
        <link rel="stylesheet" href="css/morrisjs/morris.css">
        <!-- mCustomScrollbar CSS ============================================ -->
        <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- metisMenu CSS ============================================ -->
        <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
        <!-- style CSS ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- JQuery JS ============================================ -->
        <script src="jquery-1.11.0.min.js"></script>
        <!-- modals CSS ============================================ -->
        <link rel="stylesheet" href="css/modals.css">

        <style>
             /* Start Hover Sidebar Tooltip Design */
                .tooltip{
                    font-size: 1rem;
                }
            /* End Hover Sidebar Tooltip Design */
        </style>
    </head>

    <body>        
        <!-- Start Left menu area -->
        <div class="left-sidebar-pro">
            <nav id="sidebar" class="active" style="background-color: #e5e5e5;">
                <div class="sidebar-header" style="background-color: #e5e5e5;">
                    <a href="index.php"><img class="main-logo" src="img/logo/HP-logo.png" alt="" /></a>
                    <strong><a href="index.php"><img src="img/logo/HP-logo.png" alt="" /></a></strong>
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Main Dashboard" href="index.php" aria-expanded="false">
                                    <span style="font-size: 30px;" class="fa fa-home" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="OMRON Devices" href="omron.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-hdd-o" aria-hidden="true"></span>
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="AIV & Buffer Station" href="agv.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-hand-paper-o" aria-hidden="true"></span> 
                                </a> 
                            </li>
                            <li style="background-color: #0096D6">
                                <a data-toggle="tooltip" data-placement="right" title="Inspection Page" href="pen.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-desktop" aria-hidden="true"></span> 
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Alarm Log" href="alarmLog.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-exclamation-triangle" aria-hidden="true"></span> 
                                </a> 
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- End Left menu area -->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="logo-pro">
                            <a href="index.php"><img class="main-logo" src="img/logo/logo2.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro mg-t-10" style="color: white;"> 
                                            <h3>Inspection Page</h3>
                                            </div> 
                                        </div>
                                        <div class="col-lg-3 col-md-7 col-sm-6 col-xs-12">
                                            <div class="header-top-menu tabl-d-n">
                                                <ul hidden class="nav navbar-nav mai-top-nav">
                                                    <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                    </li>
                                                    <li class="nav-item dropdown res-dis-nn">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    </li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="header-right-info">
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                    <li class="nav-item" style="color: white;" id="timestamp">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul class="mobile-menu-nav">
                                            <li><a href="index.php">Main Dashboard</a></li> 
                                            <li><a href="omron.php">OMRON Devices</a></li>
                                            <li><a href="agv.php">AIV & Buffer Station</a></li>
                                            <li><a href="pen.php">Inspection Page</a></li>
                                            <li><a href="alarmLog.php">Alarm Log</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu end -->
            </div>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mg-t-15 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                <ul style="padding: 0px 0px 0px 0px; border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);" class="tab-review-design" >
                                    <li style="padding-right: 40px;text-transform:capitalize" class="active"><a href="#summary">TRAY DETAILS</a></li>
                                    <li style="padding-right: 40px;text-transform:capitalize"><a href="table.php">TABLE</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                    <div class="product-tab-list tab-pane fade active in">
                                        <div class="row">
                                            <!-- Start Left Area -->
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="devit-card-custom mg-t-10" id="traypallet">
                                                    <div class="product-sales-chart" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <!-- Start Tray Area -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <h4 style="color: white"><?php echo $tray?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <img src="sgreen.png" style="height: 15px ">
                                                                <span style="color: white;">Completed</span>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <img src="syellow.png" style="height: 15px ">
                                                                <span style="color: white;">In Process</span>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <img src="black.png" style="height: 15px "> <span style="color: white;">Idle</span>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <img src="sred.png" style="height: 15px ">  <span style="color: white;">Error / Empty</span>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="text-align:center; margin:0 auto;">
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">1</h6>                                                     
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p1_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">2</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #f1511b;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p2_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">3</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #80cc28;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p3_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">4</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #80cc28;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p4_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">5</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #80cc28;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p5_show.'">' ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="text-align:center; margin:0 auto;">
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">10</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p10_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">9</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p9_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">8</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #fbbc09 ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p8_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">7</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #80cc28;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p7_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">6</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #80cc28;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p6_show.'">' ?>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row" style="text-align:center; margin:0 auto;">
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">11</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p11_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">12</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p12_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">13</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p13_show.'">' ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">14</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;"> -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p14_show.'">' ?>  
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                                                <h6 style="color: white; text-align: center;">15</h6>                                                                <!-- <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: #cbcbcb ;">   -->
                                                                <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p15_show.'">' ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Start Pen Details Area -->
                                                        <div class="row">
                                                            <div class="white-box" style="
                                                            background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                                <h4 style="color: white;">Details</h4>
                                                                <ul class="basic-list">
                                                                    <li style="color: white; font-size: 20px;">Location <span style="font-size: 20px;" class="pull-right label-danger label-1 label"><?php echo $pen_location?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Pen ID <span style="font-size: 20px;" class="pull-right label-purple label-2 label"><?php echo $pen_id?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Product <span style="font-size: 20px;" class="pull-right label-success label-3 label"><?php echo $pen_product?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Name <span style="font-size: 20px;" class="pull-right label-info label-4 label"><?php echo $pen_name?></span></li>
                                                                    <li style="color: white; font-size: 20px;">SKU <span style="font-size: 20px;" class="pull-right label-purple label-6 label"><?php echo $pen_sku_code?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Type <span style="font-size: 20px;" class="pull-right label-warning label-5 label"><?php echo $pen_type?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Body <span style="font-size: 20px;" class="pull-right label-warning label-5 label"><?php echo $pen_body?></span></li>
                                                                    <li style="color: white; font-size: 20px;">Cycle Time <span style="font-size: 20px;" class="pull-right label-purple label-7 label"><?php echo $pen_cycle_time?> s</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <!-- End Left Area -->
                                            <!-- Start Right Area -->
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row" style="text-align:center; margin:0 auto;">
                                                    <!-- Start Camera 1 Area -->
                                                    <div class="devit-card-custom" id="cam1">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mg-t-10" >
                                                            <div class="text-center product-sales-chart" style="border-radius: 20px;"> 
                                                                <?php echo $output1_cam; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Start Camera 2 Area -->
                                                    <div class="devit-card-custom" id="cam2">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mg-t-10">
                                                            <div class="text-center product-sales-chart" style=" border-radius: 20px;"> 
                                                                <?php echo $output2_cam; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row" style="text-align:center; margin:0 auto;">
                                                    <!-- Start Camera 3 Area -->
                                                    <div class="devit-card-custom" id="cam3">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mg-t-10">
                                                            <div class="text-center product-sales-chart" style="border-radius: 20px;">
                                                                <?php echo $output3_cam; ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Start Camera 4 Area -->
                                                    <div class="devit-card-custom" id="cam4">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mg-t-10">
                                                            <div class="text-center product-sales-chart" style="border-radius: 20px;">
                                                                <?php echo $output4_cam; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row" style="text-align:center; margin:0 auto;">
                                                    <!-- Start Camera 5 Area -->
                                                    <div class="devit-card-custom" id="cam5">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mg-t-10">
                                                            <div class="text-center product-sales-chart" style="border-radius: 20px;">
                                                                <?php echo $output5_cam; ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <!-- End Right Area -->
                                        </div>     
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- bootstrap JS ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS ============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS ============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>


        <!-- Tooltip ============================================ -->
        <script>
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

        <!-- Refresh Parameters Every 1 Second ============================================ -->
        <script> 
            $(document).ready(function(){
            setInterval(function(){
                $("#traypallet").load(window.location.href + " #traypallet" );
                $("#cam1").load(window.location.href + " #cam1" );
                $("#cam2").load(window.location.href + " #cam2" );
                $("#cam3").load(window.location.href + " #cam3" );
                $("#cam4").load(window.location.href + " #cam4" );
                $("#cam5").load(window.location.href + " #cam5" );
                
            }, 1000);
            });
        </script>
<script>
function timestamp() {
    $.ajax({
        url: 'http://192.168.250.39:82/HP_Lab_v3/timestamp.php',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
$(document).ready(function() {
    setInterval(timestamp, 1000);
});
</script>
    </body>
</html>

<!-- Check if connection is closed after fetching all data to avoid resources leaks and connection become limited -->
<?php
if(!pg_close($conn)) {
    print "Failed to close connection to " . pg_host($conn) . ": " .pg_last_error($conn) . "<br/>\n";
} else {
    echo '<script>console.log("Successfully disconnected from database"); </script>';
}
?>

