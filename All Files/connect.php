<?php
    //$servername = "10.250.7.240";
    $servername = "localhost";
    $username = "sih";
    //$username = "root";
    $password = "sih@123";
    //$password = "";
    $conn_1 = mysqli_connect($servername, $username, $password);
    if(!$conn_1) {
        die("Connection failed" . mysqli_connect_error());
    }
    $sql = "CREATE DATABASE IF NOT EXISTS sih";
    if(!mysqli_query($conn_1, $sql)) {
        echo "Error in creating database" . mysqli_error($conn);
    }
    mysqli_close($conn_1);
    $conn = mysqli_connect($servername, $username, $password, "sih");
?>
