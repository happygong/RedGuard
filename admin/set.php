<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['gxsz'])) {
   if($islogin=1){
   $wh= daddslashes($_POST['wh']);
    $reg= daddslashes($_POST['reg']);
   $wbn= daddslashes($_POST['webname']);
   $kw= daddslashes($_POST['keyword']);
   $ms= daddslashes($_POST['miaoshu']);
  $qq= daddslashes($_POST['qq']);
  $beian= daddslashes($_POST['beian']);
  $phone= daddslashes($_POST['phone']);
  $tonji= daddslashes($_POST['tonji']);
      $qqqun= daddslashes($_POST['qqqun']);
       $gxm= daddslashes($_POST['gxm']);
     $gg= daddslashes($_POST['gg']);
    $sql = $DB->exec("UPDATE `hgfh_set` SET `name`='{$wbn}',`ms`='{$ms}',`keyword`='{$kw}',`qq`='{$qq}',`beian`='{$beian}',`phone`='{$phone}',`tonji`='{$tonji}',`qqqun`='{$qqqun}',`gg`='{$gg}',`wh`='{$wh}',`reg`='{$reg}',`gxm`='{$gxm}' WHERE id=1");
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
                            <h4 class="page-title">系统基本设置</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
<?php
              if(isset($m)){
                if($m==1){
                              echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    保存成功!
                                </div>';
                }else{
                echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    保存失败!
                                </div>';
                
                }
              }
                              ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">网站基本配置</h4>
                                <p class="text-muted font-14">
                                   以下是网站的基本配置
                                </p>
                           
                                <form class="form-horizontal" action="./set.php?gxsz" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">网站维护</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="wh">
                                            <option value="1" <?=$conf['wh']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['wh']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户注册</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="reg">
                                            <option value="1" <?=$conf['reg']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['reg']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">系统更新码</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="gxm" value="<?php echo $conf['gxm']; ?>">
                                             <p>重要！！请前往<a href="http://f.bqzmz.com/user" target="_blank">授权系统</a>填写网站链接获取到的更新码填到这里即可正常使用并获取程序更新!</p>
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">网站名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="webname" value="<?php echo $conf['name']; ?>">
                                        </div>
                                    </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">网站关键词</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="keyword" value="<?php echo $conf['keyword']; ?>">
                                          <span class="fd red">以英文,分割</span>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">网站描述</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="miaoshu"><?php echo $conf['ms']; ?></textarea>
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">客服QQ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="qq" value="<?php echo $conf['qq']; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">QQ群聊</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="qqqun" value="<?php echo $conf['qqqun']; ?>">
                                        </div>
                                    </div>
                                  
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">联系电话</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  name="phone" value="<?php echo $conf['phone']; ?>">
                                        </div>
                                    <label class="col-sm-1 col-form-label">备案号</label>
                                    <div class="col-sm-5">
                                            <input type="text" class="form-control"   name="beian" value="<?php echo $conf['beian']; ?>">
                                        </div>
                                    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">统计代码（推荐橙凰数据引擎）</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="tonji"><?php echo $conf['tonji']; ?></textarea>
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">用户中心公告</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="gg"><?php echo $conf['gg']; ?></textarea>
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
            url: "./set.php?gxsz",
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