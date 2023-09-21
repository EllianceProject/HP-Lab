<?php 
    include("config.php"); //To connect database

    #region SERVO MOTORS #####################################################################
        // Initialize variables to store <img>
        $icon1 = '';
        $icon2 = '';
        $icon3 = '';
        $icon4 = '';

        //  SQL Query to fetch parameters for omron.php (servo motors)
        $query = 'SELECT * FROM "Main".hp_servo_motor ORDER BY ID DESC LIMIT 1';
        $result = pg_query($conn, $query);
        if (pg_num_rows($result) > 0) 
        {
            while($data = pg_fetch_assoc($result)) 
            {
                $position1 = $data['servo_motor_1_position']; //Variable to store servo motor position 1
                $position2 = $data['servo_motor_2_position']; //Variable to store servo motor position 2
                $position3 = $data['servo_motor_3_position']; //Variable to store servo motor position 3
                $position4 = $data['servo_motor_4_position']; //Variable to store servo motor position 4
            }

            //Check and show blinking image if the servo motor values exceed certain threshold
            if ($position1 > 400)
            {
                $icon1 .='<img class="blink" src="warn.png" style="height: 30px; width: 30px;"></img>';
            }

            if ($position2 > 400)
            {
                $icon2 .='<img class="blink" src="warn.png" style="height: 30px; width: 30px;"></img>';
            }        

            if ($position3 > 500)
            {
                $icon3 .='<img class="blink" src="warn.png" style="height: 30px; width: 30px;"></img>';
            }            

            if ($position4 > 200)
            {
                $icon4 .='<img class="blink" src="warn.png" style="height: 30px; width: 30px;"></img>';
            }            
        }
        else
        {
            // Initialize variables to represent positions with default value "-"
            $position1 = "-";
            $position2 = "-";
            $position3 = "-";
            $position4 = "-";
        }
    #endregion SERVO MOTORS ##################################################################

    #region TM ROBOT #########################################################################
        // Initialize variables to store <img>
        $warn_pwr = '';
        $warn_volt = '';
        $warn_curr = '';
        $warn_temp = '';

        //  SQL Query to fetch parameters for omron.php (TM Robot)
        $query = 'SELECT robot_data.*, machine_parameter_data.towerlight_status FROM
        (SELECT * FROM "Main".hp_tm_robot ORDER BY id DESC LIMIT 1) AS robot_data
        CROSS JOIN
        (SELECT towerlight_status FROM "Main".hp_machine_parameter ORDER BY id DESC LIMIT 1) AS machine_parameter_data;
        ';

        $result = pg_query($conn, $query);

        if (pg_num_rows($result) > 0) 
        {
            while($data = pg_fetch_assoc($result)) 
            {
                $power_consumpTM = $data['power_consumption']; //Variable to store power consumption
                $voltage = $data['voltage']; //Variable to store voltage
                $current = $data['current']; //Variable to store current
                $temp = $data['temperature']; //Variable to store temperature
                $towerlight_stat = $data['towerlight_status']; //Variable to store towerlight status
            }

            //Based on main machine towerlight status = 4
            if ($towerlight_stat == '4')
            {
                $machine_stat = 'OPERATING'; //Variable to store machine status

                //Check and show blinking image if the power consumption values exceed the threshold
                if ($power_consumpTM > 499)
                {
                    $warn_pwr = '<img class="blink" src="warn.png" style="height: 40px; width: 40px;"></img>';
                }

                //Check and show blinking image if the voltage values exceed the threshold
                if ($voltage > 200)
                {
                    $warn_volt = '<img class="blink" src="warn.png" style="height: 40px; width: 40px;"></img>';
                }

                //Check and show blinking image if the current values exceed the threshold
                if ($current > 9)
                {
                    $warn_curr = '<img class="blink" src="warn.png" style="height: 40px; width: 40px;"></img>';
                }

                //Check and show blinking image if the temperature values exceed the threshold
                if ($temp > 49)
                {
                    $warn_temp = '<img class="blink" src="warn.png" style="height: 40px; width: 40px;"></img>';
                }
            }
            else
            {
                $machine_stat = 'Idling'; //Variable to store machine status
            }
        }
        else
        {
            // Initialize variables to represent positions with default value "-"
            $power_consumpTM = '-';
            $voltage = '-';
            $current = '-';
            $temp = '-';
        }
    #endregion TM ROBOT ######################################################################
?>