<?php
require __DIR__ . "/connection.php";

function count_habits(){
  global $conn;

  $selectQuery = "SELECT COUNT(*) FROM habits";
  $stmt = $conn->prepare($selectQuery);
  $stmt->execute();
  $stmt->bind_result($count); 
  while($stmt->fetch()){
    return $count;
  }
  $stmt->close();
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode(['habits_counter' => count_habits()]);
