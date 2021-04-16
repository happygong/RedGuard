<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_admin where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
     $id= daddslashes($_POST['uid']);
   $user= daddslashes($_POST['user']);
   $pass= daddslashes($_POST['pass']);
   $mail= daddslashes($_POST['mail']);
  $zt= daddslashes($_POST['zt']);
  $top= daddslashes($_POST['top']);
    $sql = $DB->exec("UPDATE `hgfh_admin` SET `user`='{$user}',`pass`='{$pass}',`email`='{$mail}',`zt`='{$zt}',`top`='{$top}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='管理员编辑';
?>
<?php include("./head.php"); ?>
   <?php include("./navbar.php"); ?>
<?php if($admin['top']==1){ ?>
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
                                    <li class="breadcrumb-item active">管理员编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑管理员资料</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./admin.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">管理员资料编辑</h4>
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
                                            <input type="text" class="form-control"  name="pass" value="<?php echo $user['pass']; ?>">
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
                                        <label class="col-sm-2 col-form-label">用户状态</label>
                                        <div class="col-sm-4">
                                            <select class="form-control border-input" name="zt">
                                          
                                            <option value="1" <?=$user['zt']==1?"selected":""?>>正常</option>
                                            <option value="0" <?=$user['zt']==0?"selected":""?>>冻结</option>
                                        </select>
                                        </div>
                                    <label class="col-sm-1 col-form-label">是否可以拥有后台全部控制权？</label>
                                    <div class="col-sm-5">
                                            <select class="form-control border-input" name="top">
                                          
                                            <option value="1" <?=$user['top']==1?"selected":""?>>是</option>
                                            <option value="0" <?=$user['top']==0?"selected":""?>>否</option>
                                        </select>
                                        </div>
                                    
                                    </div>
                                   
                                    <button id="submit" type="button" class="btn btn-primary">提交保存</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->
<?php include("./footer.php"); ?>
                   
<?php }else{ ?>
                
            </div> <!-- end container -->
        </div>
<?php include("./footer.php"); ?>
   <script type="text/javascript">
             swal({
                title: "权限不足！",
                text: "管理员权限不足，无法查看内容！",
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
                }).then(function() {
                  window.location.href = "./admin.php"
                  });
               </script>
                  
                  <?php } ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "./adminedit.php?bianji",
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
                  window.location.href = "./admin.php"
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