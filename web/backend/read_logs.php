<?php
require __DIR__ . "/connection.php";

function read_habit_logs(){
  global $conn;

  $selectQuery = "SELECT completed, log_date, habit_id FROM habit_logs";
  $stmt = $conn->prepare($selectQuery);
  $stmt->execute();
  $stmt->bind_result($isCompleted, $logDate, $habitId);
  while($stmt->fetch()){
    echo "\nCompleted: " . $isCompleted . " Date: " . $logDate . " Habit ID: " . $habitId;
    return $isCompleted . $logDate . $habitId;
  }
  $stmt->close();
}

read_habit_logs();
