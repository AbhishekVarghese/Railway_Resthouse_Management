<?php

	require_once "connect1.php";
ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die('<p>Connection failed: <p>' . mysqli_connect_error());
	}
 // echo "veto in process";
if(isset($_SESSION['GID'])) {
		$G_ID=$_SESSION['GID'];	
	}
	else echo "error";

$DATE=date('Y-m-d');

$sql="select * from B1 WHERE GID='$G_ID' AND PRIORITY=( SELECT MIN(PRIORITY) FROM B1 WHERE CHECKIN_DATE<='$DATE' AND CHECKOUT_DATE>'$DATE' AND out_status='0')";

$result=mysqli_query($conn,$sql);
	if (!$result) {
        	die('<p>query failed: <p>' . mysqli_error());
    	}
	$numrows=mysqli_num_rows($result);
	$row=mysqli_fetch_row($result);
   $aadhar=$row[0];
  $CHECKIN=$row[4];
echo $aadhar; echo "  ".$CHECKIN;
$sql="UPDATE B1 SET out_date='$DATE', out_status='1' WHERE GID = '$G_ID' AND AADHAR='$aadhar' AND CHECKIN_DATE='$CHECKIN' ";
		if ($conn->query($sql) === FALSE) {
   			echo  nl2br (" error updating booking status" . $conn->error ."\n"); 
		}

  ?>
