<?php
$con = mysqli_connect("localhost","root","","company_management");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$uploadDir = __DIR__ . '/uploads/';
$siteURL = 'http://localhost/company_management/';
?>