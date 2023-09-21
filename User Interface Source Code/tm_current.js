( function ( $ ) {
"use strict";
$.ajax({
url: 'http://192.168.250.39:82/HP_lab/fetch_data_tmrobotPwr.php',
//url: 'http://localhost:82/HP_lab/fetch_data_tmrobotPwr.php',
//url: 'http://localhost:81/HP_lab_latest/fetch_data_tmrobotPwr.php',
//url: 'http://192.168.1.89:82/HP_lab/fetch_data_tmrobotPwr.php',
type : "GET",
success : function(data){
    console.log(data);
    var curr = [];

    for(var i in data) {
    curr.push(data[i].current);
    }

var opts = {
    angle: 0, // The span of the gauge arc
    lineWidth: 0.2, // The line thickness
    radiusScale: 1, // Relative radius
    fontSize: 29,
    staticLabels: {
        font: "10px sans-serif",  // Specifies font
        labels: [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50],  // Print labels at these values
        color: "#000",  // Optional: Label text color
        fractionDigits: 0  // Optional: Numerical precision. 0=round off.
    },
    staticZones: [
        //{strokeStyle: "#F03E3E", min: 0, max: 200}, // Red from 100 to 130
        //{strokeStyle: "#FFDD00", min: 200, max: 400}, // Yellow
        {strokeStyle: "#30B32D", min: 0, max: 10}, // Green
        //{strokeStyle: "#FFDD00", min: 600, max: 800}, // Yellow
        {strokeStyle: "#F03E3E", min: 10, max: 50}  // Red
     ],
    pointer: {
    length: 0.6, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
    },
    limitMax: false,     // If false, max value increases automatically if value > maxValue
    limitMin: false,     // If true, the min value of the gauge will be fixed
    colorStart: '#6F6EA0',   // Colors
    colorStop: '#0075ff',    // just experiment with them
    strokeColor: '#EEEEEE',  // to see which ones work best for you
    generateGradient: true,
    highDpiSupport: true,     // High resolution support
    
};

    // Omron servo motor 1 
    var target = document.getElementById('current'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 50; // set max gauge value
    gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(curr); // set actual value // call the variable assigned
    target.title = gauge.value;
},
error : function(data) {

}
});

} )( jQuery );