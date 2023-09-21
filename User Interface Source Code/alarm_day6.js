anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates6(data) {
        var combinedData = [];

        // Iterate through the original data
        for (var i = 0; i < data.length; i++) {
            var currentData = data[i];
            var duplicateIndex = -1;
    
            // Check if the data point already exists in the combinedData array
            for (var j = 0; j < combinedData.length; j++) {
                if (
                    currentData.start_timestamp === combinedData[j].start_timestamp &&
                    currentData.end_timestamp === combinedData[j].end_timestamp
                ) 
                {
                    // If a duplicate is found, update the 'description' field of the duplicate with the current data point's 'description'
                    combinedData[j].description += ', ' + currentData.description;
                    duplicateIndex = j;
                    break;
                }
            }
    
            if (duplicateIndex === -1) {
                // If no duplicate is found, create a new object and add it to the combinedData array
                combinedData.push({
                    start_date: currentData.start_date,
                    start_timestamp: currentData.start_timestamp,
                    end_timestamp: currentData.end_timestamp,
                    description: currentData.description
                });
            }
        }
        return combinedData;
    }
  
    // Define the function to create and render the chart
    function createAndRenderChart6(runData6, idleData6, stopErrorData6) {
        var combinedStopErrorData6 = combineDuplicates6(stopErrorData6);
  
        // Create data sets and mappings
        var combinedStopErrorData6 = combineDuplicates6(stopErrorData6);
        var runDataSet6 = anychart.data.set(runData6);
        var idleDataSet6 = anychart.data.set(idleData6);
        var stopErrorDataSet6 = anychart.data.set(combinedStopErrorData6);
  
        // Map the data in runDataSet6 using a specified configuration
        var runMapping6 = runDataSet6.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet6 using a specified configuration
        var idleMapping6 = idleDataSet6.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet6 using a specified configuration
        var stopErrorMapping6 = stopErrorDataSet6.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor6 = '#4CBB17';
        var idleColor6 = '#fbbc09';
        var stopErrorColor6 = '#FF0000';
  
        // Create the chart
        var chart6 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart6.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        chart6.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart6.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart6.barsPadding(-1);
  
        // create series with mapped data and set the series settings: runMapping6
        chart6
            .rangeBar(runMapping6)
            .xMode('scatter')
            .name('Run')
            .fill(runColor6)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping6
        chart6
            .rangeBar(idleMapping6)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor6)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping6
        chart6
            .rangeBar(stopErrorMapping6)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor6)
            .stroke(null);
  
        // turn on Y Scroller
        chart6.yScroller(true);

        // Create and adjust dateTime Y scaleS
        var yScale = anychart.scales.dateTime();
        chart6.yScale(yScale);
        chart6.yScale().ticks().interval('h', 1);
  
        // Disable xAxis labels
        chart6.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}');  // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart6.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart6.yAxis().enabled(true);
        chart6.yAxis().labels().enabled(true);
        // Enable Y grids
        chart6.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart6.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart6.legend();
        legend.enabled(false);
  
        // Place the legend at the bottom of the chart
        legend.position('bottom');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart6.container('container6').draw();
    }
  
    // Define the function to fetch and update data
    function fetchAndUpdateData6() {
        // Fetch JSON data from a URL (replace 'your_json_url' with the actual URL)
        fetch('fetch_data_alarmDay6.php')
        .then(response => response.json())
        .then(data => {
            var runData6 = data.RUN;
            var idleData6 = data.IDLE;
            var stopErrorData6 = data.ERROR;
        
            // Clear the container
            document.getElementById('container6').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart6(runData6, idleData6, stopErrorData6);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData6();
});
  