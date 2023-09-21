<?php
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("config.php"); //To connect database  
    include("fetch_data1_cont2.php"); //To fetch data

    // Initialize variables to store camera outputs
    $output1_cam = '';
    $output2_cam = '';
    $output3_cam = '';
    $output4_cam = '';
    $output5_cam = '';

    // $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 0 : NO PROJECT
    // $proj_comp = 0 AND $tray_comp = 0 AND $proj_time = 1 : READY TO START PROJECT
    if($proj_comp == 0  && $tray_comp == 0 && ($proj_time == 0 || $proj_time == 1))
    {
        // Initialize variables for tray and pen details
        $tray = "No Tray";
        $pen_location = '-';
        $pen_id = '-';
        $pen_product = '-';
        $pen_name = '-';
        $pen_sku_code = '-';
        $pen_type = '-';
        $pen_body = '-';
        $pen_cycle_time = '-';

        // Initialize HTML output for camera status
        $output1_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 1 (FRONT)</h4> 
        <h3>NO READING</h3> 
        ';
        $output2_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 2 (BOTTOM)</h4> 
        <h3>NO READING</h3> 
        ';
        $output3_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 3 (TOP 1)</h4> 
        <h3>NO READING</h3> 
        ';
        $output4_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 4 (TOP 2)</h4> 
        <h3>NO READING</h3> 
        ';
        $output5_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 5 (TOP 3)</h4> 
        <h3>NO READING</h3> 
        ';
    }
    // $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 0 : PAUSED
    // $proj_comp = 1 AND $tray_comp = 0 AND $proj_time = 1 : START OR ONGOING
    else if($proj_comp == 1 && $tray_comp == 0 && ($proj_time == 0 || $proj_time == 1))
    {
        #region COMPARISON ####################################################################################
            //SQL Query to select last row location of hp_inspection_data
            $sql_slct_data = 'SELECT location FROM "Main"."hp_inspection_data" order by id DESC limit 1';
            $result_data = pg_query($conn, $sql_slct_data);
            if (pg_num_rows($result_data) > 0) 
            {
                while($data = pg_fetch_assoc($result_data)) 
                {
                    $location_data = $data['location']; //Variable to store location from hp_inspection_data
                }
            }
            else
            {
                $location_data = '0';
            }
        
             //SQL Query to select last row location of hp_inspection_result
            $sql_slct_result= 'SELECT location FROM "Main"."hp_inspection_result" order by id DESC limit 1';
            $result_result = pg_query($conn, $sql_slct_result);
            if (pg_num_rows($result_result) > 0) 
            {
                while($data = pg_fetch_assoc($result_result)) 
                {
                    $location_result = $data['location']; //Variable to store location from hp_inspection_result
                }
            }
            else
            {
                $location_result = '0';
            }

            //Comparing last row of hp_inspection_data (location) with hp_inspection_result (location)
            if ($location_data == $location_result)
            {
                #region PEN DETAILS ############################################################################
                    //SQL Query to select last row pen_id of hp_inspection_data
                    $sql_slct_data = 'SELECT pen_id FROM "Main"."hp_inspection_data" WHERE location = \'' . $location_result . '\' 
                    order by id DESC limit 1';
                    $result_data = pg_query($conn, $sql_slct_data);
                    if (pg_num_rows($result_data) > 0) 
                    {
                        while($data = pg_fetch_assoc($result_data)) 
                        {
                            $pen_id_data = $data['pen_id']; //Variable to store pen_id from hp_inspection_data
                        }
                    }

                    //SQL Query to select last row pen_id of hp_inspection_result
                    $sql_slct_result= 'SELECT pen_id FROM "Main"."hp_inspection_result" WHERE location = \'' . $location_data . '\'
                    order by id DESC limit 1';
                    $result_result = pg_query($conn, $sql_slct_result);
                    if (pg_num_rows($result_result) > 0) 
                    {
                        while($data = pg_fetch_assoc($result_result)) 
                        {
                            $pen_id_result = $data['pen_id']; //Variable to store pen_id from hp_inspection_result
                        }
                    }

                    //Comparing last row of hp_inspection_data (pen_id) with hp_inspection_result (pen_id)
                    if ($pen_id_data == $pen_id_result)
                    {
                        //SQL Query to select pen_id and pica_code from hp_inspection_data where location = location_data
                        $sql_slct_pen = 'SELECT pen_id, pica_code, cycletime, location FROM "Main"."hp_inspection_data"
                        WHERE location = \'' . $location_data . '\'
                        ORDER BY "hp_inspection_data".id DESC LIMIT 1';
                        $result_pen = pg_query($conn, $sql_slct_pen);
                        if (pg_num_rows($result_pen) > 0) 
                        { 
                            while($data = pg_fetch_assoc($result_pen)) 
                            {
                                $pen_location = $data['location']; //Variable to store pen location
                                $pen_id = $data['pen_id']; //Variable to store pen barcode
                                $pen_pica_code = $data['pica_code']; //Variable to store pen pica code
                                $pen_cycle_time = $data['cycletime']; //Variable to store pen cycle time
                            }

                            //SQL Query to select pen details from product_list table
                            $sql_slct_pen_details = 'SELECT * FROM "Reference"."product_list"
                            WHERE "product_list".pen_id = LEFT(\'' . $pen_id . '\', 4)
                            AND "product_list".pica_code = RIGHT(\'' . $pen_pica_code . '\', 3)
                            ORDER BY id DESC LIMIT 1';

                            $result_pen_details = pg_query($conn, $sql_slct_pen_details);
                            if (pg_num_rows($result_pen_details) > 0) 
                            { 
                                while($data = pg_fetch_assoc($result_pen_details)) 
                                {
                                    $pen_product = $data['product']; //Variable to store pen product
                                    $pen_name = $data['name']; //Variable to store pen name
                                    $pen_sku_code = $data['sku_code']; //Variable to store pen sku code
                                    $pen_type = $data['type']; //Variable to store pen type
                                    $pen_body = $data['pen_body']; //Variable to store pen body
                                }
                            }
                            else
                            {
                                //SQL Query to select pen details from product_summary_list table
                                $sql_slct_pen_details = 'SELECT * FROM "Reference"."product_summary_list"
                                WHERE "product_summary_list".pen_id = LEFT(\'' . $pen_id . '\', 4)
                                ORDER BY id DESC LIMIT 1';
                                $result_pen_details = pg_query($conn, $sql_slct_pen_details);
                                if (pg_num_rows($result_pen_details) > 0) 
                                { 
                                    while($data = pg_fetch_assoc($result_pen_details)) 
                                    {
                                        $pen_product = $data['product']; //Variable to store pen product
                                        $pen_name = $data['name']; //Variable to store pen name
                                        $pen_type = $data['type']; //Variable to store pen type
                                        $pen_sku_code = '-'; //Variable to store pen sku code (it is '-', since sku_code is not in this table)
                                        $pen_body = $data['pen_body']; //Variable to store pen body
                                        
                                    }
                                }
                                else
                                {
                                    // Initialize variables for pen details
                                    $pen_product = '-';
                                    $pen_name = '-';
                                    $pen_sku_code = '-';
                                    $pen_type = '-';
                                    $pen_body = '-';
                                }
                            }
                        }
                        else
                        {
                            // Initialize variables for pen details
                            $pen_location = '-';
                            $pen_id = '-';
                            $pen_product = '-';
                            $pen_name = '-';
                            $pen_sku_code = '-';
                            $pen_type = '-';
                            $pen_body = '-';
                            $pen_cycle_time = '-';
                        }
                    }
                    else
                    {
                        // Initialize variables for pen details
                        $pen_location = '-';
                        $pen_id = '-';
                        $pen_product = '-';
                        $pen_name = '-';
                        $pen_sku_code = '-';
                        $pen_type = '-';
                        $pen_body = '-';
                        $pen_cycle_time = '-';
                    }
                #endregion PEN DETAILS #########################################################################

                #region CAMERA #################################################################################
                    //SQL Query to select camera, result_id from hp_inspection_result where location = location_data
                    $sql_slct_camera = 'SELECT camera, result_id FROM "Main"."hp_inspection_result" WHERE location = \'' . $location_data . '\' 
                    order by id DESC limit 1';
                    $result_camera = pg_query($conn, $sql_slct_camera);
                    if (pg_num_rows($result_camera) > 0) 
                    {
                        while($data = pg_fetch_assoc($result_camera)) 
                        {
                            $camera = $data['camera']; //Variable to store camera no.
                            $result = $data['result_id']; //Variable to store camera result
                        }
                        
                        #region Fetch camera 1 latest result id
                            if ($camera == '1') //Check if camera = 1
                            {
                                if($result == 1) //Check if result = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 2) //Check if result = 2
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 1 & result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 1 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 10) //Check if result = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 88) //Check if result = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                        #endregion Fetch camera 1 latest result id

                        #region Fetch camera 1 & 2 latest result id
                            else if ($camera == '2') //Check if camera = 2
                            {
                                #region Fetch camera 1 latest result_id
                                //SQL Query to select result_id from inspection_result_list where camera = 1
                                $sql_slct_cam1 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                                camera = \'1\' ORDER BY id DESC LIMIT 1';

                                $result_cam1 = pg_query($conn, $sql_slct_cam1);
                                if (pg_num_rows($result_cam1) > 0) 
                                {
                                    while($data = pg_fetch_assoc($result_cam1)) 
                                    {
                                        $res_cam1 = $data['result_id']; //Variable to store result for camera 1
                                    }

                                    if($res_cam1 == 1) //Check if $res_cam1 = 1
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 1 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="green.gif" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 2) //Check if $res_cam1 = 2
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 1 and result_id = 2
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 1 AND result_id = 2 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 10) //Check if $res_cam1 = 10
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 10 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 88) //Check if $res_cam1 = 88
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 88 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else
                                    {
                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>NO READING</h3> 
                                        ';
                                    }
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                                #endregion Fetch camera 1 latest result_id

                                #region Fetch camera 2 latest result_id
                                if($result == 1) //Check if result = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 2) //Check if result = 2
                                {
                                    //VENT LABEL ALIGMENT FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 3) //Check if result = 3
                                {
                                    //INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 3
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 3 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 4) //Check if result = 4
                                {
                                    //VENT LABEL ALIGMENT & INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 4
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 4 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 10) //Check if result = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($result == 88) //Check if result = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                                #endregion Fetch camera 2 latest result_id
                            }
                        #endregion Fetch camera 1,2 latest result id

                        #region Fetch camera 1,2 & 3 latest result id
                            else if ($camera == '3') //Check if camera = 3
                            {
                                #region Fetch camera 1 latest result_id
                                //SQL Query to select result_id from inspection_result_list where camera = 1
                                $sql_slct_cam1 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                                camera = \'1\' ORDER BY id DESC LIMIT 1';

                                $result_cam1 = pg_query($conn, $sql_slct_cam1);
                                if (pg_num_rows($result_cam1) > 0) 
                                {
                                    while($data = pg_fetch_assoc($result_cam1)) 
                                    {
                                        $res_cam1 = $data['result_id']; //Variable to store result for camera 1
                                    }

                                    if($res_cam1 == 1) //Check if $res_cam1 = 1
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 1 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                         // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="green.gif" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 2) //Check if $res_cam1 = 1
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 1 and result_id = 1
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 1 AND result_id = 2 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                         // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 10) //Check if $res_cam1 = 10
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 10 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                         // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam1 == 88) //Check if $res_cam1 = 88
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 88 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else
                                    {
                                        // Initialize HTML output for camera result status
                                        $output1_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 1 (FRONT)</h4> 
                                        <h3>NO READING</h3> 
                                        ';
                                    }
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                                #endregion Fetch camera 1 latest result_id

                                #region Fetch camera 2 latest result_id
                                //SQL Query to select result_id from inspection_result_list where camera = 2
                                $sql_slct_cam2 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                                camera = \'2\' ORDER BY id DESC LIMIT 1';
                                $result_cam2 = pg_query($conn, $sql_slct_cam2);
                                if (pg_num_rows($result_cam2) > 0)
                                {
                                    while($data = pg_fetch_assoc($result_cam2)) 
                                    {
                                        $res_cam2 = $data['result_id']; //Variable to store result for camera 2
                                    }

                                    if($res_cam2 == 1) //Check if $res_cam2 = 1
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 1 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="green.gif" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam2 == 2) //Check if $res_cam2 = 2
                                    {
                                        //VENT LABEL ALIGMENT FAILURE
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 2
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 2 AND result_id = 2 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam2 == 3) //Check if $res_cam2 = 3
                                    {
                                        //INK ON VENT LABEL FAILURE
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 3
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 2 AND result_id = 3 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam2 == 4) //Check if $res_cam2 = 4
                                    {
                                        //VENT LABEL ALIGMENT & INK ON VENT LABEL FAILURE
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 4
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 2 AND result_id = 4 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam2 == 10) //Check if $res_cam2 = 10
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 10 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($res_cam2 == 88) //Check if $res_cam2 = 88
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 88 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else
                                    {
                                        // Initialize HTML output for camera result status
                                        $output2_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 2 (BOTTOM)</h4> 
                                        <h3>NO READING</h3> 
                                        ';
                                    }
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                                #endregion Fetch camera 2 latest result_id

                                #region Fetch camera 3 latest result_id
                                if ($camera == '3') //Check if camera = 1
                                {
                                    if($result == 1)//Check if result = 1
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 1 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output3_cam .= '
                                        <img src="green.gif" style="height: 60px">
                                        <h4>CAM 3 (TOP 1)</h4> 
                                        <h3>'.$failure_mode.'</h3>';
                                    }
                                    else if ($result == 2) //Check if result = 2
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where camera = 3 and result_id = 2
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE camera = 3 AND result_id = 2 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output3_cam .= '
                                        <img src="red.gif" style="height: 60px">
                                        <h4>CAM 3 (TOP 1)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($result == 10) //Check if result = 10
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 10 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output3_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 3 (TOP 1)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else if ($result == 88) //Check if result = 88
                                    {
                                        //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                        $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                        WHERE result_id = 88 LIMIT 1';

                                        $result_res = pg_query($conn, $sql_slct_res);
                                        while($data = pg_fetch_assoc($result_res)) 
                                        {
                                            $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                        }

                                        // Initialize HTML output for camera result status
                                        $output3_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 3 (TOP 1)</h4> 
                                        <h3>'.$failure_mode.'</h3> 
                                        ';
                                    }
                                    else
                                    {
                                        // Initialize HTML output for camera result status
                                        $output3_cam .= '
                                        <img src="gray.png" style="height: 60px">
                                        <h4>CAM 3 (TOP 1)</h4> 
                                        <h3>NO READING</h3> 
                                        ';
                                    }
                                }
                                #endregion Fetch camera 3 latest result_id
                            }
                        #endregion Fetch camera 1,2,3 latest result id

                        #region Fetch camera 1,2,3 & 4 latest result id
                        else if ($camera == '4') //Check if camera = 4
                        {
                            #region Fetch camera 1 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 1
                            $sql_slct_cam1 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'1\' ORDER BY id DESC LIMIT 1';

                            $result_cam1 = pg_query($conn, $sql_slct_cam1);
                            if (pg_num_rows($result_cam1) > 0) 
                            {
                                while($data = pg_fetch_assoc($result_cam1)) 
                                {
                                    $res_cam1 = $data['result_id']; //Variable to store result for camera 1
                                }

                                if($res_cam1 == 1) //Check if $res_cam1 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 2) //Check if $res_cam1 = 2
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 1 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 1 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode'];//Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 10) //Check if $res_cam1 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 88) //Check if $res_cam1 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode'];//Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output1_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 1 (FRONT)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 1 latest result_id

                            #region Fetch camera 2 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 2
                            $sql_slct_cam2 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'2\' ORDER BY id DESC LIMIT 1';
                            $result_cam2 = pg_query($conn, $sql_slct_cam2);
                            if (pg_num_rows($result_cam2) > 0)
                            {
                                while($data = pg_fetch_assoc($result_cam2)) 
                                {
                                    $res_cam2 = $data['result_id']; //Variable to store result for camera 2
                                }

                                if($res_cam2 == 1) //Check if $res_cam2 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode'];//Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 2) //Check if $res_cam2 = 2
                                {
                                    //VENT LABEL ALIGMENT FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode'];//Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 3) //Check if $res_cam2 = 3
                                {
                                    //INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 3
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 3 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode'];//Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 4) //Check if $res_cam2 = 4
                                {
                                    //VENT LABEL ALIGMENT & INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 4
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 4 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 10) //Check if $res_cam2 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 88) //Check if $res_cam2 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output2_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 2 (BOTTOM)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 2 latest result_id

                            #region Fetch camera 3 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 3
                            $sql_slct_cam3 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'3\' ORDER BY id DESC LIMIT 1';
                            $result_cam3 = pg_query($conn, $sql_slct_cam3);
                            if (pg_num_rows($result_cam3) > 0)
                            {
                                while($data = pg_fetch_assoc($result_cam3)) 
                                {
                                    $res_cam3 = $data['result_id']; //Variable to store result for camera 3
                                }
                           
                                if($res_cam3 == 1) //Check if $res_cam3 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3>';
                                }
                                else if ($res_cam3 == 2) //Check if $res_cam3 = 2
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 3 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 3 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam3 == 10) //Check if $res_cam3 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam3 == 88) //Check if $res_cam3 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            #endregion Fetch camera 3 latest result_id

                            #region Fetch camera 4 latest result_id
                            if($result == 1)//Check if result = 1
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 1 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="green.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3>';
                            }
                            else if ($result == 2) //Check if result = 2
                            {//INK UNDER TAPE FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 2
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 2 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 3) //Check if result = 3
                            {//EDGE DETECTION FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 3
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 3 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 4) //Check if result = 4
                            {//CROOKED TAPE FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 4
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 4 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 5) //Check if result = 5
                            {//INK UNDER TAPE & EDGE DETECTION FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 5
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 5 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 6) //Check if result = 6
                            {//INK UNDER TAPE & CROOKED TAPE FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 6
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 6 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 7) //Check if result = 7
                            {//EDGE DETECTION & CROOKED TAPE FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 7
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 7 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 8) //Check if result = 8
                            {//EDGE DETECTION, CROOKED TAPE & INK UNDER TAPE FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 8
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 4 AND result_id = 8 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 10) //Check if result = 10
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 10 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 88) //Check if result = 88
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 88 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 4 latest result_id
                        }
                        #endregion Fetch camera 1,2,3,4 latest result id

                        #region Fetch camera 1,2,3,4 & 5 latest result id
                        else if ($camera == '5') //Check if camera = 4
                        {
                            #region Fetch camera 1 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 1
                            $sql_slct_cam1 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'1\' ORDER BY id DESC LIMIT 1';

                            $result_cam1 = pg_query($conn, $sql_slct_cam1);
                            if (pg_num_rows($result_cam1) > 0) 
                            {
                                while($data = pg_fetch_assoc($result_cam1)) 
                                {
                                    $res_cam1 = $data['result_id']; //Variable to store result for camera 1
                                }

                                if($res_cam1 == 1) //Check if $res_cam1 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 2) //Check if $res_cam1 = 2
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 1 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 1 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 10) //Check if $res_cam1 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam1 == 88) //Check if $res_cam1 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output1_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 1 (FRONT)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output1_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 1 (FRONT)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 1 latest result_id

                            #region Fetch camera 2 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 2
                            $sql_slct_cam2 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'2\' ORDER BY id DESC LIMIT 1';
                            $result_cam2 = pg_query($conn, $sql_slct_cam2);
                            if (pg_num_rows($result_cam2) > 0)
                            {
                                while($data = pg_fetch_assoc($result_cam2)) 
                                {
                                    $res_cam2 = $data['result_id']; //Variable to store result for camera 2
                                }

                                if($res_cam2 == 1) //Check if $res_cam2 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 2) //Check if $res_cam2 = 2
                                {
                                    //VENT LABEL ALIGMENT FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 3) //Check if $res_cam2 = 3
                                {
                                    //INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 3
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 3 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 4) //Check if $res_cam2 = 4
                                {
                                    //VENT LABEL ALIGMENT & INK ON VENT LABEL FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 2 and result_id = 4
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 2 AND result_id = 4 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 10) //Check if $res_cam2 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam2 == 88) //Check if $res_cam2 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output2_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 2 (BOTTOM)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output2_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 2 (BOTTOM)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 2 latest result_id

                            #region Fetch camera 3 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 3
                            $sql_slct_cam3 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'3\' ORDER BY id DESC LIMIT 1';
                            $result_cam3 = pg_query($conn, $sql_slct_cam3);
                            if (pg_num_rows($result_cam3) > 0)
                            {
                                while($data = pg_fetch_assoc($result_cam3)) 
                                {
                                    $res_cam3 = $data['result_id']; //Variable to store result for camera 3
                                }
                           
                                if($res_cam3 == 1) //Check if $res_cam3 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3>';
                                }
                                else if ($res_cam3 == 2) //Check if $res_cam3 = 2
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 3 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 3 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam3 == 10) //Check if $res_cam3 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam3 == 88) //Check if $res_cam3 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output3_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 3 (TOP 1)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            #endregion Fetch camera 3 latest result_id

                            #region Fetch camera 4 latest result_id
                            //SQL Query to select result_id from inspection_result_list where camera = 4
                            $sql_slct_cam4 = 'SELECT result_id FROM "Main"."hp_inspection_result" WHERE 
                            camera = \'4\' ORDER BY id DESC LIMIT 1';
                            $result_cam4 = pg_query($conn, $sql_slct_cam4);
                            if (pg_num_rows($result_cam4) > 0)
                            {
                                while($data = pg_fetch_assoc($result_cam4)) 
                                {
                                    $res_cam4 = $data['result_id']; //Variable to store result for camera 4
                                }

                                if($res_cam4 == 1) //Check if $res_cam4 = 1
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 1 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="green.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3>';
                                }
                                else if ($res_cam4 == 2) //Check if $res_cam4 = 2
                                {//INK UNDER TAPE FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 2
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 2 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 3) //Check if $res_cam4 = 3
                                {//EDGE DETECTION FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 3
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 3 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 4) //Check if $res_cam4 = 4
                                {//CROOKED TAPE FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 4
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 4 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 5) //Check if $res_cam4 = 5
                                {//INK UNDER TAPE & EDGE DETECTION FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 5
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 5 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode 
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 6) //Check if $res_cam4 = 6
                                {//INK UNDER TAPE & CROOKED TAPE FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 6
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 6 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 7) //Check if $res_cam4 = 7
                                {//EDGE DETECTION & CROOKED TAPE FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 7
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 7 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 8) //Check if $res_cam4 = 8
                                {//EDGE DETECTION, CROOKED TAPE & INK UNDER TAPE FAILURE
                                    //SQL Query to select failure_mode from inspection_result_list where camera = 4 and result_id = 8
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE camera = 4 AND result_id = 8 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="red.gif" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 10) //Check if $res_cam4 = 10
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 10 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else if ($res_cam4 == 88) //Check if $res_cam4 = 88
                                {
                                    //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                    $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                    WHERE result_id = 88 LIMIT 1';

                                    $result_res = pg_query($conn, $sql_slct_res);
                                    while($data = pg_fetch_assoc($result_res)) 
                                    {
                                        $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                    }

                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>'.$failure_mode.'</h3> 
                                    ';
                                }
                                else
                                {
                                    // Initialize HTML output for camera result status
                                    $output4_cam .= '
                                    <img src="gray.png" style="height: 60px">
                                    <h4>CAM 4 (TOP 2)</h4> 
                                    <h3>NO READING</h3> 
                                    ';
                                }
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output4_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 4 (TOP 2)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 4 latest result_id

                            #region Fetch camera 5 latest result_id
                            if($result == 1)//Check if result = 1
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 1
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 1 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="green.gif" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3>';
                            }
                            else if ($result == 2) //Check if result = 2
                            {//ENCAP CRACK SOUTH FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 5 and result_id = 2
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 5 AND result_id = 2 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 3) //Check if result = 3
                            {//ENCAP CRACK NORTH FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 5 and result_id = 3
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 5 AND result_id = 3 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 4) //Check if result = 4
                            {//ENCAP CRACK SOUTH & ENCAP CRACK NORTH FAILURE
                                //SQL Query to select failure_mode from inspection_result_list where camera = 5 and result_id = 4
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE camera = 5 AND result_id = 4 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="red.gif" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 10) //Check if result = 10
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 10
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 10 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else if ($result == 88) //Check if result = 88
                            {
                                //SQL Query to select failure_mode from inspection_result_list where result_id = 88
                                $sql_slct_res = 'SELECT failure_mode FROM "Reference".inspection_result_list 
                                WHERE result_id = 88 LIMIT 1';

                                $result_res = pg_query($conn, $sql_slct_res);
                                while($data = pg_fetch_assoc($result_res)) 
                                {
                                    $failure_mode = $data['failure_mode']; //Variable to store failure mode
                                }

                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>'.$failure_mode.'</h3> 
                                ';
                            }
                            else
                            {
                                // Initialize HTML output for camera result status
                                $output5_cam .= '
                                <img src="gray.png" style="height: 60px">
                                <h4>CAM 5 (TOP 3)</h4> 
                                <h3>NO READING</h3> 
                                ';
                            }
                            #endregion Fetch camera 4 latest result_id
                        }
                        #endregion Fetch camera 1,2,3,4 & 5 latest result id   
                    }
                    else
                    {
                        // Initialize HTML output for camera result status
                        $output1_cam .= '
                        <img src="gray.png" style="height: 60px">
                        <h4>CAM 1 (FRONT)</h4> 
                        <h3>NO READING</h3> 
                        ';
                        $output2_cam .= '
                        <img src="gray.png" style="height: 60px">
                        <h4>CAM 2 (BOTTOM)</h4> 
                        <h3>NO READING</h3> 
                        ';
                        $output3_cam .= '
                        <img src="gray.png" style="height: 60px">
                        <h4>CAM 3 (TOP 1)</h4> 
                        <h3>NO READING</h3> 
                        ';
                        $output4_cam .= '
                        <img src="gray.png" style="height: 60px">
                        <h4>CAM 4 (TOP 2)</h4> 
                        <h3>NO READING</h3> 
                        ';
                        $output5_cam .= '
                        <img src="gray.png" style="height: 60px">
                        <h4>CAM 5 (TOP 3)</h4> 
                        <h3>NO READING</h3> 
                        ';
                    }
                #endregion CAMERA ##############################################################################
            }
            else //If location.hp_inspection_data and location.hp_inspection_result not the same, show (-)
            {
                $pen_location = '-';
                $pen_id = '-';
                $pen_product = '-';
                $pen_name = '-';
                $pen_sku_code = '-';
                $pen_type = '-';
                $pen_body = '-';
                $pen_cycle_time = '-';
            }
        #endregion COMPARISON ####################################################################################
    }
     // $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 1 : ONGOING BUT TRAY COMPLETED
    else if($proj_comp == 1 && $tray_comp == 1 && $proj_time == 1)
    {
        // Initialize variables for tray and pen details
        $tray = "No Tray";
        $pen_location = '-';
        $pen_id = '-';
        $pen_product = '-';
        $pen_name = '-';
        $pen_sku_code = '-';
        $pen_type = '-';
        $pen_body = '-';
        $pen_cycle_time = '-';

        // Initialize HTML output for camera status
        $output1_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 1 (FRONT)</h4> 
        <h3>NO READING</h3> 
        ';
        $output2_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 2 (BOTTOM)</h4> 
        <h3>NO READING</h3> 
        ';
        $output3_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 3 (TOP 1)</h4> 
        <h3>NO READING</h3> 
        ';
        $output4_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 4 (TOP 2)</h4> 
        <h3>NO READING</h3> 
        ';
        $output5_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 5 (TOP 3)</h4> 
        <h3>NO READING</h3> 
        ';
    }
    // $proj_comp = 1 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT STILL THERE
    // $proj_comp = 0 AND $tray_comp = 1 AND $proj_time = 2 : PROJECT COMPLETED, TRAY COMPLETED, PROJECT STOPPED
    else if(($proj_comp == 1 || $proj_comp == 0) && $proj_time == 2 && $tray_comp == 1)
    {
        // Initialize variables for tray and pen details
        $tray = "No Tray";
        $pen_location = '-';
        $pen_id = '-';
        $pen_product = '-';
        $pen_name = '-';
        $pen_sku_code = '-';
        $pen_type = '-';
        $pen_body = '-';
        $pen_cycle_time = '-';

        // Initialize HTML output for camera status
        $output1_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 1 (FRONT)</h4> 
        <h3>NO READING</h3> 
        ';
        $output2_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 2 (BOTTOM)</h4> 
        <h3>NO READING</h3> 
        ';
        $output3_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 3 (TOP 1)</h4> 
        <h3>NO READING</h3> 
        ';
        $output4_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 4 (TOP 2)</h4> 
        <h3>NO READING</h3> 
        ';
        $output5_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 5 (TOP 3)</h4> 
        <h3>NO READING</h3> 
        ';
    }
    else
    {
        // Initialize variables for tray and pen details
        $tray = "No Tray";
        $pen_location = '-';
        $pen_id = '-';
        $pen_product = '-';
        $pen_name = '-';
        $pen_sku_code = '-';
        $pen_type = '-';
        $pen_body = '-';
        $pen_cycle_time = '-';

        // Initialize HTML output for camera status
        $output1_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 1 (FRONT)</h4> 
        <h3>NO READING</h3> 
        ';
        $output2_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 2 (BOTTOM)</h4> 
        <h3>NO READING</h3> 
        ';
        $output3_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 3 (TOP 1)</h4> 
        <h3>NO READING</h3> 
        ';
        $output4_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 4 (TOP 2)</h4> 
        <h3>NO READING</h3> 
        ';
        $output5_cam .= '
        <img src="gray.png" style="height: 60px">
        <h4>CAM 5 (TOP 3)</h4> 
        <h3>NO READING</h3> 
        ';
    }
?>