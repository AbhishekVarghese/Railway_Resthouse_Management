<?php
    $servername = "localhost";
    $username = "root";
    $password = "sihrail";
    $dbname = "sih";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }

$create="CREATE TABLE IF NOT EXISTS EMPLOYEES (
id VARCHAR(30) PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($create) === TRUE) {
    echo  nl2br ("Table Employees created successfully\n");
} else {
    echo  nl2br ("Error creating table: " . $conn->error."\n");
}

$create2="CREATE TABLE IF NOT EXISTS GUESTS (
id VARCHAR(30) PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($create2) === TRUE) {
    echo  nl2br ("Table Guests created successfully \n");
} else {
    echo  nl2br ("Error creating table: " . $conn->error."\n");
}


$create3="CREATE TABLE IF NOT EXISTS SPECIAL_GUESTS (
id VARCHAR(30) PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($create3) === TRUE) {
    echo  nl2br ("Table Special Guests created successfully \n");
} else {
    echo  nl2br ("Error creating table: " . $conn->error."\n");
}

$insert1 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120023451221', 'Amita', 'Gupta','ag@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert1) === FALSE) {
    echo "Error: " . $insert1 . "<br>" . $conn->error;
}
$insert2 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120023451675', 'abhinav', 'Sharma','abhi@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert2) === FALSE) {
    echo "Error: " . $insert2 . "<br>" . $conn->error;
}
$insert3 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120028365221', 'Rahul', 'Das','rdas@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert3) === FALSE) {
    echo "Error: " . $insert3 . "<br>" . $conn->error;
}
$insert4 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('325823451221', 'Gaurav', 'Yadav','gauravyadav@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert4) === FALSE) {
    echo "Error: " . $insert4 . "<br>" . $conn->error;
}
$insert5 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120789654221', 'Naina', 'Jain','naina@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert5) === FALSE) {
    echo "Error: " . $insert5 . "<br>" . $conn->error;
}
$insert6 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120023785431', 'Rishi', 'Gupta','rg@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert6) === FALSE) {
    echo "Error: " . $insert6 . "<br>" . $conn->error;
}
$insert7 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('178723451221', 'Vaibhav','Shrivastava','vaibhav12@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert7) === FALSE) {
    echo "Error: " . $insert7 . "<br>" . $conn->error;
}
$insert8 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120021212456', 'Aayushi', 'Goyal','aayushi14@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert8) === FALSE) {
    echo "Error: " . $insert8 . "<br>" . $conn->error;
}
$insert9 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('121177851221', 'Himesh', 'Bansal','hb21@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert9) === FALSE) {
    echo "Error: " . $insert9 . "<br>" . $conn->error;
}
$insert10 = "INSERT INTO EMPLOYEES (id, firstname, lastname, email, reg_date)
VALUES ('120029988991', 'Ranjana', 'Mishra','ranjana11@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert10) === FALSE) {
    echo "Error: " . $insert10 . "<br>" . $conn->error;
}



$insert11 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120012345691', 'Ankit', 'sharma','as123@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert11) === FALSE) {
    echo "Error: " . $insert11 . "<br>" . $conn->error;
}
$insert12 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120023456398', 'abhigyan', 'Jain','abhigyan32@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert12) === FALSE) {
    echo "Error: " . $insert12 . "<br>" . $conn->error;
}
$insert13 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120028779988', 'Tanya', 'Dube','tanyad@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert13) === FALSE) {
    echo "Error: " . $insert13 . "<br>" . $conn->error;
}
$insert14 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('325908908976', 'Gauri', 'Saxena','gauri145@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert14) === FALSE) {
    echo "Error: " . $insert14 . "<br>" . $conn->error;
}
$insert15 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120342454221', 'Sameer', 'Tripathi','sam45@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert15) === FALSE) {
    echo "Error: " . $insert15 . "<br>" . $conn->error;
}
$insert16 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120027867831', 'Monica', 'Steve','msteve99@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert16) === FALSE) {
    echo "Error: " . $insert16 . "<br>" . $conn->error;
}
$insert17 = "INSERT INTO GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('178767676751', 'Vishal','Arora','vishu12@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert17) === FALSE) {
    echo "Error: " . $insert17 . "<br>" . $conn->error;
}
$insert18 = "INSERT INTO SPECIAL_GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('111189345691', 'Neeraj', 'Sharma','neerajsharma@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert18) === FALSE) {
    echo "Error: " . $insert18 . "<br>" . $conn->error;
}
$insert19 = "INSERT INTO SPECIAL_GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('122233546398', 'Reema', 'Jain','Reemajain@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert19) === FALSE) {
    echo "Error: " . $insert19 . "<br>" . $conn->error;
}
$insert20 = "INSERT INTO SPECIAL_GUESTS (id, firstname, lastname, email, reg_date)
VALUES ('120011987658', 'Yogesh', 'Dutta','yogidutta@gmail.com','2018-01-19 03:14:07')";
if ($conn->query($insert20) === FALSE) {
    echo "Error: " . $insert20 . "<br>" . $conn->error;
}

?>


