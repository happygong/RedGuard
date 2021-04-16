<?php
include('../../include/common.php');
if($conf['wh']==1){
    include_once('./maintenance.php');
    exit();
}
if($islogin2!==1){
  header('Location: ../login.php'); 
}
$userrow=$DB->query("SELECT * FROM `hgfh_user` WHERE user='{$userrow['user']}' limit 1")->fetch();
$id=$userrow['id'];
$userlink=$DB->query("SELECT count(*) from `hgfh_sc` WHERE user='{$id}'")->fetchColumn();
$usershu=round($userlink,2);
//$usersc=$DB->query("SELECT * FROM `hgfh_sc` WHERE user='{$id}' limit {$usershu}")->fetch();//查询数组url字段失败。。。
$userurl[$usershu]; $i=0;
  $rs=$DB->query("SELECT * FROM hgfh_sc WHERE user='{$id}' order by id asc limit {$usershu}");
                                    while($res = $rs->fetch())
                                    {
                                      $longurl=base64_decode($res['url']);
                                      $url_arr = parse_url($longurl);
                                       $domain = $url_arr['host'];
                                      $userurl[$i]=$domain;
                                      $i++;
                                    }
//var_dump($userurl);
//$csyx=$userurl[0];
for($i=0;$i<$usershu;$i++){//用户计数
$usertj=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$userurl[$i]}'")->fetchColumn();
$usershu1=round($usertj,2)+$usershu1;
}
for($i=0;$i<$usershu;$i++){//用户计数-当天计数
$usertj=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$userurl[$i]}' and TO_DAYS(date) = TO_DAYS(NOW())")->fetchColumn();
$usershut=round($usertj,2)+$usershut;
}
for($i=0;$i<$usershu;$i++){//用户计数-昨日计数
$usertj=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$userurl[$i]}' and TO_DAYS(NOW())-TO_DAYS(date) <= 1")->fetchColumn();
$usershuy=round($usertj,2)+$usershuy;
}
//$usershu1=round($usertj,2);
//var_dump($usershu1);
$act=isset($_GET['act'])?daddslashes($_GET['act']):null;
//$order_today=$DB->query("SELECT sum(money) from `auth_order` where uid='{$userrow['user']}' and status=1")->fetchColumn();
switch ($act) {
    case 'xgxx':
        $user = daddslashes($_POST['user']);
        $qq = daddslashes($_POST['qq']);
        $email = daddslashes($_POST['email']);
        $phone = daddslashes($_POST['phone']);
        if ($phone == '') {
         exit('{"code":-1,"msg":"手机号不能为空！"}');
          }elseif(strlen($phone)!=11){
             exit('{"code":-1,"msg":"请输入正确的手机号！"}');
          }elseif(preg_match("/([\x81-\xfe][\x40-\xfe])/", $phone)){
            exit('{"code":-1,"msg":"手机号不能包含中文！"}');
          }else if($email == ''){
            exit('{"code":-1,"msg":"邮箱号不能为空！"}');
          }else if(!preg_match('/^[A-z0-9._-]+@[A-z0-9._-]+\.[A-z0-9._-]+$/', $email)){
            exit('{"code":-1,"msg":"邮箱格式不正确！"}');
          }else if ($qq == '') {
             exit('{"code":-1,"msg":"qq不能为空！"}');
          }elseif(strlen($qq) > 10){
             exit('{"code":-1,"msg":"请输入正确的qq号！"}');
          }elseif(strlen($qq) < 5){
            exit('{"code":-1,"msg":"请输入正确的qq号！"}');
          }elseif(preg_match("/([\x81-\xfe][\x40-\xfe])/", $qq)){
            exit('{"code":-1,"msg":"qq号不能包含中文！"}');
          }
          $sql=$DB->exec("update `hgfh_user` set `qq`='{$qq}',`email`='{$email}',`phone`='{$phone}' where `id`='{$pid}'");
          if ($sql) {
            exit('{"code":1,"msg":"修改成功！"}');
          }else{
            exit('{"code":-1,"msg":"修改失败，可能修改信息相同！"}');
          }
        break;
    case 'mmxg':
        $oldpwd = daddslashes($_POST['oldpwd']);
        $pwd = daddslashes($_POST['pwd']);
        $repwd = daddslashes($_POST['repwd']);
        if ($oldpwd == '') {
         exit('{"code":-1,"msg":"当前密码不能为空！"}');
          }else if($pwd == ''){
            exit('{"code":-1,"msg":"新密码不能为空！"}');
          }else if ($repwd == '') {
             exit('{"code":-1,"msg":"确认新密码不能为空！"}');
          }elseif(strlen($pwd) < 5){
            exit('{"code":-1,"msg":"新密码必须大于5数！"}');
          }elseif(preg_match("/([\x81-\xfe][\x40-\xfe])/", $pwd)){
            exit('{"code":-1,"msg":"密码不能包含中文！"}');
          }elseif ($pwd!=$repwd) {
              exit('{"code":-1,"msg":"两次输入密码不一致！"}');
          }elseif ($oldpwd!=$userrow['pass']) {
              exit('{"code":-1,"msg":"当前密码不正确！"}');
          }
          $sql=$DB->exec("update `hgfh_user` set `pass`='{$pwd}' where `id`='{$pid}'");
          if ($sql) {
            exit('{"code":1,"msg":"修改成功！"}');
          }else{
            exit('{"code":-1,"msg":"修改失败！"}');
          }
    break;
    case 'tokenupdate':
    if($conf['token']==1){
    if ($userrow['vip'] == 0) {
         exit('{"code":-1,"msg":"VIP用户才可以生成/更新TOKEN！"}');
          }
    }
    $token=random(9);
    $pid=$userrow['id'];
    $sql=$DB->exec("update `hgfh_user` set `token`='{$token}' where `id`='{$pid}'");
    exit('{"code":1,"msg":"生成/更新TOKEN成功！"}');
    
    break;
}
?>