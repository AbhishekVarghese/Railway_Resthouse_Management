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



  ?>
<html>
	<head><title>VETO POWER ACTIVATION</title>
	<body>
<form method="post" action="veto.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">Empty room of any least priority occupant</button>
	</form>

<form method="post" action="veto_man.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">View suggestions to checkout</button>
	</form>
</body>
</html>
