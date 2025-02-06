<?php 
    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'buildings') {
        $building_databaase_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);
        $account_no_old = htmlspecialchars($_POST['account_no_old'], ENT_QUOTES);
        $building_building = htmlspecialchars($_POST['building_category'], ENT_QUOTES);
        $building_storey = htmlspecialchars($_POST['building_storey'], ENT_QUOTES);
        $building_population = htmlspecialchars($_POST['building_population'], ENT_QUOTES);
        $building_location = htmlspecialchars($_POST['building_location'], ENT_QUOTES);

        try {
            $pdo -> query("UPDATE buildins SET 
                account_no = '$account_no', 
                building_category = '$building_category', 
                building_storey = '$building_storey',
                building_population = '$building_population',
                building_location = '$building_location', 

                WHERE building_database_id = '$building_database_id'
                )

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
?>