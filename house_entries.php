<?php
	require_once "connect1.php";
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
        	die("Connection failed" . mysqli_connect_error());
    	}
	$insert1 = "INSERT INTO GUEST_HOUSES				(GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('1876' , 'guest house 1','Mumbai', '8878981234', '501,abc road, near chatrapati shivaji terminus','10', '20' , '5' , '12')";
	if ($conn->query($insert1) === FALSE) {
    		echo "Error: " . $insert1 . "<br>" . $conn->error;
	}

	$insert22 = "INSERT INTO GUEST_HOUSES (GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('5613' ,'guest house 1', 'Delhi', '8908767934', '902,xyz road, Anand Vihar', '25', '40', '10', '22')";
	if ($conn->query($insert22) === FALSE) {
    		echo "Error: " . $insert22 . "<br>" . $conn->error;
	}

	$insert23 = "INSERT INTO GUEST_HOUSES 	(GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('1576', 'guest house 2', 'Mumbai', '7767981234', '11,pqr road, near Panvel Station', '15', '35', '3', '8')";
	if ($conn->query($insert23) === FALSE) {
    		echo "Error: " . $insert23 . "<br>" . $conn->error;
	}

	$insert24 = "INSERT INTO GUEST_HOUSES (GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('2635', 'guest house 1', 'Bhopal', '9902020304', '202,hoshangabad road, Habibganj', '20', '50', '12', '32')";
	if ($conn->query($insert24) === FALSE) {
    		echo "Error: " . $insert24 . "<br>" . $conn->error;
	}

	$insert25 = "INSERT INTO GUEST_HOUSES (GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('1762', 'guest house 1','Jaipur', '9956581234', '121,pink road, near Jaipur Junction', '60', '100','24','41')";
	if ($conn->query($insert25) === FALSE) {
    		echo "Error: " . $insert25 . "<br>" . $conn->error;
	}

	$insert26 = "INSERT INTO GUEST_HOUSES (GID,GUEST_HOUSE,CITY,CONTACT_NO,ADDRESS,NO_OF_ACROOMS,NO_OF_NONACROOMS,BOOKED_ACROOMS,BOOKED_NONACROOMS)
VALUES ('3423', 'guest house 2','Delhi', '9586741253', '321, near Delhi Sarai Rohilla Station, Old Delhi', '15', '42', '5', '27')";
	if ($conn->query($insert26) === FALSE) {
    		echo "Error: " . $insert26 . "<br>" . $conn->error;
	}
	echo "Done";
?>
