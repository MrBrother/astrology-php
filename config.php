<?php
  define('DB_SERVER', 'localhost:3306');
  define('DB_USERNAME', 'root');
  // define('DB_USERNAME', 'admin');
  define('DB_PASSWORD', 'fergana1750');
  // define('DB_PASSWORD', 'useruser');
  define('DB_DATABASE', 'test');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // if (!$db) {
  //   http_response_code(500);
  // }else {
  //   http_response_code(200);
  // }
 ?>
