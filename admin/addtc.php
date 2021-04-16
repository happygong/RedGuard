<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $title = daddslashes($_POST['name']);
        $money = daddslashes($_POST['money']);
        $time = daddslashes($_POST['time']);
        $content = daddslashes($_POST['ms']);
        $zt = daddslashes($_POST['zt']);
        $api = daddslashes($_POST['api']);
        $row1=$DB->query("SELECT * FROM `hgfh_tc` WHERE name='{$title}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该标题已被添加过！"}');
                  }
    $sql = $DB->exec("INSERT INTO `hgfh_tc` (`name`, `ms`, `money`,`time`,`date`,`status`,`api`) VALUES ('{$title}','{$content}','{$money}','{$time}','{$date}','{$zt}','{$api}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加套餐';
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
                                    <li class="breadcrumb-item"><a href="#">套餐管理</a></li>
                                    <li class="breadcrumb-item active">添加套餐</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加套餐</h4>
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
                                <h4 class="header-title">套餐添加</h4>
                                <p class="text-muted font-14">
                                   添加套餐
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="name">
                                         
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐价格</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="money">
                                            <p>可带小数，不超过20位</p>
                                         
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐有效期</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="time">
                                         <p>整型，如填30，套餐有效期就算30天（一个月）</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">赠送API调用次数</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="api">
                                         <p>整型，如填30，就有30次</p>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐描述</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="ms"></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">套餐状态</label>
                                        <div class="col-sm-10">
                                        <select class="form-control border-input" name="zt">
                                            <option value="1">正常</option>
                                            <option value="0">冻结</option>
                                        </select>
                                  </div></div>
                                    <button id="submit" type="button" class="btn btn-primary">添加套餐</button>
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
            url: "./addtc.php?add",
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
                   window.location.href = "./tc.php"
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