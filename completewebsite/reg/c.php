<?php

$db= mysqli_connect("localhost", "ecentrak_fest", "tadi_ECE@18", "ecentrai_un");

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
  //  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
   // echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    }
else
{ echo "database connection successful";}







?>