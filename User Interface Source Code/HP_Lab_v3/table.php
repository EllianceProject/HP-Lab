<?php
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database configuration file
    include("config.php");

// Class definition for 'allProc' extending the 'CreateCon' class
class allProc extends CreateCon 
{
    // Function to retrieve data from the database table based on filters and pagination
    public function getTable($filter3, $filter4, $filter5, $filter6, $filter7, $page)
    {
        // Database connection
        $dbConn = new createCon();
        $conn = $dbConn->connect();

        // Define the number of rows to display per page and calculate offset
        $perPage = 20; 
        $offset = ($page - 1) * $perPage;

        $d = "'YYYY-MM-DD'"; // Date format

        // Prepare filter variables based on user inputs
        if ($filter3 == 'All') {
            $filter3_var = 'pl.product';
            $filter3_var2 = 'psl.product';
        } else {
            $filter3_var = "'" . $filter3 . "'";
            $filter3_var2 = "'" . $filter3 . "'";
        }

        if ($filter4 == 'All') {
            $filter4_var = 'pl.name';
            $filter4_var2 = 'psl.name';
        } else {
            $filter4_var = "'" . $filter4 . "'";
            $filter4_var2 = "'" . $filter4 . "'";
        }

        if ($filter5 == 'All') {
            $filter5_var = 'pl.type';
            $filter5_var2 = 'psl.type';
        } else {
            $filter5_var = "'" . $filter5 . "'";
            $filter5_var2 = "'" . $filter5 . "'";
        }

        if (($filter6 == '') && ($filter7 == '')) {
            $date_var = '=TO_CHAR(hir.date_time, ' . $d . ')';
        } else {
            $start = date("Y-m-d", strtotime($filter6));
            $end = date("Y-m-d", strtotime($filter7));
            $start_var = "'" . $start . "'";
            $end_var = "'" . $end . "'";
            $date_var = "BETWEEN '" . $start . "' AND  '" . $end . "'";
        }
            
        $one = "'1'";
        $two = "'2'";
        $three = "'3'";
        $four = "'4'";
        $five = "'5'";
        $six = "'6'";
        $seven = "'7'";
        $eight = "'8'";

        $sql1 = '
        SELECT
            hir.pen_id,
            hir.project_name,
            COALESCE(pl.product, psl.product) AS product,
            COALESCE(pl.name, psl.name) AS name,
            COALESCE(pl.type, psl.type) AS type,
            pl.sku_code,
            TO_CHAR(hir.date_time, ' . $d . ') AS date_time,
            SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) AS contact_pad,
            SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) AS vent_label_alg,
            SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) AS ink_on_vent,
            SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) AS op_pitting,
            SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$two.', '.$five.', '.$six.', '.$eight.') THEN 1 ELSE 0 END) AS ink_under_tape,
            SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$three.', '.$five.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) AS edge_detection,
            SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$four.', '.$six.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) AS crooked_tape,
            SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) AS south_enc_crack,
            SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) AS north_enc_crack
        FROM
            "Main"."hp_inspection_result" hir
        LEFT JOIN
            "Reference"."product_list" pl
        ON
            (pl.pen_id = LEFT(hir.pen_id, 4))
            AND
            (pl.pica_code = RIGHT(hir.pica_code, 3))
        LEFT JOIN
            "Reference"."product_summary_list" psl
        ON
            (psl.pen_id = LEFT(hir.pen_id, 4))
        WHERE
            (pl.product IS NOT NULL OR psl.product IS NOT NULL) -- Rows with either a matching product or a matching product in the psl table
            AND (pl.product = '.$filter3_var.' OR psl.product = '.$filter3_var2.')
            AND (pl.name = '.$filter4_var.' OR psl.name = '.$filter4_var2.')
            AND (pl.type = '.$filter5_var.' OR psl.type = '.$filter5_var2.')
            AND TO_CHAR( hir.date_time, ' . $d . ') ' . $date_var . '
        GROUP BY
            hir.pen_id,
            hir.project_name,
            TO_CHAR(hir.date_time, ' . $d . '),
            COALESCE(pl.product, psl.product),
            COALESCE(pl.name, psl.name),
            COALESCE(pl.type, psl.type),
            pl.sku_code';

        $combined_sql = '(' . $sql1 . ') ORDER BY date_time DESC, project_name DESC LIMIT ' . $perPage . ' OFFSET ' . $offset;

        $query = pg_query($conn, $combined_sql);

        // Create an array to store filter variables for reference
        $filterVars = array(
            'filter3_var' => $filter3_var,
            'filter4_var' => $filter4_var,
            'filter5_var' => $filter5_var,
            'filter3_var2' => $filter3_var2,
            'filter4_var2' => $filter4_var2,
            'filter5_var2' => $filter5_var2,
            'd' => $d,
            'date_var' => $date_var
        );

        // Return the query result and filter variables
        return array('query' => $query, 'filterVars' => $filterVars);
    }
}

    // Check if pagination page parameter is set
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Initialize filter parameters
    $filter3 = isset($_GET['product']) ? $_GET['product'] : 'All';
    $filter4 = isset($_GET['name']) ? $_GET['name'] : 'All';
    $filter5 = isset($_GET['type']) ? $_GET['type'] : 'All';
    $filter6 = isset($_GET['start']) ? $_GET['start'] : '';
    $filter7 = isset($_GET['end']) ? $_GET['end'] : '';

// Instantiate allProc class
$c = new allProc();

// Retrieve data for the specified page
$resultData = $c->getTable($filter3, $filter4, $filter5, $filter6, $filter7, $page);
$result = $resultData['query'];

// Retrieve the filter variables
$filterVars = $resultData['filterVars'];
$filter3_var = $filterVars['filter3_var'];
$filter4_var = $filterVars['filter4_var'];
$filter5_var = $filterVars['filter5_var'];
$filter3_var2 = $filterVars['filter3_var2'];
$filter4_var2 = $filterVars['filter4_var2'];
$filter5_var2 = $filterVars['filter5_var2'];
$d = $filterVars['d'];
$date_var = $filterVars['date_var'];

$one = "'1'";
$two = "'2'";
$three = "'3'";
$four = "'4'";
$five = "'5'";
$six = "'6'";
$seven = "'7'";
$eight = "'8'";
$three_months = "'3 months'";

// Calculate the total number of rows in the entire result set
$totalCountQuery = 'SELECT COUNT(*) AS count
        FROM (
            SELECT
                hir.pen_id,
                hir.project_name,
                COALESCE(pl.product, psl.product) AS product,
                COALESCE(pl.name, psl.name) AS name,
                COALESCE(pl.type, psl.type) AS type,
                pl.sku_code,
                TO_CHAR(hir.date_time, ' . $d . ') AS date_time,
                SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) AS contact_pad,
                SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) AS vent_label_alg,
                SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) AS ink_on_vent,
                SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) AS op_pitting,
                SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$two.', '.$five.', '.$six.', '.$eight.') THEN 1 ELSE 0 END) AS ink_under_tape,
                SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$three.', '.$five.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) AS edge_detection,
                SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$four.', '.$six.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) AS crooked_tape,
                SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) AS south_enc_crack,
                SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) AS north_enc_crack
            FROM
                "Main"."hp_inspection_result" hir
            LEFT JOIN
                "Reference"."product_list" pl
            ON
                (pl.pen_id = LEFT(hir.pen_id, 4))
                AND
                (pl.pica_code = RIGHT(hir.pica_code, 3))
            LEFT JOIN
                "Reference"."product_summary_list" psl
            ON
                (psl.pen_id = LEFT(hir.pen_id, 4))
            WHERE
                (pl.product IS NOT NULL OR psl.product IS NOT NULL) -- Rows with either a matching product or a matching product in the psl table
                AND (pl.product = '.$filter3_var.' OR psl.product = '.$filter3_var2.')
                AND (pl.name = '.$filter4_var.' OR psl.name = '.$filter4_var2.')
                AND (pl.type = '.$filter5_var.' OR psl.type = '.$filter5_var2.')
                AND TO_CHAR( hir.date_time, ' . $d . ') ' . $date_var . '
            GROUP BY
                hir.pen_id,
                hir.project_name,
                TO_CHAR(hir.date_time, ' . $d . '),
                COALESCE(pl.product, psl.product),
                COALESCE(pl.name, psl.name),
                COALESCE(pl.type, psl.type),
                pl.sku_code
            ) as subquery';

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
        <title>Pen Location & Camera Result | HP LAB</title>
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
            <!-- Start Filter -->
            <div class="single-pro-review-area mg-t-15 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st"  style="border-radius: 20px;
                                background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                <ul style="padding: 0px 0px 20px 0px; border-radius: 20px;
                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);" class="tab-review-design" >
                                    <li style="padding-right: 40px;text-transform:capitalize"><a href="pen.php" >TRAY DETAILS</a></li>
                                    <li style="padding-right: 40px;text-transform:capitalize" class="active"><a href="#table" >TABLE</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit" style="border-radius: 20px;
                                    background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                    <div class="product-tab-list tab-pane fade active in" style="border-radius: 20px;
                                        background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
                                        <!-- Start Filter Area -->
                                        <div class="row">
                                            <form method="GET" action="" id="frm">
                                                <!-- Start Product Filter -->
                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label style="color: white">Product</label>
                                                        <select name="product" class="form-control">
                                                            <option value="All">All</option>
                                                            <?php
                                                                // SQL query to fetch distinct product values
                                                                $query = 'SELECT DISTINCT product FROM "Reference"."product_list"';
                                                                $result = pg_query($conn, $query);
                                                                if (!$result) {
                                                                    die("Error in SQL query: " . pg_last_error());
                                                                }       

                                                                // Create an array of product values from the query result                             
                                                                $products = array_map(function($row) { return $row['product']; }, pg_fetch_all($result));

                                                                // Generate dropdown options and mark the selected option based on URL parameter
                                                                foreach ($products as $product) {
                                                                    $selected = ($_GET['product'] ?? '') == $product ? ' selected' : '';
                                                                    echo "<option value='$product'$selected>$product</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Start Name Filter -->
                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label style="color: white">Name</label>
                                                        <select name="name" class="form-control">
                                                            <option value="All">All</option>
                                                            <?php
                                                                // SQL query to fetch distinct name values
                                                                $query = 'SELECT DISTINCT name FROM "Reference"."product_list"';
                                                                $result = pg_query($conn, $query);
                                                                if (!$result) {
                                                                    die("Error in SQL query: " . pg_last_error());
                                                                }    

                                                                // Create an array of name values from the query result                                                              
                                                                $names = array_map(function($row) { return $row['name']; }, pg_fetch_all($result));

                                                                // Generate dropdown options and mark the selected option based on URL parameter
                                                                foreach ($names as $name) {
                                                                    $selected = ($_GET['name'] ?? '') == $name ? ' selected' : '';
                                                                    echo "<option value='$name'$selected>$name</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <!-- Start Type Filter -->
                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label style="color: white">Type</label>
                                                        <select name="type" class="form-control">
                                                            <option value="All">All</option>
                                                            <?php
                                                                // SQL query to fetch distinct type values
                                                                $query = 'SELECT DISTINCT type FROM "Reference"."product_list"';
                                                                $result = pg_query($conn, $query);
                                                                if (!$result) {
                                                                    die("Error in SQL query: " . pg_last_error());
                                                                }     
                                                                
                                                                // Create an array of type values from the query result        
                                                                $types = array_map(function($row) { return $row['type']; }, pg_fetch_all($result));

                                                                // Generate dropdown options and mark the selected option based on URL parameter
                                                                foreach ($types as $type) {
                                                                    $selected = ($_GET['type'] ?? '') == $type ? ' selected' : '';
                                                                    echo "<option value='$type'$selected>$type</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Start ProDate Range duct Filter -->
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                    <label style="font-weight: bold; color: white">Date Range</label>
                                                        <div class="input-daterange input-group" id="datepicker">
                                                            <input type="text" class="form-control" name="start" value="" />
                                                            <span class="input-group-addon">to</span>
                                                            <input type="text" class="form-control" name="end" value="" />
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                        <label style="visibility: hidden;">Date Range</label>
                                                        <input style="width: 100px; "type="submit" name="go" value="Filter" class="btn btn-custon-four btn-primary"></input>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Start Submit Button -->
                                            <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                    <label style="visibility: hidden;">Date Range</label>
                                                    <a href="table.php">
                                                        <button style="width: 100px;" class="btn btn-custon-four btn-primary">Clear</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Filter Area -->
                                        <?php
                                            // Retrieve data for the specified page
                                            $resultData = $c->getTable($filter3, $filter4, $filter5, $filter6, $filter7, $page);
                                            $result = $resultData['query'];

                                            // Retrieve the filter variables
                                            $filterVars = $resultData['filterVars'];
                                            $filter3_var = $filterVars['filter3_var'];
                                            $filter4_var = $filterVars['filter4_var'];
                                            $filter5_var = $filterVars['filter5_var'];
                                            $d = $filterVars['d'];
                                            $date_var = $filterVars['date_var'];
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
                                                                                <th data-sortable="true" style="text-align: center;">Date</th>
                                                                                <th data-sortable="true" style="text-align: center;">Project Name</th>
                                                                                <th data-sortable="true" style="text-align: center;">Pen ID</th>
                                                                                <th data-sortable="true" style="text-align: center;">Product</th>
                                                                                <th data-sortable="true" style="text-align: center;">Name</th>
                                                                                <th data-sortable="true" style="text-align: center;">Type</th>
                                                                                <th data-sortable="true" style="text-align: center;">SKU</th>
                                                                                <th data-sortable="true" style="text-align: center;">Contact <br>Pad <br>Corrosion</th>
                                                                                <th data-sortable="true" style="text-align: center;">Vent <br>Label <br>Misalignment</th>
                                                                                <th data-sortable="true" style="text-align: center;">Ink On <br>Vent Label</th>
                                                                                <th data-sortable="true" style="text-align: center;">OP <br>Pitting <br>Corrosion</th>
                                                                                <th data-sortable="true" style="text-align: center;">Ink Under <br> Tape</th>
                                                                                <!-- <th data-sortable="true" style="text-align: center;">Edge<br>Detection</th> -->
                                                                                <th data-sortable="true" style="text-align: center;">Crooked <br>Tape</th>
                                                                                <th data-sortable="true" style="text-align: center;">Encap <br>Crack <br>South</th>
                                                                                <th data-sortable="true" style="text-align: center;">Encap <br>Crack <br>North</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody style="color: black; text-align: center;">
                                                                            <?php
                                                                            if (pg_num_rows($result) > 0) {    
                                                                                    while($data = pg_fetch_assoc($result)) 
                                                                                    {                                                                                         
                                                                                        // Assign values from fetched data to individual variables
                                                                                        $dt = $data['date_time'];
                                                                                        $product = $data['product'];
                                                                                        $barcode = $data['pen_id'];
                                                                                        $name = $data['name'];
                                                                                        $type = $data['type'];
                                                                                        $sku = $data['sku_code'];                                
                                                                                        $proj_name = $data['project_name'];
                                                                                        $cp = $data['contact_pad'];
                                                                                        $vla = $data['vent_label_alg'];
                                                                                        $iol_iov = $data['ink_on_vent'];
                                                                                        $op = $data['op_pitting'];
                                                                                        $iut = $data['ink_under_tape'];
                                                                                        $ed = $data['edge_detection'];
                                                                                        $ct = $data['crooked_tape'];
                                                                                        $sec = $data['south_enc_crack'];
                                                                                        $nec = $data['north_enc_crack'];
                                                                                                                                                                               
                                                                                        // Output the table row with relevant data
                                                                                        echo "<tr>";
                                                                                        echo "<td>". $dt . "</td>";
                                                                                        echo "<td>". $proj_name . "</td>";
                                                                                        echo "<td>". $barcode . "</td>";
                                                                                        echo "<td>". $product . "</td>";
                                                                                        echo "<td>". $name . "</td>";
                                                                                        echo "<td>". $type . "</td>";
                                                                                        echo "<td>". $sku . "</td>";
                                                 
                                                                                        echo "<td>". $cp . "</td>";
                                                                                        echo "<td>". $vla . "</td>";
                                                                                        echo "<td>". $iol_iov . "</td>";
                                                                                        echo "<td>". $op . "</td>";
                                                                                        echo "<td>". $iut . "</td>";
                                                                                        // echo "<td>". $ed . "</td>";
                                                                                        echo "<td>". $ct . "</td>";
                                                                                        echo "<td>". $sec . "</td>";
                                                                                        echo "<td>". $nec . "</td>";
                                                                                    
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
                                                                                echo '<a href="table.php?page=' . $i . '&product=' . $filter3 . '&name=' . $filter4 . '&type=' . $filter5 . '&start=' . $filter6 . '&end=' . $filter7 . '" class="' . $activeClass . '">' . $i . '</a>';
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
        <!-- Timestamp JS ============================================ -->
        <script src="timestamp.js"></script>

        <!-- Tooltip ============================================ -->
        <script>
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
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

