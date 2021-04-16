<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['edit'])) {
  $id=$_GET['id'];
  $user=$DB->query("select * from hgfh_blog where id='{$id}' limit 1")->fetch();
}
if(isset($_GET['bianji'])) {
   if($islogin=1){
     $id = daddslashes($_POST['id']);
       $title = daddslashes($_POST['title']);
        $tag = daddslashes($_POST['tag']);
        $tu = daddslashes($_POST['tu']);
        $content = daddslashes($_POST['content']);
        $zt = daddslashes($_POST['zt']);
    $sql = $DB->exec("UPDATE `hgfh_blog` SET `title`='{$title}',`tag`='{$tag}',`tu`='{$tu}',`zt`='{$zt}',`xq`='{$content}' WHERE id='{$id}'");
  if($sql){
    exit('{"code":1,"msg":"修改成功！"}');
    }else{
     exit('{"code":-1,"msg":"修改失败！可能数据一致"}');
   
  }
   }
 }
$title='文章编辑';
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
                                    <li class="breadcrumb-item active">文章编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">编辑文章资料</h4>
                        </div>
                      <div style="text-align:right;"> 
                          <a href="./blog.php" class="btn btn-primary">返回列表</a>
                          </div><br>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">文章资料编辑</h4>
                                <p class="text-muted font-14">
                                   以下是<?=$user['title']?>的资料，保存会对文章更改！
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                  <input type="hidden" name="uid" value="<?php echo $user['id'];?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">文章标题</label>
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
                                        <label class="col-sm-2 col-form-label">封面图片选择</label>
                                        <div class="col-sm-4">
                                            <select class="form-control border-input" id="tu" name="tu">
                                          <option value="1" <?=$user['tu']==1?"selected":""?>>图1</option>
                                            <option value="2" <?=$user['tu']==2?"selected":""?>>图2</option>
                                            <option value="3" <?=$user['tu']==3?"selected":""?>>图3</option>
                                            <option value="4" <?=$user['tu']==4?"selected":""?>>图4</option>
                                        </select>
                                        </div>
                                    <label class="col-sm-1 col-form-label">文章状态</label>
                                    <div class="col-sm-5">
                                            <select class="form-control border-input" name="zt">
                                            <option value="1"<?=$user['zt']==1?"selected":""?>>正常</option>
                                            <option value="0"<?=$user['zt']==0?"selected":""?>>隐藏</option>
                                        </select>
                                        </div>
                                    
                                    </div>
                                   <div id="editor">
 <p><?php   
   echo htmlspecialchars_decode($user['xq']);?></p>
    </div><br>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">标签（使用逗号分离）</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="tag" value="<?php echo $user['tag']; ?>">
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
                  window.location.href = "./blog.php"
                  });
               </script>
                  
                  <?php } ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        var title=$("input[name='title']").val();
       var id=$("input[name='uid']").val();
       var tu=$("select[name='tu']").val();
       var tag=$("input[name='tag']").val();
       var zt=$("select[name='zt']").val();
        $.ajax({
            type: "POST",
            url: "./blogedit.php?bianji",
            dataType: "json",
            data: {
              id: id,
                    title: title,
                    content: editor.txt.html(),
                    tag: tag,
                    tu: tu,
                    zt: zt
               },
            success: function (data) {
              if (data.code==1) {
                  swal({
                title: "修改成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                  window.location.href = "./blog.php"
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
  <script type="text/javascript" src="js/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    //editor.txt.append('<?php echo $user['xq']; ?>')
    </script>
    </body>
</html>