<?php
require __DIR__ . "/../../connection.php";

function insertHabit(string $habit){
  global $conn;
  // insert habit into habit_name column in db
  $sql = "INSERT INTO habits (habit_name) VALUES ('$habit')";
  if($conn->query($sql) === TRUE){
    echo $habit . " inserted succesfully into database";
  } else{
    echo "Error inserting into databse: " . $habit;
    throw new Exception($conn->error); 
  }
}

insertHabit("running");
