var gaugeTmrobotTemp; // Define a variable to store the Temperature chart

// Function to create the gauge and initialize it
function createGaugeTmrobotTemp() {
  gaugeTmrobotTemp = anychart.gauges.thermometer();

  anychart.data.loadJsonFile("fetch_data_tmrobotTemp.php", function (data) {
    // Set the data for the gauge
    gaugeTmrobotTemp.data(data);

    // Add a thermometer pointer
    gaugeTmrobotTemp.addPointer(0);

    // Use the primary scale as a Fahrenheit scale
    var fScale = gaugeTmrobotTemp.scale();

    // Set the minimum and maximum values of the Fahrenheit scale
    fScale.minimum(0);
    fScale.maximum(140);

    // Set the intervals of major and minor ticks on the Fahrenheit scale
    fScale.ticks().interval(10);
    fScale.minorTicks().interval(2);

    // Add an axis on the left side of the gauge
    var axisLeft = gaugeTmrobotTemp.axis(0);

    // Configure minor ticks on the left axis
    axisLeft.minorTicks(true);
    axisLeft.minorTicks().stroke('#cecece');

    // Set the width of the left axis
    axisLeft.width('0');

    // Set the offset of the left axis (as a percentage of the gauge width)
    axisLeft.offset('-0.18%');

    // Bind the left axis to the Fahrenheit scale
    axisLeft.scale(fScale);

    // Configure a Celsius scale
    var cScale = anychart.scales.linear();
    cScale.minimum(-40);
    cScale.maximum(50);
    cScale.ticks().interval(10);
    cScale.minorTicks().interval(1);

    // Set the container id
    gaugeTmrobotTemp.container('tmrobotTemp');
    gaugeTmrobotTemp.background().fill('transparent');

    // Initiate drawing the gauge
    gaugeTmrobotTemp.draw();
  });
}

// Function to update the gauge data and ranges based on temperature status
function updateGaugeDataTmrobotTemp() {
  anychart.data.loadJsonFile("fetch_data_tmrobotTemp.php", function (data) {
    // Access the 'temp' values from the data object
    var temp = data[0].temperature; // Assuming 'temp' is a number representing the temperature.
    var colorA = data[0].colorA;
    var colorB = data[0].colorB;

    // Update the gaugeTmrobotTemp data with the latest temp value
    gaugeTmrobotTemp.data(temp);

    // Add the axis formatting logic
    var axisLeft = gaugeTmrobotTemp.axis(0);
    axisLeft.labels().useHtml(true).format(function () {
      axisLeft.labels().useHtml(true).format(function () {
        if (this.value <= 50) {
          return (
            '<span style="color:' + colorA + '; font-weight: bold; font-size: 13px;">' + this.value + '°</span>'
          );
        } else if (this.value > 50) {
          return (
            '<span style="color:' + colorB + '; font-weight: bold; font-size: 13px;">' + this.value + '°</span>'
          );
        }
        return (
          '<span style="color: #1976d2; font-weight: bold; font-size: 13px;">' + this.value + '°</span>'
        );
      });  
    });

    // Redraw the gaugeTmrobotTemp with updated data and axis formatting
    gaugeTmrobotTemp.draw();
  });
}


// Call createGaugeTmrobotTemp() function to create the gauge when the page loads
createGaugeTmrobotTemp();

// Call the updateGaugeDataTmrobotTemp() function initially to load the data and draw the gauge
updateGaugeDataTmrobotTemp();

// Set an interval to update the data every one second (1000 milliseconds)
var intervalId = setInterval(updateGaugeDataTmrobotTemp, 1000);

// Optionally, you can clear the interval after a certain time (e.g., after 1 hour) using setTimeout
setTimeout(function () {
  clearInterval(intervalId);
}, 3600000); // 1 hour (3600000 milliseconds)
