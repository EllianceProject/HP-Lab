anychart.onDocumentReady(function () {
    anychart.format.inputDateTimeFormat('yyyy-MM-dd HH:mm:ss');
  
    // Define the function to combine duplicate data points
    function combineDuplicates2(data) {
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
    function createAndRenderChart2(runData2, idleData2, stopErrorData2) {
        var combinedStopErrorData2 = combineDuplicates2(stopErrorData2);

        // Create data sets and mappings
        var combinedStopErrorData2 = combineDuplicates2(stopErrorData2);
        var runDataSet2 = anychart.data.set(runData2);
        var idleDataSet2 = anychart.data.set(idleData2);
        var stopErrorDataSet2 = anychart.data.set(combinedStopErrorData2);

        // Map the data in runDataSet1 using a specified configuration
        var runMapping2 = runDataSet2.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });

        // Map the data in idleDataSet2 using a specified configuration
        var idleMapping2 = idleDataSet2.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });

        // Map the data in stopErrorDataSet2 using a specified configuration
        var stopErrorMapping2 = stopErrorDataSet2.mapAs({
            x: 'start_date',   // x-axis: start_date
            low: 'start_timestamp',   // low value: start_timestamp
            high: 'end_timestamp',  // high value: end_timestamp
            name: 'description'   // series name: description
        });

        // get colors from theme
        var runColor2 = '#4CBB17';
        var idleColor2 = '#fbbc09';
        var stopErrorColor2 = '#FF0000';

        // Create the chart
        var chart2 = anychart.bar();

        // Set formatter for the chart tooltip's title
        chart2.tooltip().titleFormat(function () {
            return this.seriesName;
        });

        chart2.tooltip().width(300); 

        // Set formatter for the chart tooltip's content
        chart2.tooltip().format(function () {
            var name = this.getData('description'); // Use 'description' instead of 'name'
            var tooltipContent = this.low + '\nTo: ' + this.high;
    
            var formattedTooltip = 'Reason: ' + name + '\n' + 'From: ' + tooltipContent;
            return formattedTooltip;
        });

        // Set the padding between bars
        chart2.barsPadding(-1);

        // create series with mapped data and set the series settings: runMapping2
        chart2
            .rangeBar(runMapping2)
            .xMode('scatter')
            .name('Run')
            .fill(runColor2)
            .stroke(null);

        // create series with mapped data and set the series settings: idleMapping2
        chart2
            .rangeBar(idleMapping2)
            .xMode('scatter')
            .name('Idle')
            .fill(idleColor2)
            .stroke(null);

        // create series with mapped data and set the series settings: stopErrorMapping2
        chart2
            .rangeBar(stopErrorMapping2)
            .xMode('scatter')
            .name('Stop')
            .fill(stopErrorColor2)
            .stroke(null);

        // turn on Y Scroller
        chart2.yScroller(true);

        // Create and adjust dateTime Y scale
        var yScale = anychart.scales.dateTime();
        chart2.yScale(yScale);
        chart2.yScale().ticks().interval('h', 1);

        // Disable xAxis labels
        chart2.xAxis().labels().format('{%value}{dateTimeFormat:dd/MM}'); // Format x-axis labels to show only the date

        // Adjust Yaxis labels formatting
        chart2.yAxis().labels().format('{%tickValue}{dateTimeFormat:HH:mm:ss}');
        chart2.yAxis().enabled(true);
        chart2.yAxis().labels().enabled(true);
        // Enable Y grids
        chart2.yGrid().enabled(true);

        // Adjust grids appearance
        chart2.yGrid().stroke({
            color: '#cecece',
            dash: '10 5'
        });

        // Enable chart legend
        var legend = chart2.legend();
        legend.enabled(false);

        // Place the legend at the bottom of the chart
        legend.position('bottom');

        // Disable legend item click
        legend.listen('legendItemClick', function (event) {
            event.preventDefault();
        });

        // Set container and render the chart
        chart2.container('container2').draw();
    }

    // Define the function to fetch and update data
    function fetchAndUpdateData2() {
        // Fetch JSON data from fetch_data_alarmDay2.php
        fetch('fetch_data_alarmDay2.php')
        .then(response => response.json())
        .then(data => {
            var runData2 = data.RUN; // Data for the 'RUN' category
            var idleData2 = data.IDLE; // Data for the 'IDLE' category
            var stopErrorData2 = data.ERROR; // Data for the 'STOP_ERROR' category

            // Clear the container
            document.getElementById('container2').innerHTML = '';
    
            // Create and render the chart
            createAndRenderChart2(runData2, idleData2, stopErrorData2);
        })
        .catch(error => console.error('Error fetching JSON data:', error));
    }
    // Call the fetchAndUpdateData function initially
    fetchAndUpdateData2();
});
