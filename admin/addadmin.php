<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $user = daddslashes($_POST['user']);
        $mail = daddslashes($_POST['mail']);
        $pass = daddslashes($_POST['pass']);
        $zt = daddslashes($_POST['zt']);
        $top = daddslashes($_POST['top']);
        $row1=$DB->query("SELECT * FROM `hgfh_admin` WHERE email='{$mail}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该邮箱已被注册！"}');
                  }
          
                $row=$DB->query("SELECT * FROM `hgfh_admin` WHERE user='{$user}' limit 1")->fetch();
                  if ($row) {
                    exit('{"code":-1,"msg":"该名称已被注册！"}');
                  }
    $sql = $DB->exec("INSERT INTO `hgfh_admin` (`user`, `pass`,`email`,`zt`, `top`) VALUES ('{$user}', '{$pass}','{$mail}','{$zt}','{$top}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加管理员';
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
                                    <li class="breadcrumb-item active">添加管理员</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加管理员资料</h4>
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
                                <h4 class="header-title">管理员添加</h4>
                                <p class="text-muted font-14">
                                   添加管理员
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="user">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户密码</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="pass" >
                                         
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户邮箱</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="mail">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户状态</label>
                                        <div class="col-sm-4">
                                            <select class="form-control border-input" name="zt">
                                          
                                            <option value="1">正常</option>
                                            <option value="0">冻结</option>
                                        </select>
                                        </div>
                                    <label class="col-sm-1 col-form-label">是否可以拥有后台全部控制权？</label>
                                    <div class="col-sm-5">
                                            <select class="form-control border-input" name="top">
                                            <option value="0">否</option>
                                            <option value="1">是</option>
                                        </select>
                                        </div>
                                    
                                    </div>
                                   
                                    <button id="submit" type="button" class="btn btn-primary">添加用户</button>
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
                  window.location.href = "./user.php"
                  });
               </script>
                  
                  <?php } ?>
<?php include("./footer.php"); ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "./addadmin.php?add",
            dataType: "json",
            data: $('#form_set').serialize(),
            success: function (data) {
              if (data.code==1) {
                  swal({
                title: "添加成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.href = "./admin.php"
                  });
                } else {
                    swal({
                title: "添加失败！",
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