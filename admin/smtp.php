<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['gxsz'])) {
   if($islogin=1){
   $host= daddslashes($_POST['host']);
   $port= daddslashes($_POST['port']);
   $user= daddslashes($_POST['user']);
   $pass= daddslashes($_POST['pass']);
   $ssl= daddslashes($_POST['ssl']);
    $sql = $DB->exec("UPDATE `hgfh_set` SET `smtp_host`='{$host}',`smtp_port`='{$port}',`smtp_user`='{$user}',`smtp_pass`='{$pass}',`smtp_ssl`='{$ssl}' WHERE id=1");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='系统设置';
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
                                    <li class="breadcrumb-item"><a href="#">系统设置</a></li>
                                    <li class="breadcrumb-item active">基本设置</li>
                                </ol>
                            </div>
                            <h4 class="page-title">发信基本设置</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">网站发信配置</h4>
                                <p class="text-muted font-14">
                                   以下是网站的发信配置
                                </p>
                           
                                <form class="form-horizontal" action="./set.php?gxsz" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SMTP主机</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="host" value="<?php echo $conf['smtp_host']; ?>">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SMTP端口</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="port" value="<?php echo $conf['smtp_port']; ?>">
                                          <span class="fd red">一般为465</span>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SMTP用户名</label>
                                     <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="user" value="<?php echo $conf['smtp_user']; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SMTP密码</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="pass" value="<?php echo $conf['smtp_pass']; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SMTP验证(SSL)</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="ssl">
                                          
                                            <option value="1" <?=$conf['smtp_ssl']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['smtp_ssl']==0?"selected":""?>>关闭</option>
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
            url: "./smtp.php?gxsz",
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
                   window.location.reload();
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