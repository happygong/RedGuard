<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_jl HERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_jl WHERE 1")->fetchColumn();
    $sql=" 1";
}

if(isset($_GET['delete'])){
    $id = $_POST['id'];
    $row=$DB->query("SELECT * FROM hgfh_jl WHERE id='{$id}' limit 1")->fetch();
    if (!$row) {
        exit('{"code":-1,"msg":"删除失败，该记录不存在！"}');
    }
    $sql=$DB->exec("DELETE FROM hgfh_jl WHERE id='{$id}'");
    if ($sql){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
}
if(isset($_GET['deleteall'])){
     if($islogin=1){
    $sql=$DB->exec("TRUNCATE TABLE hgfh_jl");
    if ($sql=true){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
     }else{
      exit('{"code":-1,"msg":"权限不足！"}');
     }
}
$title='防红生成记录';
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
                                    <li class="breadcrumb-item"><a href="#">用户管理</a></li>
                                    <li class="breadcrumb-item active"><?=$title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">防红生成历史</h4> 
                           <div style = "text-align:right;"> 
                          <a href="#" class="btn btn-primary deleteall">删除所有记录</a>
                          </div>
                          <br>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

              <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">防红生成列表</h4>
                                <p class="text-muted font-13">
                                   以下是您的防红生成列表
                                </p>
    
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>原链接</th>
                                        <th>日期</th>
                                       <th>生成后链接</th>
                                      <th>跳转类型</th>
                                        <th>IP</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=10;
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
 
                                    $rs=$DB->query("SELECT * FROM hgfh_jl WHERE 1 order by id asc limit $offset,$pagesize");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['url'].'</td>
                                            <td>'.$res['date'].'</td>
                                             <td>'.$res['link'].'</td>
                                           <td>'.($res['type']==2?'<font color=blue>直链</font>':'<font color=green>跳转</font>').'</td>
                                            <td>'.$res['ip'].'</td>
                                            <td>
                                                <a href="#" pid="'.$res['id'].'" class="btn btn-xs btn-danger delete">删除</a>
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div> <!-- end card-body -->
                          
                        </div>
                 <div id="demo7" style="text-align: center;"></div>
                
                
            </div> <!-- end container -->
        </div>
<?php include("./footer.php"); ?>
  <script type="text/javascript">
     $(".deleteall").click(function() {
  var id = $(this).attr("pid");
     Swal.fire({
  title: '删除确认',
        text: "您确定删除吗？一旦删除将清空所有记录！",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: '是的哦',
        cancelButtonText: '点错了',
        buttonsStyling: false
}).then((result) => {
           if (result.value) {
    $.ajax({
      type: "POST",
      url: "?deleteall",
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        if (data.code == 1) {
          swal({
                title: "删除成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.reload();
                  });
        } else {
            swal({
                title: "删除失败！",
                text: data.msg,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
        }
      }
    })
           }
     })
   })
    
</script>
    </body>
</html>
