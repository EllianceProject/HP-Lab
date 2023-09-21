anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates3(data) {
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
    function createAndRenderChart3(runData3, idleData3, stopErrorData3) {
        var combinedStopErrorData3 = combineDuplicates3(stopErrorData3);
  
        // Create data sets and mappings
        var combinedStopErrorData3 = combineDuplicates3(stopErrorData3);
        var runDataSet3 = anychart.data.set(runData3);
        var idleDataSet3 = anychart.data.set(idleData3);
        var stopErrorDataSet3 = anychart.data.set(combinedStopErrorData3);
  
        // Map the data in runDataSet1 using a specified configuration
        var runMapping3 = runDataSet3.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet3 using a specified configuration
        var idleMapping3 = idleDataSet3.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet3 using a specified configuration
        var stopErrorMapping3 = stopErrorDataSet3.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor3 = '#4CBB17';
        var idleColor3 = '#fbbc09';
        var stopErrorColor3 = '#FF0000';
  
        // Create the chart
        var chart3 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart3.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        chart3.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart3.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart3.barsPadding(-1);
  
        // create series with mapped data and set the series settings: runMapping3
        chart3
            .rangeBar(runMapping3)
            .xMode('scatter')
            .name('Run')
            .fill(runColor3)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping3
        chart3
            .rangeBar(idleMapping3)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor3)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping3
        chart3
            .rangeBar(stopErrorMapping3)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor3)
            .stroke(null);
  
        // turn on Y Scroller
        chart3.yScroller(true);
        
        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart3.yScale(yScale);
        chart3.yScale().ticks().interval('h', 1);
  
        // Disable xAxis labels
        chart3.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}'); // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart3.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart3.yAxis().enabled(true);
        chart3.yAxis().labels().enabled(true);
        // Enable Y grids
        chart3.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart3.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart3.legend();
        legend.enabled(false);
  
        // Place the legend at the bottom of the chart
        legend.position('bottom');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart3.container('container3').draw();
    }
  
    // Define the function to fetch and update data
    function fetchAndUpdateData3() {
        // Fetch JSON data from fetch_data_alarmDay3.php
        fetch('fetch_data_alarmDay3.php')
        .then(response => response.json())
        .then(data => {
            var runData3 = data.RUN; // Data for the 'RUN' category
            var idleData3 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData3 = data.ERROR; // Data for the 'STOP_ERROR' category
        
            // Clear the container
            document.getElementById('container3').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart3(runData3, idleData3, stopErrorData3);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData3();
});
  