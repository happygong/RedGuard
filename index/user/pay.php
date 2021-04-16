<?php 
include("./info.php");
if(isset($_GET['kamicz'])){
    $id = daddslashes($_GET['id']);
    $jyh = daddslashes($_GET['trade_no']);
    $kami = daddslashes($_GET['kami']);
   if ($kami=='') {
        exit('{"code":-1,"msg":"请输入卡密！"}');
    }
    $row=$DB->query("SELECT * FROM `hgfh_kami` WHERE kami='{$kami}'")->fetch();
    if (!$row) {
        exit('{"code":-1,"msg":"充值失败，卡密不存在！"}');
    }
    $name=$row['money'];
    $csnow=$row['cs']-1;
    $mymoney=$userrow['money'];
    $moneynow=$row['money']+$mymoney;
  if($row['cs']>0){
    $sql0 = $DB->exec("UPDATE `hgfh_user` SET `money`='{$moneynow}' WHERE user='{$id}'");
    $sql1 = $DB->exec("UPDATE `hgfh_kami` SET `cs`='{$csnow}' WHERE id='{$row['id']}'");
    $sql2=$DB->exec("INSERT INTO `hgfh_order` (`trade_no`,`out_trade_no`,`type`,`uid`,`addtime`,`endtime`, `name`,`money`,`ip`,`status`) VALUES ('{$jyh}','0','卡密','{$id}', '{$date}', '{$date}','{$name}','{$row['money']}','unkonw','1')");
    if ($sql0&$sql1&$sql2){
        exit('{"code":1,"msg":"充值成功！"}');
    } else {
        exit('{"code":-1,"msg":"充值失败了！"}');
    }
  }else{
  
   exit('{"code":-1,"msg":"卡密已失效！"}');
  }
}
$title='充值中心';

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
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>
<?php 

include("./navbar.php");

?>
   <div class="content">
        <?php 
$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();

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
          <div class="col-lg-12">
                        
          <div class="card" style="background-size: 100% 100% !important;background-image: url(http://f.bqzmz.com/assets/images/bj.jpg);">
            <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="material-icons">timeline</i>
                    </div>
                    <h3 class="card-title">余额充值
                      <small> - 用心为您服务</small>
                    </h4>
                  </div>
            <div class="card-body">
        
              <p>充值未到账联系QQ<?php echo $conf['web_qq'];?>,充值后自动到账</p>
              <p>支付宝支持花呗、信用卡方式，谢谢大家</p>
              <p>充值完记得点击购买产品：<a href="../vip.php">VIP购买</a></p>             
              <p>当前余额：<font color="#399AF2" size="5"><?php echo $userrow['money'];?></font> 元</p>
            </div>
          </div>
        </div>
     <div class="col-lg-12">
     <div class="row">
      <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <img src="http://f.bqzmz.com/assets/images/alipay-logo.png" style="width: 80px;float: right;">
                <h5 class="mb-1">在线充值</h5>
                
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <p class="card-heading"></p>
                      <div class="form-group form-group-label">
                         
                           <label for="exampleEmail" class="bmd-label-floating">输入金额</label>
                          <input class="form-control" id="amount" type="text">
                        <span class="bmd-help">金额交易范围（ <?php echo ($conf['limit']==1?$conf['limit_money']:"0") ?> ）元以上</span>
                      </div>
                    </div>
                 <button class="btn btn-primary" id="code-alipay">充值</button>
            </div>
          </div>
        </div></div>
        <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <img src="http://f.bqzmz.com/assets/images/wechat-logo.png" style=" float: right;">
                <h5 class="mb-1">在线充值</h5>
                 
                 <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <p class="card-heading"></p>
                      <div class="form-group form-group-label">
                           <label for="exampleEmail" class="bmd-label-floating">输入金额</label>
                          <input class="form-control" id="amounts" type="text">
                        <span class="bmd-help">金额交易范围（ <?php echo ($conf['limit']==1?$conf['limit_money']:"0") ?> ）元以上</span>
                      </div>
                  </div>
                 
              
                <button class="btn btn-primary" id="code-wxpay">充值</button>
  <!-- <a class="btn btn-flat waves-attach" id="pay" onclick="pay();"><span class="icon"></span>&nbsp;点击充值</a> -->
            </div>
          </div>
        </div>
        </div>
       </div>
        </div>

 
                         
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="mb-1">卡密充值</h5>
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <p class="card-heading"></p>
                      <div class="form-group form-group-label">
                           <label for="code" class="bmd-label-floating">输入卡密</label>
                          <input class="form-control" id="code" type="text">
                        <span class="bmd-help">在特殊活动中获取</span>
                      </div>
                  </div>
              <button class="btn btn-primary" id="code-update">提交</button>
            </div>
          </div>
        </div>
</div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="mb-1">充值记录</h5>
              <div class="card-table">
                <div class="table-responsive table-user">
                  
                  <table class="table table-hover">
                    <tr>
                      <!--<th>ID</th> -->
                      <th>排序</th>
                      <th>支付方式</th>
                      <th>充值金额</th>
                      <th>充值时间</th>

                    </tr>

                  <?php
                    $rs=$DB->query("SELECT * FROM `hgfh_order` WHERE uid='{$userrow['user']}' and status=1 order by trade_no desc");
                      while($res = $rs->fetch())
                      {
                    $i++;
                  ?>
                    <tr>
                      <!--	<td>#13142</td>  -->
                      <td><?php echo $i;?></td>
                      <td><?php echo $res['type'];?></td>
                      <td><?php echo $res['money'];?> 元</td>
                      <td><?php echo $res['endtime'];?></td>
                    </tr>
                  <?php }?>
                  </table>
            
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


<div class="modal modal-danger fade" id="readytopay" tabindex="-1" role="dialog" aria-labelledby="modal_5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title_6">正在连接支付网关</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-3 text-center">
          <p id="title">感谢您对我们的支持，请耐心等待</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-fluid fade" id="result" tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="text-center">
                        <p class="lead text-muted" id="msg"></p>
                        <div class="text-center" id="test"><p>正在检测支付是否完成，完成自动刷新...</p></div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">重新选择</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">我已支付</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-fluid fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                  <div class="col-lg-6 col-md-6">
                      <div class="h5 margin-top-sm text-black-hint" id="qrarea"></div>
                      <div class="h5 margin-top-sm text-black-hint" id="qr"></div>
                      <div class="text-center" id="test"><h5>请在五分钟内支付完成</h5></div>
                      <div id="pr"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
      var pid = 0;
    function pay(code_url,trade_no){
        shop=trade_no;
        $("#payment").modal();
            $("#qrarea").html('<div class="text-center" id="test"><p>请使用手机扫描二维码支付</p><p style="font-size: 0.7rem;">支付完成自动到账</p></div>');
            $("#result").show('hide');
            $("#msg").show();
            new QRCode("test", {
                render: "canvas",
                width: 200,
                height: 200,
                text: encodeURI(code_url)
            });
            setTimeout(f,2000);
    }

    function f(){
        $.ajax({
            type: "GET",
            url: "/payment/getshop.php",
            dataType: "json",
            data: {
                trade_no:shop
            },
            success: function (data) {
                if (data.code==1) {
                    console.log(data);
                   swal({
        title: "充值成功",
        text: "感谢您对正版的支持！",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      })
                    $("#payment").modal('hide');
                   
                    window.setTimeout("location.href=window.location.href", 1200);
                }
            },
            error: function (jqXHR) {
                console.log(jqXHR);
            }
        });
        tid = setTimeout(f, 2000); //循环调用触发setTimeout
    }
$("#code-alipay").click(function () {
      $("#readytopay").modal();
			$.ajax({
				type: "GET",
				url: "./codepay.php",
				dataType: "json",
				data: {
          name: "<?php echo $userrow['user'] ?>",
          pay_type: 1,
		  money: $("#amount").val(),
          trade_no:"<?php echo date("YmdHis") . rand(11111, 99999);?>"
				},
				success: function (data) {
          $("#readytopay").modal('hide');
					if (data.code==1) {
						$("#result").modal();
            pay(data.code_url,data.trade_no)
						// $("#msg").html();
						// window.setTimeout("location.href=window.location.href", 1200);
					} else {
						swal({
        title: "充值失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      })
						// window.setTimeout("location.href=window.location.href", 1200);
					}
				},
				error: function (jqXHR) {
                  swal({
        title: "系统错误",
        text: jqXHR.status,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      })
					
				}
			})
		})

    $("#code-wxpay").click(function () {
      $("#readytopay").modal();
      $.ajax({
        type: "GET",
        url: "/payment",
        dataType: "json",
        data: {
          id: "<?php echo $userrow['user'] ?>",
          type: "wxpay",
          money: $("#amounts").val(),
          trade_no:"<?php echo date("YmdHis") . rand(11111, 99999);?>"
        },
        success: function (data) {
          $("#readytopay").modal('hide');
          if (data.code==1) {
            $("#result").modal();
            $("#msg").html(data.msg);
           pay(data.code_url,data.trade_no)
            // window.setTimeout("location.href=window.location.href", 1200);
          } else {
            swal({
        title: "充值失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      })
           
            // window.setTimeout("location.href=window.location.href", 1200);
          }
        },
        error: function (jqXHR) {
          $("#result").modal();
          $("#msg").html("发生错误：" + jqXHR.status);
        }
      })
    })
     $("#code-update").click(function () {
      $.ajax({
        type: "GET",
        url: "./pay.php?kamicz",
        dataType: "json",
        data: {
          id: "<?php echo $userrow['user'] ?>",
          type: "kami",
          kami: $("#code").val(),
          money: $("#amounts").val(),
          trade_no:"<?php echo date("YmdHis") . rand(11111, 99999);?>"
        },
        success: function (data) {
          
          if (data.code==1) {
            $("#result").modal();
            $("#msg").html(data.msg);
           
            window.setTimeout("location.href=window.location.href", 1200);
          } else {
            swal({
        title: "充值失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      })
           
            // window.setTimeout("location.href=window.location.href", 1200);
          }
        },
        error: function (jqXHR) {
          $("#result").modal();
          $("#msg").html("发生错误：" + jqXHR.status);
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