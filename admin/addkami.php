<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $kami = daddslashes($_POST['kami']);
        $money = daddslashes($_POST['money']);
        $cs = daddslashes($_POST['cs']);
        $row1=$DB->query("SELECT * FROM `hgfh_kami` WHERE kami='{$kami}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该标题已被添加过！"}');
                  }
    $sql = $DB->exec("INSERT INTO `hgfh_kami` (`kami`, `time`, `money`,`cs`) VALUES ('{$kami}', '{$date}','{$money}','{$cs}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加卡密';
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
                                    <li class="breadcrumb-item active">添加卡密</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加卡密</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./kami.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">卡密添加</h4>
                                <p class="text-muted font-14">
                                   添加卡密
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">卡密内容</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="kami">
                                         
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">卡密金额</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="money">
                                         
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">可用次数</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="cs">
                                         
                                        </div>
                                    </div>
                                
                                   
                                    <button id="submit" type="button" class="btn btn-primary">添加卡密</button>
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
            url: "./addkami.php?add",
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
                   window.location.href = "./kami.php"
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