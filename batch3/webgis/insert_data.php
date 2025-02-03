<?php 

    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'valves') {
        $valve_id = htmlspecialchars($_POST['valve_id'], ENT_QUOTES);
        $valve_type = htmlspecialchars($_POST['valve_type'], ENT_QUOTES);
        $valve_dma_id = htmlspecialchars($_POST['valve_dma_id'], ENT_QUOTES);
        $valve_diameter = htmlspecialchars($_POST['valve_diameter'], ENT_QUOTES);
        $valve_visibility = htmlspecialchars($_POST['valve_visibility'], ENT_QUOTES);
        $valve_location = htmlspecialchars($_POST['valve_location'], ENT_QUOTES);
        $valve_geometry = ($_POST['valve_geometry']);

        $result = $pdo -> query("INSERT INTO valves(valve_id, valve_type, valve_dma_id, valve_diameter, valve_visibility, valve_location, geom) 
            values('$valve_id', '$valve_type', '$valve_dma_id', '$valve_diameter',  '$valve_visibility', '$valve_location', 
            ST_SetSRID(ST_GeomFromGeoJSON('$valve_geometry'),4326)) ");

        print_r($result);
    }
    

?>