<?php 

    include 'init.php';

    $table = htmlspecialchars($_POST['table'], ENT_QUOTES); //mao ni sya live a feed og data
    $field = htmlspecialchars($_POST['field'], ENT_QUOTES); //mao ni sya live a feed og data
    $value = htmlspecialchars($_POST['value'], ENT_QUOTES); //mao ni sya live a feed og data


    try {

        $result = $pdo -> query("SELECT *, ST_AsGeoJSON(geom) AS geojson FROM {$table} WHERE($field)='{$value}' ");
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
        echo "Error: " . $e->getMessage();

    }

?>

