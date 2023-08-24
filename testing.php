<?php 
function sanitise($string){
  $string = strip_tags($string); // Remove HTML
  $string = htmlspecialchars($string); // Convert characters
  $string = trim(rtrim(ltrim($string))); // Remove spaces
  // $string = mysql_real_escape_string($string); // Prevent SQL Injection
  return $string;
}

$test = sanitise('<h1>Test</h1>');
echo $test . 'ok';

 ?>