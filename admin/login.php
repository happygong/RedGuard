<?php
include("../include/common.php");
if (isset($_GET['loginout'])) {
    setcookie("admin_token", "", time() - 604800,"/admin");
    @header('Content-Type: text/html; charset=UTF-8');
    header('Location: ./login.php'); 
}else{
if($islogin==1){
  header('Location: ./'); 
}

 if(isset($_GET['login'])) {
   $user=daddslashes($_POST['username']);
   $pass=daddslashes($_POST['password']);
   $admin=$DB->query("select * from hgfh_admin where user='{$user}' limit 1")->fetch();
  
    if($user==$admin['user'] && $pass==$admin['pass']) {
    $session=md5($user.$pass.$password_hash);
    $token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
    setcookie("admin_token", $token, time() + 604800,"/admin");
    @header('Content-Type: text/html; charset=UTF-8');
    header('Location: ./index.php');
    }else{
      $m=1;
   
  }
   
 }
}
?>
<!DOCTYPE html>
<html lang="cn">
    <head>
        <meta charset="utf-8" />
        <title>登录 - 防红后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="乐公防红管理系统" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="72"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">使用管理员账户登录</p>
                                </div>
                              <?php if($m){ 
                                  echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    用户名或密码错误!
                                </div>';
                             } ?>
                                <form action="./login.php?login" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">账户</label>
                                        <input class="form-control" type="username" name="username" required="" placeholder="输入您的账户">
                                    </div>

                                    <div class="form-group mb-3">
                                        <a href="pages-recoverpw.html" class="text-muted float-right"><small></small></a>
                                        <label for="password">密码</label>
                                        <input class="form-control" type="password" name="password" required="" placeholder="输入您的密码">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">记住我</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> 登入 </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted"> <a href="./reset.php" class="text-muted ml-1">忘记密码？</a></p>
                               
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
       
        
    </body>
</html>