<?php
include ('config.php');
class allProc extends CreateCon
    {
        public function getTable($filter1, $filter2, $filter3, $filter4, $filter5, $filter6){
            $dbConn = new createCon();
            $conn = $dbConn->connect(); 

            if($filter1=='All'){
                $filter1_var = 'current_tray_number';
            }else{
                $filter1_var = $filter1;
            }

            if($filter2=='All'){
                $filter2_var = 'pallet';
            }else{
                $filter2_var = $filter2;
            }

            if($filter3=='All'){
                $filter3_var = 'product';
            }else{
                $filter3_var = "'".$filter3."'";
            }

            if($filter4=='All'){
                $filter4_var = 'name';
            }else{
                $filter4_var = "'".$filter4."'";
            }

            // if($filter5==''){
            //     //$filter5_var = 'name';
            //     echo "kosong";
            // }else{
            //     $filter5_var = "'".$filter5."'";
            // }

            // if($filter6==''){
            //     //$filter5_var = 'name';
            //     echo "kosong2";
            // }else{
            //     $filter6_var = "'".$filter6."'";
            // }

            if(($filter5 =='')&&($filter6=='')){
                $date_var = '=date';
            //     echo "totally";
            //     $filter5_var = "'".$filter5."'";
            //     $filter6_var = "'".$filter6."'";
            }else{
                $start= date("Y-m-d", strtotime($filter5));  
                $end= date("Y-m-d", strtotime($filter6));  
                $start_var = "'".$start."'";
                $end_var = "'".$end."'";
                // echo "New date format is: ".$start_var. " (MM-DD-YYYY)"; 
                // echo "New date format is: ".$end_var. " (MM-DD-YYYY)"; 
                $date_var = "BETWEEN '".$start."' AND  '".$end."'";
                // echo $date_var;
                //exit();
            }
             
            

            // echo $filter1_var;
            // echo $filter2_var;
            // echo $filter3_var;
            // exit();
            // if($filter4=='All'){
            //     $filter4_var = 'name';
            // }else{
            //     $filter4_var = $filter4;
            // }

            $sql = "SELECT * FROM hp_pen_data INNER JOIN hp_pen_location ON (hp_pen_data.barcode = LEFT(hp_pen_location.barcode, 4))
                AND (hp_pen_data.sku = hp_pen_location.sku_code) where hp_pen_location.current_tray_number = ".$filter1_var." AND 
                hp_pen_location.pallet = ".$filter2_var." AND 
                hp_pen_data.product = ".$filter3_var." AND
                hp_pen_data.name = ".$filter4_var." AND
                hp_pen_location.date ".$date_var."
                ORDER BY hp_pen_location.id;";

                // echo $sql;
            // if(($filter1=='All') && ($filter2=='All'))
            // {		
            //     $sql = "SELECT * FROM hp_pen_data INNER JOIN hp_pen_location ON (hp_pen_data.barcode = LEFT(hp_pen_location.barcode, 4))
            //     AND (hp_pen_data.sku = hp_pen_location.sku)
            //     ORDER BY hp_pen_location.id";
            // }
            // else if($filter1!='All')
            // {
            //     $sql = "SELECT * FROM hp_pen_data INNER JOIN hp_pen_location ON (hp_pen_data.barcode = LEFT(hp_pen_location.barcode, 4))
            //     AND (hp_pen_data.sku = hp_pen_location.sku) where hp_pen_location.current_tray_number = '".$filter1."'
            //     ORDER BY hp_pen_location.id";
            // }
            // else if($filter2!='All')
            // {
            //     $sql = "SELECT * FROM hp_pen_data INNER JOIN hp_pen_location ON (hp_pen_data.barcode = LEFT(hp_pen_location.barcode, 4))
            //     AND (hp_pen_data.sku = hp_pen_location.sku) where hp_pen_location.pallet = '".$filter2."'
            //     ORDER BY hp_pen_location.id";
            // } 

            $query = mysqli_query($conn,$sql);
    
            return $query;
        }	
    }

?>