<?php
function read_habit_logs(){
  global $conn;

  $selectQuery = "SELECT completed, log_date, habit_id FROM habit_logs";
  $stmt = $conn->prepare($selectQuery);
  $stmt->execute();
  $stmt->bind_result($isCompleted, $logDate, $habitId);
  
  $habitLogs = [];
  while($stmt->fetch()){
    $habitLogs[] = [
      'completed' => $isCompleted,
      'log_date' => $logDate,
      'habit_id' => $habitId
    ];
  }
  $stmt->close();
  
  return $habitLogs;
}

$habit_logs = read_habit_logs();

?>

