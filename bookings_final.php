<?php


//ini_set('display_errors', 1);
//error_reporting(E_ALL);
require_once 'connect.php';


$gh_list_q = "select GID from GUEST_HOUSES";
$gh_list =  mysqli_query($conn,$gh_list_q);
$num_gh = mysqli_num_rows($gh_list);

//-----------------------------------------------------------
echo $num_gh;
for ($i=0;$i<$num_gh;$i++) {

  $GID = mysqli_fetch_row($gh_list);
  echo "$GID[0]\n";


  $actualgid = $GID[0];
  $GID = $GID[0] . "_q";
  echo $GID;
  $create="CREATE TABLE if not EXISTS $GID (
  AADHAR VARCHAR(12),
  GID VARCHAR(10) NOT NULL,
  GUEST_HOUSE VARCHAR(30) NOT NULL,
  BOOKED_ROOM_TYPE VARCHAR(10) NOT NULL,
  CHECKIN_DATE DATE,
  CHECKOUT_DATE DATE,
  STATUS varchar(20) NOT NULL
  )";

  echo "yahan tak chalra h<br>";
  if (mysqli_query($conn,$create)) echo "table $GID was created successfully";
  else echo "Error creating table!" .mysqli_error($conn);

  $query_max = "select MAX(CHECKOUT_DATE) from $GID where (CHECKIN_DATE = DATE_ADD(CURDATE(),interval 7 day))";
  $out_query_max = mysqli_query($conn,$query_max);
  $max_return_date = mysqli_fetch_row($out_query_max);


$max_return_date = $max_return_date[0];

  $query1 = "select * from $GID where (CHECKIN_DATE = DATE_ADD(CURDATE(),interval 7 day)) order by priority desc";
  $out_query1 = mysqli_query($conn,$query1);
  $num_rows_q1 = mysqli_num_rows($out_query1);
//
//   while($row = mysqli_fetch_assoc($out_query1)){
//     foreach($row as $cname => $cvalue){
//         print "$cname: $cvalue\t";
//     }
//     print "\r\n";
// }

  $query2 =  "select * from $GID where (CHECKIN_DATE > DATE_ADD(CURDATE(),interval 7 day) and CHECKIN_DATE < '$max_return_date' ) order by priority desc";
  $out_query2 = mysqli_query($conn,$query2);
  if ($out_query2)echo "succes<br>";
  else mysqli_error($conn);
  $num_rows_q2 = mysqli_num_rows($out_query2);

  $query_ac = "select NO_OF_ACROOMS,BOOKED_ACROOMS from GUEST_HOUSES where GID = '$actualgid'";
  $ac_rooms = mysqli_query($conn,$query_ac);
  $ac_rooms = mysqli_fetch_row($ac_rooms);

  $ac_rooms = $ac_rooms[0] - $ac_rooms[1];
  echo "aC rooms = $ac_rooms";

  $bookings_today = array();
  $bookings_not_today = array();

  mysqli_data_seek($out_query2, 0);
  for($j = 0; $j < $num_rows_q2; $j++ ){
    $temp = mysqli_fetch_row($out_query2);
    print_r($temp);
    array_push($bookings_not_today,$temp);
  }

echo "<pre>";
 print_r($bookings_not_today);
echo "/<pre>";

  mysqli_data_seek($out_query1, 0);
  for($j = 0;$j<$num_rows_q1;$j++){
    $temp = mysqli_fetch_row($out_query1);
    array_push($bookings_today,$temp);
    if ($j >= $ac_rooms) {
      echo $temp[0].' '.$temp[1].' '.$temp[2].' '.$temp[3].' '.$temp[4].' '.$temp[5].' '."wating".' '.$temp[7]."\n";

    //  $update = "update $GID set status='waiting' where (aadhar=$temp[0] and CHECKIN_DATE = $temp[4] and CHECKOUT_DATE= $temp[5]";
      //mysqli_query($update);
    }
  }

print_r($bookings_today);
 echo " =============--- YAhan pe confirm split hona chahiye nahi to algo galat <br>";
 $empty_ac = $ac_rooms;
  for($j = $num_rows_q1- 1; $j>=0;$j--){
    $to_waiting = 0;
    for ( $k = $num_rows_q2 - 1; $k>=0;$k--) {
      if ($empty_ac == 0){
        $to_waiting = 1;
        echo $bookings_not_today[$k][0].' '.$bookings_not_today[$k][1].' '.$bookings_not_today[$k][2].' '.$bookings_not_today[$k][3].' '.$bookings_not_today[$k][4].' '.$bookings_not_today[$k][5].' '.$bookings_not_today[$k][6].' '.$bookings_not_today[$k][7]."\n";

        echo $bookings_today[$j][0].' '.$bookings_today[$j][1].' '.$bookings_today[$j][2].' '.$bookings_today[$j][3].' '.$bookings_today[$j][4].' '.$bookings_today[$j][5].' '."waiting".' '.$bookings_today[$j][7]."\n";

        break;
      }
      if (strtotime($bookings_today[$j][5])> strtotime($bookings_not_today[$k][4])){
        //$temp = "update $GID set status='waiting' where (aadhar=$bookings_today[0] and CHECKING_DATE = $bookings_today[4] and CHECKOUT_DATE = $bookings_today[5])";
        $empty_ac -=1;
      }
    }
    if ($to_waiting ==0) {
        echo $bookings_today[$j][0].' '.$bookings_today[$j][1].' '.$bookings_today[$j][2].' '.$bookings_today[$j][3].' '.$bookings_today[$j][4].' '.$bookings_today[$j][5].' '."confirm".' '.$bookings_today[$j][7]."\n";
        //$temp = "update $GID set status='confirm' where (aadhar=$bookings_today[0] and CHECKING_DATE = $bookings_today[4] and CHECKOUT_DATE = $bookings_today[5])";
        //$temp2 = "insert into $GID * values($bookings_today[0],$bookings_today[1],$bookings_today[2],$bookings_today[3],$bookings_today[4],$bookings_today[5])"
      }
    //  mysqli_query($conn,$temp);


  }


}
//------------------------------------------------------------------------




 ?>
