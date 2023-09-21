anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
    
    // Define the function to combine duplicate data points
    function combineDuplicates1(data) {
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
    
    var chart1;
    // Define the function to create and render the chart
    function createAndChart1() {
  
        // Create the chart
        chart1 = anychart.bar();
  
        // Set formatter for the chart tooltip's title
        chart1.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        // Set formatter for the chart tooltip's content
        chart1.tooltip().width(300); 

        chart1.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // Set the padding between bars
        chart1.barsPadding(-1);
  
        // turn on Y Scroller
        chart1.yScroller(true);

        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart1.yScale(yScale);
        chart1.yScale().ticks().interval('h', 1);

        // Able xAxis labels
        chart1.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}'); // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart1.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart1.yAxis().enabled(true);
        chart1.yAxis().labels().enabled(true);

        // Enable Y grids
        chart1.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart1.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Enable chart legend
        var legend = chart1.legend();
        legend.enabled(false);
  
        // Place the legend at the top of the chart
        legend.position('top');
  
        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });
  
        // Set container and render the chart
        chart1.container('container1').draw();
    }

    createAndChart1();
  
    // Define the function to fetch and update data
    function fetchAndUpdateData1() {
        // Fetch JSON data from fetch_data_alarmDay1.php
        fetch('fetch_data_alarmDay1.php')
        .then(response => response.json())
        .then(data => {
            var runData1 = data.RUN; // Data for the 'RUN' category
            var idleData1 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData1 = data.ERROR; // Data for the 'STOP_ERROR' category
    
            var combinedStopErrorData1 = combineDuplicates1(stopErrorData1);
  
        // Create data sets and mappings
        var combinedStopErrorData1 = combineDuplicates1(stopErrorData1);
        var runDataSet1 = anychart.data.set(runData1);
        var idleDataSet1 = anychart.data.set(idleData1);
        var stopErrorDataSet1 = anychart.data.set(combinedStopErrorData1);

        // Map the data in runDataSet1 using a specified configuration
        var runMapping1 = runDataSet1.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in idleDataSet1 using a specified configuration
        var idleMapping1 = idleDataSet1.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // Map the data in stopErrorDataSet1 using a specified configuration
        var stopErrorMapping1 = stopErrorDataSet1.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });
  
        // get colors from theme
        var runColor1 = '#4CBB17';
        var idleColor1 = '#fbbc09';
        var stopErrorColor1 = '#FF0000';
  
        // Set formatter for the chart tooltip's title
        chart1.tooltip().titleFormat(function () {
            return this.seriesName;
        });
  
        // Set formatter for the chart tooltip's content
        chart1.tooltip().width(300); 

        chart1.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });
  
        // create series with mapped data and set the series settings: runMapping1
        chart1
            .rangeBar(runMapping1)
            .xMode('scatter')
            .name('Run')
            .fill(runColor1)
            .stroke(null);
  
        // create series with mapped data and set the series settings: idleMapping1
        chart1
            .rangeBar(idleMapping1)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor1)
            .stroke(null);
  
        // create series with mapped data and set the series settings: stopErrorMapping1
        chart1
            .rangeBar(stopErrorMapping1)
            .xMode('scatter')
            .name('Error')
            .fill(stopErrorColor1)
            .stroke(null);
  
        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart1.yScale(yScale);
        chart1.yScale().ticks().interval('h', 1);

        // Able xAxis labels
        chart1.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}'); // Format x-axis labels to show only the date
  
        // Adjust Yaxis labels formatting
        chart1.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart1.yAxis().enabled(true);
        chart1.yAxis().labels().enabled(true);

        // Enable Y grids
        chart1.yGrid().enabled(true);
  
        // Adjust grids appearance
        chart1.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });
  
        // Set container and render the chart
        chart1.container('container1').draw();
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
  
    // Call the fetchAndUpdateData function every one second
    setInterval(fetchAndUpdateData1, 1000);
});
  