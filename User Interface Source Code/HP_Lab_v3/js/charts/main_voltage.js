( function ( $ ) {
    "use strict";
    // $.ajax({
    //     url : "http://localhost:81/template/HP_Lab_v3/fetch_data_mainVolt.php",
    //     type : "GET",
    //     success : function(data){
    //       console.log(data);
    //       var Voltage = [];

    //       for(var i in data) {
    //         Voltage.push(data[i].line_to_line_volt);
    //       }

        // pressure graph feature
        var opts1 = {
          angle: 0, // The span of the gauge arc
          lineWidth: 0.2, // The line thickness
          radiusScale: 1, // Relative radius
          staticLabels: {
              font: "8px sans-serif",  // Specifies font
              labels: [0, 1000],  // Print labels at these values
              color: "#fff",  // Optional: Label text color
              fractionDigits: 0  // Optional: Numerical precision. 0=round off.
            },
          pointer: {
            length: 0.6, // // Relative to gauge radius
            strokeWidth: 0.035, // The thickness
            color: '#000000' // Fill color
          },
          limitMax: false,     // If false, max value increases automatically if value > maxValue
          limitMin: false,     // If true, the min value of the gauge will be fixed
          colorStart: '#6F6EA0',   // Colors
          colorStop: '#0ad7f7',    // just experiment with them
          strokeColor: '#EEEEEE',  // to see which ones work best for you
          generateGradient: true,
          highDpiSupport: true,     // High resolution support
          
        };
    
          // pressure graph plotting
          var target = document.getElementById('voltage'); // your canvas element
          var gauge = new Gauge(target).setOptions(opts1); // create sexy gauge!
          gauge.maxValue = 1000; // set max gauge value
          gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
          gauge.animationSpeed = 32; // set animation speed (32 is default value)
          gauge.set(415); // set actual value // call the variable assigned
          target.title = gauge.value;

    //     },
    //     error : function(data) {
    
    //     }
    //   });

} )( jQuery );