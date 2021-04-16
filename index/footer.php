 <!--============= Footer Section Starts Here =============-->
    <footer class="footer-section padding-top">
        <div class="footer-bg bg_img" data-background="./assets/images/footer/footer-bg.jpg"></div>
        <div class="footer-bg d-md-block d-none"><img src="./assets/images/footer/wave.png" alt="footer"></div>
        <div class="container">
            <div class="section-header cl-white-499">
                <h5 class="cate">联系我们<?=$conf['name']?></h5>
                <h2 class="title">保持联系~</h2>
                <p>为您提供最佳的售后服务！</p>
            </div>
            <form class="contact-form" id="contact_form_submit">
                <div class="form-group">
                    <label for="name">加入防红官方群聊</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?=$conf['qqqun']?>" class="custom-button active mt-2" style="text-align:center;">立即加入群聊</a>
                </div>
               
                 <div class="form-group">
                    <label for="name">与客服在线对话</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://sighttp.qq.com/msgrd?v=1&uin=<?=$conf['qq']?>" class="custom-button active mt-2" style="text-align:center;">打开窗口</a>
                </div>
                <div class="form-group">
                    <label for="name">加入防红官方群聊</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?=$conf['qqqun']?>" class="custom-button active mt-2" style="text-align:center;">立即加入群聊</a>
                </div>
                <div class="form-group text-center">
                    <a href="./login.php">都看到这里，不登录体验嘛~</a>
                </div>
            </form>
            <div class="footer-top">
                <div class="logo">
                    <a href="./">
                        <img src="./assets/images/logo/footer-logo.png" alt="logo">
                    </a>
                </div>
                <ul class="links">
                    <li>
                        <a href="#0"><img src="./assets/images/footer/neteller.png" alt="footer"></a>
                    </li>
                    <li>
                        <a href="#0"><img src="./assets/images/footer/skrill.png" alt="footer"></a>
                    </li>
                    <li>
                        <a href="#0"><img src="./assets/images/footer/paypal.png" alt="footer"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-area">
                    <div class="left cl-white">
                        <p>&copy; Copyright 2020 <?=$conf['name']?> 乐公网络世纪工作室| <a href="http://www.beian.miit.gov.cn"><?=$conf['beian']?></a></p>
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="<?=$conf['qqqun']?>" class="active">
                                <i class="fab fa-qq"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-weibo"></i>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--============= Footer Section Ends Here =============-->

    <!--<link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js">
</script>
<script type="text/javascript">
  $("#sjtj").click(function () {
  swal("缩短成功", "<?php echo $conf['tcxx']; ?>","success")
  });
</script>	-->
    <?php  
       
     echo htmlspecialchars_decode($conf['tonji']); ?>
    <script src="./assets/js/sweetalert2.min.js"></script>
    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/modernizr-3.6.0.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/waypoints.js"></script>
    <script src="./assets/js/nice-select.js"></script>
    <script src="./assets/js/counterup.min.js"></script>
    <script src="./assets/js/owl.min.js"></script>
    <script src="./assets/js/magnific-popup.min.js"></script>
    <script src="./assets/js/paroller.js"></script>
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/main.js"></script>