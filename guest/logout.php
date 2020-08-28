<?php

session_start();

$_SESSION = array();

session_destroy();

header("location: index_guest.php");

exit;

?>