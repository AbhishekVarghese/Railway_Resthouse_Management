<?php
    $servername = "10.250.7.240";
    $username = "sih";
    $password = "sih@123";
    $conn = mysqli_connect($servername, $username, $password);
    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
    /*$sql = "CREATE DATABASE IF NOT EXISTS sih";
    if(!mysqli_query($conn, $sql)) {
        echo "Error in creating database" . mysqli_error($conn);
    }

    mysqli_close($conn);*/
    else   echo "Success";
?>
