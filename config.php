<?php
  define('DB_SERVER', 'localhost:3306');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'fergana1750');
  define('DB_DATABASE', 'test');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

  // if (!$db) {
  //   http_response_code(500);
  // }else {
  //   http_response_code(200);
  // }
 ?>
