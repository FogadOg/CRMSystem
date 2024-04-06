<?php 
// ! mydb is bad name
  $connection = new mysqli('localhost:3306','im22far2205','Hr25q9e4$','db_im22far2205');
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