<?php
	require_once "connect1.php";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed" . mysqli_connect_error());
	}

$insert22 = "INSERT INTO B1 (AADHAR,GID,GUEST_HOUSE,BOOKED_ROOM_TYPE,CHECKIN_DATE,CHECKOUT_DATE)
VALUES ('5613123123' ,'1234', 'BLA', 'AC','2018-03-25', '2018-03-27')";
if ($conn->query($insert22) === FALSE) {
    echo "Error: " . $insert22 . "<br>" . $conn->error;
}

$insert23 = "INSERT INTO B1 (AADHAR,GID,GUEST_HOUSE,BOOKED_ROOM_TYPE,CHECKIN_DATE,CHECKOUT_DATE)
VALUES ('455555555377' ,'1234', 'BLA', 'AC','2018-03-06', '2018-03-20')";
if ($conn->query($insert23) === FALSE) {
    echo "Error: " . $insert23 . "<br>" . $conn->error;
}

$insert24 = "INSERT INTO B1 (AADHAR,GID,GUEST_HOUSE,BOOKED_ROOM_TYPE,CHECKIN_DATE,CHECKOUT_DATE)
VALUES ('111111111111' ,'1234', 'BLA', 'AC','2018-03-25', '2018-03-24')";
if ($conn->query($insert24) === FALSE) {
    echo "Error: " . $insert24 . "<br>" . $conn->error;
}


$insert25 = "INSERT INTO B1 (AADHAR,GID,GUEST_HOUSE,BOOKED_ROOM_TYPE,CHECKIN_DATE,CHECKOUT_DATE)
VALUES ('222222222222' ,'1234', 'BLA', 'AC','2018-03-25', '2018-04-07')";
if ($conn->query($insert25) === FALSE) {
    echo "Error: " . $insert25 . "<br>" . $conn->error;
}

$insert26 = "INSERT INTO B1 (AADHAR,GID,GUEST_HOUSE,BOOKED_ROOM_TYPE,CHECKIN_DATE,CHECKOUT_DATE)
VALUES ('111111111111' ,'2635', 'BLA', 'AC','2018-03-25', '2018-03-24')";
if ($conn->query($insert26) === FALSE) {
    echo "Error: " . $insert26 . "<br>" . $conn->error;
}
?>
