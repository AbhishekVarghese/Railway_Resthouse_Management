<?php
	require_once "connect1.php";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
        	die("Connection failed" . mysqli_connect_error());
    	}
	/*$create="CREATE TABLE IF NOT EXISTS GUEST_HOUSES (
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

	}	*/

$add2="ALTER TABLE GUEST_HOUSES ADD COLUMN PASSWORD VARCHAR(30) DEFAULT '1234' ";
		if ($conn->query($add2) === FALSE) {
    			echo  nl2br ("Error adding PASSWORD column ". $conn->error."\n");
		}
	$add3="ALTER TABLE GUEST_HOUSES ADD COLUMN EMAIL VARCHAR(30) DEFAULT 'avyabansal1@gmail.com' ";
		if ($conn->query($add3) === FALSE) {
    			echo  nl2br ("Error adding email column ". $conn->error."\n");
		}
?>
