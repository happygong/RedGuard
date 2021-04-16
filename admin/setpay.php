<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
// if(isset($_GET['edit'])) {
//   //$id=$_GET['id'];
//   $user=$DB->query("select * from hgfh_inte where `id` = 1 limit 1")->fetch();
// }
$user=$DB->query("select * from hgfh_inte where `id` = 1 limit 1")->fetch();
if(isset($_GET['bianji'])) {
   if($islogin=1){
    //$id = daddslashes($_POST['id']); 
    $id = daddslashes($_POST['id']);
    $key = daddslashes($_POST['key']);
    $zd = daddslashes($_POST['zd']);
    //$xs = daddslashes($_POST['display']);
    //echo $id;
    $sql = $DB->exec("UPDATE `hgfh_inte` SET `codepay_id`='{$id}',`codepay_key`='{$key}',`date`='{$date}',`zd`='{$zd}' WHERE id='1'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='支付配置';
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
                                    <li class="breadcrumb-item"><a href="#">流水管理</a></li>
                                    <li class="breadcrumb-item active">支付配置</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑支付</h4>
                        </div>
                    <!--  <div style="text-align:right;"> -->
                    <!--      <a href="./gg.php" class="btn btn-primary">返回列表</a>-->
                    <!--      </div><br>-->
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">支付配置</h4>
                                <p class="text-muted font-14">
                                   以下是您的支付配置，保存会对支付更改！
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    
                                  <input type="hidden" name="id" value="<?php echo $id;?>">
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">上次修改时间</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="date" value="<?php echo $user['date']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">码支付ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="id" value="<?php echo $user['codepay_id']; ?>">
                                        </div>
                                    </div>
                                
                                  
                                 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">码支付密匙</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="key" ><?php echo $user['codepay_key']; ?></textarea>
                                        </div>
                                    </div>
                                   
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">最低充值限制</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="zd" value="<?php echo $user['zd']; ?>">
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
            url: "./setpay.php?bianji",
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
                  window.location.href = "./setpay.php"
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