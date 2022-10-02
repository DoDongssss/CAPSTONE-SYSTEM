(function($) {
    /* "use strict" */

 var dzChartlist = function(){
	
		var chartTimeline = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 200,
				stacked: true,
				toolbar: {
					show: false
				},
				
				sparkline: {
					//enabled: true
				},
				offsetX: 0,
			},
			series: [
				 {
					name: "Total Students",
					data: [300, 450, 600, 600, 400, 450, 410]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "30%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: ['#f0f0f0', '#f0f0f0', '#f0f0f0', '#f0f0f0','#f0f0f0','#f0f0f0','#f0f0f0','#f0f0f0'],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['#43DC80'],
			grid: {
				show: false,
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  bottom:0,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
			  labels: {
			   style: {
				  colors: '#787878',
				  fontSize: '14px',
				  fontFamily: 'poppins',
				  fontWeight: 400,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			yaxis: {
			show:false,	
			labels: {
			   style: {
				  colors: '#3e4954',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0);
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 200,
					},
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	
	var widgetChart1 = function(){
		var options = {
          series: [{
            name: "Monthly Students",
            data: [30, 40, 30, 50, 40, 50, 80, 10, 20, 40, 90, 21]
        }],
          chart: {
          height: 200,
          type: 'line',
          zoom: {
            enabled: true
          },
		  toolbar:{
			show:false  
		  }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
		colors:['#43DC80'],
        title: {
          text: undefined,
          align: 'left'
        },
        grid: {
			strokeDashArray: 5,
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0
          },
        },
		yaxis:{
			show:false,
		},
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		  axisBorder: {
			show:false
		  },
		  axisTicks:{
			show:false  
		  },
		  labels: {
			  style: {
				  colors: '#828690',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				}
			}
        }
        };

        var chart = new ApexCharts(document.querySelector("#widgetChart1"), options);
        chart.render();
	}
	
	var radialChart = function(){
		 var options = {
          series: [60],
          chart: {
          height: 200,
          type: 'radialBar',
          toolbar: {
            show: false
          }
        },
        plotOptions: {
          radialBar: {
             /* hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
              imageOffsetX: 0,
              imageOffsetY: 0,
              position: 'front',
            }, */
			hollow: {
              margin: 20,
              size: '65%',
              background: '#fff',
              image: undefined,
              imageOffsetX: 0,
              imageOffsetY: 0,
              position: 'front',
              dropShadow: {
                enabled: true,
                top: 3,
                left: 0,
                blur: 10,
                opacity: 0.1
              }
            },
            track: {
              background: '#F8F8F8',
              strokeWidth: '100%',
              margin: 0, // margin is in pixels
            },
        
            dataLabels: {
              show: true,
              value: {
				offsetY:-7,
                color: '#111',
                fontSize: '20px',
                show: true,
              }
            }
          }
        },
        fill: {
            colors: ['#43DC80'],
        },
        stroke: {
        },
        labels: [''],
        };

        var chart = new ApexCharts(document.querySelector("#radialChart"), options);
        chart.render();
	}

	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
					chartTimeline();
					widgetChart1();
					radialChart();
			},
			
			resize:function(){
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 100); 
		
	});

	jQuery(window).on('resize',function(){	
	
	});     

})(jQuery);

var searchTimein, searchTimeout;

$('#searchTimein').keyup(function(){
	searchTimein = $('#searchTimein').val();
	getValues();
});
$('#searchTimeout').keyup(function(){
	searchTimeout = $('#searchTimeout').val();
	getValues();
});

function getValues(){
	$.ajax({
		url: "dashboard-process.php?studentValue='1'",
		method: "GET",
		dataType: 'html',
		success: function(studentValue){
			$('#student-value').html(studentValue);
		}
	});
	$.ajax({
		url: "dashboard-process.php?teacherValue='1'",
		method: "GET",
		dataType: 'html',
		success: function(teacherValue){
			$('#teacher-value').html(teacherValue);
		}
	});
	$.ajax({
		url: "dashboard-process.php?timeinValue='1'",
		method: "GET",
		dataType: 'html',
		success: function(timeinValue){
			$('#time-in-value').html(timeinValue);
		}
	});
	$.ajax({
		url: "dashboard-process.php?timeoutValue='1'",
		method: "GET",
		dataType: 'html',
		success: function(timeoutValue){
			$('#time-out-value').html(timeoutValue);
		}
	});

	if(searchTimein){
		$.ajax({
			url: "dashboard-process.php",
			method: "POST",
			dataType: 'html',
			data: {
				searchTimein: 1,
				searchTimeinVal: searchtimein
			},
			success: function(getTimeIn){
				$('#student-timein').html(getTimeIn);
			}
		})
	}
	else{
		$.ajax({
			url: "dashboard-process.php?getTimeIn='1'",
			method: "GET",
			dataType: 'html',
			success: function(getTimeIn){
				$('#student-timein').html(getTimeIn);
			}
		})
	}

	if(searchTimeout){
		$.ajax({
			url: "dashboard-process.php",
			method: "POST",
			dataType: 'html',
			data: {
				searchTimeout: 1,
				searchTimeoutVal: searchTimeout
			},
			success: function(getTimeOut){
				$('#student-timeout').html(getTimeOut);
			}
		})
	}
	else{
		$.ajax({
			url: "dashboard-process.php?getTimeOut='1'",
			method: "GET",
			dataType: 'html',
			success: function(getTimeOut){
				$('#student-timeout').html(getTimeOut);
			}
		})
	}
}

getValues();
setInterval(()=>{getValues()}, 1000);


