<?php
	require_once "connect.php";
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn){
		die('<p>Connection failed: <p>' . mysqli_connect_error());
	}
	if(isset($_SESSION['GID'])) {
		$G_ID=$_SESSION['GID']; 	
	}
	else echo "error";
	$num_of_tables=4;
	$UID = $_SESSION['u_id'];
	$C_DATE = $_SESSION['c_in_date'];
	//$G_ID = $_POST['GID'];
	$date= date('Y-m-d');
	$B="B";
	$count=0;
	for($j=1;$j<=$num_of_tables;++$j){
		$new=$B.$j;
		$sql="UPDATE ".$new." SET arr_date='$date', arr_status='1' WHERE GID = '$G_ID' AND AADHAR='$UID' AND arr_status='0' AND CHECKIN_DATE='$C_DATE' ";
		if ($conn->query($sql) === FALSE) {
   			echo  nl2br (" error updating booking status" . $conn->error ."\n"); 
		}
		if(($conn->affected_rows) > 0){
			$count++;  
			}
	}
	if ( $count>1){
		echo $count." entries are updated "."<br>";
	} 
	else if ( $count==1){
		echo $count." entry is updated "."<br>";
	}
	else echo "No Booking updated! Booking may not exist/ may already have been updated. ";

?>
