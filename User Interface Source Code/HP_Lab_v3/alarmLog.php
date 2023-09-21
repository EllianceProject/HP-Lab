<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Alarm Log | HP LAB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Bootstrap CSS ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome CSS ============================================ -->
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
        <!-- Anychart JS ============================================ -->
        <script src="anychart-base.min.js"></script>
        <script src="anychart-ui.min.js"></script>
        <script src="anychart-exports.min.js"></script>
        <link href="anychart-ui.min.css" type="text/css" rel="stylesheet">
        <link href="anychart-font.min.css" type="text/css" rel="stylesheet">

        <style>
            /* Start Hover Sidebar Tooltip Design */
                .tooltip{
                    font-size: 1rem;
                }
            /* End Hover Sidebar Tooltip Design */

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
                                <a data-toggle="tooltip" data-placement="right" title="AGV & Buffer Station" href="agv.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-hand-paper-o" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Inspection Page" href="pen.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-desktop" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li style="background-color: #0096D6">
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
                                              <h3>Alarm Log</h3>
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
                                            <li><a href="agv.php">AGV & Buffer Station</a></li>
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
            <div class="product-sales-area mg-tb-15">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Start Left Area (Alarm Log) -->
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                            background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                <h3 style="color: white">Alarm Log</h3>
                                <div class="row" style="text-align: center; padding-bottom: 5px;">
                                    <img src="sgreen.png" style="height: 15px;">
                                    <span style="color: white;">Run</span>                               
                                    <img src="syellow.png" style="height: 15px ">
                                    <span style="color: white;">Idle</span> 
                                    <img src="sred.png" style="height: 15px ">
                                    <span style="color: white;">Error</span>
                                </div>
                                <div style="height: 110px;" id="container1"></div> <!-- Current Day chart -->                             
                                <div style="height: 110px;" id="container2"></div> <!-- Yesterday chart -->
                                <div style="height: 110px;" id="container3"></div> <!-- 2 days chart -->
                                <div style="height: 110px;" id="container4"></div> <!-- 3 days chart -->
                                <div style="height: 110px;" id="container5"></div> <!-- 4 days chart -->
                                <div style="height: 110px;" id="container6"></div> <!-- 5 days chart -->
                                <div style="height: 110px;" id="container7"></div> <!-- 6 days chart -->                    
                            </div>
                        </div>
                        <!-- End Left Area (Alarm Log) -->
                        <!-- Start Right Area (Alarm Frequency) -->
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="hpanel widget-int-shape responsive-mg-b-30"style="border-radius: 20px;
                            background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                <h3 style="color: white">Alarm Frequency</h3>
                                <div style="height: 750px;" id="alarm_frequency"></div>
                            </div>
                        </div>
                        <!-- End Right Area (Alarm Frequency) -->
                    </div>
                </div>
            </div>
        </div>

        <!-- bootstrap JS
        ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
        ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
        ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
        ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
        ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS
        ============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
        ============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>


        <!-- Anychart Alarm Log JS ===================== -->
        <script src="alarm_day1.js"></script>
        <script src="alarm_day2.js"></script>
        <script src="alarm_day3.js"></script>
        <script src="alarm_day4.js"></script>
        <script src="alarm_day5.js"></script>
        <script src="alarm_day6.js"></script>
        <script src="alarm_day7.js"></script>
        <script src="alarm_frequency.js"></script>
      
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
    </body>
</html>

<!-- Check if connection is closed after fetching all data to avoid resources leaks and connection become limited -->
<?php
include ('config.php');
    if(!pg_close($conn)) {
        print "Failed to close connection to " . pg_host($conn) . ": " .pg_last_error($conn) . "<br/>\n";
    } else {
        echo '<script>console.log("Successfully disconnected from database"); </script>';
    }
?>



