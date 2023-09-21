anychart.onDocumentReady(function () {
    var chart; // Define a variable to store the Pareto chart

    // Function to create the Pareto chart and initialize it
    function createParetoChart(data) {
        var initialData = [
            { x: 'CPC', value: data.FAILURE_CONTACT_PAD, Failure: 'Contact Pad Corrosion' },
            { x: 'VLM', value: data.FAILURE_VENT_LABEL_ALIGMENT, Failure: 'Vent Label Misalignment' },
            { x: 'IOV', value: data.FAILURE_IOL_IOV, Failure: 'Ink on Vent Label' },
            { x: 'OPP', value: data.FAILURE_OP_PITTING, Failure: 'OP Pitting Corrosion' },
            { x: 'IUT', value: data.FAILURE_IUT, Failure: 'Ink Under Tape' },
            //{ x: 'EDD', value: data.FAILURE_EDGE_DETECTION, Failure: 'Edge Detection' },
            { x: 'CRT', value: data.FAILURE_CROOKED_TAPE, Failure: 'Crooked Tape' },
            { x: 'ECS', value: data.SOUTH_FAILURE_ENCAP_CRACK, Failure: 'Encap Crack South' },
            { x: 'ECN', value: data.NORTH_FAILURE_ENCAP_CRACK, Failure: 'Encap Crack North' }
        ];

        // Dispose the previous chart if it exists
        if (chart) {
            chart.dispose();
        }

        // Create a Pareto chart with initial data
        chart = anychart.pareto(initialData);

        //Background color
        chart.background({fill: "transparent"});

        // Customize chart settings
        chart.getSeries(0).normal().fill("#40E0D0", 0.8);
        chart.getSeries(0).hovered().fill("#40E0D0", 0.5);
        chart.getSeries(0).labels(true);
        chart.getSeries(0).labels().position("center");
        chart.getSeries(0).labels().anchor("center");
        chart.getSeries(0).labels().fontColor("white");
        chart.getSeries(1).labels(true);
        chart.getSeries(1).labels().fontColor("white");

        // configure the visual settings of the second series
        chart.getSeries(1).normal().stroke("#00FF7F");

        //Tooltip
        var tooltip = chart.getSeries(0).tooltip();
        tooltip.title().text("Failure");
        tooltip.format("{%Failure}");
        chart.getSeriesAt(1).tooltip().format("Cumulative Frequency: {%CF}%");

        //x axis
        chart.xAxis().labels().fontColor("white");
        chart.xAxis().stroke("white");
        chart.xAxis().title("Type of Failures");
        chart.xAxis().title().fontColor("white");
        chart.xAxis().title().fontWeight("bold");

        // y Axis at left
        chart.yAxis(0).title("Failure Frequency");
        chart.yAxis(0).title().fontColor("white");
        chart.yAxis(0).title().fontWeight("bold");
        chart.yAxis(0).labels().fontColor("white");

        // y Axis at right
        chart.yAxis(1).orientation("right");
        chart.yAxis(1).title("Cumulative Percentage");
        chart.yAxis(1).title().fontColor("white");
        chart.yAxis(1).title().fontWeight("bold");
        chart.yAxis(1).labels().fontColor("white");

        //Chart title
        chart.title("Pareto chart: Failures Count");
        chart.title().fontColor("white");

        // Draw the Pareto chart in the 'failures1' container
        chart.container('failures1');
        chart.draw();
    }

    // Function to fetch data and update the chart every one second
    function fetchDataAndUpdateChart() {
        // Use AJAX to fetch data from fetch_data_pareto.php
        fetch('fetch_data_pareto.php')
            .then(response => response.json())
            .then(data => {
                // Update the Pareto chart with the fetched data
                createParetoChart(data);
            });
    }

    // Call the fetchDataAndUpdateChart function initially to load the data and draw the chart
    fetchDataAndUpdateChart();

    // Set an interval to update the chart every 1 secs
    var intervalId = setInterval(fetchDataAndUpdateChart, 1000);

    // Clear the interval after a certain time (e.g., after 1 hour) using setTimeout
    setTimeout(function() {
        clearInterval(intervalId);
    }, 3600000); // 1 hour (3600000 milliseconds)
});
