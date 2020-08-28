<?php
	require_once "connect.php";
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die('<p>Connection failed: <p>' . mysqli_connect_error());

	}


	$_SESSION['GID']=$_POST['GID'];
	$G_ID=$_POST['GID'];
	$date= date('Y-m-d');
	//echo $date;
	$time = strtotime($date.' -7 days');
	$date2 = date("Y-m-d", $time);
	echo "<center><table border=5>";
	echo "<tr><th>USER ID</th>
	<th>GID</th>
	<th>Guest House Name</th>
	<th>Type of Room</th>
	<th>Check-in date</th>
	<th>Check-out date</th>
	<th>Arrival status</th>
	<th>Arrival date</th>
	</tr>";
	$num_of_tables=4;
	$B="B";
	for($k=1;$k<=$num_of_tables;++$k){
	$new=$B.$k;
	$query = "SELECT * from ".$new." WHERE CHECKOUT_DATE >='$date2' AND GID=$G_ID";
	$result=mysqli_query($conn,$query);
	if (!$result) {
        	die('<p>query failed: <p>' . mysqli_error());
    	}
	$numrows=mysqli_num_rows($result);
	for($j=0;$j<$numrows;++$j){
	$row=mysqli_fetch_row($result);
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "<td>".$row[5]."</td>";
	if($row[6]== 1 )
	{echo "<td>"."ARRIVED"."</td>";}
	else
	{echo "<td>"."NOT ARRIVED"."</td>";}
	echo "<td>".$row[7]."</td>";
	echo "</tr>";}
	echo "</table></center>";

?>
