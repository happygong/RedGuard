<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_tc where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
    $id = daddslashes($_POST['id']); 
    $title = daddslashes($_POST['name']);
    $ms = daddslashes($_POST['ms']);
    $money = daddslashes($_POST['money']);
    $time = daddslashes($_POST['time']);
    $zt = daddslashes($_POST['zt']);
    $api = daddslashes($_POST['api']);
    //echo $id;
    $sql = $DB->exec("UPDATE `hgfh_tc` SET `name`='{$title}',`ms`='{$ms}',`money`='{$money}',`time`='{$time}',`status`='{$zt}',`api`='{$api}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='套餐编辑';
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
                          <a href="./tc.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">套餐编辑</h4>
                                <p class="text-muted font-14">
                                   以下是<?=$user['name']?>的套餐，保存会对套餐更改！
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    
                                  <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="name" value="<?php echo $user['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐价格</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="money" value="<?php echo $user['money']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐有效期</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="time" value="<?php echo $user['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">赠送API调用次数</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="api" value="<?php echo $user['api']; ?>">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">发布时间</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="time" value="<?php echo $user['date']; ?>" disabled>
                                          
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐描述</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="ms" ><?php echo $user['ms']; ?></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐状态</label>
                                        <div class="col-sm-10">
                                        <select class="form-control border-input" name="zt">
                                            <option value="1" <?=$user['status']==1?"selected":""?>>正常</option>
                                            <option value="0" <?=$user['status']==0?"selected":""?>>冻结</option>
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
            url: "./tcedit.php?bianji",
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
                  window.location.href = "./tc.php"
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