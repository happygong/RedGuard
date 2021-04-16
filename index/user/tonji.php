<?php 
include("./info.php");
if(isset($_GET['edit'])){
    $id = daddslashes($_GET['id']);
  
   $row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$id}'")->fetch();
}
$longurl = base64_decode($row['url']);
$lenglongurl = strlen($longurl);
//echo $lenglongurl;
$nohttp = substr($longurl,7,$lenglongurl);

if(substr($nohttp,-1)=="/"){
    $count = strlen($nohttp)-1;
    $strre  = substr($nohttp,0,$count);
    $nohttp = $strre;
}
$cxurl = 'http://q.orangephoenix.net/index/user/st.php?sb&url=i5hg.om';
$linkcount=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url='{$nohttp}'")->fetchColumn();
$usertj=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$nohttp}' and TO_DAYS(date) = TO_DAYS(NOW())")->fetchColumn();
$userty=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$nohttp}' and TO_DAYS(NOW())-TO_DAYS(date) <= 1")->fetchColumn();
$useraw=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$nohttp}' and TO_DAYS(NOW())-TO_DAYS(date) <= 30")->fetchColumn();
$title='链接超级统计';

if($userrow['status']==2){
  header('Location: ./shopban.php'); }
?>
<!DOCTYPE html>
<html lang="cn">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
 <link rel="stylesheet" href="http://www.orangephoenix.net/lgcss/font-awesome.min.css">
  <!-- CSS Files -->
   <link rel="stylesheet" href="./assets/charts/layui/css/layui.css" media="all"/>
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>
  <?php 

include("./navbar.php");

?><!--startprint-->

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card-body">
                  <div id="typography">
                    <div class="card-title">
                      <h2>链接数据报表</h2>
                      <p>以下数据是链接：<?php echo $longurl; ?></p>
                     
                      <div class="text-right"> <a href="#"  onClick="my_print();" class="btn btn-xs btn-success">打印报表<div class="ripple-container"></div></a><a href="javascript:location.reload()"   class="btn btn-xs btn-danger">刷新页面<div class="ripple-container"></div></a>
                      <!--<a href="./banip.php?id=<?php //echo $id; ?>"  class="btn btn-xs btn-primary">IP黑名单<div class="ripple-container"></div></a>--></div>
                     
                      <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">总点击量</p>
                    <h3 class="card-title"><?php echo $linkcount; ?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
        
                      <a href="./pay.php">您的链接总点击量</a>
                    </div>
                    </div>
                  </div>
                </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">最近一月</p>
                    <h3 class="card-title"><?php echo $useraw; ?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> 链接最近一个月的点击量</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">昨日统计</p>
                    <h3 class="card-title"><?php echo $userty; ?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> 链接昨天的点击量</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">今日统计</p>
                    <h3 class="card-title"><?php echo $usertj; ?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> 链接今天的点击量
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if($userrow['vip']==0){ ?>
            <div class="text-center"><h2>精准分析，就用我缩！</h2><p>开通VIP即可享受多重数据可视化服务</br>涵盖点击趋势，设备一览，地域来源等等图形统计功能...</p><a href="../vip.php"   class="btn btn-xs btn-danger">立即开通<div class="ripple-container"></div></a></div></div>
            <?php }else{ ?>
                      </div>
                    <?php if($linkcount==0){ ?>
                        <div class="text-center"><h2>木有数据鸭！</h2><p>返回或刷新查看一下数据吧！</p><a href="javascript:history.go(-1)"   class="btn btn-xs btn-danger">返回上一页<div class="ripple-container"></div></a></div>
                   <?php }else{ ?>
            <div class="layui-fluid">
			<div class="layui-row layui-col-space10"> 
			<div class="layui-col-sm12 layui-col-md12">
        			<div class="layui-card">
        				<div class="layui-card-header">
        					<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        						<legend>最近七日点击率</legend>
        					</fieldset>
        				</div>
        				<!--<div class='text-center'><h3>工程师正在抓紧时间开发功能~</h3></div>-->
        				
        				<div class="layui-card-body">
        					<div id="container03" style="min-width:300px;height:300px"></div>
        				</div>
        			</div>
        		</div>
            <div class="layui-col-sm12 layui-col-md4">
        			<div class="layui-card">
        				<div class="layui-card-header">
        					<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        						<legend>环境统计</legend>
        					</fieldset>
        				</div>
        				<div class="layui-card-body">
        					<div id="container01" style="min-width:300px;height:300px"></div>
        				</div>
        			</div>
        		</div>
        
					<div class="layui-col-sm12 layui-col-md4">
        			<div class="layui-card">
        				<div class="layui-card-header">
        					<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        						<legend>设备统计</legend>
        					</fieldset>
        				</div>
        				<div class="layui-card-body">
        					<div id="container04" style="min-width:300px;height:300px"></div>
        				</div>
        			</div>
        		</div>
        		<div class="layui-col-sm12 layui-col-md4">
        			<div class="layui-card">
        				<div class="layui-card-header">
        					<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        						<legend>语言统计</legend>
        					</fieldset>
        				</div>
        				<div class="layui-card-body">
        					<div id="container05" style="min-width:300px;height:300px"></div>
        				</div>
        			</div>
        		</div>
        		<div class="layui-row layui-col-space10">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">全国数据热度一览(右击另存为可保存图片)</div>
					<div class="layui-card-body">
						<div id="echartsCountry" style="min-width: 300px; height:800px;"></div>
					</div>
				</div>
			</div>
		</div></div>
		</div><?php }} ?></div></div></div></div></div>
		<?php include_once('./footer.php'); ?>
            </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
<script src="./assets/js/plugins/sweetalert2.js"></script>
 <script type="text/javascript" src="../assets/LightYear/js/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->

  <!-- Chartist JS -->
  
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script type="text/javascript" src="./assets/charts/layui/layui.js"></script>
        <!-- highcharts JS -->
        <!--<script type="text/javascript" src="./assets/charts/highcharts/highchartsoffical.js"></script>-->
        <!--<script type="text/javascript" src="./assets/charts/highcharts/exporting.js"></script>-->
        <!--<script type="text/javascript" src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>-->
        <!-- 三个图表的JS文件 -->
        <!--<script type="text/javascript" src="./assets/charts/highcharts/highcharts.js"></script>-->
        <script type="text/javascript" src="./assets/geo/js/jquery.min.js"></script>
	<script type="text/javascript" src="./assets/geo/js/echarts.min.js" ></script>
	<script type="text/javascript">
		function my_print() {
			//直接调用浏览器打印功能
			bdhtml = window.document.body.innerHTML;
			//定义打印区域起始字符，根据这个截取网页局部内容     
			sprnstr = "<!--startprint-->"; //打印区域开始的标记
			eprnstr = "<!--endprint-->"; //打印区域结束的标记  
			prnhtml = bdhtml.substr(bdhtml.indexOf(sprnstr) + 17);
			prnhtml = prnhtml.substring(0, prnhtml.indexOf(eprnstr));
			//还原网页内容     
			window.document.body.innerHTML = prnhtml;
			//开始打印
			window.print();
			bdhtml.location.reload();
		}
	</script>
  <script>
      $().ready(function() {
          
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
   <script type="text/javascript" src="./assets/charts/highcharts/highchartsoffical.js"></script>
        <script type="text/javascript" src="./assets/charts/highcharts/exporting.js"></script>
        <script type="text/javascript" src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
        <!-- 三个图表的JS文件 -->
       <?php include('mychart.php'); ?>
       <?php include('./country.php'); ?>
</body>
<!--endprint-->
</html>