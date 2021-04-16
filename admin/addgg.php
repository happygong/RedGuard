<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $title = daddslashes($_POST['title']);
        $content = daddslashes($_POST['content']);
        $xs = daddslashes($_POST['display']);
        $row1=$DB->query("SELECT * FROM `hgfh_gg` WHERE title='{$title}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该标题已被添加过！"}');
                  }
    $sql = $DB->exec("INSERT INTO `hgfh_gg` (`title`, `date`, `display`,`content`) VALUES ('{$title}', '{$date}','{$xs}','{$content}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加公告';
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
                                    <li class="breadcrumb-item"><a href="#">基本设置</a></li>
                                    <li class="breadcrumb-item active">添加公告</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加公告</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./gg.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">公告添加</h4>
                                <p class="text-muted font-14">
                                   添加公告
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">公告标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="title">
                                         
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">公告内容</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="content"></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">是否自动弹出</label>
                                        <div class="col-sm-10">
                                        <select class="form-control border-input" name="display">
                                            <option value="0">否</option>
                                            <option value="1">是</option>
                                        </select>
                                  </div>
                                    <button id="submit" type="button" class="btn btn-primary">添加公告</button>
                                </form>

                            </div> </div> <!-- end card-body-->
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
            url: "./addgg.php?add",
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
                   window.location.href = "./gg.php"
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