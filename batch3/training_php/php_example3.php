<?php 

    include 'init.php';

    $result = $pdo -> query("SELECT * FROM valves where valve_dma_id = '105' AND valve_type = 'Washout Valve'");

    print_r($result);

    foreach ($result as $row) {
        print_r($row);
        echo "<br><br>";
    } 


?>
