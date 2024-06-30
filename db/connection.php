<?php
$servername = getenv('DB_SERVER') ?: '127.0.0.1';
$username = getenv('DB_USER') ?: 'habits';
$database = getenv('DB_NAME') ?: 'habits';
$password = getenv('DB_PASS') ?: 'habits';
$port = getenv('DB_PORT') ?: 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>
