<?php
/**
编写人员 乐公网络
作者QQ:2302567351
乱改版权死户口
**/
include ('../include/common.php');
$bt=''.$conf['name'].'-FAQ-完美解决推广难题！';
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
                <h1 class="title">FAQ-常见问题</h1>
            </div>
        </div>
    </section>
    <!--============= Page Header Section Ends Here =============-->


    <!--============= Payout Section Starts Here =============-->
    <section class="faq-section">
        <div class="container">
            <div class="faq-area padding-top padding-bottom mt--150">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="section-header mw-100">
                            <h5 class="cate">有问题嘛?</h5>
                            <h2 class="title"> 不如看看下面的解答吧.</h2>
                        </div>
                    </div>
                </div>
                <div class="faq-wrapper">
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

                                    $rs=$DB->query("SELECT * FROM hgfh_faq WHERE zt=1");
                                    while($res = $rs->fetch())
                                    {
                                        $i++;
                                       echo '
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="./assets/css/img/faq.png" alt="css"><span class="title"> '.$res['qustion'].'</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p> '.$res['answer'].'</p>
                        </div>
                    </div>';
                                    }
                  ?>
                   
                </div>
            </div>
        </div>
    </section>
    <!--============= Payout Section Ends Here =============-->


    <!--============= Call In Action Section Starts Here =============-->
    <section class="call-in-action padding-top padding-bottom section-bg text-center">
        <div class="container">
            <div class="section-header mb-low">
                <h5 class="cate">心动不如行动</h5>
                <h2 class="title">立即开始最佳推广营销</h2>
                <p>登录享受更多服务！</p>
            </div>
            <a href="./login.php" class="custom-button">立即登录!</a>
        </div>
    </section>
<?php
include('./footer.php');
?>