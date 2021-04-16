
<?php 

include("./info.php");
if($userrow['status']==2){
  header('Location: ./shopban.php'); }
//if($userrow['vip']==0){
 //header('Location: ./gdban.php');} 
?>
<?php 
$act=isset($_GET['act'])?daddslashes($_GET['act']):null;
switch ($act) {
    case 'gdtj':
        $wt = daddslashes($_POST['wt']);
        $xq = daddslashes($_POST['wtxq']);
        if ($wt=='') {
            exit('{"code":-1,"msg":"问题不能为空！"}');
        }
        if ($xq=='') {
           exit('{"code":-1,"msg":"详情不能为空！"}');
        }
       else{
                $uid=$userrow['id'];
                $ress = get_ip_city($clientip);
                $DB->query("INSERT INTO `hgfh_gd` (`uid`, `title`, `info`, `time`,`zt`) VALUES ('{$uid}', '{$wt}','{$xq}','{$date}','1')");
                exit('{"code":1,"msg":"提交成功!请点击查看详情发信息给管理员哦！"}');
            }
   
    case 'delete':
    $id =  $_GET['gdid'];
    $row=$DB->query("SELECT * FROM hgfh_gd WHERE id='{$id}' limit 1")->fetch();
    if($row['zt']==0){
   
    if (!$row) {
         exit('{"code":-1,"msg":"删除失败，该工单不存在！"}');
    }
    $sql=$DB->exec("DELETE FROM hgfh_gd WHERE id='{$id}'");
   $sql1=$DB->exec("DELETE FROM hgfh_gdxq WHERE gdid='{$id}'");
    if ($sql&$sql1){
           header('Location: ./gd.php#link9');
           break;
    } else {
         header('Location: ./gd.php#link9');
           break;
    } 
    }
    break;
}

$title='工单系统';
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

<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-15 ml-auto mr-auto">
              <div class="header text-center ml-auto mr-auto">
            <h2 class="title">我的工单</h2>
         
            <p class="category">一旦发起工单只有管理员可以删除正在进行的工单哦！</p>
          </div>
              <div class="page-categories">
                
                <br>
                <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link7" role="tablist">
                      <i class="material-icons">info</i> 发起工单
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link8" role="tablist">
                      <i class="material-icons">location_on</i> 正在进行
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                      <i class="material-icons">gavel</i> 已结束工单
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
                      <i class="material-icons">help_outline</i> 全部工单
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-space tab-subcategories">
                  <div class="tab-pane" id="link7">
                    <div class="col-md-26">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">mail_outline</i>
                  </div>
                  <h4 class="card-title">发起工单</h4>
                </div>
                <div class="card-body ">
                  <form action="javascript:void(0);" method="POST">
                    <div class="form-group bmd-form-group">
                      <label for="exampleEmail" class="bmd-label-floating">我的问题</label>
                      <input type="text" class="form-control" name="wdwt" id="wdwt">
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">详细信息</label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                          <input type="text" name="wtxq" id="wtxq" class="form-control">
                          <span class="bmd-help">请输入问题详情</span>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer ">
                  <button type="button" id="gdtj" type="submit" class="btn btn-fill btn-rose">提交工单</button>
                </div>
                   </form>
              </div>
            </div>
                  </div>
                  <div class="tab-pane active" id="link8">
                    <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">正在进行</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            ID
                          </th>
                          <th>
                            工单ID
                          </th>
                          <th>
                            工单标题
                          </th>
                          <th>
                           用户名
                          </th>
                            <th>
                           发起时间
                          </th>
                          <th>
                            操作
                          </th>
                        </tr></thead>
                        <tbody>
                          <?php 
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=10;
                                    }
                                    $pages=intval($numrows/$pagesize);
                                    if ($numrows%$pagesize)
                                    {
                                     $pages++;
                                     }
                                    if (isset($_GET['page'])){
                                    $page=intval($_GET['page']);
                                    }
                                    else{
                                    $page=1;
                                    }
                                    $offset=$pagesize*($page - 1);
                                    $uid=$userrow['id'];
 
                                    $rs=$DB->query("SELECT * FROM hgfh_gd WHERE `zt`= 1 && `uid`= '{$uid}'");
                                    
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['id'].'</td>
                                            <td>'.$res['title'].'</td>
                                            <td>'.$userrow['user'].'</td>
                                            <td>'.$res['time'].'</td>
                                            
                                          <td><a href="./gdxq.php?act=gdxq&user='.$userrow['id'].'&gdid='.$res['id'].'&info='.$res['info'].'&time='.$res['time'].'" rel="tooltip"  data-original-title="" class="btn btn-success" title="查看详情"><i class="material-icons">edit</i></a>&nbsp;
                                            
                                            
                                            </td>
                                            
                                           
                                            
                                           
                                        </tr>';
                                    }
                                    ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                  <div class="tab-pane" id="link9">
                    <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">已结束</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                         <tr><th>
                            ID
                          </th>
                          <th>
                            工单ID
                          </th>
                          <th>
                            工单标题
                          </th>
                          <th>
                           用户名
                          </th>
                            <th>
                           发起时间
                          </th>
                          <th>
                            操作
                          </th>
                        </tr></thead>
                        <tbody>
                         <?php 
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=10;
                                    }
                                    $pages=intval($numrows/$pagesize);
                                    if ($numrows%$pagesize)
                                    {
                                     $pages++;
                                     }
                                    if (isset($_GET['page'])){
                                    $page=intval($_GET['page']);
                                    }
                                    else{
                                    $page=1;
                                    }
                                    $offset=$pagesize*($page - 1);
                                    $uid=$userrow['id'];
                                    $rs=$DB->query("SELECT * FROM hgfh_gd WHERE `zt`= 0 && `uid`= '{$uid}'");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['id'].'</td>
                                            <td>'.$res['title'].'</td>
                                            <td>'.$userrow['user'].'</td>
                                            <td>'.$res['time'].'</td>
                                         
                                            
                                            <td><a href="./gdxq.php?act=gdxq&user='.$userrow['id'].'&gdid='.$res['id'].'&info='.$res['info'].'" rel="tooltip"  data-original-title="" class="btn btn-success" title="查看详情"><i class="material-icons">edit</i></a>&nbsp;
                                            <a href="./gd.php?act=delete&gdid='.$res['id'].'" pid="'.$res['id'].'" rel="tooltip"   class="btn btn-xs btn-danger delete" title="删除工单"><i class="material-icons">close</i></a>&nbsp;
                                            
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                  <div class="tab-pane" id="link10">
                    <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">全部工单</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            ID
                          </th>
                          <th>
                            工单ID
                          </th>
                          <th>
                            工单标题
                          </th>
                          <th>
                           用户名
                          </th>
                            <th>
                           发起时间
                          </th>
                          <th>
                            操作
                          </th>
                        </tr></thead>
                        <tbody>
                          <?php 
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=10;
                                    }
                                    $pages=intval($numrows/$pagesize);
                                    if ($numrows%$pagesize)
                                    {
                                     $pages++;
                                     }
                                    if (isset($_GET['page'])){
                                    $page=intval($_GET['page']);
                                    }
                                    else{
                                    $page=1;
                                    }
                                    $offset=$pagesize*($page - 1);
                                    $uid=$userrow['id'];
                                    $rs=$DB->query("SELECT * FROM hgfh_gd WHERE `uid`= '{$uid}'");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['id'].'</td>
                                            <td>'.$res['title'].'</td>
                                            <td>'.$userrow['user'].'</td>
                                            <td>'.$res['time'].'</td>
                                         
                                            
                                            <td><a href="./gdxq.php?act=gdxq&user='.$userrow['id'].'&gdid='.$res['id'].'&info='.$res['info'].'" rel="tooltip"  data-original-title="" class="btn btn-success" title="查看详情"><i class="material-icons">edit</i></a>&nbsp;
                                           
                                            
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>    
  </div>
         <?php 

include("./footer.php");

?>
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
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
       function gdtj() {
            document.getElementById("gdtj").disabled = true;
            $.ajax({
                type: "POST",
                url: "./gd.php?act=gdtj",
                dataType: "json",
                async:false,
                data: {
                    wt: $("#wdwt").val(),
                    wtxq: $("#wtxq").val(),
               },
                success: function (data) {
           
                    if (data.code == 1) {
                       swal({
        title: "提交成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./gd.php"
    })
                       
                    } else if (data.code == -1){
                      swal({
        title: "提交失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      }).then(function () {
        window.location.href = "./gd.php"
    })
                       
                     
                        }
                },
                error: function (jqXHR) {
                    alert("错误");
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误：" + jqXHR.status);
                    document.getElementById("login").disabled = false;
                                    }
            });
        }
   


        $("html").keydown(function (event) {
            if (event.keyCode == 13) {
                gdtj();
            }
        });
        $("#gdtj").click(function () {
            gdtj();
        });

         $("#window").click(function () {
            window.location.href="./";
        });

        $('div.modal').on('shown.bs.modal', function () {
            $("div.gt_slider_knob").hide();
        });

        $('div.modal').on('hidden.bs.modal', function () {
            $("div.gt_slider_knob").show();
        });
  
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