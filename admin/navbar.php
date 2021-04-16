 <!-- 菜单 -->
        <header id="topnav">
            <nav class="navbar-custom">

                <div class="container-fluid">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger noti-icon-badge">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>清除所有</small>
                                            </a>
                                        </span>通知</h5>
                                </div>

                                <div class="slimscroll noti-scroll">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">彼得</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>嗨，你好吗？下次会议怎么样？</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-light">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar 管理员点评
                                            <small class="text-muted">一分钟前</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">凯伦·罗宾逊</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>真的！这个管理员看起来不错，设计很棒。</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-light">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">新用户注册通知
                                            <small class="text-muted">5小时之前</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-light">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">哦
                                            <b>Admin</b>
                                            <small class="text-muted">13天之前</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    查看全部
                                    <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                <small class="pro-user-name ml-1">
                                    <?php echo $admin['name']; ?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">欢迎 !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>我的账户</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>修改密码</span>
                                </a>

                                <!-- item-->
                                <a href="../" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>访问首页</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="./login.php?loginout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>退出</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <a href="index.html" class="logo">
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="" height="38">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="28">
                                </span>
                            </a>
                        </li>
                        <li class="app-search">
                            <form>
                                <input type="text" placeholder="输入关键字以搜索..." class="form-control">
                                <button type="submit" class="sr-only"></button>
                            </form>
                        </li>
                    </ul>
                </div>

            </nav>
            <!-- end topbar-main -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="index.php">
                                    <i class="fe-airplay"></i>仪表盘</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-layers"></i>用户管理</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="./admin.php">管理员管理</a>
                                    </li>
                                    <li>
                                        <a href="./user.php">用户管理</a>
                                    </li>
                                    <li>
                                        <a href="./adduser.php">添加用户</a>
                                    </li>
                                    <li>
                                        <a href="./addadmin.php">添加管理员</a>
                                    </li>
                                    
                                   
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-bookmark"></i>系统设置</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="./set.php">基本设置</a>
                                    </li>
                                    <li>
                                        <a href="./fhsz.php">防红设置</a>
                                    </li>
                                  <li>
                                        <a href="./smtp.php">发信设置</a>
                                    </li>
                                  <li>
                                        <a href="./domain.php">域名设置</a>
                                    </li>
                                  <li>
                                        <a href="./hmd.php">黑白名单</a>
                                    </li>
                                   <li>
                                      <a href="./gg.php">网站公告</a>
                                   </li>
                                  <li>
                                      <a href="./ad.php">广告管理</a>
                                   </li>
                                  <li>
                                      <a href="./xtgx.php">系统更新</a>
                                   </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-grid"></i>流水管理</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="./order.php">订单管理</a>
                                    </li>
                                
                                    <li>
                                        <a href="./setpay.php">支付配置</a>
                                    </li>
                                  <li>
                                        <a href="./kami.php">卡密管理</a>
                                    </li>
                                   <li>
                                                <a href="./fhsc.php">防红网址</a>
                                            </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-cpu"></i>套餐管理</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="./tc.php">套餐列表</a>
                                    </li>
                                    <li>
                                        <a href="./addtc.php">添加套餐</a>
                                    </li>
                                    <li>
                                        <a href="./vipuser.php">开通列表</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-package"></i>服务管理</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="./gd.php">工单列表</a>
                                            </li>
                                            <li>
                                                <a href="./blog.php">博客列表</a>
                                            </li>
                                            <li>
                                                <a href="./addblog.php">发布博客</a>
                                            </li>
                                            <!--<li>-->
                                            <!--    <a href="./pl.php">评论管理</a>-->
                                            <!--</li>-->
                                          <li>
                                                <a href="./faq.php">FAQ管理</a>
                                            </li>
                                           <li>
                                                <a href="./jl.php">生成历史</a>
                                            </li>
                                           <li>
                                                <a href="./fwjl.php">访问列表</a>
                                            </li>
                                            <li>
                                                <a href="./banlink.php">短链报毒检测</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                            
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->