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

        try {

            if ($account_no_old != $account_no) {

                $result = $pdo ->query("SELECT *FROM buildings WHERE account_no = '$account_no' ");

                if ($result -> rowCount()>0) {
                    echo "ERROR: Account number already exists for another building. Please choose a new Account Number!"; 
               
                }
            }  else {

                    $pdo -> query("UPDATE buildings SET 
                        account_no = '$account_no', 
                        building_category = '$building_category', 
                        building_storey = '$building_storey',
                        building_population = '$building_population',
                        building_location = '$building_location'

                    WHERE building_database_id = '$building_database_id'
                    ");
           
                 }    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }

    ?>