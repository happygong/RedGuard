<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_user where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
     $id= daddslashes($_POST['uid']);
   $user= daddslashes($_POST['user']);
   $pass= daddslashes($_POST['pass']);
   $mail= daddslashes($_POST['mail']);
  $qq= daddslashes($_POST['qq']);
  $money= daddslashes($_POST['money']);
  $phone= daddslashes($_POST['phone']);
  $zt= daddslashes($_POST['zt']);
  $vip= daddslashes($_POST['vip']);
     
    $sql = $DB->exec("UPDATE `hgfh_user` SET `user`='{$user}',`pwd`='{$pass}',`email`='{$mail}',`qq`='{$qq}',`money`='{$money}',`phone`='{$phone}',`zt`='{$zt}',`vip`='{$vip}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='用户编辑';
?>
<?php include("./head.php"); ?>
   <?php include("./navbar.php"); ?>
<div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">乐公防红</a></li>
                                    <li class="breadcrumb-item"><a href="#">用户管理</a></li>
                                    <li class="breadcrumb-item active">用户编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑用户资料</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./user.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">用户资料编辑</h4>
                                <p class="text-muted font-14">
                                   以下是<?=$user['user']?>的资料，保存会对用户更改！
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                  <input type="hidden" name="uid" value="<?php echo $user['id'];?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="user" value="<?php echo $user['user']; ?>">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户密码</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="pass" value="<?php echo $user['pwd']; ?>">
                                          <span class="fd red">保留原样表示不进行更改</span>
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户邮箱</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="mail" value="<?php echo $user['email']; ?>">
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户余额</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="money" value="<?php echo $user['money']; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户QQ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="qq" value="<?php echo $user['qq']; ?>">
                                        </div>
                                    </div>
                                  
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">联系电话</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  name="phone" value="<?php echo $user['phone']; ?>">
                                        </div>
                                    <label class="col-sm-1 col-form-label">注册时间</label>
                                    <div class="col-sm-5">
                                            <input type="text" class="form-control"   name="shijian" value="<?php echo $user['time']; ?>" disabled>
                                        </div>
                                    
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户状态</label>
                                        <div class="col-sm-4">
                                            <select class="form-control border-input" name="zt">
                                          
                                            <option value="1" <?=$user['zt']==1?"selected":""?>>正常</option>
                                            <option value="0" <?=$user['zt']==0?"selected":""?>>冻结</option>
                                        </select>
                                        </div>
                                    <label class="col-sm-1 col-form-label">是否为VIP</label>
                                    <div class="col-sm-5">
                                            <select class="form-control border-input" name="vip">
                                          
                                            <option value="1" <?=$user['vip']==1?"selected":""?>>是</option>
                                            <option value="0" <?=$user['vip']==0?"selected":""?>>否</option>
                                        </select>
                                        </div>
                                    
                                    </div>
                                   
                                    <button id="submit" type="button" class="btn btn-primary">提交保存</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->

                   
                
            </div> <!-- end container -->
        </div>
<?php include("./footer.php"); ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "./useredit.php?bianji",
            dataType: "json",
            data: $('#form_set').serialize(),
            success: function (data) {
              if (data.code==1) {
                  swal({
                title: "修改成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                  window.location.href = "./user.php"
                  });
                } else {
                    swal({
                title: "修改失败！",
                text: data.msg,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
                }
            }
            
        })
    });
     
</script>
    </body>
</html>