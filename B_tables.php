<?php
	require_once "connect1.php";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed" . mysqli_connect_error());
	}
	$num_of_tables=4;
	$B="B";
	for($j=1;$j<=$num_of_tables;++$j){
		$new=$B.$j;

	/*	$create="CREATE TABLE IF NOT EXISTS ".$new."(
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
		}*/
		$add3="ALTER TABLE ".$new." ADD COLUMN out_status TINYINT(1) DEFAULT 0";
		if ($conn->query($add3) === FALSE) {
   			echo  nl2br ("Error adding column out_status to ".$new." ". $conn->error."\n");
		}
		$add4="ALTER TABLE ".$new." ADD COLUMN out_date DATE";
		if ($conn->query($add4) === FALSE) {
    			echo  nl2br ("Error adding column out_date to ".$new." ". $conn->error."\n");
		}

    $add5="ALTER TABLE ".$new." ADD COLUMN PRIORITY INT(5) DEFAULT 0";
		if ($conn->query($add5) === FALSE) {
    			echo  nl2br ("Error adding column out_date to ".$new." ". $conn->error."\n");
		}
	}


?>



