const cal = new CalHeatmap();
cal.paint({
  range: "1",
  // data: { source: data },
  itemSelector: "#cal-heatmap-year",
  domain: { type: 'year', sort: 'asc' },
  subDomain: { type: 'day' },
  theme: "dark",
  // date: { timezone: 'Europe/Brussels' },
  // dinamicDimension: false
});
const data = [
        { date: '2024-06-21', value: 3 },
        { date: '2024-06-22', value: 6 },
        { date: '2024-06-23', value: 8 }
      ];
const cal2 = new CalHeatmap();
cal2.paint({
  range: 1,
  itemSelector: "#cal-heatmap",
  domain: { type: 'month', sort: 'asc' },
  subDomain: { type: 'day' },
  theme: "dark",
  data: {
    source: data,
    x: 'date',
    y: 'value'
  }
});
// cal2.paint({
//   itemSelector: "#cal-heatmap-month",
//   range: '1',
//   domain: { type: 'month', sort: 'asc' },
//   subDomain: { type: 'day' },
//   theme: "dark",
//   // dinamicDimension: false
// });
