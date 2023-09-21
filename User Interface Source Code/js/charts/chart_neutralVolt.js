// ( function ( $ ) {
//   //Chart.defaults.global.legend.display = false;
//       "use strict";
//       $.ajax({
//           url : "http://localhost:81/template/HP_Lab_v3/fetch_data_neutralVolt.php",
//           // url : "https://staging.elliance-services.com/teradyne/fetch_data_dashboard.php",
//           type : "GET",
//           success : function(data){
//             console.log(data);
//             var line1Neutral = [];
//             var line2Neutral = [];
//             var line3Neutral = [];  
      
//             for(var i in data) {
//               line1Neutral.push(data[i].line_1_to_NeutralVolt); //y
//               line2Neutral.push(data[i].line_2_to_NeutralVolt); //y
//               line3Neutral.push(data[i].line_3_to_NeutralVolt); //y
              
//             }
            
//             var chartdata = {
//               datasets: [
//                 {
//                   label: "Line 1 to Neutral Volt",
//                   fill: false,
//                   lineTension: 0.1,
//                   backgroundColor: "rgb(64,224,208)",
//                   borderColor: "rgb(0,139,139)",
//                   pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                   pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                   borderWidth: 3.5,
//                   pointRadius: 5,
//                   pointBorderColor: 'transparent',
//                   pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                   data: line1Neutral
//                 },
//                 {
//                   label: "Line 2 to Neutral Volt",
//                   fill: false,
//                   lineTension: 0.1,
//                   backgroundColor: "rgb(224, 64, 64)",
//                   borderColor: "rgb(139, 0, 0)",
//                   pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                   pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                   borderWidth: 3.5,
//                   pointRadius: 5,
//                   pointBorderColor: 'transparent',
//                   pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                   data: line2Neutral
//                 },
//                 {
//                   label: "Line 3 to Neutral Volt",
//                   fill: false,
//                   lineTension: 0.1,
//                   backgroundColor: "rgb(224, 64, 216)",
//                   borderColor: "rgb(139, 0, 81)",
//                   pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                   pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                   borderWidth: 3.5,
//                   pointRadius: 5,
//                   pointBorderColor: 'transparent',
//                   pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                   data: line3Neutral
//                 }
//               ]
//             };
      
//             var ctx = document.getElementById( "linechartVolt" );
//             // ctx.height = 250;
//             var LineGraph = new Chart(ctx, {
//               type: 'bar',
//               data: chartdata,
//               options: {
                  
//                   plugins: {
//                     datalabels: {
//                       anchor: 'end',
//                       align: 'top',
//                       formatter: Math.round,
//                       font: {
//                         weight: 'bold',
//                         size: 16
//                       }
//                     }
//                   },
//                 }
//             });
//           },
//           error : function(data) {
      
//           }
//         });
    
//     } )( jQuery );

(function ($) {
  "use strict";

    // setup 
    const data = {
      labels: ['Neutral Voltage (V)'],
      datasets: [{
        label: 'Line 1',
        data: [235],
        backgroundColor: [
          'rgb(64,224,208)',
        ],
        borderColor: [
          'rgb(0,139,139)',
        ],
        borderWidth: 1
      },
      {label: 'Line 2',
        data: [200],
        backgroundColor: [
          'rgb(224, 64, 64)',
        ],
        borderColor: [
          'rgb(139, 0, 0)',
        ],
        borderWidth: 1
      },
    { label: 'Line 3',
        data: [210],
        backgroundColor: [
          'rgb(224, 64, 216)',
        ],
        borderColor: [
          'rgb(139, 0, 81)',
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
      }
    };

    // render init block
    var ctx = document.getElementById( "linechartVolt" );
    ctx.height = 300;
    const myChart = new Chart(ctx,
      config
    );
})(jQuery); 