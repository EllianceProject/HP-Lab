var gaugeVolt; // Variable to store the Voltage Gauge chart

// Function to create the gaugeVolt and initialize it
function createGaugeVolt() {
  gaugeVolt = anychart.gauges.circular(); // Create a circular gauge instance

  gaugeVolt // Configure gauge appearance and layout
    .fill('none')
    .stroke(null)
    .padding(0)
    .margin(10)
    .startAngle(270)
    .sweepAngle(180);

  gaugeVolt // Configure axis labels
    .axis()
    .labels()
    .padding(3)
    .fontSize(12)
    .fontColor('white')
    .fontWeight('bold')
    .position('outside')
    .format('{%Value}');

  gaugeVolt // Configure axis scale and ticks
    .axis()
    .scale()
    .minimum(0)
    .maximum(240)
    .ticks({ interval: 10 })
    .minorTicks({ interval: 5 });

  gaugeVolt // Configure axis appearance
    .axis()
    .fill('#545f69')
    .width(1)
    .ticks({ type: 'line', fill: 'white', length: 2 });

  gaugeVolt // Configure gauge title
    .title()
    .useHtml(true)
    .padding(0)
    .fontColor('#212121')
    .hAlign('center')
    .margin([0, 0, 10, 0]);

  gaugeVolt // Configure gauge needle
    .needle()
    .stroke('2 white')
    .startRadius('5%')
    .endRadius('90%')
    .startWidth('0.1%')
    .endWidth('0.1%')
    .middleWidth('0.1%');

  gaugeVolt.cap().radius('3%').enabled(true).fill('#545f69'); // Configure gauge cap

  gaugeVolt.container('voltage'); // Set the container element for the gauge

  gaugeVolt.background().fill('transparent'); // Configure gauge background 
  gaugeVolt.draw(); // Draw the gauge
}

// Function to update the gauge data and ranges based on towerlight_status
function updateGaugeVoltData() {
  anychart.data.loadJsonFile("fetch_data_volt.php", function (data) {
    // Access the 'voltage' and 'towerlight_status' values from the data object
    var voltage = data[0].voltage; // Store the voltage value from data
    var colorA = data[0].colorA;
    var colorB = data[0].colorB;

    // Update the gaugeVolt data with the latest voltage value
    gaugeVolt.data(voltage);

    // Update the gauge ranges and colors based on towerlight_status
    gaugeVolt.range(0, {
      from: 0,
      to: 200,
      position: 'inside',
      fill: colorA,
      startSize: 30,
      endSize: 30,
      radius: 98
    });
  
    gaugeVolt.range(1, {
      from: 200,
      to: 240,
      position: 'inside',
      fill: colorB,
      startSize: 30,
      endSize: 30,
      radius: 98
    });
  
    // Redraw the gaugeVolt with updated data and ranges
    gaugeVolt.draw();
  });
}

// Call createGaugeVolt() function to create the gauge when the page loads
createGaugeVolt();

// Call the updateGaugeVoltData() function initially to load the data and draw the gauge
updateGaugeVoltData();

// Set an interval to update the data every one second (1000 milliseconds)
var intervalId = setInterval(updateGaugeVoltData, 1000);

// Clear the interval after a certain time (e.g., after 1 hour) using setTimeout
setTimeout(function() {
  clearInterval(intervalId);
}, 3600000); // 1 hour (3600000 milliseconds)
