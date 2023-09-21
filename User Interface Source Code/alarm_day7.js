anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates7(data) {
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
    function createAndRenderChart7(runData7, idleData7, stopErrorData7) {
        var combinedStopErrorData7 = combineDuplicates7(stopErrorData7);
  
        // Create data sets and mappings
        var combinedStopErrorData7 = combineDuplicates7(stopErrorData7);
        var runDataSet7 = anychart.data.set(runData7);
        var idleDataSet7 = anychart.data.set(idleData7);
        var stopErrorDataSet7 = anychart.data.set(combinedStopErrorData7);
  
        // Map the data in runDataSet7 using a specified configuration
        var runMapping7 = runDataSet7.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet7 using a specified configuration
        var idleMapping7 = idleDataSet7.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet7 using a specified configuration
        var stopErrorMapping7 = stopErrorDataSet7.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor7 = '#4CBB17';
        var idleColor7 = '#fbbc09';
        var stopErrorColor7 = '#FF0000';
  
        // Create the chart
        var chart7 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart7.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        chart7.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart7.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart7.barsPadding(-1);
  
        // create series with mapped data and set the series settings: runMapping7
        chart7
            .rangeBar(runMapping7)
            .xMode('scatter')
            .name('Run')
            .fill(runColor7)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping7
        chart7
            .rangeBar(idleMapping7)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor7)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping7
        chart7
            .rangeBar(stopErrorMapping7)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor7)
            .stroke(null);
  
        // turn on Y Scroller
        chart7.yScroller(true);

        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart7.yScale(yScale);
        chart7.yScale().ticks().interval('h', 1);
  
        // able xAxis labels
        chart7.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}'); // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart7.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
  
        // Enable Y grids
        chart7.yGrid().enabled(true);
  
        chart7.yAxis().enabled(true);
        chart7.yAxis().labels().enabled(true);

        // Adjust grids appearance
        chart7.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart7.legend();
        legend.enabled(false);
  
        // Place the legend at the bottom of the chart
        legend.position('bottom');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart7.container('container7').draw();
    }
  
    // Define the function to fetch and update data
    function fetchAndUpdateData7() {
        // Fetch JSON data from fetch_data_alarmDay7.php
        fetch('fetch_data_alarmDay7.php')
        .then(response => response.json())
        .then(data => {
            var runData7 = data.RUN; // Data for the 'RUN' category
            var idleData7 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData7 = data.ERROR; // Data for the 'STOP_ERROR' category
        
            // Clear the container
            document.getElementById('container7').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart7(runData7, idleData7, stopErrorData7);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData7();
});
  