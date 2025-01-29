<?php

    include 'init.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $organization = $_POST['organization'];

    $result = $pdo -> query("SELECT * from user_information WHERE email = '$email' ");

    if ($result -> rowCount()>0) {
        echo "User already exists. Please choose a new email address";
    } else {

        $pdo -> query("INSERT INTO user_information(first_name, last_name, email, organization, designation) 
        values ('$first_name', '$last_name', '$email', '$organization', '$designation') ");

        echo "New user has created sucessfull";

    }

   
    


?>