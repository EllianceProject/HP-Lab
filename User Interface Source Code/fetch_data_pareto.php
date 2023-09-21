<?php
// Set error reporting to display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set headers to allow cross-origin requests
header('Access-Control-Allow-Origin: *'); 

// Set content type to JSON
header('Content-Type: application/json');

// Database configuration file
include("config.php");

// File to fetch data from the database
include ('fetch_data1_cont2.php');

// $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 0 : NO PROJECT
// $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 1 : READY TO START PROJECT
if ($proj_comp == 0  && $tray_comp == 0 && ($proj_time == 0 || $proj_time == 1)) 
{
    $ttl_f1 = 0; // Initialize the variable to store the total for Failure Contact Pad
    $ttl_f2 = 0; // Initialize the variable to store the total for Failure Vent Label Alignment
    $ttl_f3 = 0; // Initialize the variable to store the total for Failure IOL/IOV
    $ttl_f4 = 0; // Initialize the variable to store the total for Failure OP Pitting
    $ttl_f5 = 0; // Initialize the variable to store the total for Failure Ink Under Tape
    $ttl_f6 = 0; // Initialize the variable to store the total for Failure Edge Detection
    $ttl_f7 = 0; // Initialize the variable to store the total for Failure Crooked Tape
    $ttl_f8 = 0; // Initialize the variable to store the total for Failure South Encap Crack
    $ttl_f9 = 0; // Initialize the variable to store the total for Failure North Encap Crack
}
// $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 0 : PAUSED
// $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 1 : START OR ONGOING
// $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 1 : ONGOING BUT TRAY COMPLETED
else if($proj_comp == 1 && ($tray_comp == 0 || $tray_comp == 1) && ($proj_time == 0 || $proj_time == 1))
{
    // Initialize variables to store totals and arrays
    $ttl_f1 = 0;
    $ttl_f2 = 0;
    $ttl_f3 = 0;
    $ttl_f4 = 0;
    $ttl_f5 = 0;
    $ttl_f6 = 0;
    $ttl_f7 = 0;
    $ttl_f8 = 0;
    $ttl_f9 = 0;

    // Initialize variables for specific failures
    $failure_contact_pad = 0;
    $FAILURE_VENT_LABEL_ALIGMENT = 0;
    $FAILURE_IOL_IOV = 0;
    $FAILURE_OP_PITTING = 0;
    $FAILURE_IUT = 0;
    $FAILURE_EDGE_DETECTION = 0;
    $FAILURE_CROOKED_TAPE = 0;
    $SOUTH_FAILURE_ENCAP_CRACK = 0;
    $NORTH_FAILURE_ENCAP_CRACK = 0;
    $p1 = 0;
    $p2 = 0;
    $p3 = 0;
    $p4 = 0;
    $p5 = 0;
    $nr1 = 0;
    $nr2 = 0;
    $nr3 = 0;
    $nr4 = 0;
    $nr5 = 0;

    // Initialize strings for numbers
    $one = "'1'";
    $two = "'2'";
    $three = "'3'";
    $four = "'4'";
    $five = "'5'";
    $six = "'6'";
    $seven = "'7'";
    $eight = "'8'";
    $nine = "'9'";
    $ten = "'10'";
    $eleven = "'11'";
    $twelve = "'12'";
    $thirteen = "'13'";
    $fourteen = "'14'";
    $fifteen = "'15'";

    // CAMERA 1 #############################################################################
        // SQL query to select data from the database for camera 1 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$one.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r1 = $row['result_id'];  // Store result IDs in array
        
             // Check result and assign values based on conditions
            if ($r1 == 1)
            {
                $p1++;
            }
            else if ($r1 == 2)
            {
                $failure_contact_pad++;
            }
            else
            {
                $nr1++;
            }
        }

        // Increment counter and update total       
        $ttl_f1 = $failure_contact_pad;

    // CAMERA 1 #############################################################################

    // CAMERA 2 #############################################################################
        // SQL query to select data from the database for camera 2 and the given project name
        $query2 = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$two.' AND project_name = '.$project_name.'';

        $result2 = pg_query($conn, $query2);
        while ($row = pg_fetch_assoc($result2))
        {
            $r2 = $row['result_id']; // Store result IDs in array

            // Check result and assign values based on conditions
            if ($r2 == 1 )
            {
                $p2++;
            }
            else if ($r2 == 2 )
            {
                $FAILURE_VENT_LABEL_ALIGMENT++;
            }
            else if ($r2 == 3 )
            {
                $FAILURE_IOL_IOV++;
            }
            else if ($r2 == 4 )
            {
                $FAILURE_IOL_IOV++;
                $FAILURE_VENT_LABEL_ALIGMENT++;
            }
            else
            {
                $nr2++;
            }

        }

        // Increment counter and update total
        $ttl_f2 = $FAILURE_VENT_LABEL_ALIGMENT;
        $ttl_f3 = $FAILURE_IOL_IOV;

    // CAMERA 2 #############################################################################

    // CAMERA 3 #############################################################################
        // SQL query to select data from the database for camera 3 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$three.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r3 = $row['result_id']; // Store result IDs in array
            
            // Check result and assign values based on conditions
            if ($r3 == 1 )
            {
                $p3++;
            }
            else if ($r3 == 2 )
            {
                $FAILURE_OP_PITTING++;
            }
            else
            {
                $nr3++;
            }
        }
    
        // Increment counter and update total
        $ttl_f4 = $FAILURE_OP_PITTING;

    // CAMERA 3 #############################################################################

    // CAMERA 4 #############################################################################
        // SQL query to select data from the database for camera 4 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$four.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r4 = $row['result_id'];// Store result IDs in array
            
            // Check result and assign values based on conditions
            if ($r4 == 1 )
            {
                $p4++;
            }
            else if ($r4 == 2 )
            {
                $FAILURE_IUT++;
            }
            else if ($r4 == 3 )
            {
                $FAILURE_EDGE_DETECTION++;
            }
            else if ($r4 == 4 )
            {
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 5 )
            {
                $FAILURE_IUT++;
                $FAILURE_EDGE_DETECTION++;
            }
            else if ($r4 == 6 )
            {
                $FAILURE_IUT++;
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 7 )
            {
                $FAILURE_EDGE_DETECTION++;
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 8 )
            {
                $FAILURE_IUT++;
                $FAILURE_EDGE_DETECTION++;
                $FAILURE_CROOKED_TAPE++;
            }
            else
            {
                $nr4++;
            }
        }
        
        // Increment counter and update total
        $ttl_f5 = $FAILURE_IUT;
        $ttl_f6 = $FAILURE_EDGE_DETECTION;
        $ttl_f7 = $FAILURE_CROOKED_TAPE;
    // CAMERA 4 #############################################################################

    // CAMERA 5 #############################################################################
        // SQL query to select data from the database for camera 5 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$five.' AND project_name = '.$project_name.'';

        //echo $query;
        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result)) {
            $r5 = $row['result_id'];
        
            // Check result and assign values based on conditions
            if ($r5 == 1) {
                $p5++;
            } else if ($r5 == 2) {
                $SOUTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else if ($r5 == 3) {
                $NORTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else if ($r5 == 4) {
                $SOUTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
                $NORTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else {
                $nr5++;
            }
        }

        // Increment counter and update total
        $ttl_f8 = $SOUTH_FAILURE_ENCAP_CRACK;
        $ttl_f9 = $NORTH_FAILURE_ENCAP_CRACK;

    // CAMERA 5 #############################################################################
}
// $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT STILL THERE
// $proj_comp = 0 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT SNORTHPED
else if(($proj_comp == 1 || $proj_comp == 0) && $proj_time == 2 && $tray_comp == 1)
{
    // Initialize variables to store totals and arrays
    $ttl_f1 = 0;
    $ttl_f2 = 0;
    $ttl_f3 = 0;
    $ttl_f4 = 0;
    $ttl_f5 = 0;
    $ttl_f6 = 0;
    $ttl_f7 = 0;
    $ttl_f8 = 0;
    $ttl_f9 = 0;

    // Initialize variables for specific failures
    $failure_contact_pad = 0;
    $FAILURE_VENT_LABEL_ALIGMENT = 0;
    $FAILURE_IOL_IOV = 0;
    $FAILURE_OP_PITTING = 0;
    $FAILURE_IUT = 0;
    $FAILURE_EDGE_DETECTION = 0;
    $FAILURE_CROOKED_TAPE = 0;
    $SOUTH_FAILURE_ENCAP_CRACK = 0;
    $NORTH_FAILURE_ENCAP_CRACK = 0;
    $p1 = 0;
    $p2 = 0;
    $p3 = 0;
    $p4 = 0;
    $p5 = 0;
    $nr1 = 0;
    $nr2 = 0;
    $nr3 = 0;
    $nr4 = 0;
    $nr5 = 0;

    // Initialize strings for numbers
    $one = "'1'";
    $two = "'2'";
    $three = "'3'";
    $four = "'4'";
    $five = "'5'";
    $six = "'6'";
    $seven = "'7'";
    $eight = "'8'";
    $nine = "'9'";
    $ten = "'10'";
    $eleven = "'11'";
    $twelve = "'12'";
    $thirteen = "'13'";
    $fourteen = "'14'";
    $fifteen = "'15'";

    // CAMERA 1 #############################################################################
        // SQL query to select data from the database for camera 1 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$one.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r1 = $row['result_id'];  // Store result IDs in array
        
             // Check result and assign values based on conditions
            if ($r1 == 1)
            {
                $p1++;
            }
            else if ($r1 == 2)
            {
                $failure_contact_pad++;
            }
            else
            {
                $nr1++;
            }
        }

        // Increment counter and update total       
        $ttl_f1 = $failure_contact_pad;

    // CAMERA 1 #############################################################################

    // CAMERA 2 #############################################################################
        // SQL query to select data from the database for camera 2 and the given project name
        $query2 = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$two.' AND project_name = '.$project_name.'';

        $result2 = pg_query($conn, $query2);
        while ($row = pg_fetch_assoc($result2))
        {
            $r2 = $row['result_id']; // Store result IDs in array

            // Check result and assign values based on conditions
            if ($r2 == 1 )
            {
                $p2++;
            }
            else if ($r2 == 2 )
            {
                $FAILURE_VENT_LABEL_ALIGMENT++;
            }
            else if ($r2 == 3 )
            {
                $FAILURE_IOL_IOV++;
            }
            else if ($r2 == 4 )
            {
                $FAILURE_IOL_IOV++;
                $FAILURE_VENT_LABEL_ALIGMENT++;
            }
            else
            {
                $nr2++;
            }

        }

        // Increment counter and update total
        $ttl_f2 = $FAILURE_VENT_LABEL_ALIGMENT;
        $ttl_f3 = $FAILURE_IOL_IOV;

    // CAMERA 2 #############################################################################

    // CAMERA 3 #############################################################################
        // SQL query to select data from the database for camera 3 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$three.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r3 = $row['result_id']; // Store result IDs in array
            
            // Check result and assign values based on conditions
            if ($r3 == 1 )
            {
                $p3++;
            }
            else if ($r3 == 2 )
            {
                $FAILURE_OP_PITTING++;
            }
            else
            {
                $nr3++;
            }
        }
    
        // Increment counter and update total
        $ttl_f4 = $FAILURE_OP_PITTING;

    // CAMERA 3 #############################################################################

    // CAMERA 4 #############################################################################
        // SQL query to select data from the database for camera 4 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$four.' AND project_name = '.$project_name.'';

        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result))
        {
            $r4 = $row['result_id'];// Store result IDs in array
            
            // Check result and assign values based on conditions
            if ($r4 == 1 )
            {
                $p4++;
            }
            else if ($r4 == 2 )
            {
                $FAILURE_IUT++;
            }
            else if ($r4 == 3 )
            {
                $FAILURE_EDGE_DETECTION++;
            }
            else if ($r4 == 4 )
            {
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 5 )
            {
                $FAILURE_IUT++;
                $FAILURE_EDGE_DETECTION++;
            }
            else if ($r4 == 6 )
            {
                $FAILURE_IUT++;
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 7 )
            {
                $FAILURE_EDGE_DETECTION++;
                $FAILURE_CROOKED_TAPE++;
            }
            else if ($r4 == 8 )
            {
                $FAILURE_IUT++;
                $FAILURE_EDGE_DETECTION++;
                $FAILURE_CROOKED_TAPE++;
            }
            else
            {
                $nr4++;
            }
        }
        
        // Increment counter and update total
        $ttl_f5 = $FAILURE_IUT;
        $ttl_f6 = $FAILURE_EDGE_DETECTION;
        $ttl_f7 = $FAILURE_CROOKED_TAPE;
    // CAMERA 4 #############################################################################

    // CAMERA 5 #############################################################################
        // SQL query to select data from the database for camera 5 and the given project name
        $query = 'SELECT * FROM "Main"."hp_inspection_result" where camera = '.$five.' AND project_name = '.$project_name.'';

        //echo $query;
        $result = pg_query($conn, $query);
        while ($row = pg_fetch_assoc($result)) {
            $r5 = $row['result_id'];
        
            // Check result and assign values based on conditions
            if ($r5 == 1) {
                $p5++;
            } else if ($r5 == 2) {
                $SOUTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else if ($r5 == 3) {
                $NORTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else if ($r5 == 4) {
                $SOUTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
                $NORTH_FAILURE_ENCAP_CRACK++; // Increment counter for this condition
            } else {
                $nr5++;
            }
        }

        // Increment counter and update total
        $ttl_f8 = $SOUTH_FAILURE_ENCAP_CRACK;
        $ttl_f9 = $NORTH_FAILURE_ENCAP_CRACK;

    // CAMERA 5 #############################################################################
}
else
{
    $ttl_f1 = 0; // Initialize the variable to store the total for Failure Contact Pad
    $ttl_f2 = 0; // Initialize the variable to store the total for Failure Vent Label Alignment
    $ttl_f3 = 0; // Initialize the variable to store the total for Failure IOL/IOV
    $ttl_f4 = 0; // Initialize the variable to store the total for Failure OP Pitting
    $ttl_f5 = 0; // Initialize the variable to store the total for Failure Ink Under Tape
    $ttl_f6 = 0; // Initialize the variable to store the total for Failure Edge Detection
    $ttl_f7 = 0; // Initialize the variable to store the total for Failure Crooked Tape
    $ttl_f8 = 0; // Initialize the variable to store the total for Failure South Encap Crack
    $ttl_f9 = 0; // Initialize the variable to store the total for Failure North Encap Crack
}

// Initialize arrays to store totals
$f1_arr = array();
$f2_arr = array();
$f3_arr = array();
$f4_arr = array();
$f5_arr = array();
$f6_arr = array();
$f7_arr = array();
$f8_arr = array();
$f9_arr = array();

// Push the values of corresponding total variables into their respective arrays
array_push($f1_arr, $ttl_f1);
array_push($f2_arr, $ttl_f2);
array_push($f3_arr, $ttl_f3);
array_push($f4_arr, $ttl_f4);
array_push($f5_arr, $ttl_f5);
array_push($f6_arr, $ttl_f6);
array_push($f7_arr, $ttl_f7);
array_push($f8_arr, $ttl_f8);
array_push($f9_arr, $ttl_f9);

// Store the failure frequencies in an associative array
$data = array(
    'FAILURE_CONTACT_PAD' => $ttl_f1,
    'FAILURE_VENT_LABEL_ALIGMENT' => $ttl_f2,
    'FAILURE_IOL_IOV' => $ttl_f3,
    'FAILURE_OP_PITTING' => $ttl_f4,
    'FAILURE_IUT' => $ttl_f5,
    'FAILURE_EDGE_DETECTION' => $ttl_f6,
    'FAILURE_CROOKED_TAPE' => $ttl_f7,
    'SOUTH_FAILURE_ENCAP_CRACK' => $ttl_f8,
    'NORTH_FAILURE_ENCAP_CRACK' => $ttl_f9
);

// Now print the data as a valid JSON format
echo json_encode($data);
?>
