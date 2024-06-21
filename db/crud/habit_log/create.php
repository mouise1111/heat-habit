<?php
require __DIR__ . '/../../connection.php';

function insertLog(string $habit_name, bool $isCompleted){
  $today = date('d,m,y');

  global $conn;
  $searchQuery = "SELECT habit_id FROM habits.habits WHERE habit_name =?";
  $stmt = $conn->prepare($searchQuery);
  $stmt->bind_param('s', $habit_name);
  $stmt->execute();

  // Fetching the results
  $stmt->bind_result($habit_id);
  if ($stmt->num_rows > 0) {
    echo "The id for the habit " . $habit_name . " is: " . $habit_id;
    while($stmt->fetch()){
      echo "The id for the habit " . $habit_name . " is: " . $habit_id;
    }
  } else{
    echo "Habit id for " . $habit_name . " not found.";
  }
}

// Example usage
$running_habit = 'running'; 
$isCompleted = 0;
insertLog($running_habit, $isCompleted);
?>
