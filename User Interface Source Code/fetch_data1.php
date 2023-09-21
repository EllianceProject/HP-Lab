<?php 
include("config.php"); //To connect database

$outputTwr = ''; //Variable to store Towerlight data

// MAIN ########################################################################################################
    //  SQL Query to fetch parameters for index.php
    $query = 'SELECT * FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
    $result = pg_query($conn, $query);
    
    if (pg_num_rows($result) > 0) 
    {
        while($data = pg_fetch_assoc($result)) 
        {
            $power_consump = $data['power_consumption']; //Variable to store machine power consumption
            $air_consump = $data['total_air_consumption']; //Variable to store machine air consumption 
            $trayCycle = $data['tray_cycle']; //Variable to store tray cycle time in minutes
            $incoming_pressure = $data['incoming_pressure']; //Variable to store machine incoming pressure
            $yield = $data['yield']; //Variable to store pen yield per tray
        }
    }
    else
    {
        $power_consump = '-';
        $air_consump = '-';
        $trayCycle = '-';
        $incoming_pressure = '-';
        $yield = '-';
    }
// END MAIN #################################################################################################################

// ########################################################## MAIN TOWER LIGHT ########################################################
    // SQL Query to fetch towerlight status for index.php
    $query2 =  'SELECT towerlight_status FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
    $result2 = pg_query($conn, $query2);
    if (pg_num_rows($result2) > 0) 
    {
        while($data = pg_fetch_assoc($result2)) 
        {
            $status = $data['towerlight_status']; //Variable to store machine towerlight status

            // Status 1: Red Towerlight On, Yellow Towerlight Off, Green Towerlight Off
            if($status == '1'){
                $outputTwr .= '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;"></div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;"></div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;"></div>
                    </div>
                ';
            }else if($status == '2'){ // Status 2: Red Towerlight Off, Yellow Towerlight On, Green Towerlight Off
                $outputTwr .= '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                ';
            }else if($status == '3'){ // Status 3: Red Towerlight On, Yellow Towerlight On, Green Towerlight Off
                $outputTwr .= '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #FF3131; box-shadow: 0 0 50px #FF3131;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                ';
            }else if($status == '4'){ // Status 4: Red Towerlight Off, Yellow Towerlight Off, Green Towerlight On
                $outputTwr .= '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                        </div>
                    </div>
                ';
            }else if($status == '6'){ // Status 6: Red Towerlight Off, Yellow Towerlight On, Green Towerlight On
                $outputTwr .= '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: white;">  
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: yellow; box-shadow: 0 0 50px yellow;">    
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30" style="border-bottom: 1px solid black; height: 70px; background-color: #00FF00; box-shadow: 0 0 50px #00FF00;"> 
                        </div>
                    </div>
                ';
            }else{ // Status else than above number: Red Towerlight Off, Yellow Towerlight Off, Green Towerlight Off
                $outputTwr .= '
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
        }
    }
    else
    { // If the SQL Query returns 0 row: Red Towerlight Off, Yellow Towerlight Off, Green Towerlight Off
        $outputTwr .= '
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

// ########################################################## END TOWER LIGHT #####################################################
?>

     