<?php
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

$habits_counter = count_habits();
