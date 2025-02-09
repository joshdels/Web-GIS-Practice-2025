<?php 
    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'buildings') {
        $building_database_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);

        try {

           $pdo -> query("DELETE FROM buildings WHERE building_database_id = '$building_database_id' ");
           
                   
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }
    
    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'pipelines') {
        $pipeline_database_id = htmlspecialchars($_POST['pipeline_database_id'], ENT_QUOTES);

        try {

            $pdo -> query("DELETE FROM pipelines WHERE pipeline_database_id = '$pipeline_database_id' ");
            
                    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'valves') {
        $valve_database_id = htmlspecialchars($_POST['valve_database_id'], ENT_QUOTES);

        try {

            $pdo -> query("DELETE FROM valves WHERE valve_database_id = '$valve_database_id' ");
            
                    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }

    ?>