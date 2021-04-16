<?php
/**
编写人员 乐公网络
作者QQ:2302567351
乱改版权死户口
**/
include ('../include/common.php');
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='search') {
    $sql=" `name`='{$_GET['name']}'";
    $numrows=$DB->query("SELECT * from hgfh_blog WHERE{$sql}")->rowCount();
}else{
    $numrows=$DB->query("SELECT count(*) from hgfh_blog WHERE 1")->fetchColumn();
    $sql=" 1";
}
$bt=''.$conf['name'].'-博客-完美解决推广难题！';
$title=$bt;
include ('./header.php');
?>
<!--============= Page Header Section Starts Here =============-->
    <section class="page-header">
        <div class="banner-bg bg_img" data-background="./assets/images/banner/banner-bg.jpg">
            <div class="banner-bg-shape"><img src="./assets/images/banner/banner-shape.png" alt="banner"></div>
            <div class="round-1">
                <img src="./assets/images/banner/01.png" alt="banner">
            </div>
            <div class="round-2">
                <img src="./assets/images/banner/02.png" alt="banner">
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="title">防红博客</h1>
            </div>
        </div>
    </section>
    <!--============= Page Header Section Ends Here =============-->



    
    <!--============= Blog Section Starts Here =============-->
    <section class="blog-section mt--150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="mb-40-none">
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

                                    $rs=$DB->query("SELECT * FROM hgfh_blog WHERE zt=1");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                       echo '
                                       <div class="post-item style-two">
                            <div class="post-thumb">
                                <a href="./detail.php?id='.$res['id'].'"><img src="./assets/images/blog/blog'.$res['tu'].'.jpg" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <h3 class="title">
                                    <a href="./detail.php?id='.$res['id'].'">'.$res['title'].' </a>
                                </h3>
                                <p>点击查看详情</p>
                                <a href="./detail.php?id='.$res['id'].'" class="read">'.$res['view'].'次浏览</a>
                                <a href="./detail.php?id='.$res['id'].'" class="read">'.$res['pl'].'条评论</a>
                            </div>
                        </div>
                    ';
                                    }
                  ?>
                        
                    </article>
                    <div id="demo7" style="text-align: center;"></div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <aside class="sticky-menu">
                        <div class="widget widget-search">
                            <h5 class="title">搜索文章</h5>
                            <form class="search-form">
                                <input type="text" placeholder="输入您想搜索的内容" required>
                                <button type="submit"><i class="flaticon-loupe"></i>搜索</button>
                            </form>
                        </div>
                        <div class="widget widget-post">
                            <h5 class="title">最近更新</h5>
                            <div class="slider-nav">
                                <span class="widget-prev"><i class="fas fa-angle-left"></i></span>
                                <span class="widget-next active"><i class="fas fa-angle-right"></i></span>
                            </div>
                            <div class="widget-slider owl-carousel owl-theme">
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

                                    $rs=$DB->query("SELECT * FROM hgfh_blog WHERE zt=1 order by id asc limit 3");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                       echo '
                                       <div class="item">
                                    <div class="thumb">
                                        <a href="./detail.php?id='.$res['id'].'">
                                        <img src="./assets/images/blog/slider0'.$res['tu'].'.png" alt="blog">
                                        </a>
                                  </div>
                                  <div class="content">
                                        <h6 class="p-title">
                                            <a href="./detail.php?id='.$res['id'].'">'.$res['title'].' </a>
                                        </h6>
                                        <div class="meta-post">
                                            <a href="./detail.php?id='.$res['id'].'" class="mr-4"><i class="flaticon-chat-1"></i>'.$res['pl'].'条评论</a>
                                            <a href="./detail.php?id='.$res['id'].'"><i class="flaticon-eye"></i>'.$res['view'].'次浏览</a>
                                        </div>
                                    </div>  </div>';
                                    }
                  ?>
                                
                                
                                </div>
                            </div>
                         
                        <div class="widget widget-follow">
                            <h5 class="title">关注我们，让推广更高效！</h5>
                            <ul class="social-icons">
                                <li>
                                    <a href="<?=$conf['qqqun']?>" class="">
                                        <i class="fab fa-qq"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="active">
                                        <i class="fab fa-weibo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$conf['qqqun']?>" class="">
                                        <i class="fab fa-qq"></i>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="widget widget-tags">
                            <h5 class="title">云标签</h5>
                            <ul>
                                <li>
                                    <a href="#0">防红</a>
                                </li>
                                <li>
                                    <a href="#0">短链</a>
                                </li>
                                <li>
                                    <a href="#0">优化
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">跳转</a>
                                </li>
                                <li>
                                    <a href="#0" class="active">UI交互</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
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
include ('./footer.php');
?>