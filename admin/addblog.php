<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
if(isset($_GET['add'])) {
   if($islogin=1){
        $title = daddslashes($_POST['title']);
        $tag = daddslashes($_POST['tag']);
        $tu = daddslashes($_POST['tu']);
        $content = daddslashes($_POST['content']);
        $zt = daddslashes($_POST['zt']);
        
        $row1=$DB->query("SELECT * FROM `hgfh_blog` WHERE title='{$title}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该标题已被添加过！"}');
                  }
          
    $sql = $DB->exec("INSERT INTO `hgfh_blog` (`title`, `tag`,`tu`,`xq`,`zt`,`date`) VALUES ('{$title}', '{$tag}','{$tu}','{$content}','{$zt}','{$date}')");
  if($sql){
    exit('{"code":1,"msg":"添加成功！"}');
    }else{
     exit('{"code":-1,"msg":"添加失败！可能表单未填写完整！"}');
   
  }
   }
 }
$title='添加博客';
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
                                    <li class="breadcrumb-item active">添加博客</li>
                                </ol>
                            </div>
                            <h4 class="page-title">添加博客</h4>
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
                                <h4 class="header-title">博客添加</h4>
                                <p class="text-muted font-14">
                                   添加博客
                                </p>
                           
                                <form class="form-horizontal" id="form_set" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="title">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">封面图片选择</label>
                                        <div class="col-sm-4">
                                            <select class="form-control border-input" name="tu">
                                            <option value="1">图1</option>
                                            <option value="2">图2</option>
                                            <option value="3">图3</option>
                                            <option value="4">图4</option>
                                        </select>
                                        </div>
                                    <label class="col-sm-1 col-form-label">文章状态</label>
                                    <div class="col-sm-5">
                                            <select class="form-control border-input" name="zt">
                                            <option value="1">正常</option>
                                            <option value="0">隐藏</option>
                                        </select>
                                        </div>
                                    
                                    </div>
                                   <div id="editor">
        <p>填写文章内容</p>
    </div><br>
                                   <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">标签（使用逗号分离）</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="tag">
                                        </div>
                                    </div>
                                    <button id="submit" type="button" class="btn btn-primary">添加博客</button>
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
<?php include("./footer.php"); ?>
  <script type="text/javascript">
     $("#submit").click(function () {
        var title=$("input[name='title']").val();
     
       var tu=$("select[name='tu']").val();
       var tag=$("input[name='tag']").val();
       var zt=$("select[name='zt']").val();
       
        $.ajax({
            type: "POST",
            url: "./addblog.php?add",
            dataType: "json",
            data:{
                   
                    title: title,
                    content: editor.txt.html(),
                    tag: tag,
                    tu: tu,
                    zt: zt
               },
            success: function (data) {
              if (data.code==1) {
                  swal({
                title: "添加成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.href = "./blog.php"
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
  <script type="text/javascript" src="js/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
      
    </script>
    </body>
</html>