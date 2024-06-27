const cal = new CalHeatmap();

var data = [
  { date: '2024-06-25', habit: 0 },
  { date: '2024-06-26', habit: 1 },
  { date: '2024-06-27', habit: 1 },
  { date: '2024-06-27', habit: 1 },
  { date: '2024-06-28', habit: 1 },
  { date: '2024-06-28', habit: 1 },
  { date: '2024-06-28', habit: 1 },
  { date: '2024-06-28', habit: 1 },
  { date: '2024-06-28', habit: 1 },
];

cal.paint({
  range: 1,
  itemSelector: "#cal-heatmap-year",
  domain: { type: 'year' },
  subDomain: { type: 'day' },
  theme: 'dark',
  data: {
    source: data,
    type: 'json', // Specify the type of data source
    x: 'date', // Property name for the date
    y: 'habit', // Property name for the value
    groupY: 'sum'
  },
  scale: {
    color: {
      scheme: 'RdYlGn',
      type: 'linear',
      domain: [0, 5], // Domain adjusted for binary data
    },
  },
});
