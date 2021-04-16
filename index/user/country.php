<?php 
$mycurl = 'http://q.orangephoenix.net/index/user/st.php?geo&url='.$nohttp;

$mycinfo = get_curl($mycurl);
//echo $mycinfo;
?>
<script>
echartsCountry ();
		
		//全国
		function echartsCountry () {
			let option = {
				visualMap: {
					min: 0,
		          	max: 500,
		          	right: '3%',
		          	text: ['High', 'Low'],
		          	realtime: false,
		          	calculable: true,
		          	inRange: {
		            	color: ['lightskyblue', 'yellow', 'orangered']
		          	}
		        },
		        tooltip: {
		            trigger: 'item',
		            formatter: '{b}<br/>{c} (次点击)'
		        },
		        series: [{
		        	type: 'map',
		        	//这里的“map”值需要与下面的“echarts.registerMap”值对应
		          	map: 'zhongguo',
		          	zoom: 1.28,
		          	roam: false,
		          	label: {
		            	normal: {
		              		show: true
		            	},
			            emphasis: {
			              	show: true
			            }
		          	},
		          	layoutSize: '80%',
		          	itemStyle: {
			            normal: {
			            	areaColor: "#b6e0e5",//改变地图里面的颜色
			              	color:"#FFF",
			              	label: {
			              		show: true
			              	}
			            },
		          	},
		          	//需要在地图上显示的数据（案例只写省会，其它城市按格式复制粘贴就好）
		          	data: <?php echo $mycinfo;?>,
		          	nameMap: {}
		        }]
			};
			//引入你需要绘画的地图json
			$.get('./assets/geo/json/zhongguo.json', function(geoJson) {
				//这里的“hubei”需要与上面的“map”值对应
				echarts.registerMap('zhongguo', geoJson);
				let myEcharts = echarts.init(document.getElementById("echartsCountry"));
				myEcharts.setOption(option);
				window.addEventListener('resize', () => {
					myEcharts.resize();
				});
			});
		};
		</script>