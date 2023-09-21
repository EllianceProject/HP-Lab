<?php
//setting header to json
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

include_once 'config.php';

if(!$conn){
	die("Connection failed: " . $conn->error);
}

//query to get data from the table
$query = sprintf("SELECT power_consumption, voltage, current FROM hp_tm_robot ORDER BY id DESC LIMIT 1;");
//$query = sprintf("SELECT power_consumption FROM elliance_staging.HP_tm_robot ORDER BY id DESC LIMIT 1;");

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>