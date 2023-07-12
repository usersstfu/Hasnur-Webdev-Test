<?php
$connection = new mysqli("localhost","root","","basdat");

// Check connection
if ($connection -> connect_error) {
  echo "Failed to connect to MySQL: " . 
  $connection -> connect_error;
  exit();
}
?>