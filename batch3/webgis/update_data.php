<?php 
    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'buildings') {
        $building_database_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);

        $account_no_old = htmlspecialchars($_POST['account_no_old'], ENT_QUOTES);
        $account_no = htmlspecialchars($_POST['account_no'], ENT_QUOTES);
        $building_category = htmlspecialchars($_POST['building_category'], ENT_QUOTES);
        $building_storey = htmlspecialchars($_POST['building_storey'], ENT_QUOTES);
        $building_population = htmlspecialchars($_POST['building_population'], ENT_QUOTES);
        $building_location = htmlspecialchars($_POST['building_location'], ENT_QUOTES);
        $building_dma_id = htmlspecialchars($_POST['building_dma_id'], ENT_QUOTES);

        try {

            if ($account_no_old != $account_no) {

                $result = $pdo ->query("SELECT *FROM buildings WHERE account_no = '$account_no' ");

                if ($result -> rowCount()>0) {
                    echo "ERROR: Account number already exists for another building. Please choose a new Account Number!"; 
               
                } else {
                    $pdo -> query("UPDATE buildings SET 
                    account_no = '$account_no', 
                    building_category = '$building_category', 
                    building_storey = '$building_storey',
                    building_population = '$building_population',
                    building_location = '$building_location',
                    building_dma_id = '$building_dma_id'

                WHERE building_database_id = '$building_database_id'
                ");
                
                }
            }  else {

                    $pdo -> query("UPDATE buildings SET 
                        account_no = '$account_no', 
                        building_category = '$building_category', 
                        building_storey = '$building_storey',
                        building_population = '$building_population',
                        building_location = '$building_location',
                        building_dma_id = '$building_dma_id'

                    WHERE building_database_id = '$building_database_id'
                    ");
           
                 }    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
    }

    if ($request == 'pipelines') {
        $pipeline_database_id = htmlspecialchars($_POST['pipeline_database_id'], ENT_QUOTES);

        $pipeline_id_old = htmlspecialchars($_POST['pipeline_id_old'], ENT_QUOTES);
        $pipeline_id = htmlspecialchars($_POST['pipeline_id'], ENT_QUOTES);
        $pipeline_dma_id = htmlspecialchars($_POST['pipeline_dma_id'], ENT_QUOTES);
        $pipeline_diameter = htmlspecialchars($_POST['pipeline_diameter'], ENT_QUOTES);
        $pipeline_location = htmlspecialchars($_POST['pipeline_location'], ENT_QUOTES);
        $pipeline_category = htmlspecialchars($_POST['pipeline_category'], ENT_QUOTES);
        $pipeline_length = htmlspecialchars($_POST['pipeline_length'], ENT_QUOTES);

        try {

            if ($pipeline_id_old != $pipeline_id) {

                $result = $pdo ->query("SELECT *FROM pipelines WHERE pipe_id = '$pipeline_id' ");

                if ($result -> rowCount()>0) {
                    echo "ERROR: Pipeline ID already exists for another pipeline. Please choose a new pipe id!"; 
                
                } else {
                    $pdo -> query("UPDATE pipelines SET 
                    pipe_id = '$pipeline_id',  
                    pipeline_dma_id = '$pipeline_dma_id',
                    pipeline_diameter = '$pipeline_diameter',
                    pipeline_location = '$pipeline_location',
                    pipeline_category = '$pipeline_category',
                    pipeline_length = '$pipeline_length'

                WHERE pipeline_database_id = '$pipeline_database_id'
                ");
                
                }
            }  else {

                    $pdo -> query("UPDATE pipelines SET 
                    pipe_id = '$pipeline_id',
                    pipeline_dma_id = '$pipeline_dma_id',
                    pipeline_diameter = '$pipeline_diameter',
                    pipeline_location = '$pipeline_location',
                    pipeline_category = '$pipeline_category',
                    pipeline_length = '$pipeline_length'

                WHERE pipeline_database_id = '$pipeline_database_id'
                ");
            
                    }    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
    }

    ?>