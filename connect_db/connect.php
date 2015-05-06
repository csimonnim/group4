<?php
define("SERVER","127.0.0.1");
define("USER", "root");
define("PASS","");
define("DATABASE","pos_watch");
$conn = mysqli_connect(SERVER,USER,PASS,DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>