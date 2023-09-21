<?php
    // Set headers to allow cross-origin requests
    header('Access-Control-Allow-Origin: *'); 

    // Set content type to JSON
    header('Content-Type: application/json');

    // Database configuration file
    include("config.php");

    // SQL Query to fetch data for AGV location
    $query = 'SELECT location_x, location_y FROM "Main"."hp_agv" ORDER BY id DESC LIMIT 1';
    $result = pg_query($conn, $query);

    // Arrays to store x and y coordinates
    $x = array();
    $y = array();

    while ($row = pg_fetch_assoc($result)) {
        $x_meters = $row['location_x']; 
        $y_meters = $row['location_y']; 
        
        // Adjust y-coordinate if it's beyond a certain location
        if ($y_meters >= 32000) {
            $y_meters = $y_meters - 530;
        }

        // Store processed coordinates in arrays
        array_push($x, $x_meters);
        array_push($y, $y_meters);
    }

    // Store the x, y  in an associative array
    $data = array(
        'x' => $x,
        'y' => $y
    );

    // print the data as a valid JSON format
    echo json_encode($data);
?>
