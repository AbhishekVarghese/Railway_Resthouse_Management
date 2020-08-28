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

  $not_checked_out_q = "select * from $GID where ( CHECKOUT_DATE = 'CURDATE()' and out_status=0)";

  $not_checked_out = mysqli_query($conn,$not_checked_out_q);
  $num_not_checked_out = mysqli_num_rows($not_checked_out);

  for( $j=0; $j< $num_not_checked_out;$j++){
    $values = mysqli_fetch_row($not_checked_out);
    $type = $values[3];

    $query_available_type = "select NO_OF_$type"."ROOMS, BOOKED_$type"."ROOMS from GUEST_HOUSES";
    $available_type = mysqli_query($query_available_type);
    $available_type = mysqli_fetch_row($available_type);
    $available_type = $available_type[0] - $available_type[1];

    if ($available_type <=0 ) {
            $delete =  "delete from $GID where ( AADHAR = $values[0], GID = $values[1], GUEST_HOUSE = $values[2], BOOKED_ROOM_TYPE = $values[3], CHECKIN_DATE = $values[4], CHECKOUT_DATE = $values[5], STATUS = $values[6], PRIORITY = $values[7]) ";
            mysqli_query($delete);
    }

  }
