<?php 
$title='仪表板';
include('./info.php');
include("./header.php");
if($userrow['yd'] == 0){
     $sql=$DB->exec("update `hgfh_user` set `yd`='1' where `id`='{$userrow['id']}'");
}
$x=$DB->query("SELECT * FROM `hgfh_gg` WHERE display=1");
?>
<?php 

include("./navbar.php");

?>


<div class="content">
        <div class="container-fluid">
          <?php 

if($userrow['phone']== NULL){
  
  
  echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您找技术支持凭据！</span>
                  </div>";
  
  
  }else if($userrow['qq']== NULL){

echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您找技术支持的凭据！</span>
                  </div>";


}
?>
           <?php 

if($userrow['zt']== 2){
  
  
  echo " <div class=\"alert alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 警告 - </b> 当前账户处于禁封状态，请联系管理员！</span>
                  </div>";
  
  
  }

?>
          <?php echo "今天是 " . date("Y-m-d") . "号，"; ?>
         <SCRIPT language=javaScript>
now = new Date(),hour = now.getHours()
document.write("<font color=black>")
document.write("<blink>")
if(hour < 6){document.write("凌晨好，早睡早起身体好！")}
else if (hour < 9){document.write("嗨，早上好！吃早餐了吗？")}
else if (hour < 12){document.write("上午好，祝您身体健康！")}
else if (hour < 14){document.write("中午好，吃完午饭啦吧！")}
else if (hour < 17){document.write("下午好，希望您度过愉快的一天！")}
else if (hour < 19){document.write("傍晚好！吃完晚饭不如去散散步吧？")}
else if (hour < 22){document.write("晚上好，今天您过得还开心吗？")}
else {document.write("温馨提醒：后半夜了，请注意休息，身体是革命的本钱哦~")}
           document.write("</font>")
</SCRIPT>
          <div class="row" data-target="el-1">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">您的余额</p>
                    <h3 class="card-title">¥<?php echo $userrow['money'];?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
        
                      <a href="./pay.php">充值有折扣哦...</a>
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
                    <p class="card-category">您已绑定生成</p>
                    <h3 class="card-title"><?php echo round($userlink,2);?>个链接</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> <a href="./agentno.php">加入代理优惠多多...</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">总共点击统计</p>
                    <h3 class="card-title"><?php if($usershu1 == NULL){
                        echo '0';
                    }else echo $usershu1;?>次</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> <a href="./link.php">查看统计</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">当前账户</p>
                    <h3 class="card-title"><?php echo $userrow['user'];?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> 感谢您的支持
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <p>如果未显示统计请在下面生成链接即会自动绑定统计，若未能绑定可能链接已被其他人绑定，请工单投诉！</p>  
              <div class="col-md-14" data-target="el-2">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">开始防红</h4>
                   
                  </div>
                  <form class="banner-form" id="form_set">
                  <div class="card-body">
                    <div class="row">
          <div class="col-md-5">
                           <p>立即缩短</p>  
                      <input type="text" class="form-control" name="longurl" placeholder="请在这里输入链接...">
                    </div>
        
                  <p>防红类型</p>  
                  <div class="col-md-2">
                                        <select class="form-control border-input" name="lx">
                                            <option value="1" "selected">跳转防红</option>
                                            <option value="2">直链防红</option>
                                            <option value="3">VIP跳转防红</option>
                                            <option value="4">VIP直链防红</option>
                                        </select>
                  </div>
                  <p>短链类型</p>  
                  <div class="col-md-2">
                                        <select class="form-control border-input" name="type">
                                            <option value="suoim">suo.im</option>
                                            <option value="mrwso">mrw.so</option>
                                            <option value="m6zcn">m6z.cn</option>
                                            <!--<option value="txdwz">url.cn</option>
                                            <option value="3">t.cn(不稳定)</option>
                                            <option value="3">dwz.cn(不稳定)</option>-->
                                            
                                        </select>
                     
                    <button id="submit" type="button" class="btn btn-success">
                    <span class="btn-label">
                      <i class="material-icons">check</i>
                    </span>
                    立即生成
                  </button>
                  </div></div></div>  </form></div></div>
                  
        <div class="row" data-target="el-3">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">公告看板</h4>
                   
                  </div>
                  <div class="card-body">
                  <?php
                                          //header("Content-type: text/html; charset=utf-8");   
                                          echo htmlspecialchars_decode($conf['gg']);
                                        ?>
                   </div>
                </div>
         </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">程序公告</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>标题</th>
                          <th>概述</th>
                          <th>发布时间</th>
                          <th class="text-right">操作</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                      $rs=$DB->query("SELECT * FROM `hgfh_gg` WHERE 1 order by id desc limit 4");
                        $i=1;
                        while($res = $rs->fetch())
                        {  
                    ?>
                        <tr>
                          <td class="text-center"><?php echo $i;?></td>
                          <td><?php echo $res['title'];?></td>
                          <td>
                         
                              <small class="text-muted clear text-ellipsis" 
                               style="
                               max-width: 110px;
                                display: block;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;"><?php echo $res['content'];?></small>
                            </td>
                          <td><?php echo $res['date'];?></td>
                          
                          <td class="td-actions text-right shggck" types="<?php echo $res['name'];?>" manes="<?php echo $res['content'];?>">
                             <a href="javascript:;" title="点击查看完整内容" class="btn btn-info">
                              查看详情
                            </a>
                            
                            
                          </td>
                        </tr>
                        <?php  $i=$i+1; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              
         
        </div>
     </div>
  </div>
  <div aria-hidden="true" class="modal modal-secondary fade" id="result" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-xs">
    
   <div class="modal-content">
          <input type="hidden" id="id" value="">
        
          <div class="modal-header">
            
              <h3 class="modal-title">
                  公告详情
              </h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-inner">
              <div class="form-group form-group-label">
                  <div class="card-body" style="padding: 10px 1.5rem 0px;">
                      <div class="lead text-muted" id="msg"> </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal" type="button">
                  知道了
              </button>
          </div>
      </div>
  </div>
</div>
<div aria-hidden="true" class="modal modal-secondary fade" id="autodisplay" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-xs">
    
   <div class="modal-content">
          <input type="hidden" id="id" value="">
        
          <div class="modal-header">
            
              <h3 class="modal-title">
                  <div class="h3" id="title"> </div>
              </h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-inner">
              <div class="form-group form-group-label">
                  <div class="card-body" style="padding: 10px 1.5rem 0px;">
                      <div class="lead text-muted" id="msg1"> </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal" type="button">
                  知道了
              </button>
          </div>
      </div>
  </div>
</div>
  <?php 

include("./footer.php");

?>
           
  <!--   Core JS Files   -->
  
   <script type="text/javascript" src="./assets/js/core/jquery.min.js"></script>
   <!--Latest jQuery-->


<!--iGuider Core-->
<link rel="stylesheet" href="./assets/yd/css/iGuider.css">
<script src="./assets/yd/js/jquery.iGuider.js"></script>

<!--iGuider Theme-->
<link rel="stylesheet" href="./assets/yd/themes/material/iGuider-theme-material.css">
<script src="./assets/yd/themes/material/iGuider-theme-material.js"></script>
<?php if($userrow['yd']==0){ 
echo '<script src="./yd.js"></script>';}else{echo'<script src="./yded.js"></script>';} ?>

  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="./assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="./assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="./assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="./assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="./assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="./assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="./assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="./assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
 
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="../assets/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="./assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src=""></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
   <script src="./fhsc.js"></script>   
  <script>
    
   
    $(document).ready(function() {
      <?php while($res = $x->fetch()){ ?>
        var msg = $(this).attr('manes');
    $("#autodisplay").modal();
    $("#title").html("<?php echo $res['title'] ?>");
    $("#msg1").html("<?php echo $res['content'] ?>");
      <?php } ?>
 $(".shggck").click(function(){
    var msg = $(this).attr('manes');
    $("#result").modal();
    $("#msg").html(msg);

})
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
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      md.initVectorMap();

    });
  </script>