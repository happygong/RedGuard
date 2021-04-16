<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_banlink WHERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_banlink WHERE 1")->fetchColumn();
    $sql=" 1";
}

if(isset($_GET['delete'])){
    $id = $_POST['id'];
    $row=$DB->query("SELECT * FROM hgfh_banlink WHERE id='{$id}' limit 1")->fetch();
    if (!$row) {
        exit('{"code":-1,"msg":"删除失败，该链接不存在！"}');
    }

    $sql=$DB->exec("DELETE FROM hgfh_banlink WHERE id='{$id}'");
    if ($sql){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
}
$title='短链报毒检测';
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
                                    <li class="breadcrumb-item"><a href="#">服务管理</a></li>
                                    <li class="breadcrumb-item active"><?=$title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">短链报毒检测</h4> 
                            <p>如需定时检测请前往堡塔面板开启定时任务，并设置访问链接为./urlcheck.php</p>
                          <div style = "text-align:right;"> 
                          <a href="./addban.php" class="btn btn-primary">添加链接</a>
                          </div>
                          <br>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

              <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">失效链接列表</h4>
                                <p class="text-muted font-13">
                                   以下是您的失效链接列表
                                </p>
    
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>短链</th>
                                        <th>原因</th>
                                         <th>日期</th>
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
 
                                    $rs=$DB->query("SELECT * from hgfh_banlink  order by id asc limit $offset,$pagesize");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['link'].'</td>
                                            <td>'.$res['reason'].'</td>
                                          <td>'.$res['date'].'</td>
                                            <td><a href="./domain.php" class="btn btn-xs btn-info">前往停用</a>&nbsp;
                                            <a href="./banlinkedit.php?edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑原因</a>&nbsp;
                                                <a href="#" pid="'.$res['id'].'" class="btn btn-xs btn-danger delete">删除报毒</a>
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
    
</script>
    </body>
</html>
