<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'phpadmin');
define('DB_PASS', '000000');
define('DB_NAME', 'php_feedback');

// CREATE CONNECTION
$conn = new mysqli(DB_HOST, DB_USER,  DB_PASS, DB_NAME);


// CHECK CONNECTION

if ($conn->connect_error) {
  die('Connection error: ' . $conn->connect_error);
}
