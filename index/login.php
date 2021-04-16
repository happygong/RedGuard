<?php
include('../include/common.php');
if($conf['wh']==1){
    include_once('./maintenance.php');
    exit();
}
if (isset($_GET['loginut'])) {
    setcookie("user_token", "", time() - 604800,"/index");
    @header('Content-Type: text/html; charset=UTF-8');
    header('Location: ./login.php'); 
}else{
if($islogin2==1){
  header('Location: ./user/'); 
}
if(isset($_GET['login'])) {
   $user=$_POST['username'];
   $pass=$_POST['pass'];
   if ($user=='') {
            exit('{"code":-1,"msg":"用户名不能为空！"}');
        }
        if ($pass=='') {
           exit('{"code":-1,"msg":"密码不能为空！"}');
        }
   $row=$DB->query("select * from hgfh_user where user='{$user}' limit 1")->fetch();
   
   if (!$row) {
           exit('{"code":-1,"msg":"该账号不存在！"}');
        }else{
      if ($row['zt']==0) {
           exit('{"code":-1,"msg":"用户存在异常行为，已被封禁！"}');
        }
            if ($pass != $row['pwd']) {
                exit('{"code":-1,"msg":"密码错误！"}');
            }else{
                $ress = get_ip_city($clientip);
                $session=md5($row['user'].$row['pwd'].$password_hash);
                $expiretime=time()+604800;
                $token=authcode("{$row['user']}\t{$session}\t{$expiretime}", 'ENCODE', SYS_KEY);
                setcookie("user_token", $token, time() + 604800,"/index");
                $DB->query("INSERT INTO `hgfh_login` (`uid`, `ress`, `ip`, `time`) VALUES ('{$user}', '{$ress}', '{$ip}', '{$date}')");
                exit('{"code":1,"msg":"登录成功！"}');
            }
   
 }
}
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

    <title>登录 - <?=$conf['name']?></title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/nice-select.css">
    <link rel="stylesheet" href="./assets/css/owl.min.css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./assets/css/flaticon.css">
    <link rel="stylesheet" href="./assets/css/main.css">

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

    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="./assets/images/account-bg.jpg">
        <div class="container">
            <div class="account-title text-center">
                <a href="./index.php" class="back-home"><i class="fas fa-angle-left"></i><span>返回 <span class="d-none d-sm-inline-block">主页</span></span></a>
                <a href="index.html" class="logo">
                    <img src="./assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <div class="account-body">
                    <h4 class="title mb-20">欢迎使用防红系统</h4>
                    <form class="account-form">
                        <div class="form-group">
                            <label for="sign-up">用户名/邮箱 </label>
                            <input type="text" placeholder="输入您的用户名" id="username">
                        </div>
                        <div class="form-group">
                            <label for="pass">密码</label>
                            <input type="password" placeholder="输入您的密码" id="pass">
                            <span class="sign-in-recovery">忘记密码了？ <a href="#0">立即重置</a></span>
                            <span class="sign-in-recovery">没有账户？ <a href="./reg.php">立即注册</a></span>
                        </div>
                        <div class="form-group text-center">
                            <button type="button" id="submit" class="mt-2 mb-2">登录</button>
                        </div>
                    </form>
                </div>
                <div class="or">
                    <span>其他登录</span>
                </div>
                <div class="account-header pb-0">
                    <span class="d-block mb-30 mt-2">使用乐公通行证登录</span>
                    <a href="http://user.orangephoenix.net" class="sign-in-with"><img src="./assets/images/icon/google.png" alt="icon"><span>乐公统一验证服务</span></a>
                    <!--<span class="d-block mt-15">没有账户吗? <a href="./reg.php">立即注册 30秒加入</a></span>-->
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->


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
    <script src="./assets/js/main.js"></script>
  <link href="./assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
   <script src="./assets/js/sweetalert2.min.js"></script>
    
  <script type="text/javascript">
  /**$("#submit").click(function () {
  swal({
                title: "登录成功！",
                text: '111',
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
  })
  });**/
    $("#submit").click(
     function login() {
            document.getElementById("submit").disabled = true;
            $.ajax({
                type: "POST",
                url: "./login.php?login",
                dataType: "json",
                async:false,
                data: {
                    username: $("#username").val(),
                   pass: $("#pass").val(),
               },
                success: function (data) {
           
                    if (data.code == 1) {
                       swal({
        title: "登录成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./user/index.php"
    })
                       
                    } else if (data.code == -1){
                      swal({
        title: "登录失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      }).then(function () {
        window.location.href = "./login.php"
    })
                       
                     
                        }
                },
                error: function (jqXHR) {
                    alert("错误");
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误：" + jqXHR.status);
                    document.getElementById("login").disabled = false;
                                    }
            });
        })
</script>


</body>

</html>