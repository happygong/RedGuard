<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_gg where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
    $id = daddslashes($_POST['id']); 
    $title = daddslashes($_POST['title']);
    $content = daddslashes($_POST['content']);
    $xs = daddslashes($_POST['display']);
    //echo $id;
    $sql = $DB->exec("UPDATE `hgfh_gg` SET `title`='{$title}',`display`='{$xs}',`content`='{$content}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='公告编辑';
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
                                    <li class="breadcrumb-item active">公告编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑公告</h4>
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
                                <h4 class="header-title">公告编辑</h4>
                                <p class="text-muted font-14">
                                   以下是<?=$user['title']?>的资料，保存会对公告更改！
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    
                                  <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">公告标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="title" value="<?php echo $user['title']; ?>">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">发布时间</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="time" value="<?php echo $user['date']; ?>" disabled>
                                          
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">公告内容</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="content" ><?php echo $user['content']; ?></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">是否自动弹出</label>
                                        <div class="col-sm-10">
                                        <select class="form-control border-input" name="display">
                                            <option value="0" <?=$user['display']==0?"selected":""?>>否</option>
                                            <option value="1" <?=$user['display']==1?"selected":""?>>是</option>
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
                  window.location.href = "./index.php"
                  });
               </script>
                  
                  <?php } ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "./ggedit.php?bianji",
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
                  window.location.href = "./gg.php"
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