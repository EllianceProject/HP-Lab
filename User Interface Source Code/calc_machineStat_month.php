<?php
    #region CURRENT MACHINE UPTIME, DOWNTIME, IDLETIME #########################################
        //SQL Query to fetch current machine up time, down time and idle time
        $sql_curr = 'SELECT uptime_hours, uptime_minutes, downtime_hours, downtime_minutes, idletime_hours, idletime_minutes
        FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
        $result_curr = pg_query($conn, $sql_curr);

        if (pg_num_rows($result_curr) > 0) 
        {
            while($data = pg_fetch_assoc($result_curr)) 
            {
                $uptime_hr_curr = $data['uptime_hours']; //Variable to store current machine up time for hours
                $uptime_min_curr = $data['uptime_minutes']; //Variable to store current machine up time for minutes
                $downtime_hr_curr = $data['downtime_hours']; //Variable to store current machine down time for hours
                $downtime_min_curr = $data['downtime_minutes']; //Variable to store current machine down time for minutes
                $idletime_hr_curr = $data['idletime_hours']; //Variable to store current machine idle time for hours
                $idletime_min_curr = $data['idletime_minutes']; //Variable to store current machine idle time for minutes
            }
        }
        else
        {
            $uptime_hr_curr = 0;
            $uptime_min_curr = 0;
            $downtime_hr_curr = 0;
            $downtime_min_curr = 0;
            $idletime_hr_curr = 0;
            $idletime_min_curr = 0;
        }
    #endregion #################################################################################

    #region FIRST DAY OF CURRENT MONTH MACHINE UPTIME, DOWNTIME, IDLETIME #################
        // Get the current day of the month
        $currentDay = date('j');

        // Get the date of the same day in the previous month
        $lastMonthDate = date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-') . $currentDay)));

        //SQL Query to fetch first day of current month machine up time, down time and idle time
        $sql_lastMonthDate = "
            SELECT uptime_hours, uptime_minutes, downtime_hours, downtime_minutes, idletime_hours, 
            idletime_minutes
            FROM \"Backup\".hp_machine_parameter WHERE date='$lastMonthDate' ORDER BY ID ASC LIMIT 1";

        $result_lastMonthDate  = pg_query($conn, $sql_lastMonthDate);

        if (pg_num_rows($result_lastMonthDate) > 0) 
        {
            while($data = pg_fetch_assoc($result_lastMonthDate)) 
            {
                $uptime_hr_ago = $data['uptime_hours']; //Variable to store first day of current month machine up time for hours
                $uptime_min_ago = $data['uptime_minutes']; //Variable to store first day of current month machine up time for minutes
                $downtime_hr_ago = $data['downtime_hours']; //Variable to store first day of current month machine down time for hours
                $downtime_min_ago = $data['downtime_minutes']; //Variable to store first day of current month machine down time for minutes
                $idletime_hr_ago = $data['idletime_hours']; //Variable to store first day of current month machine idle time for hours
                $idletime_min_ago = $data['idletime_minutes']; //Variable to store first day of current month machine idle time for minutes
            }
        }
        else
        {
            $uptime_hr_ago = 0;
            $uptime_min_ago = 0;
            $downtime_hr_ago = 0;
            $downtime_min_ago = 0;
            $idletime_hr_ago = 0;
            $idletime_min_ago = 0;
        }

    #endregion ################################################################################# 

    #region CALCULATION RATE MACHINE UP TIME, DOWNTIME, IDLE TIME ##############################
        //Variable to store Current Up time total minutes 
        //(Current up time hour(convert to minutes) + current up time minute)
        $totalMin_uptime_curr = ($uptime_hr_curr * 60) + $uptime_min_curr;

        //Variable to store Current Down time total minutes 
        //(Current Down time hour(convert to minutes) + current Down time minute)
        $totalMin_downtime_curr = ($downtime_hr_curr * 60) + $downtime_min_curr;

        //Variable to store Current Idle time total minutes 
        //(Current Idle time hour(convert to minutes) + current idle time minute)
        $totalMin_idletime_curr = ($idletime_hr_curr * 60) + $idletime_min_curr;

        //Variable to store first day (eg: 01/08/2023) for current month Up time total minutes 
        //(1st day up time hour(convert to minutes) + 1st day up time minute)
        $totalMin_uptime_ago = ($uptime_hr_ago * 60) + $uptime_min_ago;
        
        //Variable to store first day (eg: 01/08/2023) for current month down time total minutes 
        //(1st day down time hour(convert to minutes) + 1st day down time minute)
        $totalMin_downtime_ago = ($downtime_hr_curr * 60) + $downtime_min_curr;

        //Variable to store first day (eg: 01/08/2023) for current month idle time total minutes 
        //(1st day idle time hour(convert to minutes) + 1st day idle time minute)
        $totalMin_idletime_ago = ($idletime_hr_ago * 60) + $idletime_min_ago;

        //Variable to store total machine up time for one month 
        $minus_uptime = $totalMin_uptime_curr - $totalMin_uptime_ago;

        //Variable to store total machine down time for one month 
        $minus_downtime = $totalMin_downtime_curr - $totalMin_downtime_ago;

        //Variable to store total machine idle time for one month 
        $minus_idletime = $totalMin_idletime_curr - $totalMin_idletime_ago;
        
        //To get percentage of monthly used. Numerator month : 30 days x 24 hrs x 60 minutes ([minus_uptime/month] * 100%)
        $numerator = $minus_uptime + $minus_downtime + $minus_idletime;
        
        //Variable to store machine up time per month in percent
        $percent_uptime =  number_format(($minus_uptime/$numerator) * 100, 2);
        
        //Variable to store machine down time per month in percent
        $percent_downtime = number_format(($minus_downtime/$numerator) * 100, 2);
        
        //Variable to store machine idle time per month in percent
        $percent_idletime = number_format(($minus_idletime/$numerator) * 100, 2);
    #endregion #################################################################################
    
    #region CALCULATION OEE ####################################################################
        $current_Date = date('Y-m-d'); //Variable to store the date of first current month 
        $planned_production_time = 30 * 24 * 60; //Variable to store planned production time in minutes (30 days x 24 hours x 60 mins)

        //SQL Query to fetch the summation of pass and summation of fail of pens for one month 
        $sql_count_pass_fail = "
            SELECT SUM(pass) AS total_pass, SUM(fail) AS total_fail
            FROM \"Main\".hp_pen_outcome
            WHERE date_time >= '$lastMonthDate' AND date_time <= '$current_Date';
        ";
        $result_count_pass_fail = pg_query($conn, $sql_count_pass_fail);

        if (pg_num_rows($result_count_pass_fail) > 0) 
        {
            while($data = pg_fetch_assoc($result_count_pass_fail)) 
            {
                $total_pass_pen = $data['total_pass']; //Variable to store summation of pass pens
                $total_fail_pen = $data['total_fail']; //Variable to store summation of fail pens
            }
        }
        else
        {
            $total_pass_pen = 0;
            $total_fail_pen = 0;
        }

        //Variable to store the calculation of run time
        $run_time = $planned_production_time - ($minus_downtime + $minus_idletime);
   
        $ideal_cycle_time = 16.8/60; //Ideal Cycle Time based on one pen (convert second to minute)
        $total_count_pen = $total_pass_pen + $total_fail_pen; //Count of pens processed in one month.
        $availability = $run_time / $planned_production_time; //Availability Calculation
        $performance = ($ideal_cycle_time * $total_count_pen)/ $run_time; //Performance Calculation
        $quality = $total_pass_pen / $total_count_pen; //Quality Calculation
        
        $oee_percent = number_format(($availability * $performance * $quality) * 100, 2); //OEE Calculation       
    #endregion CALCULATION OEE #################################################################
?>