<?php 
include("./info.php");
$title='设置中心';
include("./header.php");
?>
<?php 

include("./navbar.php");

?>

<div class="content">
  <?php 

if($userrow['zt']== 0){
  
  
  echo " <div class=\"alert alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 警告 - </b> 当前账户处于禁封状态！有问题请联系管理员恢复！</span>
                  </div>";
  
  
  }

?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">个人信息</h4>
                </div>
                <div class="card-body ">
                  <form action="javascript:void(0);" method="POST">
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">用户名(禁止更改)</label>
                      <input  class="form-control" id="user" value="<?php echo $userrow['user'];?>" placeholder="请输入用户名" disabled>
                    </div>
                   <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">用户邮箱</label>
                      <input  class="form-control" id="email" type="text"  value="<?php echo $userrow['email'];?>" placeholder="请输入我的邮箱">
                    </div>
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">手机号</label>
                      <input  class="form-control" id="phone" type="text" value="<?php echo $userrow['phone'];?>" >
                    </div>
                   <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">QQ</label>
                      <input  class="form-control" id="qq" type="text"  value="<?php echo $userrow['qq'];?>">
                    </div>
                    </div>
                <div class="card-footer ">
                  <button class="btn btn-fill btn-rose" id="ss-pwd-update">提交</button>
                </div>
              </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">密码变更</h4>
                </div>
    
                <div class="card-body ">
                   <form action="javascript:void(0);" method="POST">
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">旧密码</label>
                      <input class="form-control" id="oldpwd" type="password">
                    </div>
                   <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">新密码</label>
                      <input  class="form-control"  id="pwd" type="text">
                    </div>
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating">重复密码</label>
                      <input  class="form-control" id="repwd" type="password">
                    </div>
                 
               
                </div>
                <div class="card-footer ">
                  <button id="pwd-update" class="btn btn-fill btn-rose">提交</button>
                </div>
                     </form>
              </div>
            </div>
<?php 

include("./footerei.php");

?>