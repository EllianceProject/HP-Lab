// ( function ( $ ) {
// //Chart.defaults.global.legend.display = false;
//     "use strict";
//     $.ajax({
//         url : "http://localhost:81/template/HP_Lab_v3/fetch_data_lineCurrent.php",
//         // url : "https://staging.elliance-services.com/teradyne/fetch_data_dashboard.php",
//         type : "GET",
//         success : function(data){
//           console.log(data);
//           var current1 = [];
//           var current2 = [];
//           var current3 = [];   
    
//           for(var i in data) {
//             current1.push(data[i].line_1_current); //y
//             current2.push(data[i].line_2_current); //y
//             current3.push(data[i].line_3_current); //y
  
//           }
          
//           var chartdata = {
//             datasets: [
//               {
//                 label: "Line 1 Current",
//                 fill: false,
//                 lineTension: 0.1,
//                 backgroundColor: "rgb(64,224,208)",
//                 borderColor: "rgb(0,139,139)",
//                 pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                 pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                 borderWidth: 3.5,
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                 data: current1
//               },
//               {
//                 label: "Line 2 Current",
//                 fill: false,
//                 lineTension: 0.1,
//                 backgroundColor: "rgb(224, 64, 64)",
//                 borderColor: "rgb(139, 0, 0)",
//                 pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                 pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                 borderWidth: 3.5,
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                 data: current2
//               },
//               {
//                 label: "Line 3 Current",
//                 fill: false,
//                 lineTension: 0.1,
//                 backgroundColor: "rgb(224, 64, 216)",
//                 borderColor: "rgb(139, 0, 81)",
//                 pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
//                 pointHoverBorderColor: "rgba(59, 89, 152, 1)",
//                 borderWidth: 3.5,
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: 'rgba(0,103,255,0.5)',
//                 data: current3
//               }
//             ]
//           };
    
//           var ctx = document.getElementById( "barchartCurrent" );
//           ctx.height = 250;
//           var LineGraph = new Chart(ctx, {
//             type: 'bar',
//             data: chartdata,
//             options: {
                
//                 plugins: {
//                   datalabels: {
//                     anchor: 'end',
//                     align: 'top',
//                     formatter: Math.round,
//                     font: {
//                       weight: 'bold',
//                       size: 16, 
//                       color: 'black'
//                     }
//                   }
//                 },
//               }
//           });
//         },
//         error : function(data) {
    
//         }
//       });
  
//   } )( jQuery );
( function ( $ ) {
//Chart.defaults.global.legend.display = false;
"use strict";

    // setup 
    const data = {
      labels: ['Current (kWh)'],
      datasets: [{
        label: 'Line 1',
        data: [10],
        backgroundColor: [
          'rgb(64,224,208)',
        ],
        borderColor: [
          'rgb(0,139,139)',
        ],
        borderWidth: 1
      },
      {label: 'Line 2',
        data: [9],
        backgroundColor: [
          'rgb(224, 64, 64)',
        ],
        borderColor: [
          'rgb(139, 0, 0)',
        ],
        borderWidth: 1
      },
    { label: 'Line 3',
        data: [8],
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
    var ctx = document.getElementById( "barchartCurrent" );
    ctx.height = 300;
    const myChart = new Chart(ctx,
      config
    );
  } )( jQuery );