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
    <script src="./script.js" defer></script>
  </head>
  <body>
    <?php include './backend/connection.php'; include './backend/count_habits.php'; ?>
    <h1><?php echo $variable; ?></h1>
    <h1><?php echo $habits_counter; ?></h1>
    <h1>Habit tracker</h1>
    <h3>Mouise Bashir</h3>
    <div id="cal-heatmap-year">
      <h5>Year view</h5>
    </div>
    <div id="cal-heatmap-month">
      <h5>Month view</h5>
    </div>
    <script>
     let habits_counter = "<?php echo $habits_counter; ?>";
      console.log(habits_counter);
    </script>
  </body>
</html>
