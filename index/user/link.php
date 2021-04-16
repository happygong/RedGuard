<?php 
$title='链接统计';
include("./info.php");
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_sc WHERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_sc WHERE 1")->fetchColumn();
    $sql=" 1";
}
include("./header.php");

?>
<?php 

include("./navbar.php");

?>
<div class="content">
        <div class="container-fluid">
          <?php 
//$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();

if($userrow['zt']== 2){
  
  
  echo " <div class=\"alert alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 警告 - </b> 当前账户处于禁封状态，请联系管理申述！</span>
                  </div>";
  
  
  }

?>
          <?php 
//$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();

if($userrow['phone']== NULL){
  
  
  echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您购买产品的凭据！</span>
                  </div>";
  
  
  }else if($userrow['qq']== NULL){

echo " <div class=\"alert alert-warning\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <i class=\"material-icons\">close</i>
                    </button>
                    <span>
                      <b> 温馨提示 - </b> 请先前往设置中心完善您的个人信息，这是您购买产品的凭据！</span>
                  </div>";


}
?>
 <div class="content">
        <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">总点击量</p>
                    <h3 class="card-title"><?php echo $usershu1;?>次</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
        
                      <a href="./pay.php">下载报告...</a>
                    </div>
                    </div>
                  </div>
                </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">您已绑定生成</p>
                    <h3 class="card-title"><?php echo round($userlink,2);?>个链接</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> <a href="./agentno.php">加入代理优惠多多...</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">今日统计</p>
                    <h3 class="card-title"><?php echo $usershut;?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> <a href="./link.php">查看统计</a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">昨日统计</p>
                    <h3 class="card-title"><?php echo $usershuy;?>次点击</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> 感谢您的支持
                    </div>
                  </div>
                </div>
              </div>
            </div>
     
         <?php if($userrow['vip']==0){ ?>
         
         <div class="text-center"><h2>精准统计！就用我缩~</h2><p>开通VIP享受状态记录，链接异常监控等等高级功能哦~</p><a href="../vip.php"   class="btn btn-xs btn-danger">立即开通<div class="ripple-container"></div></a></div>
         <?php }else{ ?>
         <div class="row">
   <div class="col-lg-6">
              <div class="card">
                <div class="card-header card-header-tabs card-header-rose">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">状态与记录:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="#profile" data-toggle="tab">
                            <i class="material-icons">bug_report</i> 我的最火短链
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> 我的最近生成
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> 整站最火
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                         
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body"><h5>（注意：仅显示前五条）</h5>
                  <div class="tab-content">
                    <div class="tab-pane active show" id="profile">
                      <table class="table">
                        <tbody>
                             <?php 
                        //   $rs=$DB->query("SELECT url, count( * ) AS count FROM hgfh_jl GROUP BY url ORDER BY count DESC LIMIT 5 ");
                           
                             //$mylink=base64_encode('http://'.$res['url']);
                             $mylink=$DB->query("SELECT * FROM `hgfh_sc` WHERE user='{$userrow['id']}'");
                             $link = array();
                             $count = 0;
                             while($res = $mylink->fetch()){
                                 $longurl=base64_decode($res['url']);
                                  $lenglongurl = strlen($longurl);
                           $nohttp = substr($longurl,7,$lenglongurl);

                           if(substr($nohttp,-1)=="/"){
                             $count = strlen($nohttp)-1;
                             $strre  = substr($nohttp,0,$count);
                             $nohttp = $strre;
                            }
                            $linkcount=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url='{$nohttp}'")->fetchColumn();
                                 $link[$nohttp]=$linkcount;
                             }
                             arsort($link); //依据键值倒序排列
                             $cs = 0;
                             foreach ($link  as $j=>$j_value){
                                 //echo $j.$j_value."<br>";
                             //}
                             //echo $mylink;
                             $links = base64_encode('http://'.$j);
                             $linkid=$DB->query("SELECT * FROM `hgfh_sc` WHERE url='{$links}' limit 1")->fetch();
                          echo '<tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>'.$j.'</td>
                             <td>'.$j_value.'次点击 </td>
                            <td class="td-actions text-right">
                              <a href="./tonji.php?edit&id='.$linkid['id'].'" rel="tooltip" title="查看详情" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">equalizer</i>
                              </a>
                              
                            </td>
                          </tr>';
                               $cs++;
                               if($cs>=5){
                                   break;
                               }
                           }
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <tbody>
                           <?php 
                           $rs=$DB->query("SELECT * FROM hgfh_jl WHERE user='{$userrow['id']}' order by id asc limit 5");
                           while($res = $rs->fetch())
                                    {
                                     
                          echo '<tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>'.$res['url'].'</td>';
                             ?>
                            
                             <td>
                             <?=($res['type']==1?'<font color=blue>跳转</font>':'<font color=green>直链</font>')?>
                            </td>
                          <?php
                               echo '
                             <td>短链：<a href='.$res['link'].' target="_blank">'.$res['link'].' </a></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="查看详情" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              
                            </td>
                          </tr>';
                           }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                         <?php 
                           $rs=$DB->query("SELECT url, count( * ) AS count FROM hgfh_fwjl GROUP BY url ORDER BY count DESC LIMIT 5 ");
                           while($res = $rs->fetch())
                                    {
                             
                             //echo $res['url'];
                             //echo '</br>';
                  
                          echo '<tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>'.$res['url'].'</td>
                             <td>点击次数：'.$res['count'].'次 </td>
                            <td class="td-actions text-right">
                              
                              
                            </td>
                          </tr>';
                                
                           }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
   <div class="col-lg-6">
              <div class="card">
                <div class="card-header card-header-text card-header-warning">
                  <div class="card-text">
                    <h4 class="card-title">防红链接状态异常监控</h4>
                    <p class="card-category">如遇到链接状态异常请重新生成！</p>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>异常原因</th>
                      <th>报错日期</th>
                      <th>链接</th>
                    </tr></thead>
                    <tbody>
                       <?php $rs=$DB->query("SELECT * FROM `hgfh_banlink` WHERE 1 order by id desc limit 4");
                           while($res = $rs->fetch()){?>
                      <tr>
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['reason']; ?></td>
                        <td><?php echo $res['date']; ?></td>
                        <td><?php echo $res['link']; ?></td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
         </div>
   
                   </div> </div>
                   <?php } ?>
   <div class="row">
     <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">我的链接</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            ID
                          </th>
                          <th>
                            原链接
                          </th>
                          <th>
                            跳转类型
                          </th>
                            <th>
                            跳转模板
                          </th>
                             <th>
                            跳转广告
                          </th>
                          <th>
                            生成时间
                          </th>
                          <th>
                            操作
                          </th>
                        </tr></thead>
                        <tbody>
                          <?php 
                           $i=1;
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
                           $rs=$DB->query("SELECT * FROM hgfh_sc WHERE user='{$id}' order by id asc limit $offset,$pagesize");
                      
                                    while($res = $rs->fetch())
                                    {
                                      $longurl=base64_decode($res['url']);
                                      
                          ?>
                          <tr>
                            <td>
                              <?=$i?>
                            </td>
                            <td>
                              <?=$longurl?>
                            </td>
                            
                            <td>
                             <?=($res['type']==1?'<font color=blue>跳转到浏览器</font>':'<font color=green>直链打开</font>')?>
                            </td>
                            <td>
                              <?=$res['mb']?>号模板
                            </td>
                             <td>
                                <?=($res['ad']==NULL?'<font color=red>未自定义广告</font>':'<font color=green>自定义广告</font>')?>
                            </td>
                            <td>
                               <?=$res['date']?>
                            </td>
                            
                            <td>
                              <a href="./addad.php?edit&id=<?=$res['id']?>" pid="'.$res['id'].'" class="btn btn-xs btn-success">添加广告</a>
                              <?php if($res['type']==1){echo '<a href="./editmb.php?edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑模板</a>';}?>
                             <a href="./tonji.php?edit&id=<?=$res['id']?>" class="btn btn-xs btn-danger delete">查看统计</a>
                            </td>
                          </tr>
                          <?php
                            $i++;
                          }
                            ?>
                          
                        </tbody>
                      </table>
                      
                    </div>
                    
                    <ul class="pagination" >
                      <li class="page-item">
                          <?php if($page>1){ ?>
                        <a class="page-link" href="?page=<?php echo $page-1;?>&pagesize=<?=$pagesize?>" aria-label="Previous">
                          <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </a>
                        <?php } ?>
                      </li>
                      <?php
                      $j=1;
                      for($i=$numrows;$i>0;$i=$i-$pagesize){
                      ?>
                      <?php if($j==$page) { ?>
                      <li class="page-item active">
                          <?php }else{ ?>
                          <li class="page-item">
                          <?php } ?>
                        <a class="page-link" href="?page=<?=$j?>&pagesize=<?=$pagesize?>"><?=$j?><div class="ripple-container"></div></a>
                      </li>
                      <?php $j++; } ?>
                      <?php if($page<$j-1){ ?>
                      
                      <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page+1;?>&pagesize=<?=$pagesize?>" aria-label="Next">
                          <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </a>
                      </li>
                      <?php } ?>
                    </ul>
                    <!--<div id="demo7" style="text-align: center;"></div>-->
                  </div>
                </div>
       
              </div></div><?php if($userrow['vip']==0){ ?></div></div> <?php } ?>
  
      
      </div>  
               <script src="assets/layui/layui.js"></script>
            <script>
  layui.use(['laypage', 'layer'], function(){
var laypage = layui.laypage,
layer = layui.layer; 
laypage.render(
  {
    elem: 'demo7',
    count: <?php echo ($numrows!=''? $numrows:'0');?>,
    first: false,
    last: false,
    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'],
    groups: 1, //只显示 1 个连续页码
    first: false, //不显示首页
    last: false, //不显示尾页
    curr: <?php echo ($page!=''? $page:'0');?> ,
    jump: function(obj,first){
      if(first!=true){
            var currentPage = obj.curr;
            window.location.href ="?page="+currentPage+"&pagesize="+obj.limit+"<?php echo $link.$pag;?>";
       }
   }
});
});
</script>     
<?php 

include("./footer.php");

?>
            <?php 

include("./footeri.php");

?>