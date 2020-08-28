<?php
$db_hostname = "10.250.7.240";
$db_user = "sih";
$db_password = "sih@123";
$db_database ="sih";


$conn =  mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
if (!$conn) {
        die('<p>Connection failed: Contact the server for more info<p>' . mysqli_connect_error());
    }

$aadhar = $_POST['aadhar'];
$hash = $aadhar/4;

$profile_q = "select * from u$hash where aadhar=$aadhaar"

$profile =  mysqli_query($conn,$profile_q);

$count = 0;
$num_rows = mysqli_num_rows($profile);
$num_cols = mysqli_num_rows($profile);
for($j=0; $j < $num_rows; ++$j) {
  $rows = mysqli_fetch_row($profile);
  echo "<tr>";
  for ($j=0; $j<$num_cols;$j++)
    {
      echo "<td>". $rows[0]."</td>";
    }
  }



$all_prev_bookings = "select * from b$hash where aadhar=$aadhaar"
$count = 0;
$num_rows = mysqli_num_rows($profile);
$num_cols = mysqli_num_rows($profile);
for($j=0; $j < $num_rows; ++$j) {
  $rows = mysqli_fetch_row($profile);
  echo "<tr>";
  for ($j=0; $j<$num_cols;$j++)
    {
      echo "<td>". $rows[0]."</td>";
    }
  }

?>
