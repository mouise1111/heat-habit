<?php
require __DIR__ . '/../../connection.php';

function insertLog(string $habit_name, bool $isCompleted){
  $today = date('d,m,y');

  global $conn;
  $conn->begin_transaction();

  try{
    $searchQuery = "SELECT habit_id FROM habits.habits WHERE habit_name =?";
    $stmt = $conn->prepare($searchQuery);
    $stmt->bind_param('s', $habit_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($habit_id);
      while($stmt->fetch()){
        echo "The id for the habit " . $habit_name . " is: " . $habit_id;
        $insertQuery = "INSERT INTO habits.habit_logs (habit_id, log_date, completed) VALUES (?,?,?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("isi", $habit_id, $today, $isCompleted);
        $insertStmt->execute();
        echo "Log entry created for habit " . $habit_name . " on " . $today;  
      }
    } else{
      echo "Habit id for " . $habit_name . " not found.";
    }
    $stmt->close();
    $conn->commit();
  } catch (Exception $e){
    $conn->rollback();
    echo "Error: " . $e->getMessage();
  }
}

// Example usage
// $running_habit = 'running'; 
// $isCompleted = 0;
// insertLog($running_habit, $isCompleted);
?>
