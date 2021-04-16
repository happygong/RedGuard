<?php
if($conf['wh']==1){
    include_once('./maintenance.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keyword" content="<?php echo $conf['keyword']; ?>" />
    <meta name="description" content="<?php echo $conf['ms']; ?>" />


    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/nice-select.css">
    <link rel="stylesheet" href="./assets/css/owl.min.css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./assets/css/flaticon.css">
    <link rel="stylesheet" href="./assets/css/main.css">
<link href="./assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->


    <!--============= Header Section Starts Here =============-->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="./">
                        <img src="./assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="./">主页</a>
                    </li>
                    <li>
                        <a href="./vip.php">会员</a>
                    </li>
                    <li>
                        <a href="./faq.php">常见问题</a>
                    </li>
                    <li>
                        <a href="./blog.php">博客</a>
                        
                  
                    </li>
                  <?php if($islogin2==1){ ?>
                   <li>
                        <a href="#">欢迎您：<?=$userrow['user']?></a>
                      <ul class="submenu">
                            <li>
                                <a href="./login.php?loginut">登出账户</a>
                            </li>
                      
                        </ul>
                    </li>
                  
                 
  <li class="d-sm-none text-center">
                        <a href="./user/" class="header-button active">控制面板</a>
                    </li>
                    </ul>
                <div class="header-bar d-lg-none mr-sm-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="header-right">
                    <a href="./user/" class="header-button active">控制面板</a>
                </div>
  
<?php }else{ ?>
                   <li class="d-sm-none text-center">
                        <a href="./login.php" class="header-button active">登录</a>
                    </li>
                    <li class="d-sm-none text-center">
                        <a href="./reg.php" class="mb-4 header-button">注册</a>
                    </li>
                </ul>
                <div class="header-bar d-lg-none mr-sm-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="header-right">
                    <a href="./login.php" class="header-button d-none d-sm-inline-block m-0 active">登录</a>
                    <a href="./reg.php" class="header-button d-none d-sm-inline-block m-0">注册</a>
                </div>
<?php
}
  ?>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->