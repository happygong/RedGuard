<?php 
include("./info.php");
if(!isset($_GET['edit'])&&!isset($_GET['add'])){
    header('Location: ./link.php'); 
}
if(isset($_GET['edit'])){
    $id = daddslashes($_GET['id']);
  $row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$id}'")->fetch();
   
}
if(isset($_GET['add'])){
 
        $uid = daddslashes($userrow['id']);
        
        $gdid = daddslashes($_POST['gdid']);
        $info = daddslashes($_POST['info']);
        if ($userrow['vip']==0) {
            exit('{"code":-1,"msg":"该功能为VIP功能！请开通VIP后使用哦~"}');
        }
        if ($gdid=='') {
           exit('{"success":true,"code":-1,"msg":"链接ID不能为空！"}');
        }
        $row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$gdid}'")->fetch();
        if ($row) {
        $sql=$DB->exec("update `hgfh_sc` set `ad`='{$info}' where `id`='{$gdid}'");
          exit('{"code":1,"msg":"更改成功！"}');
    
        }else if (!$row){
                
               exit('{"code":-1,"msg":"错误！未查询到链接信息！"}');
                
            }
  }
   


$title='广告添加';

if($userrow['status']==2){
  header('Location: ./userban.php'); }
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
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/editormd.css" />
</head>
  <?php 

include("./navbar.php");

?>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card-body">
                  <div id="typography">
                    <div class="card-title">
                      <h2>广告添加</h2>
                      </br><p>如您是免费版短链套餐系统会自动添加系统默认广告</p>
                       <form  class="form-signin" id="form_huifu" method="POST">
                        <div class="form-group">
                          <input type="hidden" id="gdid" name="gdid" value="<?php echo $id;?>">
                          
                                            <label>请在这里输入您想自定义的文字或广告代码</label>
                                            
                                           <div class="form-group" id="test-editor">
                              <textarea type="text" name="adtype"><?php echo $row['ad']; ?></textarea>
                          </div>
                                        </div>
                      <div class="text-right">
                                        <button id="submit" type="button" class="btn btn-warning">提交广告</button>
                                    
                                      </div></form></div></div></div></div></div>
                                     
            </div>
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">广告说明</h4>
                </div>
                
                <div class="card-body ">
                  <h3>广告会被添加到哪里？</h3> 
                  <p>会在跳转页面或直链页面上方为您自定义的广告区域</p>
                  <h3>我为什么不能修改广告？</h3> 
                  <p>本站仅有VIP会员有资格添加广告！如无法添加请开通VIP</p> 
                   <h3>如何取消广告？</h3> 
                  <p>您只需将页面填写一个空格并提交成功就默认没有广告了！</p>
                  <p>注意：修改广告需要一定的HTML能力，如有特定要求请联系客服定制哦~</p>
                </div>
               
                </div>
              </div>
              <?php include_once("footer.php"); ?> 
            </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
 <script type="text/javascript" src="../assets/LightYear/js/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="./assets/js/plugins/sweetalert2.js"></script>
  <!--  Google Maps Plugin    -->
<script src="./assets/editormd.min.js"></script>
<script type="text/javascript">
    $(function() {
        var editor = editormd("test-editor", {
            width  : "100%",
            toolbarIcons : function() { 
              return editormd.toolbarModes['simple']; // full, simple, mini
            },
            height : 440,
            path   : "./assets/lib/",
            htmlDecode : true,
        });
    });
</script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  
  <script>
    $("#submit").click(function () {
      $.ajax({
          type: "POST",
          url: "./addad.php?add",
          dataType: "json",
          data:{
                    gdid: $("#gdid").val(),
                    info: $('.editormd-markdown-textarea').val()
               },
          success: function (data) {
              if (data.code==1) {
                  swal({
        title: "提交成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./link.php"
    })
              } else {
                  swal({
        title: "提交失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      }).then(function () {
        window.location.href = "./link.php"
    })
              }
          }
          
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
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
</body>

</html>