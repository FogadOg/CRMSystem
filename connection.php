<?php 
// ! mydb is bad name
echo "Ginger";
  $connection = new mysqli("localhost:3306","im22far2205","Hr25q9e4$","db_im22far2205");
echo "Ginger2";
  
  if ($connection -> connect_errno) {
    echo "Ginger3";
    echo "Failed to connect to MySQL: " . $connection -> connect_error;
    exit();

  }
echo "Ginger4";

?>

<!--   
  Example:
  include "connection.php";
  $result = $connection -> query($query); 
-->