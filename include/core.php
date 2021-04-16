<?php
error_reporting(0);
$wzbt=$conf['name'];
$jbtz=$conf['fhwz'];
$ti=$conf['biaoti'];
$jb=$conf['fhtz'];
$str = $_SERVER["QUERY_STRING"];
$result = substr($str,strrpos($str,".")+1);
$keyu = substr($result,0 ,1);

if ($keyu == 1) {
    $t_urll = $_SERVER["QUERY_STRING"];
  
    $uid = substr($t_urll, 0, strrpos($t_urll, "."));

  $myrow=$DB->query("SELECT * FROM `hgfh_sc` WHERE uid='{$uid}' limit 1")->fetch();
if(!$myrow){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
	echo '<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <link rel="dns-prefetch" href="https://h5.sinaimg.cn">
    <meta id="viewport" name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
<title>'.$wzbt.' | 此链接不存在</title>
 <style>
        html {
            font-size: 2rem;
        }

        @media (max-width: 1024px) {
            html {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 414px) {
            html {
                font-size: 1.06rem;
            }
        }

        @media (max-width: 375px) {
            html {
                font-size: 1rem;
            }
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        p {
            margin: 0;

        }

        .h5-4box {
            padding-top: 6.125rem;
            text-align: center;
        }

        .h5-4img {
            display: inline-block;

        }

        .h5-4img img {
            max-width: 100%;
        }

        .h5-4con {
            padding-top: 1.875rem;
            font-size: 0.875rem;
            line-height: 1.2;
            color: #636363;
            text-align: center;
        }

        .btn {
            display: inline-block;
            border: #e86b0f solid 1px;
            margin: 0 0 0 5px;
            padding: 0 10px;
            line-height: 25px;
            font-size: .75rem;
            vertical-align: middle;
            color: #FFF;
            border-radius: 3px;
            background-color: #ff8200;
        }
    </style>
</head>
<body>
<div class="h5-4box">
		<span class="h5-4img">
			<img src="/img/404.png">
		</span>
    <p class="h5-4con"></p>
    <br/>
    </div>
</body>
</html>
'; 
	exit();

}else{
$t_url=$myrow['url'];
	if ($t_url == base64_encode(base64_decode($t_url))) {
        $t_url =  base64_decode($t_url);
    }
    }

  }
 $longurl = $t_url;
    $url_arr = parse_url($longurl);
    $domain = $url_arr['host'];
    //if ($domain == 't.cn') exit('401');
   // $row = $DB->query("SELECT * FROM `hgfh_hmd` WHERE url='{$domain}' limit 1")->fetch();
   $cxhmd=$DB->query("SELECT * FROM `hgfh_hmd` WHERE url='{$domain}' and type=2 limit 1")->fetch();
//echo $domain;
//echo $cxhmd['url'];
    if ($cxhmd) {
    echo '<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <link rel="dns-prefetch" href="https://h5.sinaimg.cn">
    <meta id="viewport" name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
<title>'.$wzbt.' | 此链接在黑名单中</title>
 <style>
        html {
            font-size: 2rem;
        }

        @media (max-width: 1024px) {
            html {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 414px) {
            html {
                font-size: 1.06rem;
            }
        }

        @media (max-width: 375px) {
            html {
                font-size: 1rem;
            }
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        p {
            margin: 0;

        }

        .h5-4box {
            padding-top: 6.125rem;
            text-align: center;
        }

        .h5-4img {
            display: inline-block;

        }

        .h5-4img img {
            max-width: 100%;
        }

        .h5-4con {
            padding-top: 1.875rem;
            font-size: 0.875rem;
            line-height: 1.2;
            color: #636363;
            text-align: center;
        }

        .btn {
            display: inline-block;
            border: #e86b0f solid 1px;
            margin: 0 0 0 5px;
            padding: 0 10px;
            line-height: 25px;
            font-size: .75rem;
            vertical-align: middle;
            color: #FFF;
            border-radius: 3px;
            background-color: #ff8200;
        }
    </style>
</head>
<body>
<div class="h5-4box">
		<span class="h5-4img">
			<img src="/img/hmd.png">
		</span>
    <p class="h5-4con"></p>
    <br/>
    </div>
</body>
</html>
'; 
	exit();     
 } else {
      
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $system=get_os();
        $hj=browse_info();
        $lan=get_lang();
       //$co=getc($ip);
       $ar=get_ip_city($ip);
        $DB->exec("INSERT INTO `hgfh_fwjl` (`url`, `date`,`ip`,`system`, `uid`,`hj`,`lan`,`country`,`area`) VALUES ('{$domain}', '{$date}','{$ip}','{$system}','{$uid}','{$hj}','{$lan}','{$co}','{$ar}')");
        //$DB->query("insert into `quan_log` (`domain`,`click_time`,`user_agent`,`ip_address`) values ('".$domain."','".$date."','".$user_agent."','".$remoteip."')");
    }
//获取网站标题
$title = $conf['bt'];
if ($ti == 1) {
$info=file_get_contents($t_url);
preg_match('|<title>(.*?)<\/title>|',$info,$m);
  if($m[1]){
$title=($m[1]);}else{
    $title='标题获取失败...';
  }
}
if($conf['ad']==1){
  if($myrow['ad']!=NULL){
    $ding = $myrow['ad'];
  }else{
$ding = $conf['mrad'];
}//顶部广告
}
//设置标题
$kq = $myrow['mb']; //模板选择
$tzlx = $myrow['type']; //跳转类型
//防举报跳转版
if ($jb == 1) {

$jby = $jbtz;
//$t_rs = 'https://c.pc.qq.com/middlem.html?pfurl='.$jby;
$t_rs=$jby;
}
?>