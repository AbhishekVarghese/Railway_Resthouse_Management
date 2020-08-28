<html>
<head></head>

<body>


  <!-- Use session to detect aadhar of the logged in person -->
  <?php
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
    } ?>


</body>
