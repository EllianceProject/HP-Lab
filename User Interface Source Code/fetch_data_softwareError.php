<?php

    // include ('config.php');

    // Set the time zone to Malaysia's time zone
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $currentDateTime = date('Y-m-d H:i:s');
    //echo $currentDateTime;

    $query_check_time = "SELECT CONCAT(date, ' ', time) as date_time FROM \"Main\".hp_machine_parameter ORDER BY id DESC LIMIT 1";

    $result_check_time = pg_query($conn, $query_check_time);

    if (pg_num_rows($result_check_time) > 0) 
    {
        while($data = pg_fetch_assoc($result_check_time)) 
        {
            $date_time = $data['date_time'];
        }
    }

    //echo $date_time;

    // Convert the datetime strings to DateTime objects
    $datetime1 = new DateTime($currentDateTime);
    $datetime2 = new DateTime($date_time);

    // Calculate the difference between the two datetimes
    $interval = $datetime1->diff($datetime2);

    // Get the total number of minutes in the interval
    $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

    // Check if the difference is more than 5 minutes
    if ($totalMinutes > 5) 
    {
        $imageFileName = "red.png";
    } 
    else 
    {
        $imageFileName = "green.png";
    }
?>