( function ( $ ) {
    "use strict";
    $.ajax({
        url: 'http://192.168.250.39:82/HP_lab/fetch_data_main.php',
        //url: 'http://localhost:81/HP_lab_latest/fetch_data_main.php',
        //url: 'http://localhost:82/HP_lab/fetch_data_main.php',
        //url: 'http://192.168.1.89:82/HP_lab/fetch_data_main.php',


        type : "GET",
        success : function(data){
          console.log(data);
          var v = [];
          var Pressure = [];
  
          for(var i in data) {
            v.push(data[i].line_to_line_volt);
            Pressure.push(data[i].incoming_pressure);
          }
  
        // pressure graph feature
        var opts1 = {
          angle: 0, // The span of the gauge arc
          lineWidth: 0.2, // The line thickness
          radiusScale: 1, // Relative radius
          staticLabels: {
              font: "8px sans-serif",  // Specifies font
              labels: [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000],  // Print labels at these values
              color: "#000",  // Optional: Label text color
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

        var opts = {
          angle: 0, // The span of the gauge arc
          lineWidth: 0.2, // The line thickness
          radiusScale: 1, // Relative radius
          staticLabels: {
              font: "8px sans-serif",  // Specifies font
              labels: [0, 1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000],  // Print labels at these values
              color: "#000",  // Optional: Label text color
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
          var target = document.getElementById('volt'); // your canvas element
          var gauge = new Gauge(target).setOptions(opts1); // create sexy gauge!
          gauge.maxValue = 1000; // set max gauge value
          gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
          gauge.animationSpeed = 32; // set animation speed (32 is default value)
          gauge.set(v); // set actual value // call the variable assigned
          target.title = gauge.value;

          // pressure graph plotting
          var target = document.getElementById('pressure'); // your canvas element
          var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
          gauge.maxValue = 10000; // set max gauge value
          gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
          gauge.animationSpeed = 32; // set animation speed (32 is default value)
          gauge.set(Pressure); // set actual value // call the variable assigned
          target.title = gauge.value;
  
        },
        error : function(data) {
    
        }
      });
    }
      
      )( jQuery );