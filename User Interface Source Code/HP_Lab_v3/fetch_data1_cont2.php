<?php 
// PROJECT AND TRAY COMPLETE ################################################################################################
    $p_name = ''; //Variable to show project name 
    $p_stat = ''; //Variable to show project status and date 
    $tray = ''; //Variable to show tray no.
    $p1_show = ''; //Variable to show the status(color) of pen for location 1 in the tray
    $p2_show = ''; //Variable to show the status(color) of pen for location 2 in the tray
    $p3_show = ''; //Variable to show the status(color) of pen for location 3 in the tray
    $p4_show = ''; //Variable to show the status(color) of pen for location 4 in the tray
    $p5_show = ''; //Variable to show the status(color) of pen for location 5 in the tray
    $p6_show = ''; //Variable to show the status(color) of pen for location 6 in the tray
    $p7_show = ''; //Variable to show the status(color) of pen for location 7 in the tray
    $p8_show = ''; //Variable to show the status(color) of pen for location 8 in the tray
    $p9_show = ''; //Variable to show the status(color) of pen for location 9 in the tray
    $p10_show = ''; //Variable to show the status(color) of pen for location 10 in the tray
    $p11_show = ''; //Variable to show the status(color) of pen for location 11 in the tray
    $p12_show = ''; //Variable to show the status(color) of pen for location 12 in the tray
    $p13_show = ''; //Variable to show the status(color) of pen for location 13 in the tray
    $p14_show = ''; //Variable to show the status(color) of pen for location 14 in the tray
    $p15_show = ''; //Variable to show the status(color) of pen for location 15 in the tray
    $inspection_status= ''; //Variable to show the status of project
    $unit_fail = ''; //Variable to show the number of unit pen for failures
    $unit_pass = ''; //Variable to show the number of unit pen for passes

    // Variables that kept numbers
    $zero = "'0'";
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

    // SQL Query to fetch date and time, project name, project inspection status, project status and tray status
    $query = 'SELECT date_time,project_name, project_time, project_complete, tray_complete FROM "Main"."hp_project" ORDER BY ID DESC LIMIT 1';
    $result = pg_query($conn, $query);
    if (pg_num_rows($result) > 0) 
    {
        while($data = pg_fetch_assoc($result)) 
        {
            $proj_name = $data['project_name']; //Variable to store project name
            $proj_time = $data['project_time']; //Variable to store project inspection status
            $proj_comp = $data['project_complete']; //Variable to store project status
            $tray_comp = $data['tray_complete']; //Variable to store tray status
            $dt = $data['date_time']; //Variable to store project date and time
        }
    }
    else
    {
        $proj_name = 0;
        $proj_time = 0;
        $proj_comp = 0;
        $tray_comp = 0;
        $dt = 0;
    }

    #region Check project_complete, project_time and tray_complete to show in UI
        if($proj_comp == 0 && $proj_time == 0 && $tray_comp == 0) //NO PROJECT RUNNING
        {
            $p_name = 'No Project';
            $p_stat = '-';
            $inspection_status = '<h3 style="color: white;">Project Not Started</h3>';
            $unit_pass = '0';
            $unit_fail = '0';
            $tray = "No Tray";
            $p1_show = 'white';
            $p1_show = 'white';
            $p2_show = 'white';
            $p4_show = 'white';
            $p5_show = 'white';
            $p6_show = 'white';
            $p7_show = 'white';
            $p8_show = 'white';
            $p9_show = 'white';
            $p10_show = 'white';
            $p11_show = 'white';
            $p12_show = 'white';
            $p13_show = 'white';
            $p14_show = 'white';
            $p15_show = 'white'; 
        }
        else if($proj_comp == 0 && $proj_time == 1 && $tray_comp == 0) //READY TO START PROJECT
        {
            $p_name = $proj_name;
            $p_stat = '-';
            $inspection_status = '<h3 style="color: orange;">Project Ready To Start</h3>';
            $unit_pass = '0';
            $unit_fail = '0';
            $tray = "No Tray";
            $p1_show = 'white';
            $p1_show = 'white';
            $p2_show = 'white';
            $p4_show = 'white';
            $p5_show = 'white';
            $p6_show = 'white';
            $p7_show = 'white';
            $p8_show = 'white';
            $p9_show = 'white';
            $p10_show = 'white';
            $p11_show = 'white';
            $p12_show = 'white';
            $p13_show = 'white';
            $p14_show = 'white';
            $p15_show = 'white'; 
        }
        else if($proj_comp == 1 && $proj_time == 1 && $tray_comp == 0) //START OR ONGOING
        {
            $project_name = "'".$proj_name."'";
            $p_name = $proj_name;
            $p_stat = 'Project Started: ' . $dt;
            $inspection_status = '<h3 style="color: yellow;">Ongoing</h3>';
            
            #region Pass and Fail
                // SQL Query to fetch number of unit pass and fail for pens
                $query = 'SELECT pass, fail FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
                $result = pg_query($conn, $query);
                
                if (pg_num_rows($result) > 0) 
                {
                    while($data = pg_fetch_assoc($result)) 
                    {
                        $unit_pass = $data['pass']; //Variable to store number of unit pass for pens
                        $unit_fail = $data['fail']; //Variable to store number of unit fail for pens
                    }
                }
                else
                {
                    $unit_pass = '0';
                    $unit_fail = '0';
                }
            #endregion

            //########################################################## TRAY ###############################################################
                
                // SQL Query to fetch latest location, pen_status, tray number 
                $sql_curr_inspect_data = 'SELECT location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" order by id DESC limit 1';
                $res_curr_inspect_data = pg_query($conn, $sql_curr_inspect_data);
                if (pg_num_rows($res_curr_inspect_data) > 0) 
                {
                    while($data = pg_fetch_assoc($res_curr_inspect_data)) 
                    {
                        $location = $data['location']; //Variable to store pen location that is now processed
                        $p = $data['pen_status']; //Variable to store the status of the pen
                        $num_tray = $data['current_tray_number']; //Variable to store the tray no.
                    }
                    
                    //Check the tray no.
                    if ($num_tray < 1)
                    {
                        $tray = 'No Tray';
                    }
                    else
                    {
                        $tray = 'Tray '.$num_tray.'';
                    }

                    //To check and show location 1 status(color)
                    if ($location == 1)
                    {
                        if ($p == '0')
                        {
                            $p1_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p1_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p1_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p1_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1 & 2 current status for pen 
                    else if ($location == 2)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //To check and show location 2 current status for pen(color)
                        if ($p == '0')
                        {
                            $p2_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p2_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p2_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p2_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1,2 & 3 current status for pen 
                    else if ($location == 3)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //To check and show location 3 current status for pen(color)
                        if ($p == '0')
                        {
                            $p3_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p3_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p3_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p3_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1,2,3 & 4 current status for pen 
                    else if ($location == 4)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 4 status for pen (Color)
                        if ($p == '0')
                        {
                            $p4_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p4_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p4_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p4_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4 & 5 current status for pen 
                    else if ($location == 5)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 5 status for pen(color)
                        if ($p == '0')
                        {
                            $p5_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p5_show .= '#fbbc09'; //Green
                        }
                        else if ($p == '2')
                        {
                            $p5_show .= '#80cc28'; //Yellow
                        }
                        else if ($p == '3')
                        {
                            $p5_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5 & 6 current status for pen 
                    else if ($location == 6)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 6 status for pen (color)
                        if ($p == '0')
                        {
                            $p6_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p6_show .= '#fbbc09'; //Green
                        }
                        else if ($p == '2')
                        {
                            $p6_show .= '#80cc28'; //Yellow
                        }
                        else if ($p == '3')
                        {
                            $p6_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6 & 7 current status for pen 
                    else if ($location == 7)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 7 status for pen (Color)
                        if ($p == '0')
                        {
                            $p7_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p7_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p7_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p7_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7 & 8 current status for pen 
                    else if ($location == 8)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 8 status for pen (color)
                        if ($p == '0')
                        {
                            $p8_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p8_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p8_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p8_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p8_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8 & 9 current status for pen 
                    else if ($location == 9)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28'; //Green
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p8_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 9 status for pen(color)
                        if ($p == '0')
                        {
                            $p9_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p9_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p9_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p9_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9 & 10 current status for pen 
                    else if ($location == 10)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }


                        //To check and show current Location 10 status for pen (color)
                        if ($p == '0')
                        {
                            $p10_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p10_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p10_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p10_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10 & 11 current status for pen 
                    else if ($location == 11)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 11 status for pen (color)
                        if ($p == '0')
                        {
                            $p11_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p11_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p11_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p11_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11 & 12 current status for pen 
                    else if ($location == 12)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }
                        
                        //To check and show location 12 current status for pen(color)
                        if ($p == '0')
                        {
                            $p12_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p12_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p12_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p12_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12 & 13 current status for pen 
                    else if ($location == 13)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //To check and show current location 13 status for pen(color)
                        if ($p == '0')
                        {
                            $p13_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p13_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p13_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p13_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12,13 & 14 current status for pen 
                    else if ($location == 14)
                    {
                        //SQL Query to fetch location 1 current status for pen 
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p12 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p12 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p12 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 13 current status for pen
                        $sql_loc_13 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$thirteen.' order by id DESC limit 1';
                        $res_loc_13 = pg_query($conn, $sql_loc_13);
                        if (pg_num_rows($res_loc_13) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_13)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 13
                            }

                            //To check and show location 13 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p13_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }

                        //To check and show current location 14 status for pen (color)
                        if ($p == '0')
                        {
                            $p14_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p14_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p14_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p14_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12,13,14 & 15 current status for pen
                    else if ($location == 15)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p12 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p12 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p12 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 13 current status for pen
                        $sql_loc_13 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$thirteen.' order by id DESC limit 1';
                        $res_loc_13 = pg_query($conn, $sql_loc_13);
                        if (pg_num_rows($res_loc_13) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_13)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 13
                            }

                            //To check and show location 13 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p13_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 14 current status for pen
                        $sql_loc_14 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$fourteen.' order by id DESC limit 1';
                        $res_loc_14 = pg_query($conn, $sql_loc_14);
                        if (pg_num_rows($res_loc_14) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_14)) 
                            {
                                $p14 = $data['pen_status']; //Variable to store current status for pen for location 14
                            }

                            //To check and show location 14 current status for pen(color)
                            if ($p14 == '2')
                            {
                                $p14_show .= '#80cc28'; //Green
                            }
                            else if ($p14 == '3')
                            {
                                $p14_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p14_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }

                        //To check and show location 15 current status for pen for pen(color)
                        if ($p == '0')
                        {
                            $p1_show .= 'white';
                            $p1_show .= 'white';
                            $p2_show .= 'white';
                            $p4_show .= 'white';
                            $p5_show .= 'white';
                            $p6_show .= 'white';
                            $p7_show .= 'white';
                            $p8_show .= 'white';
                            $p9_show .= 'white';
                            $p10_show .= 'white';
                            $p11_show .= 'white';
                            $p12_show .= 'white';
                            $p13_show .= 'white';
                            $p14_show .= 'white';
                            $p15_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p15_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p15_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p15_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }
                    }
                    else
                    {
                        $p1_show .= 'white';
                        $p1_show .= 'white';
                        $p2_show .= 'white';
                        $p4_show .= 'white';
                        $p5_show .= 'white';
                        $p6_show .= 'white';
                        $p7_show .= 'white';
                        $p8_show .= 'white';
                        $p9_show .= 'white';
                        $p10_show .= 'white';
                        $p11_show .= 'white';
                        $p12_show .= 'white';
                        $p13_show .= 'white';
                        $p14_show .= 'white';
                        $p15_show .= 'white';
                    }
                }
                else
                {
                    $p1_show .= 'white'; 
                    $p1_show .= 'white'; 
                    $p2_show .= 'white'; 
                    $p4_show .= 'white'; 
                    $p5_show .= 'white'; 
                    $p6_show .= 'white'; 
                    $p7_show .= 'white'; 
                    $p8_show .= 'white'; 
                    $p9_show .= 'white'; 
                    $p10_show .= 'white'; 
                    $p11_show .= 'white'; 
                    $p12_show .= 'white'; 
                    $p13_show .= 'white'; 
                    $p14_show .= 'white'; 
                    $p15_show .= 'white'; 
                    $tray = 'No Tray';
                }
            //########################################################## END TRAY ###########################################################
        }
        else if($proj_comp == 1 && $proj_time == 0 && $tray_comp == 0) //PAUSED
        {
            $project_name = "'".$proj_name."'";
            $p_name = $proj_name;
            $p_stat = 'Project Started: ' . $dt;
            $inspection_status = '<h3 style="color: red;">Paused</h3>';
            
            #region Pass and Fail
                // SQL Query to fetch number of unit pass and fail for pens
                $query = 'SELECT pass, fail FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
                $result = pg_query($conn, $query);
                
                if (pg_num_rows($result) > 0) 
                {
                    while($data = pg_fetch_assoc($result)) 
                    {
                        $unit_pass = $data['pass']; //Variable to store number of unit pass for pens
                        $unit_fail = $data['fail']; //Variable to store number of unit fail for pens
                    }
                }
                else
                {
                    $unit_pass = '0';
                    $unit_fail = '0';
                }
            #endregion

            //########################################################## TRAY ###############################################################
                
                // SQL Query to fetch latest location, pen_status, tray number 
                $sql_curr_inspect_data = 'SELECT location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" order by id DESC limit 1';
                $res_curr_inspect_data = pg_query($conn, $sql_curr_inspect_data);
                if (pg_num_rows($res_curr_inspect_data) > 0) 
                {
                    while($data = pg_fetch_assoc($res_curr_inspect_data)) 
                    {
                        $location = $data['location']; //Variable to store pen location that is now processed
                        $p = $data['pen_status']; //Variable to store the status of the pen
                        $num_tray = $data['current_tray_number']; //Variable to store the tray no.
                    }
                    
                    //Check the tray no.
                    if ($num_tray < 1)
                    {
                        $tray = 'No Tray';
                    }
                    else
                    {
                        $tray = 'Tray '.$num_tray.'';
                    }

                    //To check and show location 1 status(color)
                    if ($location == 1)
                    {
                        if ($p == '0')
                        {
                            $p1_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p1_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p1_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p1_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1 & 2 current status for pen 
                    else if ($location == 2)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //To check and show location 2 current status for pen(color)
                        if ($p == '0')
                        {
                            $p2_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p2_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p2_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p2_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1,2 & 3 current status for pen 
                    else if ($location == 3)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //To check and show location 3 current status for pen(color)
                        if ($p == '0')
                        {
                            $p3_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p3_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p3_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p3_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }
                    }
                    //To show location 1,2,3 & 4 current status for pen 
                    else if ($location == 4)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 4 status for pen (Color)
                        if ($p == '0')
                        {
                            $p4_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p4_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p4_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p4_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4 & 5 current status for pen 
                    else if ($location == 5)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 5 status for pen(color)
                        if ($p == '0')
                        {
                            $p5_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p5_show .= '#fbbc09'; //Green
                        }
                        else if ($p == '2')
                        {
                            $p5_show .= '#80cc28'; //Yellow
                        }
                        else if ($p == '3')
                        {
                            $p5_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5 & 6 current status for pen 
                    else if ($location == 6)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 6 status for pen (color)
                        if ($p == '0')
                        {
                            $p6_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p6_show .= '#fbbc09'; //Green
                        }
                        else if ($p == '2')
                        {
                            $p6_show .= '#80cc28'; //Yellow
                        }
                        else if ($p == '3')
                        {
                            $p6_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6 & 7 current status for pen 
                    else if ($location == 7)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 7 status for pen (Color)
                        if ($p == '0')
                        {
                            $p7_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p7_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p7_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p7_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7 & 8 current status for pen 
                    else if ($location == 8)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 8 status for pen (color)
                        if ($p == '0')
                        {
                            $p8_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p8_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p8_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p8_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p8_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8 & 9 current status for pen 
                    else if ($location == 9)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28'; //Green
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p8_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 9 status for pen(color)
                        if ($p == '0')
                        {
                            $p9_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p9_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p9_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p9_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9 & 10 current status for pen 
                    else if ($location == 10)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }


                        //To check and show current Location 10 status for pen (color)
                        if ($p == '0')
                        {
                            $p10_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p10_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p10_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p10_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10 & 11 current status for pen 
                    else if ($location == 11)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //To check and show current Location 11 status for pen (color)
                        if ($p == '0')
                        {
                            $p11_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p11_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p11_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p11_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11 & 12 current status for pen 
                    else if ($location == 12)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }
                        
                        //To check and show location 12 current status for pen(color)
                        if ($p == '0')
                        {
                            $p12_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p12_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p12_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p12_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12 & 13 current status for pen 
                    else if ($location == 13)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //To check and show current location 13 status for pen(color)
                        if ($p == '0')
                        {
                            $p13_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p13_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p13_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p13_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12,13 & 14 current status for pen 
                    else if ($location == 14)
                    {
                        //SQL Query to fetch location 1 current status for pen 
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p12 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p12 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p12 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 13 current status for pen
                        $sql_loc_13 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$thirteen.' order by id DESC limit 1';
                        $res_loc_13 = pg_query($conn, $sql_loc_13);
                        if (pg_num_rows($res_loc_13) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_13)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 13
                            }

                            //To check and show location 13 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p13_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }

                        //To check and show current location 14 status for pen (color)
                        if ($p == '0')
                        {
                            $p14_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p14_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p14_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p14_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }
                    }
                    //To get location 1,2,3,4,5,6,7,8,9,10,11,12,13,14 & 15 current status for pen
                    else if ($location == 15)
                    {
                        //SQL Query to fetch location 1 current status for pen
                        $sql_loc_1 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$one.' order by id DESC limit 1';
                        $res_loc_1 = pg_query($conn, $sql_loc_1);
                        if (pg_num_rows($res_loc_1) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_1)) 
                            {
                                $p1 = $data['pen_status']; //Variable to store current status for pen for location 1
                            }

                            //To check and show location 1 current status for pen(color)
                            if ($p1 == '2')
                            {
                                $p1_show .= '#80cc28'; //Green
                            }
                            else if ($p1 == '3')
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p1_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p1_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 2 current status for pen
                        $sql_loc_2 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$two.' order by id DESC limit 1';
                        $res_loc_2 = pg_query($conn, $sql_loc_2);
                        if (pg_num_rows($res_loc_2) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_2)) 
                            {
                                $p2 = $data['pen_status']; //Variable to store current status for pen for location 2
                            }

                            //To check and show location 2 current status for pen(color)
                            if ($p2 == '2')
                            {
                                $p2_show .= '#80cc28'; //Green
                            }
                            else if ($p2 == '3')
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p2_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p2_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 3 current status for pen
                        $sql_loc_3 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$three.' order by id DESC limit 1';
                        $res_loc_3 = pg_query($conn, $sql_loc_3);
                        if (pg_num_rows($res_loc_3) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_3)) 
                            {
                                $p3 = $data['pen_status']; //Variable to store current status for pen for location 3
                            }

                            //To check and show location 3 current status for pen(color)
                            if ($p3 == '2')
                            {
                                $p3_show .= '#80cc28'; //Green
                            }
                            else if ($p3 == '3')
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p3_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p3_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 4 current status for pen
                        $sql_loc_4 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$four.' order by id DESC limit 1';
                        $res_loc_4 = pg_query($conn, $sql_loc_4);
                        if (pg_num_rows($res_loc_4) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_4)) 
                            {
                                $p4 = $data['pen_status']; //Variable to store current status for pen for location 4
                            }

                            //To check and show location 4 current status for pen(color)
                            if ($p4 == '2')
                            {
                                $p4_show .= '#80cc28'; //Green
                            }
                            else if ($p4 == '3')
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p4_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p4_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 5 current status for pen
                        $sql_loc_5 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$five.' order by id DESC limit 1';
                        $res_loc_5 = pg_query($conn, $sql_loc_5);
                        if (pg_num_rows($res_loc_5) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_5)) 
                            {
                                $p5 = $data['pen_status']; //Variable to store current status for pen for location 5
                            }

                            //To check and show location 5 current status for pen(color)
                            if ($p5 == '2')
                            {
                                $p5_show .= '#80cc28'; //Green
                            }
                            else if ($p5 == '3')
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p5_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p5_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 6 current status for pen
                        $sql_loc_6 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$six.' order by id DESC limit 1';
                        $res_loc_6 = pg_query($conn, $sql_loc_6);
                        if (pg_num_rows($res_loc_6) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_6)) 
                            {
                                $p6 = $data['pen_status']; //Variable to store current status for pen for location 6
                            }

                            //To check and show location 6 current status for pen(color)
                            if ($p6 == '2')
                            {
                                $p6_show .= '#80cc28'; //Green
                            }
                            else if ($p6 == '3')
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p6_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p6_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 7 current status for pen
                        $sql_loc_7 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$seven.' order by id DESC limit 1';
                        $res_loc_7 = pg_query($conn, $sql_loc_7);
                        if (pg_num_rows($res_loc_7) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_7)) 
                            {
                                $p7 = $data['pen_status']; //Variable to store current status for pen for location 7
                            }

                            //To check and show location 7 current status for pen(color)
                            if ($p7 == '2')
                            {
                                $p7_show .= '#80cc28'; //Green
                            }
                            else if ($p7 == '3')
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p7_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p7_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 8 current status for pen
                        $sql_loc_8 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eight.' order by id DESC limit 1';
                        $res_loc_8 = pg_query($conn, $sql_loc_8);
                        if (pg_num_rows($res_loc_8) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_8)) 
                            {
                                $p8 = $data['pen_status']; //Variable to store current status for pen for location 8
                            }

                            //To check and show location 8 current status for pen(color)
                            if ($p8 == '2')
                            {
                                $p8_show .= '#80cc28';
                            }
                            else if ($p8 == '3')
                            {
                                $p8_show .= '#f1511b';
                            }
                            else
                            {
                                $p8_show .= '#f1511b';
                            }
                        }
                        else
                        {
                            $p8_show .= '#f1511b';
                        }

                        //SQL Query to fetch location 9 current status for pen
                        $sql_loc_9 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$nine.' order by id DESC limit 1';
                        $res_loc_9 = pg_query($conn, $sql_loc_9);
                        if (pg_num_rows($res_loc_9) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_9)) 
                            {
                                $p9 = $data['pen_status']; //Variable to store current status for pen for location 9
                            }

                            //To check and show location 9 current status for pen(color)
                            if ($p9 == '2')
                            {
                                $p9_show .= '#80cc28'; //Green
                            }
                            else if ($p9 == '3')
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p9_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p9_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 10 current status for pen
                        $sql_loc_10 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$ten.' order by id DESC limit 1';
                        $res_loc_10 = pg_query($conn, $sql_loc_10);
                        if (pg_num_rows($res_loc_10) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_10)) 
                            {
                                $p10 = $data['pen_status']; //Variable to store current status for pen for location 10
                            }

                            //To check and show location 10 current status for pen(color)
                            if ($p10 == '2')
                            {
                                $p10_show .= '#80cc28'; //Green
                            }
                            else if ($p10 == '3')
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p10_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p10_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 11 current status for pen
                        $sql_loc_11 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$eleven.' order by id DESC limit 1';
                        $res_loc_11 = pg_query($conn, $sql_loc_11);
                        if (pg_num_rows($res_loc_11) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_11)) 
                            {
                                $p11 = $data['pen_status']; //Variable to store current status for pen for location 11
                            }

                            //To check and show location 11 current status for pen(color)
                            if ($p11 == '2')
                            {
                                $p11_show .= '#80cc28'; //Green
                            }
                            else if ($p11 == '3')
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p11_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p11_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 12 current status for pen
                        $sql_loc_12 = 'SELECT id, location, pen_status, current_tray_number FROM "Main"."hp_inspection_data" where location = '.$twelve.' order by id DESC limit 1';
                        $res_loc_12 = pg_query($conn, $sql_loc_12);
                        if (pg_num_rows($res_loc_12) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_12)) 
                            {
                                $p12 = $data['pen_status']; //Variable to store current status for pen for location 12
                            }

                            //To check and show location 12 current status for pen(color)
                            if ($p12 == '2')
                            {
                                $p12_show .= '#80cc28'; //Green
                            }
                            else if ($p12 == '3')
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p12_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p12_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 13 current status for pen
                        $sql_loc_13 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$thirteen.' order by id DESC limit 1';
                        $res_loc_13 = pg_query($conn, $sql_loc_13);
                        if (pg_num_rows($res_loc_13) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_13)) 
                            {
                                $p13 = $data['pen_status']; //Variable to store current status for pen for location 13
                            }

                            //To check and show location 13 current status for pen(color)
                            if ($p13 == '2')
                            {
                                $p13_show .= '#80cc28'; //Green
                            }
                            else if ($p13 == '3')
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p13_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p13_show .= '#f1511b'; //Red
                        }

                        //SQL Query to fetch location 14 current status for pen
                        $sql_loc_14 = 'SELECT pen_status FROM "Main"."hp_inspection_data" where location = '.$fourteen.' order by id DESC limit 1';
                        $res_loc_14 = pg_query($conn, $sql_loc_14);
                        if (pg_num_rows($res_loc_14) > 0) 
                        {
                            while($data = pg_fetch_assoc($res_loc_14)) 
                            {
                                $p14 = $data['pen_status']; //Variable to store current status for pen for location 14
                            }

                            //To check and show location 14 current status for pen(color)
                            if ($p14 == '2')
                            {
                                $p14_show .= '#80cc28'; //Green
                            }
                            else if ($p14 == '3')
                            {
                                $p14_show .= '#f1511b'; //Red
                            }
                            else
                            {
                                $p14_show .= '#f1511b'; //Red
                            }
                        }
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }

                        //To check and show location 15 current status for pen for pen(color)
                        if ($p == '0')
                        {
                            $p1_show .= 'white';
                            $p1_show .= 'white';
                            $p2_show .= 'white';
                            $p4_show .= 'white';
                            $p5_show .= 'white';
                            $p6_show .= 'white';
                            $p7_show .= 'white';
                            $p8_show .= 'white';
                            $p9_show .= 'white';
                            $p10_show .= 'white';
                            $p11_show .= 'white';
                            $p12_show .= 'white';
                            $p13_show .= 'white';
                            $p14_show .= 'white';
                            $p15_show .= 'white';
                        }
                        else if ($p == '1' || $p == '5')
                        {
                            $p15_show .= '#fbbc09'; //Yellow
                        }
                        else if ($p == '2')
                        {
                            $p15_show .= '#80cc28'; //Green
                        }
                        else if ($p == '3')
                        {
                            $p15_show .= '#f1511b'; //Red
                        } 
                        else
                        {
                            $p14_show .= '#f1511b'; //Red
                        }
                    }
                    else
                    {
                        $p1_show .= 'white';
                        $p1_show .= 'white';
                        $p2_show .= 'white';
                        $p4_show .= 'white';
                        $p5_show .= 'white';
                        $p6_show .= 'white';
                        $p7_show .= 'white';
                        $p8_show .= 'white';
                        $p9_show .= 'white';
                        $p10_show .= 'white';
                        $p11_show .= 'white';
                        $p12_show .= 'white';
                        $p13_show .= 'white';
                        $p14_show .= 'white';
                        $p15_show .= 'white';
                    }
                }
                else
                {
                    $p1_show .= 'white'; 
                    $p1_show .= 'white'; 
                    $p2_show .= 'white'; 
                    $p4_show .= 'white'; 
                    $p5_show .= 'white'; 
                    $p6_show .= 'white'; 
                    $p7_show .= 'white'; 
                    $p8_show .= 'white'; 
                    $p9_show .= 'white'; 
                    $p10_show .= 'white'; 
                    $p11_show .= 'white'; 
                    $p12_show .= 'white'; 
                    $p13_show .= 'white'; 
                    $p14_show .= 'white'; 
                    $p15_show .= 'white'; 
                    $tray = 'No Tray';
                }
            //########################################################## END TRAY ###########################################################
        }
        else if($proj_comp == 1 && $proj_time == 1 && $tray_comp == 1) //ONGOING BUT TRAY COMPLETED
        {
            $project_name = "'".$proj_name."'";
            $p_name = $proj_name;
            $p_stat = 'Project Started: ' . $dt;
            $inspection_status = '<h3 style="color: yellow;">Ongoing</h3>';
            $tray = "No Tray";
            $p1_show = 'white';
            $p1_show = 'white';
            $p2_show = 'white';
            $p4_show = 'white';
            $p5_show = 'white';
            $p6_show = 'white';
            $p7_show = 'white';
            $p8_show = 'white';
            $p9_show = 'white';
            $p10_show = 'white';
            $p11_show = 'white';
            $p12_show = 'white';
            $p13_show = 'white';
            $p14_show = 'white';
            $p15_show = 'white'; 
            
            #region Pass and Fail
                $query = 'SELECT pass, fail FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
                $result = pg_query($conn, $query);
                
                if (pg_num_rows($result) > 0) 
                {
                    while($data = pg_fetch_assoc($result)) 
                    {
                        $unit_pass = $data['pass'];
                        $unit_fail = $data['fail'];
                    }
                }
                else
                {
                    $unit_pass = '0';
                    $unit_fail = '0';
                }
            #endregion
        }
        else if(($proj_comp == 1 || $proj_comp == 0) && $proj_time == 2 && $tray_comp == 1) //PROJECT COMPLETED, TRAY COMPLETED, PROJECT STILL THERE 
        {
            $project_name = "'".$proj_name."'";
            $p_name = $proj_name;
            $p_stat = 'Project Completed: ' . $dt;
            $inspection_status = '<h3 style="color: green;">Completed</h3>';
            $tray = "No Tray";
            $p1_show = 'white';
            $p1_show = 'white';
            $p2_show = 'white';
            $p4_show = 'white';
            $p5_show = 'white';
            $p6_show = 'white';
            $p7_show = 'white';
            $p8_show = 'white';
            $p9_show = 'white';
            $p10_show = 'white';
            $p11_show = 'white';
            $p12_show = 'white';
            $p13_show = 'white';
            $p14_show = 'white';
            $p15_show = 'white'; 
            
            #region Pass and Fail
                $query = 'SELECT pass, fail FROM "Main"."hp_machine_parameter" ORDER BY ID DESC LIMIT 1';
                $result = pg_query($conn, $query);
                
                if (pg_num_rows($result) > 0) 
                {
                    while($data = pg_fetch_assoc($result)) 
                    {
                        $unit_pass = $data['pass'];
                        $unit_fail = $data['fail'];
                    }
                }
                else
                {
                    $unit_pass = '0';
                    $unit_fail = '0';
                }
            #endregion
        }
        else
        {
            $p_name = 'No Project';
            $p_stat = '-';
            $inspection_status = '<h3 style="color: white;">Project Not Started</h3>';
            $unit_pass = '0';
            $unit_fail = '0';
            $tray = "No Tray";
            $p1_show = 'white';
            $p1_show = 'white';
            $p2_show = 'white';
            $p4_show = 'white';
            $p5_show = 'white';
            $p6_show = 'white';
            $p7_show = 'white';
            $p8_show = 'white';
            $p9_show = 'white';
            $p10_show = 'white';
            $p11_show = 'white';
            $p12_show = 'white';
            $p13_show = 'white';
            $p14_show = 'white';
            $p15_show = 'white'; 
        }
    #endregion Check project_complete, project_time and tray_complete to show in UI

// END PROJECT AND TRAY COMPLETE ############################################################################################
?>

     