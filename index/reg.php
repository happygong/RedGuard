<?php
include('../include/common.php');
if($islogin2==1){
  header('Location: ./'); 
}
if (isset($_GET['loginut'])) {
    setcookie("user_token", "", time() - 604800,"/user");
    @header('Content-Type: text/html; charset=UTF-8');
    header('Location: ./login.php'); 
}
if(isset($_GET['reg'])){
        $user = daddslashes($_POST['username']);
        $mail = daddslashes($_POST['mail']);
        $pass = daddslashes($_POST['pass']);
        $password = daddslashes($_POST['repass']);
        if($conf['reg']==0){
            exit('{"code":-1,"msg":"管理员已关闭注册功能！"}');
        }
        if ($user=='') {
           exit('{"code":-1,"msg":"账号不能为空！"}');
        }
        if ($mail=='') {
           exit('{"code":-1,"msg":"邮箱不能为空！"}');
        }
        if ($pass=='') {
           exit('{"code":-1,"msg":"密码不能为空！"}');
        }
        if ($password=='') {
           exit('{"code":-1,"msg":"重复密码不能为空！"}');
        }
        if (preg_match("/([\x81-\xfe][\x40-\xfe])/", $user)) {
                 exit('{"code":-1,"msg":"账号不能包含中文！"}'); 
            }
        if(strlen($user)<6){
               exit('{"code":-1,"msg":"账号必须大于5数！"}');
              }
            if (preg_match("/([\x81-\xfe][\x40-\xfe])/", $pass)) {
                 exit('{"code":-1,"msg":"密码不能包含中文！"}'); 
            }
              if(strlen($pass)<6){
               exit('{"code":-1,"msg":"密码必须大于5数！"}');
              }
            if ($pass != $password) {
              exit('{"code":-1,"msg":"两次输入密码不一致！"}');
          }
        header("Content-Type:text/html;charset=utf-8");
                      $row1=$DB->query("SELECT * FROM `hgfh_user` WHERE email='{$mail}' limit 1")->fetch();
                  if ($row1) {
                    exit('{"code":-1,"msg":"该邮箱已被注册！"}');
                  }
          
                $row=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$user}' limit 1")->fetch();
                  if ($row) {
                    exit('{"code":-1,"msg":"该名称已被注册！"}');
                  }else{
                    if (isset($_SESSION['code'])) {
                      $res=$DB->query("SELECT * FROM `hgfh_user` WHERE code='{$_SESSION['code']}' limit 1")->fetch();
                      $pid = $res['user'];
                    }else{
                      $pid = '0000';
                    }
                    $sql = $DB->exec("INSERT INTO `hgfh_user` (`uid`,`user`, `pwd`,`sccs`,`email`, `money`,`time`, `zt`) VALUES ('{$pid}', '{$user}', '{$pass}','0','{$mail}', '0.00','{$date}', '1')");
                    if ($sql) {
                       //if($conf['yjts']=1){
               // $time = date('Y-m-d H:i'); 
                //$url="http://".$_SERVER['HTTP_HOST']."";
                //$msg = "亲爱的".$user."：<br/>您在".$time."<br/>成功注册了防红系统<br/>请登录控制台购买产品等等操作~谢谢合作！<br/>感谢您的使用！祝您生活愉快~<br/><a href='".$url."'target='_blank'>登录防红</a><p>乐公网络工作室作品 QQ2302567351</p>";
               // send_mail($mail,'注册成功提醒！',$msg);
               
             //}
                       exit('{"code":1,"msg":"注册成功！感谢使用~"}');
                    }else{
                        exit('{"code":-1,"msg":"注册失败，原因：系统出错！"}');
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

    <title>注册 - <?=$conf['name']?></title>

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
                <a href="./" class="back-home"><i class="fas fa-angle-left"></i><span>返回 <span class="d-none d-sm-inline-block">主页</span></span></a>
                <a href="./" class="logo">
                    <img src="./assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <?php if($conf['reg']==0){ ?>
                <div class="account-header">
                    <h4 class="title">管理员已关闭当前站点注册功能</h4>
                    <a href="./login.php" class="sign-in-with"><img src="./assets/images/icon/google.png" alt="icon"><span>返回登录</span></a>
                </div>
                <?php }else{ ?>
                <div class="account-header">
                    <h4 class="title">体验推广潮流，加入<?=$conf['name']?></h4>
                    <a href="#0" class="sign-in-with"><img src="./assets/images/icon/google.png" alt="icon"><span>使用QQ注册</span></a>
                </div>
                <div class="or">
                    <span>或</span>
                </div>
                <div class="account-body">
                    <span class="d-block mb-20">使用电子邮箱注册</span>
                    <form class="account-form">
                        <div class="form-group">
                            <label for="sign-up">您的邮箱</label>
                            <input type="text" placeholder="输入您的邮箱" id="email">
                        </div>
                      <div class="form-group">
                            <label for="sign-up">您的用户名</label>
                            <input type="text" placeholder="输入您的用户名" id="user">
                        </div>
                      <div class="form-group">
                            <label for="sign-up">您的密码</label>
                            <input type="password" placeholder="输入您的密码" id="pass">
                        </div>
                      <div class="form-group">
                            <label for="sign-up">重复密码</label>
                            <input type="password" placeholder="重复您的密码" id="repass">
                        </div>
                        <div class="form-group text-center">
                            <button type="button" id="submit">立即加入</button>
                            <span class="d-block mt-15">已有账户? <a href="./login.php">登录</a></span>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
            <div class="sponsor-slider-wrapper cl-white text-center mt-40">
                <h5 class="slider-heading mb-3">体验推广潮流，加入<?=$conf['name']?></h5>
                <div class="sponsor-slider-4 owl-theme owl-carousel">
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor1.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor2.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor3.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor4.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor5.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor6.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor7.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor1.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor2.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor3.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor4.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor5.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor6.png" alt="sponsor">
                    </div>
                    <div class="sponsor-thumb">
                        <img src="./assets/images/sponsor/sponsor7.png" alt="sponsor">
                    </div>
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
     function reg() {
            $.ajax({
                type: "POST",
                url: "./reg.php?reg",
                dataType: "json",
                async:false,
                data: {
                    mail: $("#email").val(),
                    username: $("#user").val(),
                    pass: $("#pass").val(),
                    repass: $("#repass").val()
               },
                success: function (data) {
           
                    if (data.code == 1) {
                       swal({
        title: "注册成功",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        type: "success"
      }).then(function () {
        window.location.href = "./login.php"
    })
                       
                    } else if (data.code == -1){
                      swal({
        title: "注册失败",
        text: data.msg,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
        type: "error"
      }).then(function () {
        //window.location.href = "./reg.php"
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