<?php
$con = mysqli_connect("localhost","kb618app_shipping","ZlC8pB7m#QbV","kb618app_shipping");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$uploadDir = __DIR__ . '/uploads/';
$siteURL = 'https://kb618app.com/';
?>