<?php
/**
编写人员 乐公网络
作者QQ:2302567351
乱改版权死户口
**/
include ('../include/common.php');
$bt=''.$conf['name'].'-完美解决推广难题！';
$title=$bt;
$fw=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE 1")->fetchColumn();
$user=$DB->query("SELECT count(*) from `hgfh_user` WHERE 1")->fetchColumn();
$jl=$DB->query("SELECT count(*) from `hgfh_jl` WHERE 1")->fetchColumn();
include ('./header.php');
?>
    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section">
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
            <div class="banner-content">
                <h3 class="cate">短链防红，链接缩短</h3>
                <h1 class="title"><?=$conf['name']?></h1>
                <p>缩短您的链接并做到完美的防红功能！</p>
            </div>
            <div class="banner-form-group">
                <h3 class="subtitle">让短链防红更简单！</h3>
              <p class="subtitle">使用即代表您同意短链防红使用规范</p>
               
                <form class="banner-form" id="form_set">
                  
                  <input type="text" placeholder="填写您的链接~" name="longurl" required>
                  
                    <button id="submit" type="button">缩短防红 <i class="flaticon-startup"></i></button>
                  <div class="row">
                  <p>防红类型</p>  
                  <div class="col-md-4">
                                        <select class="form-control border-input" name="lx">
                                            <option value="1" "selected">跳转防红</option>
                                            <option value="2">直链防红</option>
                                            <option value="3">VIP跳转防红</option>
                                            <option value="4">VIP直链防红</option>
                                        </select>
                  </div>
                  <p>短链类型</p>  
                  <div class="col-md-4">
                                        <select class="form-control border-input" name="type">
                                            <option value="suoim">suo.im</option>
                                            <option value="mrwso">mrw.so</option>
                                            <option value="m6zcn">m6z.cn</option>
                                            <!--<option value="txdwz">url.cn</option>
                                            <option value="3">t.cn(不稳定)</option>
                                            <option value="3">dwz.cn(不稳定)</option>-->
                                            
                                        </select>
                  </div></div>
               
                </form>
                <div class="banner-counter">
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter"><?php echo round($jl,2);?></span>+</h2>
                        <p>缩短次数</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter"><?php echo round($fw,2);?></span>+</h2>
                        <p>点击次数</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter"><?php echo round($user,2);?></span>+</h2>
                        <p>注册用户</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <!--============= Why Section Starts Here =============-->
    <section class="why-section padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-lg-100">
                    <div class="section-header left-style mb-lg-0 sticky-header mb-low ml-0">
                        <h2 class="title">
                            为什么选择<?=$conf['name']?>?
                        </h2>
                        <p>为您提供安全、兼容好的防封服务全、兼容好的技术为您解决防封举报</p>
                        <a href="./reg.php" class="custom-button active mt-2">创建账户</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="./assets/images/why/01.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">推广防封</h5>
                            <p>您是否有过感受，因为域名经常被用户举报 我们会提供我们自己养的抗压域名和自己滋养的过白域名给客户可以缓解举报及时举报了也不会秒封的效果。</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="./assets/images/why/02.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">可用性高</h5>
                            <p>高可用性，服务器24小时运行，CDN服务，无论在全国各地任何位置都能实现秒速打开！</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="./assets/images/why/03.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">精准统计</h5>
                            <p>我们会间接搜集您的数据跳转记录，并在用户后台给您生成报告分析！</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="./assets/images/why/04.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">优质客服</h5>
                            <p>无论是工单提交，QQ客服都能得到及时的技术人员支持~</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Why Section Ends Here =============-->


    <!--============= Feature Section Starts Here =============-->
    <section class="feature-section padding-top oh padding-bottom pb-lg-half bg_img pos-rel" data-background="./assets/images/feature/feature-bg.jpg">
        <div class="top-shape d-none d-md-block">
            <img src="./assets/css/img/top-shape.png" alt="css">
        </div>
        <div class="bottom-shape d-none d-md-block mw-0">
            <img src="./assets/css/img/bottom-shape.png" alt="css">
        </div>
        <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/balls/1.png" alt="balls">
        </div>
        <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/balls/2.png" alt="balls">
        </div>
        <div class="ball-4" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/balls/3.png" alt="balls">
        </div>
        <div class="ball-5" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
        data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="./assets/images/balls/4.png" alt="balls">
        </div>
        <div class="ball-6" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/balls/5.png" alt="balls">
        </div>
        <div class="ball-7" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
        data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="./assets/images/balls/6.png" alt="balls">
        </div>
        <div class="container">
            <div class="section-header cl-white">
                <!-- <h5 class="cate">Choose a plan that's right for you</h5> -->
                <h2 class="title mt-md-0">使用特色</h2>
                <p>
                    <?=$conf['name']?>-让推广更高效！
                </p>
            </div>
            <div class="tab">
                <ul class="tab-menu feature-tab">
                    <li>
                        <div class="thumb">
                            <img src="./assets/images/feature/01.png" alt="feature">
                        </div>
                        <div class="content">24小时服务，全国CDN加速</div>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="./assets/images/feature/02.png" alt="feature">
                        </div>
                        <div class="content">防红轮寻，及时删除已红链接</div>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="./assets/images/feature/03.png" alt="feature">
                        </div>
                        <div class="content">推广防红，防举报，页面加密</div>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="./assets/images/feature/04.png" alt="feature">
                        </div>
                        <div class="content">统计方便，实时统计，热图一目了然</div>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="./assets/images/feature/05.png" alt="feature">
                        </div>
                        <div class="content">优质客服，也可工单提交立即响应</div>
                    </li>
                </ul>
                <div class="tab-area">
                    <div class="tab-item active">
                        <div class="feature-item">
                            <h3 class="title">推广防红</h3>
                            <p>您是否有过感受，因为域名经常被用户举报 我们会提供我们自己养的抗压域名和自己滋养的过白域名给客户可以缓解举报及时举报了也不会秒封的效果。</p>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="feature-item">
                            <h3 class="title">Easy Dashboard</h3>
                            <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                            month. We feel a safety net of .1% each month allows us time for repairs and 
                            unforeseen events that may arise. Furthermore, you can view our network status
                                24 hours a day 365 days a year.</p>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="feature-item">
                            <h3 class="title">Referral Program</h3>
                            <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                            month. We feel a safety net of .1% each month allows us time for repairs and 
                            unforeseen events that may arise. Furthermore, you can view our network status
                                24 hours a day 365 days a year.</p>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="feature-item">
                            <h3 class="title">1CLICK Script Installs</h3>
                            <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                            month. We feel a safety net of .1% each month allows us time for repairs and 
                            unforeseen events that may arise. Furthermore, you can view our network status
                                24 hours a day 365 days a year.</p>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="feature-item">
                            <h3 class="title">Support</h3>
                            <p>我们保证我们的网络将在99.9%的时间内正常运行

月。我们觉得每月0.1%的安全网让我们有时间进行维修和

可能发生的意外事件。此外，您还可以查看我们的网络状态

一年365天，一天24小时。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Feature Section Ends Here =============-->


    <!--============= How Section Starts Here =============-->
    <section class="how-section padding-top padding-bottom pt-md-half pb-max-lg-0">
        <div class="container">
            <div class="section-header mb-low">
                <h2 class="title mb-0">怎样使用</h2>
            </div>
            <div class="row justify-content-center mb--40">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="./assets/images/how/how1.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">创建/不创建账户</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="./assets/images/how/how2.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">缩短已红链接</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="./assets/images/how/how3.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">得到链接继续推广</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= How Section Ends Here =============-->


    <!--============= Testimonial Section Starts Here =============-->
    <section class="testimonial-section padding-top padding-bottom pos-rel oh">
        <div class="ball-3 style2 d-none d-lg-block" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/client/circle2.png" alt="client">
        </div>
        <div class="ball-6 style2 d-none d-lg-block" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="./assets/images/client/circle1.png" alt="client">
        </div>
        <div class="container">
            <div class="row justify-content-between flex-wrap-reverse align-items-center">
                <div class="col-lg-7">
                    <div class="testimonial-wrapper style-two">
                        <a href="#0" class="testi-next trigger">
                            <img src="./assets/images/client/left.png" alt="client">
                        </a>
                        <a href="#0" class="testi-prev trigger">
                            <img src="./assets/images/client/right.png" alt="client">
                        </a>
                        <div class="testimonial-area testimonial-slider owl-carousel owl-theme">
                            <div class="testimonial-item">
                                <div class="testimonial-thumb">
                                    <div class="thumb">
                                        <img src="./assets/images/client/client1.jpg" alt="client">
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <div class="ratings">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <p>
                                       很不错的防红，推广了也不会再红了！
                                    </p>
                                    <h5 class="title"><a href="#0">乐公网络</a></h5>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-thumb">
                                    <div class="thumb">
                                        <img src="./assets/images/client/client1.jpg" alt="client">
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <div class="ratings">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <p>
                                        防红稳定，生成可以使用很久~
                                    </p>
                                    <h5 class="title"><a href="#0">九陈网络</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5">
                    <div class="testi-wrapper">
                        <div class="testi-header">
                            <div class="section-header left-style mb-lg-0">
                                <h5 class="cate">立即加入吧</h5>
                                <h2 class="title">众多用户的选择，何乐而不为？</h2>
                                <a href="./reg.php" class="button-3 active mt-md-2">立即注册 <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Testimonial Section Ends Here =============-->


    <!--============= Call In Action Section Starts Here =============-->
    <section class="call-in-action padding-top padding-bottom section-bg text-center">
        <div class="container">
            <div class="section-header mb-low">
                <h5 class="cate">早点加入享优惠</h5>
                <h2 class="title">解决QQ，微信链接推广难题，我们是专业的！</h2>
                <p>立即登录享受链接统计，链接保护，VIP域名池等许多功能~</p>
            </div>
            <a href="./login.php" class="custom-button">现在登录</a>
        </div>
    </section>
    <!--============= Call In Action Section Ends Here =============-->

<?php
include ('./footer.php');
?>
  <script src="./fhsc.js"></script>   
  
</body>

</html>