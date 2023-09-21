<?php 
    include("fetch_data2.php"); //To fetch servo motors and TM Robot parameters data
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>OMRON Devices | HP LAB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
        <!-- JQuery JS ============================================ -->
        <script src="jquery-1.11.0.min.js"></script>
        <!-- Anychart JS ============================================ -->
        <script src="anychart-base.min.js"></script>
        <script src="anychart-ui.min.js"></script>
        <script src="anychart-exports.min.js"></script>
        <script src="anychart-linear-gauge.min.js"></script>
        <script src="anychart-table.min.js"></script>
        <link href="anychart-ui.min.css" type="text/css" rel="stylesheet">
        <link href="anychart-font.min.css" type="text/css" rel="stylesheet">
        <script src="anychart-data-adapter.min.js"></script>
        <script src="anychart-circular-gauge.min.js"></script>

        <style>
            /* Start Current Design */
                #current{
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    height: 100%;
                }
            /* End Current Design */

            /* Start Hover Sidebar Tooltip Design */
                .tooltip{
                    font-size: 1rem;
                }
            /* End Hover Sidebar Tooltip Design */

            /* Start Certain Parameters to Blink Design  */
                .blink {
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
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Main Dashboard" href="index.php" aria-expanded="false">
                                    <span style="font-size: 30px;" class="fa fa-home" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li style="background-color: #0096D6">
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
                                            <h3>OMRON Devices</h3>
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
                                            <li><a href="alarmLog.php">alarm Log</a></li>
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
                        <!-- Start Servo Motor area-->
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> <!--card --->
                                <h3 style="color: white">SERVO MOTOR POSITION</h3>
                                <div class="row"> 
                                    <!-- Start Loader area--> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hpanel widget-int-shape responsive-mg-b-30"  style="border-radius: 20px;
                                        background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                            <div class="stats-title pull-left">
                                                <h4 style="color: white">Loader(Max: 400)</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <?php echo $icon1 ?>
                                            </div>
                                            <div class="m-t-xl widget-cl-1">
                                                <h1 style="font-size: 30px"class="text-success" id="refresh_position1"><?php echo $position1;?>mm</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Loader area--> 
                                    <!-- Start Unloader area--> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-15">
                                        <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                        background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                            <div class="stats-title pull-left">
                                                <h4 style="color:white">Unloader(Max: 400)</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <?php echo $icon2 ?>
                                            </div>
                                            <div class="m-t-xl widget-cl-1">
                                                <h1 style="font-size: 30px"class="text-success" id="refresh_position2"><?php echo $position2;?>mm</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Unloader area--> 
                                    <!-- Start X-Axis area--> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-15">
                                        <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                        background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                            <div class="stats-title pull-left">
                                                <h4 style="color:white">X-Axis(Max: 500)</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <?php echo $icon3 ?>
                                            </div>
                                            <div class="m-t-xl widget-cl-1">
                                                <h1 style="font-size: 30px"class="text-success" id="refresh_position3"><?php echo $position3;?>mm</h1>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <!-- End X-Axis area--> 
                                    <!-- Start Y-Axis area--> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-15">
                                        <div class="hpanel widget-int-shape responsive-mg-b-30"style="border-radius: 20px;
                                        background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                            <div class="stats-title pull-left">
                                                <h4 style="color:white">Y-Axis(Max: 200)</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <?php echo $icon4 ?>
                                            </div>
                                            <div class="m-t-xl widget-cl-1">
                                                <h1 style="font-size: 30px"class="text-success" id="refresh_position4"><?php echo $position4;?>mm</h1>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <!-- End Y-aXIS area--> 
                                </div>
                            </div>   
                        </div>
                        <!-- End Servo Motor area-->
                        <!-- Start TM Robot area-->
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> <!--card --->
                                <h3 id="refresh_machineStat" style="color:white;">TM ROBOT [<?php echo $machine_stat ?>]</h3>
                                <div class="row">  
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <!-- Start Voltage area--> 
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                    <div class="stats-title pull-left">
                                                        <h3 style="color: white">Voltage</h3>
                                                    </div>
                                                    <div id="blink1" class="stats-icon pull-right">
                                                        <?php echo $warn_volt ?>
                                                    </div>
                                                    <div class="text-center m-t-xl widget-cl-1">
                                                        <div id="voltage"></div>
                                                    </div>
                                                    <div class="text-center widget-cl-1" >
                                                        <h1 id="refresh_voltage" style="font-size: 35px; color: white"><?php echo $voltage;?>V</h1>
                                                    </div>
                                                </div>   
                                            </div>
                                            <!-- End Voltage area--> 
                                            <!-- Start Current area--> 
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                                <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                    <div class="stats-title pull-left">
                                                        <h3 style="color: white">Current</h3>
                                                    </div>
                                                    <div id="blink2" class="stats-icon pull-right">
                                                        <?php echo $warn_curr ?>
                                                    </div>
                                                    <div class="text-center m-t-xl widget-cl-1">
                                                        <div id="current"></div>
                                                    </div>
                                                    <div class="text-center widget-cl-1">
                                                        <h1 id="refresh_current" style="font-size: 35px; color: white"><?php echo $current;?>A</h1>
                                                    </div>
                                                </div>   
                                            </div>
                                            <!-- End Current area--> 
                                        </div>
                                        <div class="row">
                                            <!-- Start Power Consumption area--> 
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-15">
                                                <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                    <div class="stats-title pull-left">
                                                        <h3 style="color: white">Power Consumption</h3>
                                                    </div>
                                                    <div id="blink3" class="stats-icon pull-right">
                                                        <?php echo $warn_pwr ?>
                                                    </div>
                                                    <div class="text-center m-t-xl widget-cl-1">
                                                        <div id="power"></div>
                                                    </div>
                                                    <div class="text-center widget-cl-1">
                                                        <h1 id="refresh_powerConsump" style="font-size: 35px; color: white"><?php echo $power_consumpTM;?>W</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Power Consumption area--> 
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <!-- Start Temperature area--> 
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hpanel widget-int-shape responsive-mg-b-30" style="border-radius: 20px;
                                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                    <div class="stats-title pull-left">
                                                        <h4 style="color: white">Temperature</h4>
                                                    </div>
                                                    <div id="blink4" class="stats-icon pull-right">
                                                        <?php echo $warn_temp ?>
                                                    </div>
                                                    <div class="text-center m-t-xl widget-cl-1">
                                                        <div id="tmrobotTemp" style="height: 455px;"></div>
                                                    </div>
                                                    <div class="text-center widget-cl-1">
                                                        <h1 id="refresh_temp" style="font-size: 35px; color: white;"><?php echo $temp;?>&deg;C</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Temperature area--> 
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                         <!-- End TM Robot area-->
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
        <!-- metisMenu JS ============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- morrisjs JS ============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/jquery.charts-sparkline.js"></script>
        <!-- calendar JS ============================================ -->
        <script src="js/calendar/moment.min.js"></script>
        <script src="js/calendar/fullcalendar.min.js"></script>
        <script src="js/calendar/fullcalendar-active.js"></script>
        <!-- maskedinput JS ============================================ -->
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/masking-active.js"></script>
        <!-- datepicker JS ============================================ -->
        <script src="js/datepicker/jquery-ui.min.js"></script>
        <script src="js/datepicker/datepicker-active.js"></script>
        <!-- form validate JS ============================================ -->
        <script src="js/form-validation/jquery.form.min.js"></script>
        <script src="js/form-validation/jquery.validate.min.js"></script>
        <script src="js/form-validation/form-active.js"></script>
        <!-- dropzone JS ============================================ -->
        <script src="js/dropzone/dropzone.js"></script>
        <!-- tab JS ============================================ -->
        <script src="js/tab.js"></script>
        <!-- plugins JS ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS ============================================ -->
        <script src="js/main.js"></script>

        <!-- Gauge ============================================ -->
        <script src="gauge-min.js"></script>
        <script src="gauge_pwr.js"></script>
        <script src="gauge_volt.js"></script>
        <script src="thermometer.js"></script>
        <script src="gauge_curr.js"></script>

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
                $("#refresh_position1").load(window.location.href + " #refresh_position1" );
                $("#refresh_position2").load(window.location.href + " #refresh_position2" );
                $("#refresh_position3").load(window.location.href + " #refresh_position3" );
                $("#refresh_position4").load(window.location.href + " #refresh_position4" );
                $("#refresh_machineStat").load(window.location.href + " #refresh_machineStat" );
                $("#refresh_voltage").load(window.location.href + " #refresh_voltage" );
                $("#refresh_current").load(window.location.href + " #refresh_current" );
                $("#refresh_powerConsump").load(window.location.href + " #refresh_powerConsump" );
                $("#refresh_temp").load(window.location.href + " #refresh_temp" );
                $("#blink1").load(window.location.href + " #blink1" );
                $("#blink2").load(window.location.href + " #blink2" );
                $("#blink3").load(window.location.href + " #blink3" );
                $("#blink4").load(window.location.href + " #blink4" );
            }, 1000);
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

