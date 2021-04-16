<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $url = daddslashes($_POST['url']);
     $type = daddslashes($_POST['type']);
        
        $row1=$DB->query("SELECT * FROM `hgfh_hmd` WHERE url='{$url}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该域名已被添加过！"}');
                  }
          
    $sql = $DB->exec("INSERT INTO `hgfh_hmd` (`url`,`date`,`type`) VALUES ('{$url}', '{$date}', '{$type}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加黑白名单域名';
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
                                    <li class="breadcrumb-item active">添加黑名单域名</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加黑名单域名</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./hmd.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">黑名单域名添加</h4>
                                <p class="text-muted font-14">
                                   添加黑名单域名
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">域名</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="url">
                                          <span class="fd red">请不要带http://或结尾带/</span>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                <label class="col-sm-2 col-form-label">黑白名单</label>
                                    <div class="col-sm-10">
                                            <select class="form-control border-input" name="type">
                                            <option value="2">黑名单</option>
                                            <option value="1">白名单</option>
                                        </select>
                                        </div>
                                    </div>
                                    <button id="submit" type="button" class="btn btn-primary">添加域名</button>
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
            url: "./addhmd.php?add",
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
                   window.location.href = "./hmd.php"
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