<?php 
$title='开发工具';
include("./info.php");
include("./header.php");

?>
<?php 

include("./navbar.php");

?>
<div class="content">
        <div class="container-fluid">
          <?php 
//$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();

if($userrow['zt']== 2){
  
  
  echo " <div class=\"alert alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 警告 - </b> 当前账户处于禁封状态，您可能因为涉及盗版无法获取程序更新！</span>
                  </div>";
  
  
  }

?>
          <?php 
//$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();

if($userrow['phone']== NULL){
  
  
  echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您购买产品的凭据！</span>
                  </div>";
  
  
  }else if($userrow['qq']== NULL){

echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您购买产品的凭据！</span>
                  </div>";


}
?>
 <div class="content">
    <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">用户状态</p>
                    <h3 class="card-title"><?php if($userrow['vip']==1){echo 'VIP用户';}else{echo '普通用户';}?></h3>
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
                    <p class="card-category">调用统计</p>
                    <h3 class="card-title"><?php echo round($rowgxmall,2);?>次调用</h3>
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
                    <p class="card-category">剩余调用次数</p>
                    <h3 class="card-title"><?php if($userrow['vip']!==1){echo $userrow['api'];}else{echo '无限';}?>次</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> 感谢您的支持
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">我的TOKEN</h4>
                </div>
                
                <div class="card-body ">
                <p>当前token:</p> <?php if($userrow['token']==NULL){echo '未生成TOKEN！请点击按钮生成~';}else{echo  $userrow['token'];}?>
                 
                </div>
                <div class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                      <button type="submit" id="tokenupdate" class="btn btn-fill btn-rose">生成/更新TOKEN</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
   <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">调用说明</h4>
                </div>
                
                <div class="card-body ">
                  <h3>API网址:</h3> 
                  <p>http://q.orangephoenix.net/ajax.php</p>
                  <h3>参数说明:</h3> 
                  <p>调用方法：GET/POST</p> 
                   <p>longurl:您的长链接</p> 
                  <p>token:您的token</p> 
                  <p>type:短链类型，直接输入不带标点即可！</p> 
                   <p>lx:短链跳转类型，1表跳转，2表直链</p> 
                  <h3>示例调用:</h3> 
                  <p>http://q.orangephoenix.net/ajax.php?token=<?php if($userrow['token']==NULL){echo '未生成TOKEN！请先生成~';}else{echo  $userrow['token'];}?></p> 
                </div>
                <div class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div></div>
          
            <?php 

include("./footer.php");

?>
   <!--   Core JS Files   -->
   <script type="text/javascript" src="../assets/LightYear/js/jquery.min.js"></script>
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
  <script src="./assets/js/plugins/jquery-jvectormap.js"></script>
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

  <script>
    $(document).ready(function() {
       $("#tokenupdate").click(function () {
            $.ajax({
                type: "POST",
                url: "./tool.php?act=tokenupdate",
                dataType: "json",
                data: {
                  
                   phone: $("#phone").val()
                },
                success: function (data) {
              
                    if (data.code==1) {
                      swal({
        title: "生成成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./tool.php"
    })
                     
                    } else {
                      swal({
        title: "生成失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      })
                      
                    }
                },
                error: function (jqXHR) {
                 
                    $("#result").modal();
          					$("#msg").html(jqXHR+"出现了一些错误。");
                }
            })
      
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