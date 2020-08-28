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

$sql="select * from B1 WHERE GID='$G_ID' AND PRIORITY=( SELECT MIN(PRIORITY) FROM B1 WHERE CHECKIN_DATE<='$DATE' AND CHECKOUT_DATE>'$DATE')";

$result=mysqli_query($conn,$sql);
	if (!$result) {
        	die('<p>query failed: <p>' . mysqli_error());
    	}
	$numrows=mysqli_num_rows($result);
//$numrows=mysqli_num_rows($result);
    echo "<table><tr><th>AADHAR</th><th>Type of room</th><th>Check-in date</th><th>Check-out date</th></tr>";
	for($j=0;$j<$numrows;++$j){
	$row=mysqli_fetch_row($result);
  $aadhar=$row[0];
  $type=$row[3];
  $CHECKIN=$row[4];
  $CHECKOUT=$row[5];
  echo "<tr>";
echo "<td>".$aadhar."</td>"; echo "<td>".$type."</td>"."<td>".$CHECKIN."</td>"."<td>".$CHECKOUT."</td>"."</tr>";
/*$sql="UPDATE B1 SET out_date='$DATE', out_status='1' WHERE GID = '$G_ID' AND AADHAR='$aadhar' AND CHECKIN_DATE='$CHECKIN' ";
		if ($conn->query($sql) === FALSE) {
   			echo  nl2br (" error updating booking status" . $conn->error ."\n"); 
		}*/
}
echo "</table>";
  ?>

<html>
<body>
<form method="post" action="checkout1.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">Select guest to checkout</button>
	</form>
</body>
</html>


