<?php
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Set headers to allow cross-origin requests
    header('Access-Control-Allow-Origin: *'); 

    // Set content type to JSON
    header('Content-Type: application/json');

    // Database configuration file
    include("config.php");

    // Function to execute the SQL query and fetch the results as an associative array
    function fetchResults($query) {
        global $conn; // Assuming you have a database connection named $conn
        $result = pg_query($conn, $query);
        $data = array();
        while ($row = pg_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Execute the SQL queries for Summation of machine, robot and motor (14 days) and fetch the results
    //Day 1
    $query_day1 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE
        GROUP BY
            formatted_date;
    ";

    //Day 2
    $query_day2 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '1 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 3
    $query_day3 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '2 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 4
    $query_day4 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '3 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 5
    $query_day5 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '4 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 6
    $query_day6 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '5 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 7
    $query_day7 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '6 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 8
    $query_day8 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '7 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 9
    $query_day9 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '8 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 10
    $query_day10 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '9 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 11
    $query_day11 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '10 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 12
    $query_day12 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '11 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 13
    $query_day13 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '12 DAYS'
        GROUP BY
            formatted_date;
    ";

    //Day 14
    $query_day14 = "
        SELECT
            TO_CHAR(DATE(start_timestamp), 'DD/MM') AS formatted_date,
            SUM(CASE WHEN source = 'MACHINE' THEN 1 ELSE 0 END) AS count_machine,
            SUM(CASE WHEN source = 'ROBOT' THEN 1 ELSE 0 END) AS count_robot
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '13 DAYS'
        GROUP BY
            formatted_date;
    ";

    // Get the current date in day/month format
    $date_day1 = date('d/m');

    // Calculate and format the date for the previous days
    $date_day2 = date('d/m', strtotime("-1 days"));
    $date_day3 = date('d/m', strtotime("-2 days"));
    $date_day4 = date('d/m', strtotime("-3 days"));
    $date_day5 = date('d/m', strtotime("-4 days"));
    $date_day6 = date('d/m', strtotime("-5 days"));
    $date_day7 = date('d/m', strtotime("-6 days"));
    $date_day8 = date('d/m', strtotime("-7 days"));
    $date_day9 = date('d/m', strtotime("-8 days"));
    $date_day10 = date('d/m', strtotime("-9 days"));
    $date_day11 = date('d/m', strtotime("-10 days"));
    $date_day12 = date('d/m', strtotime("-11 days"));
    $date_day13 = date('d/m', strtotime("-12 days"));
    $date_day14 = date('d/m', strtotime("-13 days"));

    // An array of 14 queries and corresponding dates
    $queriesAndDates = array(
        array("query" => $query_day1, "date" => $date_day1),
        array("query" => $query_day2, "date" => $date_day2),
        array("query" => $query_day3, "date" => $date_day3),
        array("query" => $query_day4, "date" => $date_day4),
        array("query" => $query_day5, "date" => $date_day5),
        array("query" => $query_day6, "date" => $date_day6),
        array("query" => $query_day7, "date" => $date_day7),
        array("query" => $query_day8, "date" => $date_day8),
        array("query" => $query_day9, "date" => $date_day9),
        array("query" => $query_day10, "date" => $date_day10),
        array("query" => $query_day11, "date" => $date_day11),
        array("query" => $query_day12, "date" => $date_day12),
        array("query" => $query_day13, "date" => $date_day13),
        array("query" => $query_day14, "date" => $date_day14)   
    );

    $data = array();

    // Iterate through each query and date in the array
    foreach ($queriesAndDates as $queryAndDate) {
        $query = $queryAndDate["query"];
        $date = $queryAndDate["date"];

        $result = pg_query($conn, $query);

         // Check if the query result has no rows
        if (pg_num_rows($result) === 0) {
            // No rows returned, create an entry with default values
            $data[] = array(
                'formatted_date' => $date,
                'count_machine' => 0,
                'count_robot' => 0
            );
        }
        else {
            // Rows returned, fetch the data
            while ($row = pg_fetch_assoc($result)) {
                $data[] = $row;
            }}
    }

    // Function to compare dates for sorting
    function compareDates($a, $b) {
        $dateA = DateTime::createFromFormat('d/m', $a['formatted_date']);
        $dateB = DateTime::createFromFormat('d/m', $b['formatted_date']);
        return $dateA <=> $dateB;
    }

    // Sort the data array using the compareDates function
    usort($data, 'compareDates');

    // Convert the data array to JSON format
    $jsonData = json_encode($data);
    // Remove escaping slashes from the JSON output
    $jsonData = str_replace('\\/', '/', $jsonData);

    // Set the appropriate content type and echo the JSON data
    echo $jsonData;
?>
