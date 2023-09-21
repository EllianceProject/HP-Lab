var gaugeCurr; // Variable to store the Current Gauge chart

// Function to create the gauge and initialize it
function createGaugeCurr() {
  gaugeCurr = anychart.gauges.circular(); // Create a circular gauge instance

  gaugeCurr // Configure gauge appearance and layout
    .fill('none')
    .stroke(null)
    .padding(0)
    .margin(10)
    .startAngle(270)
    .sweepAngle(180);

  gaugeCurr // Configure axis labels
    .axis()
    .labels()
    .padding(3)
    .fontSize(12)
    .fontColor('white')
    .fontWeight('bold')
    .position('outside')
    .format('{%Value}');

  gaugeCurr // Configure axis scale and ticks
    .axis()
    .scale()
    .minimum(0)
    .maximum(21)
    .ticks({ interval: 1 })
    .minorTicks({ interval: 1 });

  gaugeCurr // Configure axis appearance
    .axis()
    .fill('#545f69')
    .width(1)
    .ticks({ type: 'line', fill: 'white', length: 2 });

  gaugeCurr // Configure gauge title
    .title()
    .useHtml(true)
    .padding(0)
    .fontColor('#212121')
    .hAlign('center')
    .margin([0, 0, 10, 0]);

  gaugeCurr // Configure gauge needle
    .needle()
    .stroke('2 white')
    .startRadius('5%')
    .endRadius('90%')
    .startWidth('0.1%')
    .endWidth('0.1%')
    .middleWidth('0.1%');

  gaugeCurr.cap().radius('3%').enabled(true).fill('#545f69'); // Configure gauge cap

  gaugeCurr.container('current'); // Set the container element for the gauge
  gaugeCurr.background().fill('transparent'); // Configure gauge background 
  gaugeCurr.draw(); // Draw the gauge
}

// Function to update the gauge data and ranges based on towerlight_status
function updateGaugeDataCurr() {
  anychart.data.loadJsonFile("fetch_data_curr.php", function (data) {
    // Access the 'current' and 'towerlight_status' values from the data object
    var current = data[0].current; // Store the current value from data
    var colorA = data[0].colorA;
    var colorB = data[0].colorB;

    // Update the gaugeCurr data with the latest current value
    gaugeCurr.data(current);

    // Update the gauge ranges and colors based on towerlight_status
    gaugeCurr.range(1, {
      from: 0,
      to: 10,
      position: 'inside',
      fill: colorA,
      startSize: 30,
      endSize: 30,
      radius: 98
    });

    gaugeCurr.range(2, {
      from: 10,
      to: 21,
      position: 'inside',
      fill: colorB,
      startSize: 30,
      endSize: 30,
      radius: 98
    });
    // Redraw the gaugeCurr with updated data and ranges
    gaugeCurr.draw();
  });
}

// Call createGaugeCurr() function to create the gauge when the page loads
createGaugeCurr();

// Call the updateGaugeDataCurr() function initially to load the data and draw the gauge
updateGaugeDataCurr();

// Set an interval to update the data every one second (1000 milliseconds)
var intervalId = setInterval(updateGaugeDataCurr, 1000);

// Clear the interval after a certain time (e.g., after 1 hour) using setTimeout
setTimeout(function() {
  clearInterval(intervalId);
}, 3600000); // 1 hour (3600000 milliseconds)
