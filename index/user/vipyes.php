<?php 
include("./info.php");

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
   


$title='我的会员';

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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
           <h3 class="title">欢迎您，亲爱的VIP会员！</h3>
          <p class="category">尊享VIP授权体验~</br>短链特色功能您都拥有！</p></br></br>
          <div class="row">
  <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo"> <?php if($userrow['qq']== NULL){ ?>
             <img src="../hgassets/img/faces/marc.jpg">
            <?php }else{ ?>
            <img src="http://q2.qlogo.cn/headimg_dl?bs=qq&amp;dst_uin=<?php echo $userrow['qq'];?>&amp;src_uin=<?php echo $userrow['qq'];?>&amp;fid=<?php echo $userrow['qq'];?>&amp;spec=100&amp;url_enc=0&amp;referer=bu_interface&amp;term_type=PC" />
          <?php } ?></a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php
                    //$usexx=$DB->query("SELECT * FROM `auth_viplb` WHERE uid='{$userrow['id']}' limit 1")->fetch();
                     //$tcxx=$DB->query("SELECT * FROM `auth_viptc` WHERE id='{$usexx['tcid']}' limit 1")->fetch();
                    $dqsj=$usexx['time']+$usexx['date'];
                                       $sysj=$dqsj-date("Ymd");
                           echo $tcxx['name'];?>会员</h6>
                  <h4 class="card-title"><?php echo $userrow['user'];?></h4>
                  <p class="card-description">
                    特色权限：</br>
                   旗下授权程序均可使用<?php echo $tcxx['date']; ?>天</br>买断程序打<?php echo $tcxx['discount']; ?>折哦~</br>（开源程序<?php echo '<td>'.($tcxx['kysf']==1?'<font color=green>可以</font>':'<font color=red>禁止</font>').'</td>'; ?>下载）
                      </br>支持<?php echo $tcxx['kywz']; ?>个网址授权
                  </p>
             <h4 class="card-title">剩余可用时间：<?php echo $sysj; ?>天</h4>
                  <a href="./gd.php" class="btn btn-rose btn-round">续费/更改会员</a>
                </div>

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