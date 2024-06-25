<?php
require __DIR__ . "/connection.php";

function read_habit_logs(){
  global $conn;

  $selectQuery = "SELECT * FROM habit_logs";
  // Execute the query
  $result = mysqli_query($conn, $selectQuery);

  // Check if the query returned any results
  if (mysqli_num_rows($result) > 0) {
    // Loop through the results and echo each row
    while($row = mysqli_fetch_assoc($result)) {
      // echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
      echo $row["completed"];
    }
  } else {
    echo "0 results";
  }
}

read_habit_logs();
