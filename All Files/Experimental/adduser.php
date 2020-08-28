<?php

$db_hostname = "10.250.7.240";
$db_user = "sih";
$db_password = "sih@123";
$db_database ="sih";


$conn =  mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }


$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('5','Aditya2','guest','example@example.com','3','p2','d1','2018-02-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('3','','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

$insert_values = "insert into u1(aadhar,name,type,email,hostaadhar,post,department,reg_date) values ('1','Aditya','employee','example@exmaply.com','2','p1','d1','2018-01-01')";

$values =  mysqli_query($conn,$insert_values);

?>
