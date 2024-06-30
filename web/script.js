const cal = new CalHeatmap();
let habitsCounter = parseInt(document.getElementById('habits_counter').innerText.trim());

cal.paint({
  range: 1,
  itemSelector: "#cal-heatmap-year",
  domain: { type: 'year' },
  subDomain: { type: 'day' },
  theme: 'dark',
  data: {
    source: habit_logs,
    type: 'json', // Specify the type of data source
    x: 'log_date', // Property name for the date
    y: 'completed', // Property name for the value
    groupY: 'sum'
  },
  scale: {
    color: {
      scheme: 'RdYlGn',
      type: 'linear',
      domain: [0, habitsCounter], // Domain adjusted for binary data
    },
  },
});
