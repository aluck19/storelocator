<?php
	define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "bluz4ever");
  define("DB_NAME", "storelocator");

  $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  
    if (mysqli_connect_errno()) {
     die("Database Connection Failed!" .
      mysqli_connect_error() . 
       "(" . mysqli_connect_errno() .")"
      );
  }
?>
