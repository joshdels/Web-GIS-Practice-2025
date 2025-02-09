<?php 

    include 'init.php';

    $table = htmlspecialchars($_POST['table'], ENT_QUOTES); //mao ni sya live a feed og data
    $dma_id = htmlspecialchars($_POST['dma_id'], ENT_QUOTES);

    //Since lahi2 man ang pangalan sa inital sa dma_id, need sya i requery ani
    if ($table == 'valves') {
        $dma_id_field = "valve_dma_id";
    }
    if ($table == 'pipelines') {
        $dma_id_field = "pipeline_dma_id";
    }
    if ($table == 'buildings') {
        $dma_id_field = "building_dma_id";
    }

    try {

        $result = $pdo -> query("SELECT *, ST_AsGeoJSON(geom) as geojson FROM {$table} WHERE {$dma_id_field} = '$dma_id' ");
        $features = [];

        foreach($result as $row) {
            unset($row['geom']); //unset will result of not sending the extracted data
            $geometry = json_decode($row['geojson']);
            
            unset($row['geojson']); 

            $feature = ["type"=>"Feature", "geometry"=>$geometry, "properties"=>$row];
            array_push($features, $feature); //its like and append (list, variables)
        }

        // print_r($features); --> for checking
        $featureCollection = ["type"=>"FeatureCollection", "features"=>$features];
        echo json_encode($featureCollection);
        

    } catch(PDOException $e) {
        echo "Error: " .$e->getMessage();

    }

?>

