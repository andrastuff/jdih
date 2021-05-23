	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
<script>
	function loadChartOne(data, inverted, polar){
				$.ajax({
					data: data,
					url: ServeUrl+"report/api_chart_perundangan",
                    crossDomain: false,
                    method: 'GET',
					beforeSend: function(){ 
							$('#chart-one').html('');
							},
                    complete: function(response){ 			
                        if(response.status == 200){
							renderOne(response.responseJSON, inverted, polar);
							
							 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	}
	
	var data 	= '';
	loadChartOne(data, false, false);
	
	function renderOne(data, inverted, polar){

		var chartRt = Highcharts.chart('chart-one', {

			title: {
				text: 'Chart Data Perundangan'
			},

			subtitle: {
				text: data.breadcrumb
			},
			
			tooltip: {
				pointFormat: 'Jumlah Data Perundangan: <b>{point.y:.0f}</b>'
			},
			
			chart: {
					inverted: inverted,
					polar: polar
			},
			
			yAxis: {
				min: 0,
				title: {
					text: 'Total Jumlah '
				}
			},
			
			xAxis: {
				categories: data.x
			},
			series: [{
				type: 'column',
				colorByPoint: true,
				data: data.series,
				cursor: 'pointer',
				showInLegend: false,
				dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.0f}',
						y: 0, 
						style: {
								fontSize: '10px',
								fontFamily: 'Verdana, sans-serif'
						}
				},
			}]

		});
	$(".highcharts-credits").remove();
	}	
	
</script>