<?php

    $conn = pg_connect("host=localhost port=5432 dbname=hp_lab user=postgres password=hp_p@ssw0rd");

    if (!$conn) {
        echo "Cannot Connect\n";
        echo pg_last_error($conn);
        exit;
      }

      class createCon  {  
        var $myconn;
    
        public function connect() {
            $con = pg_connect("host=localhost port=5432 dbname=hp_lab user=postgres password=hp_p@ssw0rd");
            if (!$con) {
                $yes = 'yes';
                die("ERROR: Could not connect. " . pg_last_error());
            } else {
               
               // echo "Connected";
                $this->myconn = $con;
            }
            return $this->myconn;
        }
    }
?>