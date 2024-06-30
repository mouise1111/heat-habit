<?php
require './backend/connection.php';
require './backend/count_habits.php';
require './backend/read_logs.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Habit Tracker</title>
  <link href="css/style.css" rel="stylesheet">
  <script src="https://d3js.org/d3.v7.min.js"></script>
  <script src="https://unpkg.com/cal-heatmap/dist/cal-heatmap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/cal-heatmap/dist/cal-heatmap.css">
  <script>
    let habit_logs = <?php echo json_encode($habit_logs, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG); ?>;
  </script>
  <script src="./script.js" defer></script>
</head>
<body>
  <h1>Habit tracker</h1>
  <h3>Mouise Bashir</h3>
  <div id="cal-heatmap-year">
    <h5>Year view</h5>
  </div>
  <div id="cal-heatmap-month">
    <h5>Month view</h5>
  </div>
  <h4>Current amount of habits: <span id="habits_counter"><?php echo $habits_counter; ?></span></h4>
</body>
</html>

