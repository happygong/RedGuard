<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}
$user=$DB->query("SELECT count(*) from `hgfh_user` WHERE 1")->fetchColumn();
$uservip=$DB->query("SELECT count(*) from `hgfh_user` WHERE `vip`=1")->fetchColumn();
$jl=$DB->query("SELECT count(*) from `hgfh_jl` WHERE 1")->fetchColumn();
$fw=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE 1")->fetchColumn();
$title='仪表板';
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
                                    <li class="breadcrumb-item"><a href="#">乐公</a></li>
                                    <li class="breadcrumb-item active">仪表盘</li>
                                </ol>
                            </div>
                            <h4 class="page-title">仪表盘</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-cart text-primary widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">生成总数</h5>
                                    <h3 class="mt-2"><?php echo round($jl,2);?></h3>
                                </div>
                                <div id="sparkline1"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-currency-usd text-danger widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">VIP总数</h5>
                                    <h3 class="mt-2"><?php echo round($uesrvip,2);?></h3>
                                </div>
                                <div id="sparkline2"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-account-multiple text-primary widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">用户总数</h5>
                                    <h3 class="mt-2"><?php echo round($user,2);?></h3>
                                </div>
                                <div id="sparkline3"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-eye-outline text-danger widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">访问量</h5>
                                    <h3 class="mt-2"><?php echo round($fw,2);?></h3>
                                </div>
                                <div id="sparkline4"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

              
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">最近生成的5条记录</h4>
                                 <div style = "text-align:right;"> 
                                   <a href="./jl.php" class="btn btn-primary deleteall">查看所有记录</a>
                          </div></br></br>
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>原链接</th>
                                        <th>日期</th>
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
                                    $pagesize=5;
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
                        </div>
                    </div>
                </div>
                <!-- end row -->

                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


<?php include("./footer.php"); ?>
