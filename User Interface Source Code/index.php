<?php
    include("fetch_data1.php"); //To fetch machine parameters
    include ('fetch_data1_cont2.php'); //To fetch processed data 
    include ('calc_machineStat_month.php'); //To fetch processed data that had been calculated such as OEE, machine (uptime, idle time, down time) per month
    include ('fetch_data_softwareError.php'); //To fetch the backend software status
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Main Dashboard | HP LAB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Auto-refresh the page every 10 minutes -->
        <meta http-equiv="refresh" content="600">
        <!-- Bootstrap CSS ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS ============================================ -->
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
        <!-- calendar CSS ============================================ -->
        <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
        <!-- forms CSS ============================================ -->
        <link rel="stylesheet" href="css/form/all-type-forms.css">
        <!-- style CSS ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- jQuery JS ============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Anychart JS ============================================ -->
        <script src="anychart-core.min.js"></script>
        <script src="anychart-pareto.min.js"></script>
        <!-- Datatable CSS ============================================ -->
        <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
        <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
        <link rel="stylesheet" href="dataTables.bootstrap5.min.css">

        <style>
            /* Start Datatable Design */
                .dataTables_length label,
                .dataTables_filter label,
                .dataTables_info {
                color: white; 
                }

                .dataTables_length select,
                .dataTables_filter input {
                color: black;
                }
            /* End Datatable Design */

            /* Start Hover Sidebar Tooltip Design */
                .tooltip{
                    font-size: 1rem;
                }
            /* End Hover Sidebar Tooltip Design */

            /* Start Certain Parameters to Blink Design  */
                .blink{
                    animation: blinker 1.0s linear infinite;
                }
                @keyframes blinker {
                    50% {
                        opacity: 0;
                    }
                }
            /* End Certain Parameters to Blink Design  */

            /* Start Anychart Credit Design */
                .anychart-credits-text {
                    font-size: 10px;
                    line-height: 9px;
                    display: inline-block;
                    vertical-align: top;
                    text-decoration: none;
                    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                    visibility:hidden;
                    height: 10px;
                }

                .anychart-credits-logo {
                    border: none;
                    margin-right: 2px;
                    height: 10px;
                    width: 10px;
                    display: inline-block;
                    vertical-align: top;
                    visibility:hidden;
                }
            /* End Anychart Credit Design */
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
                            <li style="background-color: #0096D6">
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
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Inspection Page" href="pen.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-desktop" aria-hidden="true"></span> 
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Alarm Log" href="alarmLog.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-exclamation-triangle" aria-hidden="true"></span> 
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Software Error Log" href="software_error.php" aria-expanded="false">
                                    <span id="refresh_error" style="font-size: 25px;" aria-hidden="true"><img src="<?php echo $imageFileName; ?>"/></span> 
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
                                             <h3>Main Dashboard <button type="button" class="btn btn-custon-four btn-primary"><a href="index.php">Refresh Data</a></button></h3>
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
                <!-- Side bar start -->
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
                                            <li><a href="alarmLog.php">alarm Log</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side Bar end -->
            </div>
            <!-- Start Upper Row -->
            <div class="product-sales-area mg-tb-15">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Start Whole Tray Cycle, Yield, Inspection Status, Project Name & Date -->
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom" id="refresh_project">
                                <div class="product-sales-chart" style="background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);
                                border-radius: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <!-- Start Whole Tray Cycle, Yield -->
                                            <div class="row">
                                                <!-- Start Whole Tray Cycle -->
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="income-rate-total">
                                                                <div class="text-center price-edu-rate">
                                                                    <h2 style="color: white;" id="refresh_trayCycle"><?php echo $trayCycle;?></h2>
                                                                    <h5 style="color: white;">Whole Tray Cycle (Min)</h5>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Whole Tray Cycle -->
                                                <!-- Start Yield -->
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="income-rate-total">
                                                                <div class="text-center price-edu-rate" style="color: white;">
                                                                    <h2 style="color: white;" id="refresh_yield"><?php echo $yield?>%</h2>
                                                                    <h5>Yield</h5>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Yield -->
                                            </div>
                                            <!-- End Whole Tray Cycle, Yield -->
                                            <!-- Start Inspection Status -->
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="income-rate-total">
                                                                <div class="text-center price-edu-rate" style="color: white;" id="refresh_inspectStatus">
                                                                    <?php echo $inspection_status ?>
                                                                    <h5>Inspection Status</h5>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Inspection Status -->
                                            <!-- Start Project Name, Project Stat Status -->
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="income-rate-total">
                                                                <div class="text-center price-edu-rate" style="color: white;">
                                                                    <h3 style="color: white;" id="refresh_projName"><?php echo $p_name?></h3>
                                                                    <h5 id="refresh_projStat"><?php echo $p_stat?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Project Name, Project Stat Status -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Whole Tray Cycle, Yield, Inspection Status, Project Name & Date -->
                        <!-- Start Tray -->
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom" id="refresh_tray">
                                <div class="product-sales-chart" style="padding-bottom: 78px;
                                border-radius: 20px; background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h4 style="color: white;"><?php echo $tray?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <img src="sgreen.png" style="height: 15px;">
                                            <span style="color: white;">Completed</span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <img src="syellow.png" style="height: 15px ">
                                            <span style="color: white;">In Process</span> 
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <img src="black.png" style="height: 15px ">
                                            <span style="color: white;">Idle</span> 
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <img src="sred.png" style="height: 15px ">
                                            <span style="color: white;">Error / Empty</span>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align:center; margin:0 auto;">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">1</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p1_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">2</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p2_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">3</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p3_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">4</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p4_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">5</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p5_show.'">' ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align:center; margin:0 auto;">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">10</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p10_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">9</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p9_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">8</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p8_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">7</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p7_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">6</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p6_show.'">' ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align:center; margin:0 auto;">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">11</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p11_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">12</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p12_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">13</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p13_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">14</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p14_show.'">' ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mg-t-10" style="display:inline-block; vertical-align: middle; float: none;">
                                            <h6 style="text-align: center; color: white;">15</h6>

                                            <?php echo '<div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; background-color: '.$p15_show.'">' ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tray -->
                        <!-- Start Uptime, Downtime, Idletime, Power Consumption, Incoming Pressure
                        Air Consumption, OEE, Towerlight  -->
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom" id="refresh_machineRealtime">
                                <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> 
                                    <!-- Start Uptime, Downtime, Idletime  -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <!-- Start Uptime  -->
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%); margin-bottom: 20px">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h2 class="blink" style="color: green; font-size: 20px; font-weight: bold;"><?php echo $percent_uptime;?> %</h2>
                                                                <h5 style="color: white;">Machine Up Time</h5>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Uptime  -->
                                                <!-- Start Downtime  -->
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%); margin-bottom: 20px">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h2 class="blink" style="color: red; font-size: 20px; font-weight: bold;"><?php echo $percent_downtime;?> %</h2>
                                                                <h5 style="color: white;">Machine Down Time</h5>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Downtime  -->
                                                <!-- Start Idletime  -->
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%); margin-bottom: 20px">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h2 class="blink" style="color: orange; font-size: 20px; font-weight: bold;"><?php echo $percent_idletime;?> %</h2>
                                                                <h5 style="color: white;">Machine Idle Time</h5>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Idletime  -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Uptime, Downtime, Idletime  -->
                                    <!-- Start Power Consumption, Incoming Pressure, Air Consumption, 
                                    OEE, Towerlight  -->
                                    <div class="row">
                                        <!-- Start Power Consumption, Incoming Pressure, Air Consumption, 
                                        OEE -->
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <!-- Start Power Consumption, Incoming Pressure -->
                                            <div class="row">
                                                <!-- Start Power Consumption -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="stats-title pull-left">
                                                            <h5 style="color: white;">Power Consumption</h5>
                                                        </div>
                                                        <div class="m-t-xl widget-cl-1">
                                                            <h1 style="font-size: 20px"class="text-success"><?php echo $power_consump;?>kWh</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Power Consumption -->
                                                <!-- Start Incoming Pressure -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="stats-title pull-left">
                                                            <h5 style="color: white;">Incoming Pressure</h5>
                                                        </div>
                                                        <!-- <div class="stats-icon pull-right">
                                                            <i style="font-size: 30px;" class="text-primary fa fa-flag"></i>
                                                        </div> -->
                                                        <div class="m-t-xl widget-cl-1">
                                                            <h1 style="font-size: 20px" class="text-success"><?php echo $incoming_pressure;?>Bar</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Incoming Pressure -->
                                            </div>
                                            <!-- End Power Consumption, Incoming Pressure -->
                                            <!-- Start Air Consumption, OEE -->
                                            <div class="row" style="margin-top: 10px;">
                                                <!-- Start Air Consumption -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="stats-title pull-left">
                                                            <h5 style="color: white;">Air Consumption</h5>
                                                        </div>
                                                        <!-- <div class="stats-icon pull-right">
                                                            <i style="font-size: 30px;" class="text-primary fa fa-flag"></i>
                                                        </div> -->
                                                        <div class="m-t-xl widget-cl-1">
                                                            <h1 style="font-size: 20px" class="text-success"><?php echo $air_consump;?>L</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Air Consumption -->
                                                <!-- Start OEE -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="stats-title pull-left">
                                                            <h5 style="color: white;">OEE</h5>
                                                        </div>
                                                        <!-- <div class="stats-icon pull-right">
                                                            <i style="font-size: 30px;" class="text-primary fa fa-flag"></i>
                                                        </div> -->
                                                        <div class="m-t-xl widget-cl-1">
                                                            <h1 style="font-size: 20px" class="text-success"><?php echo $oee_percent;?> %</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End OEE -->
                                            </div>
                                            <!-- End Air Consumption, OEE -->
                                        </div>
                                        <!-- End Power Consumption, Incoming Pressure, Air Consumption, 
                                        OEE -->
                                        <!-- Start Towerlight  -->
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
                                            <div class="row">
                                                <?php echo $outputTwr; ?>
                                            </div>
                                        </div>
                                        <!-- End Towerlight  -->
                                    </div>
                                    <!-- End Power Consumption, Incoming Pressure, Air Consumption, 
                                    OEE, Towerlight  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Uptime, Downtime, Idletime, Power Consumption, Incoming Pressure
                        Air Consumption, OEE, Towerlight  -->
                    </div>
                </div>
            </div>
            <!-- End Upper Row -->
            <!-- Start Lower Row -->
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="library-book-area mg-tb-10">
                        <!-- Start Pass, Fail, Table, Pareto Chart -->
                        <div class="row">
                            <!-- Start Pass, Fail -->
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="devit-card-custom" id="refresh_pass_fail">
                                    <div class="product-sales-chart" style="border-radius: 20px;
                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                        <div class="row">
                                            <!-- Start Pass -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                                <div class="income-dashone-total reso-mg-b-30" style="height: 137px; background-color: green;
                                                border-radius: 20px;">
                                                    <div class="income-dashone-pro">
                                                        <div class="income-rate-total">
                                                            <div class="text-center price-edu-rate">
                                                                <h1 id="refresh_pass" style="font-size: 50px; color: white;"><?php echo $unit_pass;?></h1>
                                                                <h4 style="font-size: 30px; color: white;">PASS</h4>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Pass -->
                                            <!-- Start Fail -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="income-dashone-total reso-mg-b-30" style="height: 137px; background-color: red;
                                                border-radius: 20px;">
                                                    <div class="income-dashone-pro">
                                                        <div class="income-rate-total">
                                                            <div class="text-center price-edu-rate">
                                                                <h1 id="refresh_fail" style="font-size: 50px; color: white;"><?php echo $unit_fail;?></h1>
                                                                <h4 style="font-size: 30px; color: white;">FAIL</h4>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Fail -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pass, Fail -->
                            <!-- Start Table -->
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <iframe  style="border-radius: 20px;"src="basic_table.php" width="100%" height="400"></iframe>
                            </div>
                            <!-- End Table -->
                            <!-- Start Pareto Chart -->
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-sales-chart" id="graph-container"
                                style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                    <button id="refreshButton2">Refresh Chart</button>
                                    <div style="height: 300px" id="failures1"></div>
                                </div>
                            </div>
                            <!-- End Pareto Chart -->
                        </div>
                        <!-- End Pass, Fail, Table, Pareto Chart  -->
                    </div>
                </div>
            </div>
            <!-- Start End Row -->
        </div>

        <!-- jquery ============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow ============================================ -->
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
        <!-- metisMenu JS ============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- maskedinput JS============================================ -->
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/masking-active.js"></script>
        <!-- dropzone JS ============================================ -->
        <script src="js/dropzone/dropzone.js"></script>
        <!-- tab JS ============================================ -->
        <script src="js/tab.js"></script>
        <!-- plugins JS ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS ============================================ -->
        <script src="js/main.js"></script>
        <!-- Pareto JS ============================================ -->
        <script src="pareto.js"></script>


        <!-- Tooltip ============================================ -->
        <script>
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
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

        <!-- Refresh Parameters Every 1 Second ============================================ -->
        <script>
            $(document).ready(function(){
            setInterval(function(){
                $("#refresh_project").load(window.location.href + " #refresh_project" );
                $("#refresh_tray").load(window.location.href + " #refresh_tray" );
                $("#refresh_machineRealtime").load(window.location.href + " #refresh_machineRealtime" );
                $("#refresh_pass_fail").load(window.location.href + " #refresh_pass_fail" );
            }, 1000);
            });

            $(document).ready(function(){
            setInterval(function(){
                $("#refresh_error").load(window.location.href + " #refresh_error" );
                 }, 300000);
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

