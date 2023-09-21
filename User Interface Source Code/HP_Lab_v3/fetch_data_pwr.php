<?php
// Set headers to allow cross-origin requests
header('Access-Control-Allow-Origin: *'); 

// Set content type to JSON
header('Content-Type: application/json');

// Database configuration file
include("config.php");
 
// SQL Query to fetch data
$query = '
SELECT latest_robot.power_consumption, machine_parameters.towerlight_status
FROM (SELECT power_consumption FROM "Main".hp_tm_robot ORDER BY id DESC LIMIT 1) AS latest_robot
JOIN (SELECT towerlight_status FROM "Main".hp_machine_parameter ORDER BY id ASC LIMIT 1) AS machine_parameters ON 1=1;
';

// Execute query
$result = pg_query($conn, $query);

// Fetch the data and store it in an associative array
$data = array();
while ($row = pg_fetch_assoc($result)) 
{
    $data[] = $row;
}

// Close connection
pg_close($conn);

// Check the towerlight_status and set the color variable
if ($data[0]['towerlight_status'] == '4') {
    $colorA = '#7CFC00';
	$colorB = '#FF3131';
} else {
    // Set a default color if towerlight_status is not 4
	$colorA = '#7CFC00';
	$colorB = '#7CFC00';
}

// Add the color variables to the data array
$data[0]['colorA'] = $colorA;
$data[0]['colorB'] = $colorB;

// Now print the data as a valid JSON format
echo json_encode($data);
?>
