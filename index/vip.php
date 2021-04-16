<?php
include ('../include/common.php');
$bt=''.$conf['name'].'-VIP-完美解决推广难题！';
$title=$bt;
if(isset($_GET['buy'])){
    $id = $_POST['id'];
    $uid = $userrow['id'];
    $row=$DB->query("SELECT * FROM `hgfh_tc` WHERE id='{$id}'")->fetch();
    $moneynow = $userrow['money'] - $row['money'];
    $api = $row['api'];
    if($userrow['vip']==1){
        exit('{"code":-1,"msg":"您已是VIP会员,请勿重复开通!"}');
    }
    $days = "+".$row['time']."day";
    $vipendtime=date("Y-m-d",strtotime($days));
    if($moneynow>0){
        $sql = $DB->exec("UPDATE `hgfh_user` SET `money`='{$moneynow}',`api`='{$api}',`vipendtime`='{$vipendtime}',`vip`=1 WHERE id='{$uid}'");
        if($sql){
            exit('{"code":1,"msg":"VIP开通成功!"}');
        }else{
            exit('{"code":-1,"msg":"系统错误，请重试！"}');
        }
    }else{
         exit('{"code":-1,"msg":"您的余额不足！请充值"}');
    }
}
include('./header.php');
?>
<!--============= Page Header Section Starts Here =============-->
    <section class="page-header">
        <div class="banner-bg bg_img" data-background="./assets/images/banner/banner-bg.jpg">
            <div class="banner-bg-shape"><img src="./assets/images/banner/banner-shape.png" alt="banner"></div>
            <div class="round-1">
                <img src="./assets/images/banner/01.png" alt="banner">
            </div>
            <div class="round-2">
                <img src="./assets/images/banner/02.png" alt="banner">
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="title">会员尽享尊贵特权~</h1>
            </div>
        </div>
    </section>
    <!--============= Page Header Section Ends Here =============-->


    <!--============= Publisher Section Starts Here =============-->
    <div class="publisher-section">
        <div class="container">
            <div class="row mb-30-none justify-content-center mt--150">
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="./assets/images/publisher/01.png" alt="publisher">
                            </div>
                            <h4 class="title">超级防红域名</h4>
                            <p>VIP会员尊享域名池，每个域名均为防红二级不死，让您的链接更不易红~</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="./assets/images/publisher/02.png" alt="publisher">
                            </div>
                            <h4 class="title">尊享高级功能</h4>
                            <p>数据查询，链接保护，开放VIP尊享VIP接口，让防红更高效！</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="./assets/images/publisher/03.png" alt="publisher">
                            </div>
                            <h4 class="title">推广超级防红</h4>
                            <p>技术服务为您12小时在线，享受在线工单，多链接缩短等VIP服务资源</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= Publisher Section Ends Here =============-->


    <!--============= Payout Section Starts Here =============-->
    <section class="payout-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-header mw-100">
                        <h5 class="cate">您能得到什么？</h5>
                        <h2 class="title">给您最优质的服务！</h2>
                        <p>您可以选择按次计费或按时间计费</p>
                    </div>
                </div>
            </div>
            <div class="payout-wrapper">
                <div class="payout-area">
                    <ul class="payout-header">
                        <li>
                            VIP套餐 / 套餐详情
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="./assets/images/payout/icon1.png" alt="payout">
                            </div>
                            <div class="content">
                                <h5 class="subtitle">尊享管理控制台</h5>
                                <p>分析用户行为，数据统计</p>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="./assets/images/payout/icon2.png" alt="payout">
                            </div>
                            <div class="content">
                                <h5 class="subtitle">多端兼容 / QQ微信</h5>
                                <p>页面加密，自动跳转，防用户举报</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="payout-rates">
                       <?php $rs=$DB->query("SELECT * FROM hgfh_tc WHERE status=1 order by id asc");
                      
                                    while($res = $rs->fetch())
                                    { ?>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="./assets/images/favicon.png" alt="payout">
                                </div>
                                <div class="content">套餐名称:<?php echo $res['name']; ?></div>
                            </div>
                            <div class="dextop-amount">价格:<?php echo $res['money']; ?>元</div>
                            <div class="mobile-amount">有效期:<?php echo $res['time']; ?>天</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <!--<div class="thumb">-->
                                <!--    <img src="./assets/images/payout/canada.png" alt="payout">-->
                                <!--</div>-->
                                <div class="content">描述:<?php echo $res['ms']; ?></div>
                            </div>
                            <div class="dextop-amount">赠送API次数:<?php echo $res['api']; ?>次</div>
                            <div class="mobile-amount"><a href="#" pid="<?php echo $res['id']; ?>" class="custom-button active mt-2 buy">立即购买</a></div>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--============= Payout Section Ends Here =============-->


    <!--============= Call In Action Section Starts Here =============-->
    <section class="call-in-action padding-top padding-bottom section-bg text-center">
        <div class="container">
            <div class="section-header mb-low">
                <h5 class="cate">心动不如行动！</h5>
                <h2 class="title">早卖早享优惠，后期大量防红域名价格更高~</h2>
                <p>登录您的账户一键购买吧,享受最佳推广营销！</p>
            </div>
            <a href="./login.php" class="custom-button">就趁现在!</a>
        </div>
    </section>

<?php
include('./footer.php');
?>
<?php if($islogin2==1){ ?>
<script>
    $(".buy").click(function() {
  var id = $(this).attr("pid");
     Swal.fire({
  title: '购买确认',
        text: "您确定购买吗？",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: '是的哦',
        cancelButtonText: '点错了',
        buttonsStyling: false
}).then((result) => {
           if (result.value) {
    $.ajax({
      type: "POST",
      url: "?buy",
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        if (data.code == 1) {
          swal({
                title: "购买成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.reload();
                  });
        } else {
            swal({
                title: "购买失败！",
                text: data.msg,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
        }
      }
    })
           }
     })
   })
</script>
<?php }else{ ?>
<script>
    $(".buy").click(function() {
  var id = $(this).attr("pid");
     Swal.fire({
  title: '您还没有登录',
        text: "您未登录！",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: '登录',
        cancelButtonText: '取消',
        buttonsStyling: false
}).then((result) => {
           if (result.value) {
                window.location.href = "./login.php"
           }
})
})
</script>
<?php } ?>