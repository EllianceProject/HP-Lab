<?php
    // Set headers to allow cross-origin requests
    header('Access-Control-Allow-Origin: *'); 

    // Set content type to JSON
    header('Content-Type: application/json');

    // Database configuration file
    include("config.php");

    // Set the time zone to Malaysia's time zone
    date_default_timezone_set("Asia/Kuala_Lumpur");

    // Get 3 days ago date
    $day = date("Y-m-d", strtotime("-5 day"));

    // Function to execute the SQL query and fetch the results as an associative array
    function fetchResults($query) {
        global $conn, $day; // Include $day as a global variable
        $result = pg_query($conn, $query);
        
        $data = array();
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array([ 
                "start_date" => $day,
                "code" => "0"
            ]);
        }
    }

    $query = "
    WITH cte AS (
        SELECT
            DATE(start_timestamp) AS start_date,
            error_code as code,
            start_timestamp AS start_timestamp,
            end_timestamp AS end_timestamp,
            error_desc AS description
        FROM
            \"Main\".hp_alarm_log
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '5 days'
AND error_code != 'ERR 26'
        UNION ALL
        SELECT
            DATE(start_timestamp) AS start_date,
            status as code,
            start_timestamp AS start_timestamp,
            end_timestamp AS end_timestamp,
        CASE
            WHEN status = '1' THEN '-'
            WHEN status = '2' THEN '-'
            WHEN status = '3' THEN '-'
            ELSE 'UNKNOWN'
            END AS description
        FROM
            \"Main\".hp_machine_status
        WHERE
            DATE(start_timestamp) = CURRENT_DATE - INTERVAL '5 days'
        ORDER BY
            start_timestamp
    )
    SELECT
        start_date,
        code,
        start_timestamp,
        CASE
            WHEN end_timestamp IS NULL THEN 
                CASE 
                    WHEN DATE_TRUNC('day', LEAD(start_timestamp) OVER (ORDER BY start_timestamp)) < DATE_TRUNC('day', start_timestamp)
                    THEN DATE_TRUNC('day', start_timestamp) + INTERVAL '23 hours 59 minutes 59 seconds'
                    ELSE LEAD(start_timestamp) OVER (ORDER BY start_timestamp)
                END
            ELSE
                CASE 
                    WHEN DATE_TRUNC('day', end_timestamp) > DATE_TRUNC('day', start_timestamp)
                    THEN DATE_TRUNC('day', start_timestamp) + INTERVAL '23 hours 59 minutes 59 seconds'
                    ELSE end_timestamp
                END
        END AS end_timestamp,
        description
    FROM cte
    ";

    $fetchedData = fetchResults($query);

    // Initialize arrays to store data for different codes
    $runData = array();
    $idleData = array();
    $errorData = array();

    // Iterate through the fetched data and assign each row to the appropriate array
    foreach ($fetchedData as $row) {
        if ($row['code'] == 1) {
            $runData[] = $row;
        } elseif ($row['code'] == 2) {
            $idleData[] = $row;
        } elseif (($row['code'] != 3) && ($row['code'] != 2) && ($row['code'] != 1)) {
            $errorData[] = $row;
        }
    }
// Ensure each array has at least one element
if (empty($runData)) {
    $runData[] = array('start_date' => $day, "code" => "0");
}
if (empty($idleData)) {
    $idleData[] = array('start_date' => $day, "code" => "0");
}
if (empty($errorData)) {
    $errorData[] = array('start_date' => $day, "code" => "0");
}
    
    // Combine the data from all three arrays into one associative array
    $combinedData = array(
        'IDLE' => $idleData,
        'RUN' => $runData,
        'ERROR' => $errorData
    );

    // Convert the combined data array to JSON format
    $jsonData = json_encode($combinedData);

    // Set the appropriate content type and echo the JSON data
    echo $jsonData;
?>
