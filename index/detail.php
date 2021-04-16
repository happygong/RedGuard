<?php
/**
编写人员 乐公网络
作者QQ:2302567351
乱改版权死户口
**/
include ('../include/common.php');
if (isset($_GET['id'])) $id = daddslashes($_GET['id']);
$row1=$DB->query("SELECT * FROM `hgfh_blog` WHERE id='{$id}' limit 1")->fetch();
$ll=$row1['view'];
++$ll;
$sql = $DB->exec("UPDATE `hgfh_blog` SET `view`='{$ll}' WHERE id='{$id}'");
$bt=''.$conf['name'].'-'.$row1['title'].'-博客-完美解决推广难题！';
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
                <h1 class="title">博客详情</h1>
            </div>
        </div>
    </section>
    <!--============= Page Header Section Ends Here =============-->


    
    <!--============= Blog Section Starts Here =============-->
    <section class="blog-single mt--150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-70 mb-lg-0">
                    <article>
                        <div class="post-details">
                            <div class="post-inner">
                                <div class="post-header">
                                    <div class="meta-post">
                                        <a href="#0" class="read">发布时间：<?=$row1['date']?></a>
                                        <a href="#0" class="read"><?=$row1['view']?>次浏览</a>
                                    </div>
                                    <h3 class="title">
                                        <?=$row1['title']?>
                                    </h3>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <div class="thumb">
                                            <a href="#0">
                                                <img src="./assets/images/blog/author.png" alt="blog">
                                            </a>
                                        </div>
                                        <a href="#0" class="comment">
                                            <i class="flaticon-chat-1"></i>
                                            <span><?=$row1['pl']?></span>
                                        </a>
                                        <a href="#0" class="comment">
                                            <i class="flaticon-share"></i>
                                            <span><?=$row1['view']?></span>
                                        </a>
                                    </div>
                                    <div class="entry-content">
                                       <?php echo htmlspecialchars_decode($row1['xq']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tags-area">
                                <div class="tags">
                                    <span>
                                        标签：
                                    </span>
                                    <div class="tags-item">
                                        <a href="#0"><?=$row1['tag']?></a>
                                        
                                    </div>
                                </div>
                                <ul class="social-icons">
                                    <div class="bshare-custom icon-medium-plus"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                                </ul>
                            </div>
                        </div>
                <!--        <div class="blog-comment">-->
                <!--            <h5 class="title">评论</h5>-->
                <!--            <ul class="comment-area">-->
                <!--                <li>-->
                <!--                    <div class="blog-item">-->
                <!--                        <div class="blog-thumb">-->
                <!--                            <a href="#0">-->
                <!--                                <img src="./assets/images/blog/author2.png" alt="blog">-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                        <div class="blog-thumb-info">-->
                <!--                            <span>13 days ago</span>-->
                <!--                            <h6 class="title"><a href="#0">carl morgan</a></h6>-->
                <!--                        </div>-->
                <!--                        <div class="blog-content">-->
                <!--                            <p>-->
                <!--                                Maecenas at velit eu erat egestas vestibulum id ut tellus. Sed et semper mauris. Quisque eu lorem libero. Donec finibus metus tellus, eget rutrum est mattis non.-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            <div class="blog-item">-->
                <!--                                <div class="blog-thumb">-->
                <!--                                    <a href="#0">-->
                <!--                                        <img src="./assets/images/blog/author1.png" alt="blog">-->
                <!--                                    </a>-->
                <!--                                </div>-->
                <!--                                <div class="blog-thumb-info">-->
                <!--                                    <span>13 days ago</span>-->
                <!--                                    <h6 class="title"><a href="#0">john flores</a></h6>-->
                <!--                                </div>-->
                <!--                                <div class="blog-content">-->
                <!--                                    <p>-->
                <!--                                        Maecenas at velit eu erat egestas vestibulum id ut tellus. Sed et semper mauris. Quisque eu lorem libero. Donec finibus metus tellus, eget rutrum est mattis non.-->
                <!--                                    </p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <div class="blog-item">-->
                <!--                        <div class="blog-thumb">-->
                <!--                            <a href="#0">-->
                <!--                                <img src="./assets/images/blog/author3.png" alt="blog">-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                        <div class="blog-thumb-info">-->
                <!--                            <span>13 days ago</span>-->
                <!--                            <h6 class="title"><a href="#0">carl morgan</a></h6>-->
                <!--                        </div>-->
                <!--                        <div class="blog-content">-->
                <!--                            <p>-->
                <!--                                Maecenas at velit eu erat egestas vestibulum id ut tellus. Sed et semper mauris. Quisque eu lorem libero. Donec finibus metus tellus, eget rutrum est mattis non.-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--            <div class="leave-comment">-->
                <!--                <h5 class="title">不如不吐一快~</h5>-->
                <!--                <form class="blog-form">-->
                <!--                    <div class="form-group">-->
                <!--                        <input type="text" placeholder="您的全名" required name="name">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <input type="text" placeholder="电子邮箱" required name="email">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <textarea placeholder="写下信息" required name="message"></textarea>-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <input type="submit" value="提交评论">-->
                <!--                    </div>-->
                <!--                </form>-->
                <!--            </div>-->
                <!--    </article>-->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <aside class="sticky-menu">
                        <!--<div class="widget widget-search">-->
                        <!--    <h5 class="title">搜索文章</h5>-->
                        <!--    <form class="search-form">-->
                        <!--        <input type="text" placeholder="输入您想搜索的内容" required>-->
                        <!--        <button type="submit"><i class="flaticon-loupe"></i>搜索</button>-->
                        <!--    </form>-->
                        <!--</div>-->
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
    <!--============= Blog Section Ends Here =============-->


<?php
include('./footer.php');
?>