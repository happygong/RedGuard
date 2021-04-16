<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_domain WHERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_domain WHERE 1")->fetchColumn();
    $sql=" 1";
}

if(isset($_GET['delete'])){
    $id = $_POST['id'];
    $row=$DB->query("SELECT * FROM hgfh_domain WHERE id='{$id}' limit 1")->fetch();
    if (!$row) {
        exit('{"code":-1,"msg":"删除失败，该域名不存在！"}');
    }
    $sql=$DB->exec("DELETE FROM hgfh_domain WHERE id='{$id}'");
    if ($sql){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
}
$title='域名管理列表';
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
                            <h4 class="page-title">域名设置管理</h4> 
                          <div style = "text-align:right;"> 
                          <a href="./adddomain.php" class="btn btn-primary">添加域名</a>
                          </div>
                          <br>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

              <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">域名列表</h4>
                                <p class="text-muted font-13">
                                   以下是您生成时会选择域名的列表
                                </p>
    
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>域名</th>
                                        <th>创建时间</th>
                                        <th>是否为VIP域名</th>
                                        <th>状态</th>
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
 
                                    $rs=$DB->query("SELECT * FROM hgfh_domain WHERE 1 order by id asc limit $offset,$pagesize");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['url'].'</td>
                                            <td>'.$res['time'].'</td>
                                            <td>'.($res['vip']==1?'<font color=red>VIP</font>':'<font color=green>免费</font>').'</td>
                                            <td>'.($res['zt']==1?'<font color=green>正常</font>':'<font color=red>报毒</font>').'</td>
                                            <td><a href="./domainedit.php?edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑</a>&nbsp;
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
    
</script>
    </body>
</html>
