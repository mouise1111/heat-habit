<?php
require __DIR__ . '/../../connection.php';

function insertLog(string $habit_name, string $log_date,bool $isCompleted){
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
      
        $logQuery = "select log_id from habit_logs where log_date =? and habit_id =?";
        $logStmt = $conn->prepare($logQuery);
        $logStmt->bind_param('si', $log_date, $habit_id);
        $logStmt->execute();
        $logStmt->store_result();

        if ($logStmt->num_rows > 0) {
          // update the isCompleted value
          $logStmt->bind_result($log_id);
          $updateLogQuery = "UPDATE habit_logs SET completed =? WHERE habit_id =?";
          $updateLogStmt = $conn->prepare($updateLogQuery);
          $completedInt = $isCompleted ? 1 : 0; // convert bool to integer
          $updateLogStmt->bind_param('ii', $completedInt, $habit_id);
          $updateLogStmt->execute();
          echo "Log updated";
        } else{
        $insertQuery = "INSERT INTO habits.habit_logs (habit_id, log_date, completed) VALUES (?,?,?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("isi", $habit_id, $log_date, $isCompleted);
        $insertStmt->execute();
        echo "Log entry created for habit " . $habit_name . " on " . $log_date;  
        }
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
// $running_habit = 'reading'; 
// $isCompleted = 1;
// $today = date('d,m,y');
// insertLog($running_habit, $today, $isCompleted);
?>
