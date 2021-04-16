<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $qust = daddslashes($_POST['title']);
        $answer = daddslashes($_POST['answer']);
       $zt = daddslashes($_POST['zt']);
        
        $row1=$DB->query("SELECT * FROM `hgfh_faq` WHERE qustion='{$qust}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该问题已被添加过！"}');
                  }
          
    $sql = $DB->exec("INSERT INTO `hgfh_faq` (`qustion`, `answer`,`date`,`zt`) VALUES ('{$qust}', '{$answer}','{$date}','{$zt}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加问题';
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
                                    <li class="breadcrumb-item active">添加问题</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加FAQ</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./faq.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">问题添加</h4>
                                <p class="text-muted font-14">
                                   添加常见问题与答案
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">问题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="title">
                                         
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">问题状态</label>
                                        <div class="col-sm-10">
                                            <select class="form-control border-input" name="zt">
                                          
                                            <option value="1">正常</option>
                                            <option value="0">隐藏</option>
                                        </select>
                                        </div>
                                   
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">答案内容</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="answer"></textarea>
                                        </div>
                                    </div>
                                   
                                    <button id="submit" type="button" class="btn btn-primary">添加FAQ</button>
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
            url: "./addfaq.php?add",
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
                   window.location.href = "./faq.php"
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