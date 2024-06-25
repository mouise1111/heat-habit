<?php
$servername = "127.0.0.1";
$username = "habits";
$database = "habits";
$password = "habits";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
