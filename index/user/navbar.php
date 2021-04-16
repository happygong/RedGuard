
<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../hgassets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="./" class="simple-text logo-mini">
         WM
        </a>
        <a href="./" class="simple-text logo-normal">
          <?php echo $conf['name']?>
        </a>
      </div>
      <div class="sidebar-wrapper" data-target="el-4">
        <div class="user">
          <div class="photo">
            <?php if($userrow['qq']== NULL){ ?>
             <img src="./assets/img/faces/marc.jpg">
            <?php }else{ ?>
            <img src="http://q2.qlogo.cn/headimg_dl?bs=qq&amp;dst_uin=<?php echo $userrow['qq'];?>&amp;src_uin=<?php echo $userrow['qq'];?>&amp;fid=<?php echo $userrow['qq'];?>&amp;spec=100&amp;url_enc=0&amp;referer=bu_interface&amp;term_type=PC" />
          <?php } ?>
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
               <?php echo $userrow['user'];?>-余额:<?php echo $userrow['money'];?>元
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="./profile.php">
                    <span class="sidebar-mini"> WD </span>
                    <span class="sidebar-normal"> 我的账户 </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./edit.php">
                    <span class="sidebar-mini"> BJ </span>
                    <span class="sidebar-normal"> 编辑账户 </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../login.php?loginut">
                    <span class="sidebar-mini"> DC </span>
                    <span class="sidebar-normal"> 登出 </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
 
   
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>仪表板</p>
            </a>
          </li>
          <!--<li class="nav-item ">
            <a class="nav-link"  href="./shop.php">
              <i class="material-icons">shop</i>
              <p>购买套餐</p>-->
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link"  href="./pay.php">
              <i class="material-icons">timeline</i>
              <p>充值中心</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if($conf['angent']==1){
        if($userrow['agent']==0 ){?>
                  
                 <a class="nav-link"  href="./agentno.php">
              <i class="material-icons">content_paste</i>
              <p>成为代理</p>
                  <?php }else if ($userrow['agent']==1){ ?>
                 <a class="nav-link"  href="./agentyes.php">
              <i class="material-icons">content_paste</i>
              <p>代理页面</p>
                  
               <?php }}?>
            
            </a>
          </li>
            <li class="nav-item ">
            <?php 
        if($userrow['vip']==0 ){?>
                  
                 <a class="nav-link"  href="../vip.php">
              <i class="material-icons">account_balance</i>
              <p>开通会员</p>
                  <?php } ?>
                
            
            </a>
          </li>
             <li class="nav-item " data-target="el-6">
            <a class="nav-link"  href="./gd.php">
              <i class="material-icons">business</i>
              <p>我的工单</p>
            </a>
          </li>
            
          <li class="nav-item " data-target="el-5">
            <a class="nav-link" href="./link.php">
              <i class="material-icons">place</i>
              <p>链接统计</p>
            </a>
          </li>
           <?php if($conf['qqqun']!==NULL){ ?>
          <li class="nav-item ">
            <a class="nav-link"  target="_blank"  href="<?php echo $conf['qqqun']; ?>">
              <i class="material-icons">apps</i>
              <p>官方群聊</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item " data-target="el-7">
            <a class="nav-link"  href="./tool.php">
              <i class="material-icons">code</i>
              <p>开发工具</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"><?php echo $title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="./shopsearch.php" method="GET">
              <div class="input-group no-border">
                <input type="text" name="keyword" value="" class="form-control" placeholder="输入链接模糊查找...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    首页
                  </p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    账户
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="./profile.php">个人资料</a>
                  <?php
        if($userrow['team']==0){?>
                  
                 <a class="dropdown-item" href="./team.php">实名认证</a>
                  <?php }else if($userrow['team']==1){ ?>
                 <a class="dropdown-item" href="./teamyes.php">管理团队</a>
                  
               <?php }?>
                   
                  <a class="dropdown-item" href="./edit.php">设置中心</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../login.php?loginut">登出</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      