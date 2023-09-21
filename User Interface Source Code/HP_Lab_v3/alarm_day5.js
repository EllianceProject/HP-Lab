anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates5(data) {
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
    function createAndRenderChart5(runData5, idleData5, stopErrorData5) {
        var combinedStopErrorData5 = combineDuplicates5(stopErrorData5);
  
        // Create data sets and mappings
        var combinedStopErrorData5 = combineDuplicates5(stopErrorData5);
        var runDataSet5 = anychart.data.set(runData5);
        var idleDataSet5 = anychart.data.set(idleData5);
        var stopErrorDataSet5 = anychart.data.set(combinedStopErrorData5);
  
        // Map the data in runDataSet5 using a specified configuration
        var runMapping5 = runDataSet5.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet5 using a specified configuration
        var idleMapping5 = idleDataSet5.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet5 using a specified configuration
        var stopErrorMapping5 = stopErrorDataSet5.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor5 = '#4CBB17';
        var idleColor5 = '#fbbc09';
        var stopErrorColor5 = '#FF0000';
  
        // Create the chart
        var chart5 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart5.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        chart5.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart5.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart5.barsPadding(-1);
  
        // create series with mapped data and set the series settings: runMapping5
        chart5
            .rangeBar(runMapping5)
            .xMode('scatter')
            .name('Run')
            .fill(runColor5)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping5
        chart5
            .rangeBar(idleMapping5)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor5)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping5
        chart5
            .rangeBar(stopErrorMapping5)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor5)
            .stroke(null);
  
        // turn on Y Scroller
        chart5.yScroller(true);

        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart5.yScale(yScale);
        chart5.yScale().ticks().interval('h', 1);
  
        // Disable xAxis labels
        chart5.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}');  // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart5.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart5.yAxis().enabled(true);
        chart5.yAxis().labels().enabled(true);
        // Enable Y grids
        chart5.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart5.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart5.legend();
        legend.enabled(false);
  
        // Place the legend at the bottom of the chart
        legend.position('bottom');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart5.container('container5').draw();
    }
  
    // Define the function to fetch and update data
    function fetchAndUpdateData5() {
        // Fetch JSON data from fetch_data_alarmDay5.php
        fetch('fetch_data_alarmDay5.php')
        .then(response => response.json())
        .then(data => {
            var runData5 = data.RUN; // Data for the 'RUN' category
            var idleData5 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData5 = data.ERROR; // Data for the 'STOP_ERROR' category
        
            // Clear the container
            document.getElementById('container5').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart5(runData5, idleData5, stopErrorData5);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData5();
});
  