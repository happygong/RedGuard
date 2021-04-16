<?php 
include("./info.php");
$act=isset($_GET['act'])?daddslashes($_GET['act']):null;
switch ($act) {
    case 'gdxq':
        $user = daddslashes($_GET['user']);
        $gdid = daddslashes($_GET['gdid']);
        $info = daddslashes($_GET['info']);
        $time = daddslashes($_GET['time']);
        if ($user=='') {
            exit('{"code":-1,"msg":"用户ID不能为空！"}');
        }
        if ($gdid=='') {
           exit('{"success":true,"code":-1,"msg":"工单ID不能为空！"}');
        }
        $row=$DB->query("SELECT * FROM `hgfh_gdxq` WHERE gdid='{$gdid}'")->fetch();
        if ($row) {
        
          break;
        }else if (!$row){
                
                $DB->query("INSERT INTO `hgfh_gdxq` (`uid`, `info`, `gdid`, `time`) VALUES ('{$user}', '{$info}', '{$gdid}', '{$time}')");
                
            }
        
    break;
}
if($userrow['status']==2){
  header('Location: ./shopban.php'); }
$title='工单详情';


?>

<!DOCTYPE html>
<html lang="cn">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="http://www.orangephoenix.net/lgcss/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>
  <?php 

include("./navbar.php");

?>
<div class="content">
        <div class="container-fluid">
          <div class="header text-center">
            <h3 class="title">工单详情</h3>
            <p><?php $row1=$DB->query("SELECT * FROM `hgfh_gd` WHERE id='{$gdid}'")->fetch();
              echo $row1['title']; ?></p>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-timeline card-plain">
                <div class="card-body">
                  <ul class="timeline">
                    
                    
                      <?php 
                                    $i=0;
                                    if(isset($_GET['pagesize'])){
                                    $pagesize=$_GET['pagesize'];
                                    }else{
                                    $pagesize=100;
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
                                    $rs=$DB->query("SELECT * FROM hgfh_gdxq WHERE `gdid`={$gdid} && `uid`= {$user} || `sfgly`= 1");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                      if($user == $res['uid']){
                                      echo '用户ID：';
                                      echo $res['uid'];
                                        echo '<li> <div class="timeline-badge warning">
                        <i class="material-icons">flight_land</i>
                      </div>
                      <div class="timeline-panel">
                        <div class="timeline-heading">
                          <span class="badge badge-pill badge-warning">我-'.$res['time'].'</span>
                        </div>
                        <div class="timeline-body">
                          <p>'.$res['info'].'</p>
                        </div>
                      </div>
                    </li>
                                    ';}else if($res['uid']== 0 && $res['gdid']== $gdid && 1 == $res['sfgly'] ){
                                      
                                     
                                        echo '<li class="timeline-inverted">
                      <div class="timeline-badge info">
                        <i class="material-icons">fingerprint</i>
                      </div>
                      <div class="timeline-panel">
                        <div class="timeline-heading">
                          <span class="badge badge-pill badge-info">管理员回复-'.$res['time'].'</span>
                        </div>
                        <div class="timeline-body">
                          <p>'.$res['info'].'</p>
                         
                          <hr>
                        </div>
                        <div class="timeline-footer">
                         <a class="btn btn-info" href="./gdhf.php?edit&gdid='.$_GET['gdid'].'">对TA回复</a>
                          <a class="btn btn-primary" href="./gd.php">返回工单</a>
                          
                        </div>
                      </div>
                    </li>';
                                      
                                      
                                      
                                      }
                                    }
                                    ?>
                    <?php 
                    
                      $row=$DB->query("SELECT * FROM `hgfh_gd` WHERE id='{$gdid}'")->fetch();
                    if(0==$row['zt']){
                    echo '<li class="timeline-inverted">
                      <div class="timeline-badge danger">
                        <i class="material-icons">card_travel</i>
                      </div>
                      <div class="timeline-panel">
                        <div class="timeline-heading">
                          <span class="badge badge-pill badge-danger">此工单已被管理员结束</span>
                        </div>
                        <div class="timeline-body">
                          <p>工单已被管理员结束，如您的问题已解决可以删除此工单，如没有解决问题您可以返回再次重新发起工单！</p>
                        </div>
                        <h6>
                          <a href = "./gd.php"><i class="ti-time"></i> 返回工单页面</a>
                        </h6>
                      </div>
                    </li>';}
                    
                    ?>
                     
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php 

include("./footer.php");

?>
  <?php
  include 'footeri.php';
  ?>