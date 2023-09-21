<?php 
    include("config.php");

    // BUFFER STATION ######################################################################################################
        $buffer_Twr = ''; // Initialize variables to store <div>
        $buffer_loader = ''; // Initialize variables to store string
        $buffer_unloader = ''; // Initialize variables to store string

        // SQL Query to fetch data for agv.php (Buffer)
        $query = 'SELECT * FROM "Main"."hp_buffer" ORDER BY ID DESC LIMIT 1';
        $result = pg_query($conn, $query);
        if (pg_num_rows($result) > 0) 
        {
            while($data = pg_fetch_assoc($result)) 
            {
                $tower = $data['towerlight_status']; //Variable to store towerlight status of Buffer
                $loader = $data['loader_status']; // Variabke to store loader status
                $unloader = $data['unloader_status']; // Variabke to store unloader status
            }

            // TOWERLIGHT ###################################################################################################
                if($tower == '1'){ // Tower 1: Red Towerlight On, Green Towerlight Off
                    $buffer_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;">  
                            </div>
                        </div>
                    ';
                }else if($tower == '2'){ // Tower 2: Red Towerlight Off, Green Towerlight On
                    $buffer_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                            </div>
                        </div>
                    ';
                }else if($tower == '3'){ // Tower 3: Red Towerlight On, Green Towerlight On
                    $buffer_Twr .= ' 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                            </div>
                        </div>
                    ';
                }else{ // Other than above: Red Towerlight Off, Green Towerlight Off
                    $buffer_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;"> 
                            </div>
                        </div>
                    ';
                }
            // END OF TOWERLIGHT ############################################################################################
            
            // LOADER #######################################################################################################
                // Determine the status of the buffer loader based on the value of $loader
                if ($loader == 1){ // If $loader is 1, set the buffer loader status to 'Full'
                    $buffer_loader = 'Full'; 
                }else if ($loader == 2){  // If $loader is 2, set the buffer loader status to 'Empty'
                    $buffer_loader = 'Empty';
                }else{ // For any other value of $loader, set the buffer loader status to '---'
                    $buffer_loader = '---';
                }
            // END OF LOADER ################################################################################################

            // UNLOADER #######################################################################################################
                // Determine the status of the buffer unloader based on the value of $unloader
                if ($unloader == 1){ // If $unloader is 1, set the buffer unloader status to 'Full'
                    $buffer_unloader = 'Full';
                }else if ($unloader == 2){ // If $unloader is 2, set the buffer unloader status to 'Empty'
                    $buffer_unloader = 'Empty';
                }else{ // For any other value of $unloader, set the buffer unloader status to '---'
                    $buffer_unloader = '---';
                }
            // END OF UNLOADER ################################################################################################
        }
        else
        { // Tower 1: Red Towerlight Off, Green Towerlight Off
            $buffer_Twr .= '
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;"> 
                    </div>
                </div>
            ';

            // Initialize variables to represent positions with default value "---"
            $buffer_loader = '---';
            $buffer_unloader = '---';
        }
    // END BUFFER STATION ##################################################################################################

    // AGV STATION ######################################################################################################
        $agv_Twr = ''; // Initialize variables to store <div>
        $agv_stat = ''; // Initialize variables to store string

        // SQL Query to fetch data for agv.php (AGV)
        $query = 'SELECT * FROM "Main"."hp_agv" ORDER BY ID DESC LIMIT 1';
        $result = pg_query($conn, $query);
        if (pg_num_rows($result) > 0) 
        {
            while($data = pg_fetch_assoc($result)) 
            {
                $tray = $data['tray_status']; //Variable to store tray status of AGV
                $tower = $data['towerlight_status']; //Variable to store towerlight status of AGV
                $battery = $data['battery_status']; //Variable to store battery status of AGV
                $agv_x = number_format($data['location_x']/1000, 2); //Variable to store x-axis of AGV in 2 decimal pts
                $agv_y = number_format($data['location_y']/1000, 2); //Variable to store y-axis of AGV in 2 decimal pts
            }

            // TOWERLIGHT ###################################################################################################
                if($tower == '1'){ // Tower 1: Red Towerlight On, Yellow Towerlight Off, Green Towerlight Off
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;">  
                            </div>
                        </div>
                    ';
                }else if($tower == '2'){ //Tower 2: Red Towerlight Off, Yellow Towerlight On, Green Towerlight Off
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;">  
                            </div>
                        </div>
                    ';
                }else if($tower == '3'){ //Tower 3: Red Towerlight On, Yellow Towerlight On, Green Towerlight Off
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: white;">  
                            </div>
                        </div>
                    ';
                }else if($tower == '4'){ //Tower 4: Red Towerlight Off, Yellow Towerlight Off, Green Towerlight On
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                            </div>
                        </div>
                    ';
                }else if($tower == '6'){ //Tower 6: Red Towerlight Off, Yellow Towerlight On, Green Towerlight On
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">    
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                            </div>
                        </div>
                    ';
                }else{ //Other than above : Red Towerlight Off, Yellow Towerlight Off, Green Towerlight Off
                    $agv_Twr .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">    
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;"> 
                            </div>
                        </div>
                    ';
                }
            // END OF TOWERLIGHT ############################################################################################
            
            // TRAY STATS #######################################################################################################
                // Determine the status of the agv tray based on the value of $tray
                if ($tray == 1){ // If $tray is 1, set the agv tray status to 'Full'
                    $agv_stat = 'Full';
                }else if ($tray == 2){ // If $tray is 2, set the agv tray status to 'Empty'
                    $agv_stat = 'Empty';
                }else{ // For any other value of $tray, set the agv tray status to '---'
                    $agv_stat = '---';
                }
            // END OF TRAY STATS ################################################################################################
        }
        else
        {
            //Red Towerlight Off, Yellow Towerlight Off, Green Towerlight Off
            $agv_Twr .= '
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; height: 70px; background-color: white;">  
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; height: 70px; background-color: white;">    
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="border:2px solid black; height: 70px; background-color: white;"> 
                    </div>
                </div>
            ';

            // Initialize variables to represent positions with default value "---"
            $agv_stat = '---';
            $battery = '---';

            // Initialize variables to represent positions with default value 0
            $agv_x = 0;
            $agv_y = 0;
        }
    // END AGV STATION ##################################################################################################
?>

     