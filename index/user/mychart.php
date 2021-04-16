<?php 
$lenglongurl = strlen($longurl);
//echo $lenglongurl;
$nohttp = substr($longurl,7,$lenglongurl);

if(substr($nohttp,-1)=="/"){
    $count = strlen($nohttp)-1;
    $strre  = substr($nohttp,0,$count);
    $nohttp = $strre;
}
//echo $strre;
$mylongurl = 'http://q.orangephoenix.net/index/user/st.php?sb&url='.$nohttp;
$mysystem = 'http://q.orangephoenix.net/index/user/st.php?system&url='.$nohttp;
$mylan = 'http://q.orangephoenix.net/index/user/st.php?lan&url='.$nohttp;
$mysevc = 'http://q.orangephoenix.net/index/user/st.php?seven&url='.$nohttp;
?>
<script>
$(function(){
	container01();//环境柱状统计
	container04();//设备柱状统计
	container05();//语言柱状统计
	container02();//饼状图
	container03();//混合图
})

function container01(){
	var ydataYwc = new Array(); //数值
	var xtext = new Array(); //X轴TEXT
	$.ajax({
		type:'get',
		//url :'http://q.orangephoenix.net/index/user/assets/charts/highcharts/highcharts.json',
		url: '<?php echo $mylongurl; ?>', //请求数据的地址
		success: function(data) {
			var json = data;
			for(var key in json.list){
				ydataYwc.push(parseFloat(json.list[key].sum)); //数值
				xtext.push(json.list[key].type); //给X轴TEXT赋值
			}
			Highcharts.chart('container01',{
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				chart: {
					backgroundColor: 'rgba(0,0,0,0)',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'column'
				},
				legend: {
					enabled: false,//影藏图例
				},
				colors:['#3EE80B','#FF962B','#00557f','#aaffff','#AB4CF1','#55ffff','#0055ff','#0000ff','#ff0000','#55ff7f'],
			    title: {
			        text: ''
			    },
			    subtitle: {
			        text: ''
			    },
			    xAxis: {
			        categories: xtext,
			        crosshair: true,
			        labels: {
						style: {
							color: '#666',
							fontWeight:500
						}
					},
			    },
			    yAxis: {
			    	allowDecimals:false,
			        min: 0,
			        title: {
			            text: '条',
			            style: {
							color: '#666',
						}
			        },
			        labels: {
						style: {
							color: '#666',
						}
					},
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
			        '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
			        footerFormat: '</table>',
			    },
			    plotOptions: {
			        column: {
			            borderWidth: 0,
			            colorByPoint:true,
			        }
			    },
			    series: [{
			        name: '',
			        data: ydataYwc
			    }]
			});
			//统计图表结束
		}
	});
	
};

function container04(){//设备统计
	var ydataYwc = new Array(); //数值
	var xtext = new Array(); //X轴TEXT
	$.ajax({
		type:'get',
		//url :'http://q.orangephoenix.net/index/user/assets/charts/highcharts/highcharts.json',
		url: '<?php echo $mysystem; ?>', //请求数据的地址
		success: function(data) {
			var json = data;
			for(var key in json.list){
				ydataYwc.push(parseFloat(json.list[key].sum)); //数值
				xtext.push(json.list[key].type); //给X轴TEXT赋值
			}
			Highcharts.chart('container04',{
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				chart: {
					backgroundColor: 'rgba(0,0,0,0)',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'column'
				},
				legend: {
					enabled: false,//影藏图例
				},
				colors:['#3EE80B','#FF962B','#00557f','#aaffff','#AB4CF1','#55ffff','#0055ff','#0000ff','#ff0000','#55ff7f'],
			    title: {
			        text: ''
			    },
			    subtitle: {
			        text: ''
			    },
			    xAxis: {
			        categories: xtext,
			        crosshair: true,
			        labels: {
						style: {
							color: '#666',
							fontWeight:500
						}
					},
			    },
			    yAxis: {
			    	allowDecimals:false,
			        min: 0,
			        title: {
			            text: '条',
			            style: {
							color: '#666',
						}
			        },
			        labels: {
						style: {
							color: '#666',
						}
					},
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
			        '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
			        footerFormat: '</table>',
			    },
			    plotOptions: {
			        column: {
			            borderWidth: 0,
			            colorByPoint:true,
			        }
			    },
			    series: [{
			        name: '',
			        data: ydataYwc
			    }]
			});
			//统计图表结束
		}
	});
	
};
function container05(){//语言统计
	var ydataYwc = new Array(); //数值
	var xtext = new Array(); //X轴TEXT
	$.ajax({
		type:'get',
		//url :'http://q.orangephoenix.net/index/user/assets/charts/highcharts/highcharts.json',
		url: '<?php echo $mylan; ?>', //请求数据的地址
		success: function(data) {
			var json = data;
			for(var key in json.list){
				ydataYwc.push(parseFloat(json.list[key].sum)); //数值
				xtext.push(json.list[key].type); //给X轴TEXT赋值
			}
			Highcharts.chart('container05',{
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				chart: {
					backgroundColor: 'rgba(0,0,0,0)',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'column'
				},
				legend: {
					enabled: false,//影藏图例
				},
				colors:['#3EE80B','#FF962B','#00557f','#aaffff','#AB4CF1','#55ffff','#0055ff','#0000ff','#ff0000','#55ff7f'],
			    title: {
			        text: ''
			    },
			    subtitle: {
			        text: ''
			    },
			    xAxis: {
			        categories: xtext,
			        crosshair: true,
			        labels: {
						style: {
							color: '#666',
							fontWeight:500
						}
					},
			    },
			    yAxis: {
			    	allowDecimals:false,
			        min: 0,
			        title: {
			            text: '条',
			            style: {
							color: '#666',
						}
			        },
			        labels: {
						style: {
							color: '#666',
						}
					},
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
			        '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
			        footerFormat: '</table>',
			    },
			    plotOptions: {
			        column: {
			            borderWidth: 0,
			            colorByPoint:true,
			        }
			    },
			    series: [{
			        name: '',
			        data: ydataYwc
			    }]
			});
			//统计图表结束
		}
	});
	
};

//饼状图
function container02(){
	$.ajax({
		type:'get',
		url:'http://q.orangephoenix.net/index/user/st.php?sb&url=i5hg.om', //请求数据的地址
		success:function(data){
			var dataVice = data.list;
			var datas = new Array();
			for(var i=0;i<dataVice.length;i++){
				var obj = new Object();
				obj.name = dataVice[i].type;
				obj.y=dataVice[i].sum;
				datas.push(obj);
			}
			$('#container02').highcharts().series[0].setData(datas);
		}
	});
	
	$('#container02').highcharts({
		credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
		legend:{
			itemStyle:{
				color:'#797979',
			}
		},
		chart: {
			backgroundColor: 'rgba(0,0,0,0)',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		colors:['#19ABFF','#FFC720','#87BA2F','#F36270','#8085E9','#7CB5EC','#4CB050'],
	    title: {
	        text: '',
	        style: {
	        	"fontSize": "14px",
	        	color: '#797979',
	        }
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.y:1f} 家</b>'
	    },
	    plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
	    series: [{
	        name: '数量',
	        showInLegend: true,
	        colorByPoint: true,
	    }]
		        
	});
};


function container03(){
	var yearTs=$("#yearStatistics").val();
	var ydataYwc = new Array(); //已完成
	var ydataJxz = new Array(); //进行中
	var ydataWwc = new Array(); //未完成
	var xtext = new Array(); //X轴TEXT
	$.ajax({
		type:'get',
		url: '<?php echo $mysevc; ?>', //请求数据的地址
		success: function(data) {
			var json = data;
			for(var key in json.list){
				ydataYwc.push(parseFloat(json.list[key].sum)); //已完成
				ydataJxz.push(parseFloat(json.list[key].sum2)); //进行中
				ydataWwc.push(parseFloat(json.list[key].sum3)); //未完成
				xtext.push(json.list[key].monthText); //给X轴TEXT赋值
			}
			Highcharts.chart('container03', {
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				chart: {
					backgroundColor: 'rgba(0,0,0,0)',
					zoomType: 'xy'
				},
				title: {
					text: '7日点击量',
					style: {
						"fontSize": "14px",
						color: '#797979',
					}
				},
				subtitle: {
					text: '(横轴单位:相隔天数,纵轴单位:点击次数)',
					color: '#797979',
				},
				xAxis: [{
					categories:xtext,
					crosshair: true
				}],
				yAxis: [{
					allowDecimals:false,
					labels: {
						format: '{value}条',
						style: {
							color: '#00A2FE',
						}
					},
					title: {
						text: '点击量',
						style: {
							color: '#00A2FE',
						}
					},
					opposite: true
				}, {
					allowDecimals:false,
					gridLineWidth: 0,
					title: {
						text: '点击量',
						style: {
							color: '#7BB31A',
						}
					},
					labels: {
						format: '{value} 条',
						style: {
							color: '#7BB31A',
						}
					}
				}, {
					allowDecimals:false,
					gridLineWidth: 0,
					title: {
						text: '点击量',
						style: {
							color: '#F36270',
						}
					},
					labels: {
						format: '{value} 条',
						style: {
							color: '#F36270',
						}
					},
					opposite: true
				}],
				tooltip: {
					shared: true
				},
				legend: {
					layout: 'vertical',
					align: 'left',
					x: 80,
					verticalAlign: 'top',
					y: 55,
					floating: true,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
				},
				series: [{
					color: '#7BB31A',
					name: '柱形点击统计',
					type: 'column',
					yAxis: 1,
					data: ydataYwc,
					tooltip: {
						valueSuffix: '条'
					}
				}, {
					color: '#F36270',
					name: '对比点击统计',
					type: 'spline',
					yAxis: 2,
					data: ydataWwc,
					marker: {
						enabled: false
					},
					dashStyle: 'shortdot',
					tooltip: {
						valueSuffix: '条'
					}
				}, {
					color: '#00A2FE',
					name: '线形点击统计',
					type: 'spline',
					data: ydataJxz,
					tooltip: {
						valueSuffix: '条'
						}
				}]
			});
			//图表结束
		}
	});
};
</script>