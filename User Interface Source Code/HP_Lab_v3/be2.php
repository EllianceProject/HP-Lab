<?php
// Set error reporting to display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");

// Set content type to JSON
header('Content-Type: application/json');

// Database configuration file
include("config.php");

// File to fetch data from the database
include('fetch_data1_cont2.php');

// $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 0 : NO PROJECT
// $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 1 : READY TO START PROJECT
if ($proj_comp == 0  && ($proj_time == 0 || $proj_time == 1)) 
{
    echo json_encode(array('status' => 'Project Not Started'));
}
// $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 0 : PAUSED
// $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 1 : START OR ONGOING
// $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 1 : ONGOING BUT TRAY COMPLETED
else if($proj_comp == 1 && ($proj_time == 0 || $proj_time == 1))
{
    $sql_fail_pass = '
        WITH CTE AS (
            SELECT 
                pl.product, 
                pl.name, 
                pl.pen_body, 
                (
                    SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) + 
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$two.', '.$five.', '.$six.', '.$eight.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$four.', '.$six.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END)  +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) 
                ) AS vision_fail,
                (
                    SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +                    
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END)  
                ) AS vision_pass,
            SUM(CASE WHEN pen_result = '.$one.' THEN 1 ELSE 0 END) AS pen_pass,
            SUM(CASE WHEN pen_result = '.$zero.' THEN 1 ELSE 0 END) AS pen_fail
            FROM "Main"."hp_inspection_result" hir 
            INNER JOIN "Reference"."product_summary_list" pl ON (pl.pen_id = LEFT(hir.pen_id, 4))
            WHERE hir.project_name = ' . $project_name . '
            GROUP BY pl.product, pl.name, pl.pen_body
        )
        SELECT
            product,
            name,
            pen_body,
            vision_fail,
            vision_pass,
            pen_pass,
            pen_fail
        FROM CTE;';

        
    $result = pg_query($conn, $sql_fail_pass);

    $resultArray = array(); // Initialize an empty array to store the result data

    if (pg_num_rows($result) > 0) {
        while ($data = pg_fetch_assoc($result)) {
            $product = $data['product'];
            $name = $data['name'];
            $pen_body = $data['pen_body'];
            $vision_fail = $data['vision_fail'];
            $vision_pass = $data['vision_pass'];
            $pen_pass = $data['pen_pass'];
            $pen_fail = $data['pen_fail'];
    
            $row = [
                'product' => $product,
                'name' => $name,
                'pen_body' => $pen_body,
                'vision_failuresum' => $vision_fail,
                'vision_passSum' => $vision_pass,
                'pen_pass' => $pen_pass,
                'pen_fail' => $pen_fail
            ];
    
            // Add the row to the result array
            $resultArray[] = $row;
        }
    } else {
        // Handle the case where no rows were returned
        $resultArray = array();
    }
    
    $json = json_encode($resultArray); // Convert the result array to JSON
    echo $json; // Output the JSON data   
}
// $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT STILL THERE
// $proj_comp = 0 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT STOPPED
else if(($proj_comp == 1 || $proj_comp == 0) && $proj_time == 2)
{
    $sql_fail_pass = '
        WITH CTE AS (
            SELECT 
                pl.product, 
                pl.name, 
                pl.pen_body, 
                (
                    SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) + 
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$two.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$two.', '.$five.', '.$six.', '.$eight.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id IN ('.$four.', '.$six.', '.$seven.', '.$eight.') THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$two.', '.$four.') THEN 1 ELSE 0 END)  +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id IN ('.$three.', '.$four.') THEN 1 ELSE 0 END) 
                ) AS vision_fail,
                (
                    SUM(CASE WHEN hir.camera = '.$one.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +                    
                    SUM(CASE WHEN hir.camera = '.$two.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$three.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$four.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END) +
                    SUM(CASE WHEN hir.camera = '.$five.' AND hir.result_id = '.$one.' THEN 1 ELSE 0 END)  
                ) AS vision_pass,
            SUM(CASE WHEN pen_result = '.$one.' THEN 1 ELSE 0 END) AS pen_pass,
            SUM(CASE WHEN pen_result = '.$zero.' THEN 1 ELSE 0 END) AS pen_fail
            FROM "Main"."hp_inspection_result" hir 
            INNER JOIN "Reference"."product_summary_list" pl ON (pl.pen_id = LEFT(hir.pen_id, 4))
            WHERE hir.project_name = ' . $project_name . '
            GROUP BY pl.product, pl.name, pl.pen_body
        )
        SELECT
            product,
            name,
            pen_body,
            vision_fail,
            vision_pass,
            pen_pass,
            pen_fail
        FROM CTE;';

        
    $result = pg_query($conn, $sql_fail_pass);

    $resultArray = array(); // Initialize an empty array to store the result data

    if (pg_num_rows($result) > 0) {
        while ($data = pg_fetch_assoc($result)) {
            $product = $data['product'];
            $name = $data['name'];
            $pen_body = $data['pen_body'];
            $vision_fail = $data['vision_fail'];
            $vision_pass = $data['vision_pass'];
            $pen_pass = $data['pen_pass'];
            $pen_fail = $data['pen_fail'];
    
            $row = [
                'product' => $product,
                'name' => $name,
                'pen_body' => $pen_body,
                'vision_failuresum' => $vision_fail,
                'vision_passSum' => $vision_pass,
                'pen_pass' => $pen_pass,
                'pen_fail' => $pen_fail
            ];
    
            // Add the row to the result array
            $resultArray[] = $row;
        }
    } else {
        // Handle the case where no rows were returned
        $resultArray = array();
    }
    
    $json = json_encode($resultArray); // Convert the result array to JSON
    echo $json; // Output the JSON data   
}
else
{
    echo json_encode(array('status' => 'Not Started'));
}

	// Close connection
	pg_close($conn);

?>

