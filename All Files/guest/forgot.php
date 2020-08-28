<?php
	require_once "connect.php"; 
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if(!$conn) {
        	die("Connection failed " . mysqli_connect_error());
    	}
    	
	$G_ID =  $_POST['GID'];
	echo "hi";
	if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['GID']);
	$sql = "SELECT * FROM GUEST_HOUSES WHERE GID = '$G_ID'";
	$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($res);
}
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
	$r = mysqli_fetch_assoc($res);
	$password = $r['password'];
	$to = $r['email'];
	$subject = "Your Recovered Password";

	$message = "Please use this password to login " . $password;
	$headers = "From : avya.bansal.16001@iitgoa.ac.in";
	if(mail($to, $subject, $message, $headers)){
		echo "Your Password has been sent to your email id";
	}else{
		echo "Failed to Recover your password, try again";
	}

?>