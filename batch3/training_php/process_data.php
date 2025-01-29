<?php 

    if(isset($_GET['username'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];
    }

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    echo $username."<br>";
    echo $password."<br>";

?>