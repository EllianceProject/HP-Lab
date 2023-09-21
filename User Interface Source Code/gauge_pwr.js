var gaugePwr;  // Variable to store the Power Consumption Gauge chart

// Function to create the gauge and initialize it
function createGaugePwr() {
  gaugePwr = anychart.gauges.circular(); // Create a circular gauge instance

  gaugePwr  // Configure gauge appearance and layout
    .fill('none')
    .stroke(null)
    .padding(0)
    .margin(10)
    .startAngle(270)
    .sweepAngle(180);

  gaugePwr // Configure axis labels
    .axis()
    .labels()
    .padding(3)
    .fontSize(12)
    .fontColor('white')
    .fontWeight('bold')
    .position('outside')
    .format('{%Value}');

  gaugePwr // Configure axis scale and ticks
    .axis()
    .scale()
    .minimum(0)
    .maximum(1010)
    .ticks({ interval: 50 })
    .minorTicks({ interval: 5 });

  gaugePwr // Configure axis appearance
    .axis()
    .fill('#545f69')
    .width(1)
    .ticks({ type: 'line', fill: 'white', length: 2 });

  gaugePwr  // Configure gauge title
    .title()
    .useHtml(true)
    .padding(0)
    .fontColor('#212121')
    .hAlign('center')
    .margin([0, 0, 10, 0]);

  gaugePwr  // Configure gauge needle
    .needle()
    .stroke('2 white')
    .startRadius('5%')
    .endRadius('90%')
    .startWidth('0.1%')
    .endWidth('0.1%')
    .middleWidth('0.1%');

  gaugePwr.cap().radius('3%').enabled(true).fill('#545f69'); // Configure gauge cap

  gaugePwr.container('power'); // Set the container element for the gauge

  gaugePwr.background().fill('transparent'); // Configure gauge background 
  gaugePwr.draw(); // Draw the gauge
}

// Function to update the gauge data and ranges based on towerlight_status
function updateGaugeDataPwr() {
  anychart.data.loadJsonFile("fetch_data_pwr.php", function (data) {
    // Access the 'power_consumption' and 'towerlight_status' values from the data object
    var power_consumption = data[0].power_consumption; // Store the power consumption value from data
    var colorA = data[0].colorA;
    var colorB = data[0].colorB;

    // Update the gaugePwr data with the latest power_consumption value
    gaugePwr.data(power_consumption);

    // Update the gauge ranges and colors based on towerlight_status
    gaugePwr.range(0, {
      from: 0,
      to: 500,
      position: 'inside',
      fill: colorA,
      startSize: 30,
      endSize: 30,
      radius: 98
    });
  
    gaugePwr.range(1, {
      from: 500,
      to: 1010,
      position: 'inside',
      fill: colorB,
      startSize: 30,
      endSize: 30,
      radius: 98
    });

    // Redraw the gaugePwr with updated data and ranges
    gaugePwr.draw();
  });
}

// Call createGaugePwr() function to create the gauge when the page loads
createGaugePwr();

// Call the updateGaugeDataPwr() function initially to load the data and draw the gauge
updateGaugeDataPwr();

// Set an interval to update the data every one second (1000 milliseconds)
var intervalId = setInterval(updateGaugeDataPwr, 1000);

// Optionally, you can clear the interval after a certain time (e.g., after 1 hour) using setTimeout
setTimeout(function() {
  clearInterval(intervalId);
}, 3600000); // 1 hour (3600000 milliseconds)
