<?php 
$title='个人账户';
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">您的个人资料 
                    
                  </h4><a href="./edit.php">更改您的资料</a>
                </div>
                <div class="card-body">
                
                <dl class="dl-horizontal">
                <dt>用户名：</dt>
                <dd><?php echo $userrow['user'];?></dd>
                  <dt>用户ID：</dt>
                <dd><?php echo $userrow['id'];?></dd>
                <dt>邮箱：</dt>
                <dd><?php echo $userrow['email'];?></dd>
                <dt>手机：</dt>
                <dd><?php
                  if($userrow['phone']){
                  
                  echo $userrow['phone'];
                  
                  }else{ echo "未完善资料";} 
                  ?></dd>
                <dt>QQ：</dt>
                <dd><?php
                  if($userrow['qq']){
                  
                  echo $userrow['qq'];
                  
                  }else{ echo "未完善资料";} 
                  ?></dd>
                  <dt>是否为代理：</dt>
                <dd><?php
                  if($userrow['agent']==1){
                  
                  echo "是";
                  
                  }else{ echo "否";}
                  
                  ?></dd>
                  <?php if($conf['vip']==1){ ?>
                   <dt>是否为VIP：</dt>
                <dd><?php
                  if($userrow['vip']==1){
                  
                  echo "是";
                  
                  }else{ echo "否";}
                  
}?></dd>
              </dl>
                <a href="#pablo" class="btn btn-rose btn-round">删除账户</a>
                
                </div> </div> </div>
        
        <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo"> <?php if($userrow['qq']== NULL){ ?>
             <img src="./assets/img/faces/marc.jpg">
            <?php }else{ ?>
            <img src="http://q2.qlogo.cn/headimg_dl?bs=qq&amp;dst_uin=<?php echo $userrow['qq'];?>&amp;src_uin=<?php echo $userrow['qq'];?>&amp;fid=<?php echo $userrow['qq'];?>&amp;spec=100&amp;url_enc=0&amp;referer=bu_interface&amp;term_type=PC" />
          <?php } ?></a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">如有异常，及时更改密码</h6>
                  <h4 class="card-title">最近的十条登录记录</h4>
                  <div class="card-table">
                <div class="table-responsive table-user">
                  <table class="table table-fixed">
                    <tr>
                      <th>IP</th>
                      <th>归属地</th>
                    </tr>
                      <?php
                        $rs=$DB->query("SELECT * FROM `hgfh_login` WHERE uid='{$userrow['user']}' limit 10");
                          while($res = $rs->fetch())
                          {
                        ?>
                        <tr>
                          <td><?php echo $res['ip'];?></td>
                          <td><?php echo $res['ress'];?></td>
                        </tr>
                      <?php } ?>
                    </table>
                </div>
              </div>
                  
                </div>
              </div>
            </div>
            <?php 

include("./footeri.php");

?>