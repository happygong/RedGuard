<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_sc where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
    $id = daddslashes($_POST['id']); 
    $info = daddslashes($_POST['info']);
    //echo $id;
   // echo $info;
    $sql = $DB->exec("UPDATE `hgfh_sc` SET `ad`='{$info}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='广告编辑';
?>
<?php include("./head.php"); ?>
<link rel="stylesheet" href="../index/user/assets/css/editormd.css" />
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
                                    <li class="breadcrumb-item"><a href="#">系统设置</a></li>
                                    <li class="breadcrumb-item active">广告编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑广告</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./ad.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">广告编辑</h4>
                                <p class="text-muted font-14">
                                   以下是链接:<? echo base64_decode($user['url']); ?>的广告，保存会对广告更改！
                                </p>
                           <form  class="form-signin" id="form_huifu" method="POST">
                        <div class="form-group">
                          <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                          
                                            <label>请在这里输入您想自定义的文字或广告代码</label>
                                            
                                           <div class="form-group" id="test-editor">
                              <textarea type="text" name="adtype"><?php echo $user['ad']; ?></textarea>
                          </div>
                                        </div>
                      <div class="text-right">
                                        <button id="submit" type="button" class="btn btn-warning">提交广告</button>
                                    
                                      </div></form>
                          

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->
                    <!--<script type="text/javascript" src="../index/user/assets/LightYear/js/jquery.min.js"></script>-->
<?php include("./footer.php"); ?>
<script src="../index/user/assets/editormd.min.js"></script>
<script type="text/javascript">
    $(function() {
        var editor = editormd("test-editor", {
            width  : "100%",
            toolbarIcons : function() { 
              return editormd.toolbarModes['simple']; // full, simple, mini
            },
            height : 440,
            path   : "../index/user/assets/lib/",
            htmlDecode : true,
        });
    });
</script>
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
                  window.location.href = "./index.php"
                  });
               </script>
                  
                  <?php } ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "./adedit.php?bianji",
            dataType: "json",
            data:{
                    id: $("#id").val(),
                    info: $('.editormd-markdown-textarea').val()
               },
            success: function (data) {
              if (data.code==1) {
                  swal({
                title: "修改成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                  window.location.href = "./ad.php"
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