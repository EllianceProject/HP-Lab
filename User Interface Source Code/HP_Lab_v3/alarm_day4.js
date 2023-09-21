anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates4(data) {
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
    function createAndRenderChart4(runData4, idleData4, stopErrorData4) {
        var combinedStopErrorData4 = combineDuplicates4(stopErrorData4);
  
        // Create data sets and mappings
        var combinedStopErrorData4 = combineDuplicates4(stopErrorData4);
        var runDataSet4 = anychart.data.set(runData4);
        var idleDataSet4 = anychart.data.set(idleData4);
        var stopErrorDataSet4 = anychart.data.set(combinedStopErrorData4);
  
        // Map the data in runDataSet4 using a specified configuration
        var runMapping4 = runDataSet4.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet4 using a specified configuration
        var idleMapping4 = idleDataSet4.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet4 using a specified configuration
        var stopErrorMapping4 = stopErrorDataSet4.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor4 = '#4CBB17';
        var idleColor4 = '#fbbc09';
        var stopErrorColor4 = '#FF0000';
  
        // Create the chart
        var chart4 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart4.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        chart4.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart4.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart4.barsPadding(-1);
  
        // create series with mapped data and set the series settings: runMapping4
        chart4
            .rangeBar(runMapping4)
            .xMode('scatter')
            .name('Run')
            .fill(runColor4)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping4
        chart4
            .rangeBar(idleMapping4)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor4)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping4
        chart4
            .rangeBar(stopErrorMapping4)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor4)
            .stroke(null);
  
        // turn on Y Scroller
        chart4.yScroller(true);

        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart4.yScale(yScale);
        chart4.yScale().ticks().interval('h', 1);
  
        // Disable xAxis labels
        chart4.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}');  // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart4.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart4.yAxis().enabled(true);
        chart4.yAxis().labels().enabled(true);
        // Enable Y grids
        chart4.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart4.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart4.legend();
        legend.enabled(false);
  
        // Place the legend at the bottom of the chart
        legend.position('bottom');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart4.container('container4').draw();
    }
  
    // Define the function to fetch and update data
    function fetchAndUpdateData4() {
        // Fetch JSON data from fetch_data_alarmDay4.php
        fetch('fetch_data_alarmDay4.php')
        .then(response => response.json())
        .then(data => {
            var runData4 = data.RUN; // Data for the 'RUN' category
            var idleData4 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData4 = data.ERROR; // Data for the 'STOP_ERROR' category
        
            // Clear the container
            document.getElementById('container4').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart4(runData4, idleData4, stopErrorData4);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData4();
});
  