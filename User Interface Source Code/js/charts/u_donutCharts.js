(function ($) {
    "use strict";   
       var ctx = document.getElementById("donutChart1");
       var donut1= new Chart(ctx, {
           type: 'doughnut',
           data: {
               labels: ["Productive", "Unproductive"],
               datasets: [{
                   label: 'Machine Utilization',
                   data: [80, 20],
                   backgroundColor: [
                    '#40BF77',
                    '#E54624',
                      
                   ],
                   borderColor: [
                       '#40BF77',
                       '#E54624',
                      
                   ],
                   borderWidth: 1
               }]
           },
           options: {
               scales: {
                   xAxes: [{
                       ticks: {
                           autoSkip: false,
                           maxRotation: 0
                       },
                       ticks: {
                         fontColor: "#fff", // this here
                       }
                   }],
                   yAxes: [{
                       ticks: {
                           autoSkip: false,
                           maxRotation: 0
                       },
                       ticks: {
                         fontColor: "#fff", // this here
                       }
                   }]
               }
           }
       });    
       var ctx = document.getElementById("donutChart2");
       var donut2= new Chart(ctx, {
           type: 'doughnut',
           data: {
               labels: ["Productive", "Unproductive"],
               datasets: [{
                   label: 'Machine Utilization',
                   data: [75,25],
                   backgroundColor: [
                    '#40BF77',
                    '#E54624',              
                   ],
                   borderColor: [
                    '#40BF77',
                    '#E54624',
                   ],
                   borderWidth: 1
               }]
           },
           options: {
               scales: {
                   xAxes: [{
                       ticks: {
                           autoSkip: false,
                           maxRotation: 0
                       },
                       ticks: {
                         fontColor: "#fff", // this here
                       }
                   }],
                   yAxes: [{
                       ticks: {
                           autoSkip: false,
                           maxRotation: 0
                       },
                       ticks: {
                         fontColor: "#fff", // this here
                       }
                   }]
               }
           }
       });    
})(jQuery); 