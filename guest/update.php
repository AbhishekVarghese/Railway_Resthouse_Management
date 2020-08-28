<?php
	require_once "connect.php";
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die('<p>Connection failed: <p>' . mysqli_connect_error());
	}
	if(isset($_SESSION['contact'])) {
		$CONTACT=$_SESSION['contact'];
	}
	if(isset($_SESSION['n_ac_room'])) {
		$NUM1=$_SESSION['n_ac_room'];
	}
	if(isset($_SESSION['ac_room'])) {
		$NUM2=$_SESSION['ac_room'];
	}
	
	//$NUM2=$_SESSION['ac_room'];
	
	$G_ID=$_SESSION['GID'];
	 //echo $G_ID;
	
	if ($CONTACT!=NULL){
		$sql1="UPDATE GUEST_HOUSES SET CONTACT_NO='$CONTACT' WHERE GID = '$G_ID' ";
		if ($conn->query($sql1) == TRUE) {
    		echo  nl2br ("Contact No. updated \n");
		} 
		else {
    		echo  nl2br ("Error updating contact no." . $conn->error."\n");
		}
	}
	if ($NUM1!=NULL){
		$sql2="UPDATE GUEST_HOUSES SET NO_OF_NONACROOMS ='$NUM1' WHERE GID = '$G_ID' ";
		if ($conn->query($sql2) == TRUE) {
    		echo  nl2br ("No. of Non AC rooms updated \n");
		} 
		else {
    		echo  nl2br ("Error updating number of non AC rooms" . $conn->error."\n");
		}
	}
	if ($NUM2!=NULL){
		$sql3="UPDATE GUEST_HOUSES SET NO_OF_ACROOMS ='$NUM2' WHERE GID = '$G_ID' ";
		if ($conn->query($sql3) == TRUE) {
    		echo  nl2br ("No. of AC rooms updated \n");
		} 
		else {
    		echo  nl2br ("Error updating number of AC rooms" . $conn->error."\n");
		}
	}
	
	session_destroy();
	session_unset();
	 



?>
