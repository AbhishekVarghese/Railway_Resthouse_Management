<?php
$db_hostname = "10.250.7.240";
$db_user = "sih";
$db_password = "sih@123";
$db_database ="sih";


$conn =  mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }

$create="CREATE TABLE U1 (
aadhar VARCHAR(12) PRIMARY KEY,
name VARCHAR(100) NOT NULL,
type VARCHAR(10) NOT NULL,
email VARCHAR(320) NOT NULL,
hostaadhar varchar(12) NULL,
post varchar(100) NULL,
department varchar(20) NULL,
reg_date DATE
)";

if ($conn->query($create) === TRUE) {
    echo  nl2br ("Table Employees created successfully\n");
} else {
    echo  nl2br ("Error creating table: " . $conn->error."\n");
}

?>
