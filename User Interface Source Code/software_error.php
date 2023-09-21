<?php
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database configuration file
    include("config.php");
    include("fetch_data_softwareError.php");

// Class definition for 'allProc' extending the 'CreateCon' class
class allProc extends CreateCon 
{
    // Function to retrieve data from the database table based on filters and pagination
    public function getTable($page)
    {
        // Database connection
        $dbConn = new createCon();
        $conn = $dbConn->connect();

        // Define the number of rows to display per page and calculate offset
        $perPage = 20; 
        $offset = ($page - 1) * $perPage;

        $sql1 = "SELECT * FROM \"Main\".hp_error_log ORDER BY id DESC LIMIT 20";

        $query = pg_query($conn, $sql1);

        // Return the query result and filter variables
        return array('query' => $query);
    }
}

    // Check if pagination page parameter is set
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Instantiate allProc class
$c = new allProc();

// Retrieve data for the specified page
$resultData = $c->getTable($page);
$result = $resultData['query'];

// Calculate the total number of rows in the entire result set
$totalCountQuery = "SELECT COUNT(*) AS count
FROM (SELECT * FROM \"Main\".hp_error_log ORDER BY id DESC LIMIT 20) AS subquery";

$totalCountResult = pg_query($conn, $totalCountQuery);
$totalCountRow = pg_fetch_assoc($totalCountResult);
$totalRows = $totalCountRow['count']; // Retrieve the count value from the result row
$perPage = 20;

// Calculate the total number of pages based on total rows and rows per page
$totalPages = ceil($totalRows / $perPage);
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Software Backend Error Log | HP LAB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Auto-refresh the page every 300 seconds/ 5 minutes -->
        <meta http-equiv="refresh" content="300">
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
        <!-- normalize CSS ============================================ -->
        <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
        <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
        <!-- style CSS ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- modals CSS ============================================ -->
        <link rel="stylesheet" href="css/modals.css">

        <style>
            /* Start Hover Sidebar Tooltip Design */
                .tooltip{
                    font-size: 1rem;
                }
            /* End Hover Sidebar Tooltip Design */

            /* Styles for pagination container */
            .pagination {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Styles for pagination links */
            .pagination a {
                display: inline-block;
                padding: 8px 12px;
                text-decoration: none;
                color: #333;
                background-color: #f2f2f2;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin: 0 4px;
                transition: background-color 0.3s ease;
            }

            /* Styles for active pagination link */
            .pagination a.active {
                background-color: #4CAF50;
                color: #fff;
            }

            /* Hover styles for pagination links */
            .pagination a:hover {
                background-color: #ddd;
            }

            /* Styles for pagination information */
            .pagination-info {
                text-align: center;
            }
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
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Inspection Page" href="pen.php" aria-expanded="false">
                                    <span style="font-size: 25px;" class="fa fa-desktop" aria-hidden="true"></span> 
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="right" title="Software Error Log" href="software_error.php" aria-expanded="false">
                                    <span style="font-size: 25px;" aria-hidden="true"><img src="<?php echo $imageFileName; ?>"/></span> 
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
                                            <h3>Backend Software Error Log</h3>
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
            <!-- Start Filter -->
            <div class="single-pro-review-area mg-t-15 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart" style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">                                                             
                                        <?php
                                            // Retrieve data for the specified page
                                            $resultData = $c->getTable($page);
                                            $result = $resultData['query'];                                           
                                        ?>
                                        <!-- Start Table Area -->
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="sparkline8-list">
                                                    <div class="table-container" style="overflow-x: auto;">
                                                        <div class="sparkline8-graph">
                                                            <div class="static-table-list">
                                                                <div class="table-wrapper" style="min-width: 100%;">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th data-sortable="true" style="text-align: center;">Date & Time</th>
                                                                                <th data-sortable="true" style="text-align: center;">Error Logs</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody style="color: black; text-align: center;">
                                                                            <?php
                                                                            if (pg_num_rows($result) > 0) {    
                                                                                    while($data = pg_fetch_assoc($result)) 
                                                                                    {                                                                                         
                                                                                        // Assign values from fetched data to individual variables
                                                                                        $dt = $data['date_time'];
                                                                                        $error_log = $data['error_log'];                                                                                                                                                                           
                                                                                                                                                                               
                                                                                        // Output the table row with relevant data
                                                                                        echo "<tr>";
                                                                                        echo "<td>". $dt . "</td>";
                                                                                        echo "<td>". $error_log . "</td>";                                                                                      
                                                                                        echo "</tr>";
                                                                                    }
                                                                                
                                                                            } else {
                                                                                echo "<tr>";
                                                                                echo "<td colspan='12'>No data found</td>";
                                                                                echo "</tr>";
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="pagination-info">
                                                                        <?php
                                                                            // Retrieve the current page number from URL parameters
                                                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                                                            // Make sure the current page is within valid bounds
                                                                            $currentPage = max(1, $currentPage); // Set to 1 if less than 1
                                                                            $currentPage = min($currentPage, $totalPages); // Set to total pages if greater than total pages

                                                                            // Calculate X, Y, and Z values
                                                                            $startRow = ($currentPage - 1) * $perPage + 1;
                                                                            $endRow = min($currentPage * $perPage, $totalRows);

                                                                            echo 'Showing ' . $startRow . ' - ' . $endRow . ' of ' . $totalRows . ' rows';
                                                                        ?>
                                                                    </div>
                                                                    <div class="pagination">
                                                                        <?php
                                                                            // Generate pagination links
                                                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                                                $activeClass = '';
                                                                                if (isset($_GET['page'])) {
                                                                                    $activeClass = ($i == $_GET['page']) ? 'active' : '';
                                                                                }
                                                                                echo '<a href="table.php?page=' . $i . '" class="' . $activeClass . '">' . $i . '</a>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- End Table Area -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                      
                </div>
            </div>
            <!-- End Filter -->
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
        <!-- data table JS ============================================ -->
        <script src="js/data-table/bootstrap-table.js"></script>
        <script src="js/data-table/tableExport.js"></script>
        <script src="js/data-table/data-table-active.js"></script>
        <script src="js/data-table/bootstrap-table-editable.js"></script>
        <script src="js/data-table/bootstrap-editable.js"></script>
        <script src="js/data-table/bootstrap-table-resizable.js"></script>
        <script src="js/data-table/colResizable-1.5.source.js"></script>
        <script src="js/data-table/bootstrap-table-export.js"></script> 
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
        <script src="js/datapicker/bootstrap-datepicker.js"></script>
        <script src="js/datapicker/datepicker-active.js"></script>
        <!-- dropzone JS ============================================ -->
        <script src="js/dropzone/dropzone.js"></script>
        <!-- tab JS ============================================ -->
        <script src="js/tab.js"></script>
        <!-- plugins JS ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS ============================================ -->
        <script src="js/main.js"></script>

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
if(!pg_close($conn)) {
    print "Failed to close connection to " . pg_host($conn) . ": " .pg_last_error($conn) . "<br/>\n";
} else {
    echo '<script>console.log("Successfully disconnected from database"); </script>';
}
?>

