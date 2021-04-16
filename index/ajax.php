<?php
include ("../include/common.php");
include ("../include/api.php");
$value = NULL;
//if (isset($_GET['type'])) $vvalue = $_GET['type'];
if (isset($_POST['type'])) $vvalue = $_POST['type'];
if ($vvalue == null) {
    $vvalue = suoim;
}
//if (isset($_GET['lx'])) $lxvalue = $_GET['lx'];
if (isset($_POST['lx'])) $lxvalue = $_POST['lx'];
if ($lxvalue == null) {
    $lxvalue = 1;
}

//if (isset($_GET['longurl'])) $value = $_GET['longurl'];
if (isset($_POST['longurl'])) $value = $_POST['longurl'];
if (!empty($value)) {
    if (strpos($value, 'http') === false) {
        $longurl = 'http://' . daddslashes($value);
    } else {
        $longurl = daddslashes($value);
    }
} else {
    exit('{"msg":"URL不能为空"}');
}
if($conf['logintoshort']==1){
if($islogin2!==1){
  exit('{"msg":"请登录使用功能！"}');
}
}
if($conf['viptoshort']==1){
if($userrow['vip']!=1){
  exit('{"msg":"请开通VIP使用功能！"}');
}
}
if($lxvalue==3){
     
     if($userrow['vip']!=1){
       exit('{"msg":"该功能需要VIP才可以使用~请先开通！"}');
     }
     
     }//VIP跳转检测
if($lxvalue==4){
     
     if($userrow['vip']!=1){
       exit('{"msg":"该功能需要VIP才可以使用~请先开通！"}');
     }
     
     }//VIP直链检测
if (!preg_match('/^http[s]?:\/\//', $value)) {
    $value = "http://" . $value;
}
if (preg_match("/[\x7f-\xff]/", $value)) {
exit('{"msg":"URL格式不正确"}');
}
$url_arr = parse_url($longurl);
$domain = $url_arr['host'];
$row=$DB->query("SELECT * FROM hgfh_hmd WHERE url='{$domain}' limit 1")->fetch();
if ($row && $row['type'] = 2) {
    exit('{"msg":"当前域名在黑名单中"}');
}
$today = date("Y-m-d") . ' 00:00:00';
$user = $DB->query("SELECT count(*) FROM hgfh_jl WHERE url like '%//{$domain}/%' and date>'$today' limit 1")->fetchColumn();
$count=round($user,2);
if ($row['type'] != 2) {
    if ($count > $conf['cishu']) {
        $sql = $DB->exec("INSERT INTO `hgfh_hmd` (`url`,`date`,`type`) VALUES ('{$domain}', '{$date}', '2')");
        exit('{"msg":"生成频率太高，已禁止生成"}');
    }
}
//域名查询部分 非VIP
if($userrow['vip']!=1){
$maxid = $DB->query("SELECT MAX(id) FROM hgfh_domain")->fetch();//查询最大ID
$minid = $DB->query("SELECT MIN(id) FROM hgfh_domain")->fetch();//同上相反
$numrows=$DB->query("SELECT count(*) from hgfh_domain WHERE 1")->fetchColumn();//查询总条数
$rand=rand($minid['MIN(id)'],$maxid['MAX(id)']);
$hostrow = $DB->query("select * from hgfh_domain where vip=0 and zt=1 and id >= '{$rand}' LIMIT 1")->fetch();
while(!$hostrow){//循环直到找到数据
$rand=rand($minid['MIN(id)'],$maxid['MAX(id)']);
$hostrow = $DB->query("select * from hgfh_domain where vip=0 and zt=1 and id >= '{$rand}' LIMIT 1")->fetch();
}
$site = 'http://' . $hostrow['url'];//带上http
}else{
//域名查询部分 VIP池
  
$maxid = $DB->query("SELECT MAX(id) FROM hgfh_domain")->fetch();//查询最大ID
$minid = $DB->query("SELECT MIN(id) FROM hgfh_domain")->fetch();//同上相反
$numrows=$DB->query("SELECT count(*) from hgfh_domain WHERE 1")->fetchColumn();//查询总条数
$rand=rand($minid['MIN(id)'],$maxid['MAX(id)']);
$hostrow = $DB->query("select * from hgfh_domain where vip=1 and zt=1 and id >= '{$rand}' LIMIT 1")->fetch();
while(!$hostrow){//循环直到找到数据
$rand=rand($minid['MIN(id)'],$maxid['MAX(id)']);
$hostrow = $DB->query("select * from hgfh_domain where vip=1 and zt=1 and id >= '{$rand}' LIMIT 1")->fetch();
}
$site = 'http://' . $hostrow['url'];//带上http  
  
  
}
if($lxvalue==3){
$lxvalue=1;

}
if($lxvalue==4){
$lxvalue=2;

}
//echo $site;
//短链生成部分
$tz = '2';
$vvalueee = xinlang;
if ($tz == 2) {
    $vvalueee = geTturl;
}
 $uid = shorturl($value,$lxvalue);
  if($conf['502']==1){
$fjb='?alert%28%27680530%27%29';
}else{
$fjb=1;
}//防举报查询
$resulturl = $vvalueee($longurl, $site,$uid,$fjb,$lxvalue);
$tqq_url = $vvalue($resulturl);
if($islogin2!==1){
 $sql = $DB->exec("INSERT INTO `hgfh_jl` (`url`,`date`,`ip`,`link`,`type`) VALUES ('{$domain}', '{$date}', '{$ip}', '{$tqq_url}', '{$lxvalue}')");//插入记录
}else{
  $sql = $DB->exec("INSERT INTO `hgfh_jl` (`url`,`date`,`ip`,`link`,`type`,`user`) VALUES ('{$domain}', '{$date}', '{$ip}', '{$tqq_url}', '{$lxvalue}','{$userrow['id']}')");//登录插入记录，可进行朔源
}

if ($tz == 2) {
    $uid = shorturl($value,$lxvalue);
    $myrow = $DB->query("select * from hgfh_sc where url='" . base64_encode($value) . "' and type='{$lxvalue}' limit 1")->fetch();//寻找网址与跳转类型
  if($islogin2==1){
    if($myrow['user']==NULL){
      $id=$myrow['id'];
    $sql = $DB->exec("UPDATE `hgfh_sc` SET `user`='{$userrow['id']}' WHERE id='{$id}'");
    }
    
  }
    if (!$myrow) {
        //不存在
      $new=base64_encode($value);
      $mb=$conf['mb'];
      if($islogin2!==1){//未登录不绑定用户
        $sql = $DB->exec("INSERT INTO `hgfh_sc` (`uid`,`url`,`date`,`type`,`mb`) VALUES ('{$uid}','{$new}', '{$date}', '{$lxvalue}', '{$mb}')");//插入记录
      }else{
      
      $sql = $DB->exec("INSERT INTO `hgfh_sc` (`uid`,`url`,`date`,`type`,`mb`,`user`) VALUES ('{$uid}','{$new}', '{$date}', '{$lxvalue}', '{$mb}','{$userrow['id']}')");//插入记录
      
      }

      
      }
      
    }
function geTturl($url, $site, $uid,$fjb,$lxvalue) {
$sdk = getrandstr($url);
    $uid = shorturl($url,$lxvalue);
    $url = $site . '/t.php' . '?' . $uid . '.1' . $sdk .$fjb;
    return $url;
}
//返回信息
$result = array(
    'code' => 1,
    'url' => $tqq_url
);
print_r(json_encode($result));
unset($value, $url_arr, $domain, $row, $hostrow, $site, $resulturl, $result, $apikey, $uid);

function getrandstr() {
    $str = 'AaWwXxYyZz';
    $randStr = str_shuffle($str); //打乱字符串
    $rands = substr($randStr, 0, 18); //substr(string,start,length);返回字符串的一部分
    return $rands;
}

?>