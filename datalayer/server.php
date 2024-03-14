<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$errors=array();

$mysqli = new mysqli("localhost","root","","clinicappointment");

if ($mysqli -> connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>
