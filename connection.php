<?php 
// ! mydb is bad name
  $connection = new mysqli("localhost","root","","mydb");
  if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connection -> connect_error;
    exit();

  }
?>

<!--   
  Example:
  include "connection.php";
  $result = $connection -> query($query); 
-->