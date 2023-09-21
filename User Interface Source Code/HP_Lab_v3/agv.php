<?php 
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Include the "fetch_data3.php" file to get data from database
    include("fetch_data3.php");
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>AIV | HP LAB</title>
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
                            <li style="background-color: #0096D6">
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
                                            <h3>AIV & Buffer Station</h3>
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
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Start Left Area and AIV Location Area Chart -->
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;" >
                            <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> <!-- dlm card, c2 --->
                                <label style="font-size: 25px; color: white;">AIV Location</label>
                                <div style="height: 500px;" id="floorplan"></div>
                            </div> 
                        </div>
                        <!-- End Left Area and AIV Location Area Chart -->
                        <!-- Start Right Area and AIV Station & Buffer Station Area -->
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <!-- Start AIV Station Area -->
                            <div class="devit-card-custom mg-t-10" id="agv">
                                <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> <!--card --->
                                    <h3 style="color: white">AIV Station</h3>
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="row">  
                                                <!-- Start Location X Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h3 style="color: white"><?php echo $agv_x?></h3>
                                                                <h4  style="color: white">Location X</h4>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>   
                                                    </div>
                                                </div>
                                                <!-- Start Location Y Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%); margin-bottom: 10px;">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h3 style="color: white"><?php echo $agv_y?></h3>
                                                                <h4 style="color: white">Location Y</h4>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>   
                                                    </div>
                                                </div>
                                                <!-- Start Battery Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h3 style="color: white"><?php echo $battery?> %</h3>
                                                                <h4 style="color: white">Battery </h4>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- Start Status Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="income-dashone-total reso-mg-b-30" style="border-radius: 20px; margin-bottom: 30px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h3 style="color: white"><?php echo $agv_stat?></h3>
                                                                <h4 style="color: white">Tray Status</h4>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Towerlight Area -->
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> 
                                            <div class="row">
                                                <?php echo $agv_Twr; ?>
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!-- End AIV Station Area -->
                            <!-- Start Buffer Station Area -->
                            <div class="devit-card-custom mg-t-10" id="buffer" style="margin-top: 35px;">
                                <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);"> <!--card --->
                                    <h3 style="color: white">Buffer Station</h3>
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="row">  
                                                <!-- Start Loader Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"><!--card --->
                                                    <div class="income-dashone-total reso-mg-b-30" style="margin-bottom: 10px; border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h2 style="color: white"><?php echo $buffer_loader?></h2>
                                                                <h3 style="color: white">Loader </h3>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- Start Unloader Area -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"><!--card --->
                                                    <div class="income-dashone-total reso-mg-b-30" style="margin-bottom: 10px; border-radius: 20px;
                                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                                        <div class="income-dashone-pro">
                                                            <div class="text-center price-edu-rate">
                                                                <h2 style="color: white"><?php echo $buffer_unloader?></h2>
                                                                <h3 style="color: white">Unloader </h3>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Towerlight Area -->
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">                                            
                                            <div class="row">
                                                <?php echo $buffer_Twr; ?>
                                            </div>  
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                            <!-- End Buffer Station Area -->
                        </div>
                        <!-- End Right Area and AIV Station & Buffer Station Area -->
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
                $("#buffer").load(window.location.href + " #buffer");
                $("#agv").load(window.location.href + " #agv" );
                $("#x").load(window.location.href + " #x" );
                $("#y").load(window.location.href + " #y" );
            }, 1000);
            });
        </script>

        <script>
            anychart.onDocumentReady(function () {
                // Declare the 'data' variable
                var data;

                // create a chart
                var chart = anychart.cartesian();

                // set the interactivity mode
                chart.interactivity().hoverMode("by-x");

		chart.tooltip(false);

                // Create a marker series and set label formatting
                var series = chart.marker();
                series.labels().enabled(true);
                series.labels().format("AIV");
                series.labels().fontWeight("bold");
                series.labels().fontSize(14);
                series.labels().fontColor("white");

                // Configure label positions and appearance
                series.labels().position("center-middle");
                series.labels().offsetY(-12); // Adjust the vertical offset as needed

                // Configure marker appearance
                series.normal().type("square");
                series.hovered().type("square");
                series.selected().type("square");
                series.normal().fill("blue");
                series.hovered().fill("blue");
                series.selected().fill("blue");
                series.normal().size(30);
                series.hovered().size(30);
                series.selected().size(30);

                // Configure y-axis scale and appearance
                chart.yScale().minimum(-800); // Update with the desired minimum value for y
                chart.yScale().maximum(2300); // Update with the desired maximum value for y
                chart.yScale().inverted(true); // Invert y-axis
                chart.yAxis().orientation("right"); // Set y-axis orientation to "top"
                chart.yScale().ticks([-700, -600, -500, -400, -300, -200, -100, 0, 100, 200, 300, 400, 500, 600, 700, 1657]);

                // Configure x-axis scale and appearance
                chart.xScale(anychart.scales.linear());
                chart.xScale().minimum(28300);
                chart.xScale().maximum(32500); // Update with the desired maximum value for x
                chart.xScale().inverted(false); // Reverse x-axis inversion
                chart.xAxis().orientation("top");

                // Create a loading label
                var loadingLabel = chart
                    .label()
                    .enabled(true)
                    .text("Loading data...")
                    .fontSize(20)
                    .fontColor("red")
                    .position('center')
                    .anchor('center')
                    .hAlign('center')
                    .vAlign('middle')
                    .background("yellow") // Set the background color to light gray (#f9f9f9)
                    .padding([10, 15, 10, 15]); // Add padding to create space around the text within the background

                 // Set the background image of the chart
                chart.background().fill({
                    src: "floorplan.jpg",
                    mode: "stretch"
                });

                // set the container id
                chart.container("floorplan");

                // initiate drawing the chart
                chart.draw();

                // Function to update the chart data using JSON data from AJAX
                function updateChartData(newData) {
                    if (newData && Array.isArray(newData.x) && Array.isArray(newData.y)) {
                        // Save the new data in the 'data' variable
                        data = newData;

                        // Convert the 'x' and 'y' values into the format expected by AnyChart (2D array)
                        var formattedData = data.x.map(function (xValue, index) {
                            return [data.y[index], xValue];
                        });

                        // Update the series data
                        series.data(formattedData);

                        // Re-draw the chart
                        chart.draw();
                    } else {
                        console.error("Invalid data format. Expected 'x' and 'y' arrays.");
                    }
                }

                // AJAX request to fetch JSON data
                function fetchDataAndRefreshChart() {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "fetch_data_agvChart.php", true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Parse the JSON data
                                var responseData = JSON.parse(xhr.responseText);

                                // Call the function to update the chart with the retrieved JSON data
                                loadingLabel.enabled(false);
                                updateChartData(responseData);
                            } else {
                                // Handle the error
                                console.error("Error fetching data:", xhr.status, xhr.statusText);
                            }
                        }
                    };

                    xhr.send();
                }

                // Fetch data and update the chart every one second (1000 milliseconds)
                setInterval(fetchDataAndRefreshChart, 1000);
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

