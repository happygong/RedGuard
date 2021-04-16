<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['gdid'];
  $user=$DB->query("select * from hgfh_gdxq where id='{$id}' limit 1")->fetch();
}

if(isset($_GET['huifu'])){
     if($islogin=1){
      $info = $_POST['info'];
       if($info==''){
       
       exit('{"code":-1,"msg":"回复内容不能为空！"}');
       
       }
      $gdid = $_POST['gdid'];
      $sql = $DB->exec("INSERT INTO `hgfh_gdxq` (`time`,`info`, `gdid`,`uid`, `sfgly`) VALUES ('{$date}', '{$info}', '{$gdid}','0', '1')");
    if ($sql){
         exit('{"code":1,"msg":"回复成功！"}');
    } else {
         exit('{"code":-1,"msg":"回复失败！"}');
    }
     }
   
}
if(isset($_GET['close'])){
      $gdid = $_POST['gdid'];
  {
    $sql1 = $DB->exec("UPDATE `hgfh_gd` SET `zt` = '0' WHERE id = '{$gdid}'");
    if ($sql1){
         exit('{"code":1,"msg":"关闭成功！"}');
    } else {
         exit('{"code":-1,"msg":"关闭失败！工单号：'.$gdid.'"}');
    }
  
  }
}
if(isset($_GET['kaiqi'])){
  
      $gdid = $_POST['gdid'];
     if($islogin=1){
    $sql1 = $DB->exec("UPDATE `hgfh_gd` SET `zt` = '1' WHERE id = '{$gdid}'");
    if ($sql1){
         exit('{"code":1,"msg":"开启成功！"}');
    } else {
         exit('{"code":-1,"msg":"开启失败！工单号：'.$gdid.'"}');
    }
  
     }
}
$title='用户工单详情';
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
                                    <li class="breadcrumb-item active">管理员编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">用户工单详情</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./gd.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ribbon-box">
                                <div class="ribbon ribbon-dark">对话详情</div>
                                <label>对话详情</label>
                                                <?php 
                                             
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=60;
                                    }
                                    $pages=intval($numrows/$pagesize);
                                    if ($numrows%$pagesize)
                                    {
                                     $pages++;
                                     }
                                    if (isset($_GET['page'])){
                                    $page=intval($_GET['page']);
                                    }
                                    else{
                                    $page=1;
                                    }
                                    $offset=$pagesize*($page - 1);
                                    $uid=$userrow['id'];
 
                                    $rs=$DB->query("SELECT * FROM hgfh_gdxq WHERE `gdid`= '{$id}'");
                                    
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        if($res['sfgly']==0){echo '<div class="col-lg-4">
                        <div class="card">
                            <div class="card-body ribbon-box">
                                <div class="ribbon ribbon-warning">用户:'.$res['uid'].'</div>
                               
                                        <tr>
                                           
                                            <td>提交时间:'.$res['time'].'</td>
                                          </br>
                                            <td><h3>'.$res['info'].'</h3></td>
                                            
                                        </tr>
                            </div> <!-- end card-body-->
                        </div>
                    </div></br>';}else if($res['sfgly']==1){
                                        echo '<div class="col-lg-4">
                        <div class="card">
                            <div class="card-body ribbon-box">
                                <div class="ribbon ribbon-info">管理员回复(您)</div>
                                <tr>
                                           
                                            <td>回复时间:'.$res['time'].'</td>
                                            
                                            <td><h3>'.$res['info'].'</h3></td>
                                            
                                        </tr>
                            </div> <!-- end card-body-->
                        </div>
                    </div></br>';
                                        
                                        
                                        }
                                    }
                                    ?>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">工单详情编辑</h4>
                               
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                  <input type="hidden" name="gdid" value="<?php echo $user['id'];?>">
                                     <div class="row">
                                        <form  class="form-signin" id="form_huifu" method="POST">
                                        <div class="col-md-12">
                                          <input type="hidden" id="gdid" name="gdid" value="<?php echo $id;?>">
                                        <div class="form-group">
                                            <label>回复内容</label>
                                            <textarea rows="5" id="info" class="form-control border-input" placeholder="请输入回复" name="info"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                
                                   <?php 
                               $rowgd=$DB->query("SELECT * FROM hgfh_gd WHERE id='{$id}' limit 1")->fetch();
                              if($rowgd['zt']==1){?>
                               <form  class="form-signin" id="form_huifu" method="POST">
                                 <input type="hidden" id="gdid" name="gdid" value="<?php echo $id;?>">
                                  <div class="text-center">
                                        <button id="close" type="button" class="btn btn-info btn-fill btn-wd">关闭工单</button>
                                    </div></form><?php }else{ ?>
                               <form  class="form-signin" id="form_kaiqi" method="POST">
                                 <input type="hidden" id="gdid" name="gdid" value="<?php echo $id;?>">
                                  <div class="text-center">
                                        <button id="kaiqi" type="button" class="btn btn-info btn-fill btn-wd">恢复工单</button>
                                    </div></form><?php } ?>
                                    <div class="clearfix"></div>
                                       <div class="text-center">
                                    <button id="submit" type="button" class="btn btn-primary">提交回复</button>
                                       </div>
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
                  window.location.href = "./gd.php"
                  });
               </script>
                  
                  <?php } ?>
  <script type="text/javascript">
      $("#submit").click(function () {
      $.ajax({
          type: "POST",
          url: "./gdedit.php?huifu",
          dataType: "json",
          data:{
                    gdid: $("#gdid").val(),
                    info: $("#info").val(),
               },
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
  $("#close").click(function () {

      $.ajax({
          type: "POST",
          url: "./gdedit.php?close",
          dataType: "json",
          data:{
                    gdid: $("#gdid").val(),
               },
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
  $("#kaiqi").click(function () {
 
      $.ajax({
          type: "POST",
          url: "./gdedit.php?kaiqi",
          dataType: "json",
          data:{
                    gdid: $("#gdid").val(),
               },
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