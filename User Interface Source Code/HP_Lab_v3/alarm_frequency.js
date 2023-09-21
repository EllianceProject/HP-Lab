anychart.onDocumentReady(function () {
    // Create an empty data set
    var dataSet = anychart.data.set([]);
  
    // Create bar chart
    var chart = anychart.column();
  
    // Turn on chart animation
    chart.animation(false);
  
    // Force chart to stack values by Y scale.
    chart.yScale().stackMode('value');
  
    // Helper function to setup label settings for all series
    var setupSeriesLabels = function (series, name) {
      series.name(name).stroke('3 #fff 1');
      series.hovered().stroke('3 #fff 1');
    };
  
    // Create series with mapped data
    var firstSeries = chart.column(dataSet.mapAs({ x: 0, value: 1 }));
    firstSeries.fill('#FFEA00'); // Set the color for the series
    setupSeriesLabels(firstSeries, 'Machine');
  
    var secondSeries = chart.column(dataSet.mapAs({ x: 0, value: 2 }));
    setupSeriesLabels(secondSeries, 'Robot');
  
    // Turn on legend
    chart.legend().enabled(true).fontSize(13).padding([0, 0, 20, 0]);
    // Set yAxis labels formatter
    chart.yAxis().labels().format('{%Value}{groupsSeparator: }');
  
    // Set titles for axes
    chart.xAxis().title('Alarm by Category');
    chart.yAxis().title('Count of Failures');
  
    // Set interactivity hover
    chart.interactivity().hoverMode('by-x');
    // Set tooltip settings
    chart.tooltip().valuePrefix('').displayMode('union');
  
    // Set container id for the chart
    chart.container('alarm_frequency');
  
    // Initiate chart drawing
    chart.draw();
  
    // Fetch data and update the chart at regular intervals
    fetchAndUpdateData();
  
    // Update chart every one second
    setInterval(function () {
      fetchAndUpdateData();
    }, 1000); // 1000 milliseconds = 1 second
  
    function clearDataSet(dataSet) {
    while (dataSet.getRowsCount() > 0) {
      dataSet.remove(0);
    }
  }
  
    function fetchAndUpdateData() {
    // Fetch JSON data from 'fetch_data_alarmFreq.php' 
    fetch('fetch_data_alarmFreq.php')
      .then(response => response.json())
      .then(data => {
        // Clear the data set before appending new data
        clearDataSet(dataSet);
  
        // Flatten the nested array structure and populate the data set with the fetched data
        var flattenedData = data.reduce((acc, curr) => acc.concat(curr), []);
        flattenedData.forEach(item => {
          dataSet.append([item.formatted_date, item.count_machine, item.count_robot]);
        });
  
        // Update the chart with the new data
        chart.draw();
      })
      .catch(error => console.error('Error fetching JSON data:', error));
  }
  });