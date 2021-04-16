<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_order WHERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_order WHERE 1")->fetchColumn();
    $sql=" 1";
}

if(isset($_GET['delete'])){
    $id = $_POST['id'];
    $row=$DB->query("SELECT * FROM hgfh_order WHERE trade_no='{$id}' limit 1")->fetch();
    if (!$row) {
        exit('{"code":-1,"msg":"删除失败，该订单不存在！"}');
    }

    $sql=$DB->exec("DELETE FROM hgfh_order WHERE trade_no='{$id}'");
    if ($sql){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
}
if(isset($_GET['deleteall'])){
     if($islogin=1){
    $sql=$DB->exec("TRUNCATE TABLE hgfh_order");
    if ($sql=true){
        exit('{"code":1,"msg":"删除成功！"}');
    } else {
        exit('{"code":-1,"msg":"删除失败！"}');
    }
     }else{
      exit('{"code":-1,"msg":"权限不足！"}');
     }
}
$title='订单管理列表';
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
                                    <li class="breadcrumb-item"><a href="#">流水管理</a></li>
                                    <li class="breadcrumb-item active"><?=$title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">流水管理</h4> 
                          <div style = "text-align:right;"> 
                          <a href="#" class="btn btn-primary deleteall">清除所有</a>
                          </div>
                          <br>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

              <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">订单列表</h4>
                                <p class="text-muted font-13">
                                   以下是您的订单列表
                                </p>
    
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>订单号</th>
                                        <th>支付订单号</th>
                                        <th>交易类型</th>
                                        <th>交易用户</th>
                                        <th>开始时间</th>
                                        <th>结束时间</th>
                                        <th>交易金额</th>
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
 
                                    $rs=$DB->query("SELECT * FROM hgfh_order WHERE 1 order by trade_no asc limit $offset,$pagesize");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$res['trade_no'].'</td>
                                            <td>'.$res['out_trade_no'].'</td>
                                            <td>'.$res['type'].'</td>
                                            <td>'.$res['uid'].'</td>
                                            <td>'.$res['addtime'].'</td>
                                            <td>'.$res['endtime'].'</td>
                                            <td>'.$res['money'].'</td>
                                          <td>'.($res['status']==1?'<font color=green>交易完成</font>':'<font color=red>未支付</font>').'</td>
                                            <td>
                                                <a href="#" pid="'.$res['trade_no'].'" class="btn btn-xs btn-danger delete">删除</a>
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
