<?php
$db_hostname = "localhost";
$db_user = "sih";
$db_password = "sih@123";
$db_database ="sih";


$conn =  mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }

$user_table = "CREATE TABLE if not exists USERS  (
ID int(11) PRIMARY KEY AUTO_INCREMENT,
USERNAME varchar(255) NOT NULL UNIQUE,
PASSWORD VARCHAR(255) NOT NULL,
AADHAR VARCHAR(12) NOT NULL UNIQUE,
EMAIL VARCHAR(320) NOT NULL,
CREATED_AT DATETIME DEFAULT CURRENT_TIMESTAMP,
HASH varchar(32) NOT NULL,
ACTIVE INT(1) NOT NULL DEFAULT 0,
LOGGEDIN tinyint(1) NOT NULL DEFAULT 0,
FIRST_TIME INT(2) NOT NULL DEFAULT 0
)";

if(mysqli_query($conn, $user_table)) {
    echo "Table users created successfully";
}
else {
  echo "Error creating table!" .mysqli_error($conn);
}


$create="CREATE TABLE IF NOT EXISTS GUEST_HOUSES (
		GID VARCHAR(10) PRIMARY KEY NOT NULL,
		GUEST_HOUSE VARCHAR(30) NOT NULL,
		CITY VARCHAR(30) NOT NULL,
		CONTACT_NO BIGINT NOT NULL,
		ADDRESS VARCHAR(50) NOT NULL,
		NO_OF_ACROOMS INT(10) NOT NULL DEFAULT 0,
		NO_OF_NONACROOMS INT(10) NOT NULL DEFAULT 0,
		BOOKED_ACROOMS INT(10) NOT NULL DEFAULT 0,
		BOOKED_NONACROOMS INT(10) NOT NULL DEFAULT 0
		)";
	if ($conn->query($create) === TRUE) {
    		echo  nl2br ("Table Guest Houses created successfully \n");
	} else {
    	echo  nl2br ("Error creating table: " . $conn->error."\n");
	}


  $num_of_tables=4;
	$B="B";
	for($j=1;$j<=$num_of_tables;++$j){
		$new=$B.$j;

		$create="CREATE TABLE IF NOT EXISTS ".$new."(
		AADHAR VARCHAR(12) NOT NULL,
		GID VARCHAR(10) NOT NULL,
		GUEST_HOUSE VARCHAR(30) NOT NULL,
		BOOKED_ROOM_TYPE VARCHAR(10),
		CHECKIN_DATE DATE,
		CHECKOUT_DATE DATE
		)";
		if ($conn->query($create) === TRUE) {
   			 echo  nl2br ("Table ".$new." created successfully \n");
		} else {
    			echo  nl2br ("Error creating table: ".$new." ". $conn->error."\n");
		}

		$add1="ALTER TABLE ".$new." ADD COLUMN arr_status TINYINT(1) DEFAULT 0";
		if ($conn->query($add1) === FALSE) {
   			echo  nl2br ("Error adding column arr_satus to ".$new." ". $conn->error."\n");
		}

		$add2="ALTER TABLE ".$new." ADD COLUMN arr_date DATE";
		if ($conn->query($add2) === FALSE) {
    			echo  nl2br ("Error adding column arr_date to ".$new." ". $conn->error."\n");
		}
	}


  $REF_TABLE = "CREATE TABLE IF NOT EXISTS REFERALS (
    RFID varchar(12) NOT NULL;
    EMAIL varchar(320) NOT NULL
  ) ";


?>
