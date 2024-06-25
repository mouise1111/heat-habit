<?php
require __DIR__ . "/connection.php";

function read_habit_logs(){
  global $conn;

  $selectQuery = "SELECT completed FROM habit_logs";
  $stmt = $conn->prepare($selectQuery);
  $stmt->execute();
  $stmt->bind_result($isCompleted);
  echo $isCompleted;
  // $stmt->close();
}

read_habit_logs();
