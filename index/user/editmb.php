<?php 
include("./info.php");
if(isset($_GET['edit'])){
    $id = daddslashes($_GET['id']);
  
   $row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$id}'")->fetch();
}
if(isset($_GET['gx'])){
 
        $uid = daddslashes($userrow['id']);
         $id = daddslashes($_GET['id']);
        $gdid = daddslashes($_GET['id']);
        $info = daddslashes($_GET['info']);
         $row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$gdid}'")->fetch();
  if ($userrow['vip']==0) {
            $a=1;
        }else{
        if ($gdid=='') {
           exit('{"success":true,"code":-1,"msg":"模板ID不能为空！"}');
        }
        //$row=$DB->query("SELECT * FROM `hgfh_sc` WHERE id='{$gdid}'")->fetch();
        if ($row) {
        $sql=$DB->exec("update `hgfh_sc` set `mb`='{$info}' where `id`='{$gdid}'");
          
          header('Location: ./editmb.php?edit&id='.$gdid.''); 
          //$a=1;
    
        }else if (!$row){
                
               exit('{"code":-1,"msg":"错误！未查询到链接信息！"}');
                
            }
  }
   
}


$title='编辑链接模板';
$longurl = $row['url'];

// if($userrow['status']==2){
//   header('Location: ./shopban.php'); }
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
</head>
  <?php 

include("./navbar.php");

?>

  <div class="content"><?php if($a==1){
  
  
  echo " <div class=\"alert alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 更改模板需要VIP功能！请先开通VIP~</span>
                  </div>";
  
  
  }?>
        <div class="container-fluid">
            <h2>选择您的链接模板</h2>
            <h5>当前链接为： <?php echo base64_decode($longurl);?></h5>
          <div class="row">
            <div class="card-body">
                  <div id="typography">
                    <div class="card-title">
                      <!--<h2>选择您的链接模板</h2>-->
                       <form  class="form-signin" id="form_huifu" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                <div class="card card-product" data-count="4">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      <img class="img" src="assets/img/card-2.jpg">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="查看详细演示">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="编辑链接广告">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="选择模板">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">默认模板</a>
                    </h4>
                    <div class="card-description">
                      默认蓝色logo背景模板可自动跳转到浏览器！
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                        <?php if($row["mb"]==0){?>
                        <a href="#" class="btn btn-primary">正在使用</a>
                        <?php }else{ ?>
                       <a href="editmb.php?gx&id=<?=$id?>&info=0" class="btn btn-warning">选择模板</a>
                       <?php } ?>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">business</i> 无需VIP即可使用</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-product" data-count="4">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      <img class="img" src="assets/img/card-2.jpg">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="查看详细演示">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="编辑链接广告">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="选择模板">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">灰色跳转模板</a>
                    </h4>
                    <div class="card-description">
                      可自动跳转到您的页面并访问QQ浏览器，带非常漂亮的动画进度条显示效果！底下有各种浏览器的跳转链接！
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                        <?php if($row["mb"]==1){?>
                        <a href="#" class="btn btn-primary">正在使用</a>
                        <?php }else{ ?>
                       <a href="editmb.php?gx&id=<?=$id?>&info=1" class="btn btn-warning">选择模板</a>
                       <?php } ?>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">business</i> 需VIP即可使用</p>
                    </div>
                  </div>
                </div>
              </div>
             <div class="col-md-4">
                <div class="card card-product" data-count="4">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      <img class="img" src="assets/img/card-2.jpg">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="查看详细演示">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="编辑链接广告">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="选择模板">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">漂亮背景模板</a>
                    </h4>
                    <div class="card-description">
                      可自动跳转到您的页面并访问QQ浏览器，带非常漂亮的背景显示效果！底下有各种浏览器的跳转链接！
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                        <?php if($row["mb"]==2){?>
                        <a href="#" class="btn btn-primary">正在使用</a>
                        <?php }else{ ?>
                       <a href="editmb.php?gx&id=<?=$id?>&info=2" class="btn btn-warning">选择模板</a>
                       <?php } ?>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">business</i> 需VIP即可使用</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-product" data-count="4">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      <img class="img" src="assets/img/card-2.jpg">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="查看详细演示">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="编辑链接广告">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="选择模板">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">仿照QQ警告模板</a>
                    </h4>
                    <div class="card-description">
                      可自动跳转到您的页面并访问QQ浏览器，带访问解释详情！
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                        <?php if($row["mb"]==3){?>
                        <a href="#" class="btn btn-primary">正在使用</a>
                        <?php }else{ ?>
                       <a href="editmb.php?gx&id=<?=$id?>&info=3" class="btn btn-warning">选择模板</a>
                       <?php } ?>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">business</i> 需VIP即可使用</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-product" data-count="4">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      <img class="img" src="assets/img/card-2.jpg">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="查看详细演示">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="编辑链接广告">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="选择模板">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">漂亮的蓝色跳转模板</a>
                    </h4>
                    <div class="card-description">
                      可自动跳转到您的页面并访问QQ浏览器，带图标点击跳转！
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                        <?php if($row["mb"]==4){?>
                        <a href="#" class="btn btn-primary">正在使用</a>
                        <?php }else{ ?>
                       <a href="editmb.php?gx&id=<?=$id?>&info=4" class="btn btn-warning">选择模板</a>
                       <?php } ?>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">business</i> 需VIP即可使用</p>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>
              </div>
              </div></div></div></div>
            <?php include("footer.php") ?>
            </div></div>
            </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
<script src="./assets/js/plugins/sweetalert2.js"></script>
 <script type="text/javascript" src="assets/LightYear/js/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->

  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script>
    $("#submit").click(function () {
      $.ajax({
          type: "POST",
          url: "./editmb.php?gx",
          dataType: "json",
          data:{
                    gdid: $("#gdid").val(),
                    info: $("#info").val(),
               },
          success: function (data) {
              if (data.code==1) {
                  swal({
        title: "更新成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./editmb.php"
    })
              } else {
                  swal({
        title: "更新失败",
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