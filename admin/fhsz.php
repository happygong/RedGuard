<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['gxsz'])) {
   if($islogin=1){
   $cs= daddslashes($_POST['cs']);
   $mb= daddslashes($_POST['mb']);
    $fh502= daddslashes($_POST['502']);
    $fhtz= daddslashes($_POST['fhtz']);
     $fhwz= daddslashes($_POST['fhwz']);
     $biaoti= daddslashes($_POST['biaoti']);
      $zdybt= daddslashes($_POST['zdybt']);
     $ad= daddslashes($_POST['ad']);
     $mrgg= daddslashes($_POST['mrgg']);
     $sfdl= daddslashes($_POST['sfdl']);
     $token= daddslashes($_POST['token']);
     $vts= daddslashes($_POST['sfvips']);
    $sql = $DB->exec("UPDATE `hgfh_set` SET `cishu`='{$cs}',`mb`='{$mb}',`502`='{$fh502}',`fhtz`='{$fhtz}',`fhwz`='{$fhwz}',`biaoti`='{$biaoti}',`zdybt`='{$zdybt}',`ad`='{$ad}',`mrad`='{$mrgg}',`logintoshort`='{$sfdl}',`token`='{$token}',`viptoshort`='{$vts}' WHERE id=1");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='防红设置';
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
                                    <li class="breadcrumb-item active">防红设置</li>
                                </ol>
                            </div>
                            <h4 class="page-title">防红基本设置</h4>
                        </div>
                    </div>
                </div>     
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">防红基本配置</h4>
                                <p class="text-muted font-14">
                                   以下是防红的基本配置
                                </p>
                           
                                <form class="form-horizontal" action="./set.php?gxsz" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">防红限制次数(到达自动将域名加入黑名单)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="cs" value="<?php echo $conf['cishu']; ?>">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">默认防红模板</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="mb">
                                          <option value="4" <?=$conf['mb']==4?"selected":""?>>5号模板</option>
                                          <option value="3" <?=$conf['mb']==3?"selected":""?>>4号模板</option>
                                           <option value="2" <?=$conf['mb']==2?"selected":""?>>3号模板</option>
                                            <option value="1" <?=$conf['mb']==1?"selected":""?>>2号模板</option>
                                            <option value="0" <?=$conf['mb']==0?"selected":""?>>1号模板</option>
                                        </select>
                                          </div>
                                    </div>
                                  <h4 class="header-title">以下两个举报配置只能选一个开启！</h4>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">防红举报502</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="502">
                                            <option value="1" <?=$conf['502']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['502']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">防红举报跳转</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="fhtz">
                                            <option value="1" <?=$conf['fhtz']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['fhtz']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">防红举报跳转到的网址</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="fhwz" value="<?php echo $conf['fhwz']; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">标题获取</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="biaoti">
                                            <option value="1" <?=$conf['502']==1?"selected":""?>>自动获取页面标题</option>
                                            <option value="0" <?=$conf['502']==0?"selected":""?>>自定义标题</option>
                                        </select>
                                          </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">自定义标题名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="zdybt" value="<?php echo $conf['zdybt']; ?>">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">广告功能是否开启？</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="ad">
                                            <option value="1" <?=$conf['ad']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['ad']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">默认广告</label>
                                     <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="mrgg"><?php echo $conf['mrad']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">仅登录用户可使用</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="sfdl">
                                            <option value="1" <?=$conf['logintoshort']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['logintoshort']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">仅VIP用户可生成链接</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="sfvips">
                                            <option value="1" <?=$conf['viptoshort']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['viptoshort']==0?"selected":""?>>关闭</option>
                                        </select>
                                          </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">仅VIP用户可生成/更新TOKEN</label>
                                     <div class="col-sm-10">
                                        <select class="form-control border-input" name="token">
                                            <option value="1" <?=$conf['token']==1?"selected":""?>>开启</option>
                                            <option value="0" <?=$conf['token']==0?"selected":""?>>关闭</option>
                                        </select>
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
            url: "./fhsz.php?gxsz",
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