<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    // Creation de la connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    //Check connection
    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }
?>