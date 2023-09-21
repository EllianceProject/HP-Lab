anychart.onDocumentReady(function () {
    // set input dateTime format
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
  
    // create data sets
    var runDataSet8 = anychart.data.set(runData8());
  
    // map the data
    var runMapping8 = runDataSet8.mapAs({
      x: 0,
      low: 1,
      high: 2
    });
  
    // get colors from theme
    // !!! When you change chart theme, colors may not match the color coding of the chart
    // For Monochrome theme idle and error colors have fallback, because theme contains only 5 colors
    var runDummy = 'white';
  
    // create a chart
    var chart = anychart.bar();
  
    // set formatter for the chart tooltip's title
    chart.tooltip().titleFormat(function () {
      return this.x + ' - ' + this.seriesName;
    });
  
    // set formatter for the chart tooltip's content
    chart.tooltip().format(function () {
      return 'From: ' + this.low + '\nTo: ' + this.high;
    });

    // Disable tooltip for the whole chart
    chart.tooltip(false);

    // create series with mapped data and set the series settings
    chart
      .rangeBar(runMapping8)
      .xMode('scatter')
      .name('Run')
      .fill(runDummy)
      .stroke(null);
  
    // set the padding between bars
    chart.barsPadding(-1);
  
    // create and adjust dateTime Y scale
    var yScale = anychart.scales.dateTime();
    chart.yScale(yScale);
    chart.yScale().ticks().interval('h', 3);
  
    // disable xAxis labels
    chart.xAxis().labels(true);

    // Set the font color for the X-axis labels
    chart.xAxis().labels().fontColor('white'); // Replace with your desired color
 
    // adjust Yaxis albels formatting
    chart.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
  
    // enable Y grids
    chart.yGrid().enabled(true);
  
    // adjust grids appearance
    chart.yGrid().stroke({
      color: '#cecece',
      dash: '10 5'
    });
  
    // enable chart legend
    var legend = chart.legend();
    legend.enabled(false);
  
    // place the legend at the bottom of the chart
    legend.position('bottom');
  
    // disable legend item click
    legend.listen('legendItemClick', function (event) {
      event.preventDefault();
    });
  
    // set container and render the chart
    chart.container('container8').draw();
  });
  
  // functions, that return data for the chart's series
  function runData8() {
    return [
      ['23/08', '2018-02-01 00:00:00', '2018-02-01 00:30:00'],
      ['23/08', '2018-02-01 00:40:00', '2018-02-01 01:25:00'],
      ['23/08', '2018-02-01 01:45:00', '2018-02-01 02:30:00'],
      ['23/08', '2018-02-01 02:40:00', '2018-02-01 03:15:00'],
      ['23/08', '2018-02-01 04:05:00', '2018-02-01 04:55:00'],
      ['23/08', '2018-02-01 05:05:00', '2018-02-01 07:30:00'],
      ['23/08', '2018-02-01 08:00:00', '2018-02-01 09:30:00'],
      ['23/08', '2018-02-01 10:00:00', '2018-02-01 12:30:00'],
      ['23/08', '2018-02-01 12:30:00', '2018-02-02 00:00:00']
    ];
  } 