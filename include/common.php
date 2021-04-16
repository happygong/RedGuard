<?php
//error_reporting(0);
date_default_timezone_set('Asia/Shanghai');
$date = date("Y-m-d H:i:s");
$arr = $_POST;
foreach($arr as $k=>$v){
$_POST[$k] = htmlspecialchars($v);
}
$arr = $_GET;
foreach($arr as $k=>$v){
$_GET[$k] = htmlspecialchars($v);
}

$unknown = ‘unknown’;  
 if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown) ) {  
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
 } 
 elseif ( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown) ) {  
  $ip = $_SERVER['REMOTE_ADDR'];  
 } 

//if(is_file('../360safe/360webscan.php')){//360网站卫士
   // require_once('../360safe/360webscan.php');
//}
/**
 * 获取网站域名
 * @return string 网站域名
 */
function getWebUrl() {
    /* 协议 */
    $protocol = 'http://';
    /* 域名或IP地址 */
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    } elseif (isset($_SERVER['HTTP_HOST'])) {
        $host = $_SERVER['HTTP_HOST'];
    } else {
        /* 端口 */
        if (isset($_SERVER['SERVER_PORT'])) {
            $port = ':' . $_SERVER['SERVER_PORT'];
            if ((':80' == $port & 'http://' == $protocol) || (':443' == $port & 'https://' == $protocol)) {
                $port = '';
            }
        } else {
            $port = '';
        }
 
        if (isset($_SERVER['SERVER_NAME'])) {
            $host = $_SERVER['SERVER_NAME'] . $port;
        } elseif (isset($_SERVER['SERVER_ADDR'])) {
            $host = $_SERVER['SERVER_ADDR'] . $port;
        }
    }
 
    return $protocol . $host;
}

define('URL',getWebUrl());

/**
 * 获取访问者IP
 * @return IP
 */
function get_ip_city($ip)

{

if($ip != '127.0.0.1'){
    $url = 'http://whois.pconline.com.cn/ipJson.jsp?json=true&ip=';
    $city = get_curl($url . $ip);
	$city = mb_convert_encoding($city, "UTF-8", "GB2312");
    $city = json_decode($city, true);
    if ($city['city']) {
        $location = $city['pro'];//统计仅对省份统计
        //$location = $city['pro'].$city['city'];
    } else {
        $location = $city['pro'];
    }
	if($location){
		return $location;
	}else{
		return false;
	}
    }else{
        return '127.0.0.1';
    }

}
function get_curl($url,$post=0,$referer=0,$cookie=0,$header=0,$ua=0,$nobaody=0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$httpheader[] = "Accept: */*";
	$httpheader[] = "Accept-Encoding: gzip,deflate,sdch";
	$httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
	$httpheader[] = "Connection: close";
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	if($header){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
	}
	if($cookie){
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	if($referer){
		if($referer==1){
			curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
		}else{
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
	}
	if($ua){
		curl_setopt($ch, CURLOPT_USERAGENT,$ua);
	}else{
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36');
	}
	if($nobaody){
		curl_setopt($ch, CURLOPT_NOBODY,1);
	}
	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$ret = curl_exec($ch);
	curl_close($ch);
	return $ret;
}
function curl_get($url)
{
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content=curl_exec($ch);
curl_close($ch);
return($content);
}
/**
 * 传入数组进行HTTP POST请求
 */
function curl_post($url, $post_data = array(), $header = 'array("Content-Type:multipart/x-www-form-urlencoded", "token:test", "client:h5")', $data_type = 'json' , $timeout = 5) {
    $header = empty($header) ? '' : $header;
    //支持json数据数据提交
    if($data_type == 'json'){
        $post_string = json_encode($post_data);
    }elseif($data_type == 'array') {
        $post_string = $post_data;
    }elseif(is_array($post_data)){
        $post_string = http_build_query($post_data, '', '&');
    }
    
    $ch = curl_init();    // 启动一个CURL会话
    curl_setopt($ch, CURLOPT_URL, $url);     // 要访问的地址
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // 对认证证书来源的检查   // https请求 不验证证书和hosts
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    //curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($ch, CURLOPT_POST, true); // 发送一个常规的Post请求
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);     // Post提交的数据包
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);     // 设置超时限制防止死循环
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    //curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // 获取的信息以文件流的形式返回 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //模拟的header头
    $result = curl_exec($ch);

    // 打印请求的header信息
    //$a = curl_getinfo($ch);
    //var_dump($a);

    curl_close($ch);
    return $result;
}
function daddslashes($string, $force = 0, $strip = FALSE) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}
function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}
function dstrpos($string, $arr) {
	if(empty($string)) return false;
	foreach((array)$arr as $v) {
		if(strpos($string, $v) !== false) {
			return true;
		}
	}
	return false;
}
function checkmobile() {
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$ualist = array('android', 'midp', 'nokia', 'mobile', 'iphone', 'ipod', 'blackberry', 'windows phone');
	if((dstrpos($useragent, $ualist) || strexists($_SERVER['HTTP_ACCEPT'], "VND.WAP") || strexists($_SERVER['HTTP_VIA'],"wap")))
		return true;
	else
		return false;
}

function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : ENCRYPT_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);
	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);
	$result = '';
	$box = range(0, 255);
	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}
	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}
	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}

function random($length, $numeric = 0) {

	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);

	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));

	$hash = '';

	$max = strlen($seed) - 1;

	for($i = 0; $i < $length; $i++) {

		$hash .= $seed{mt_rand(0, $max)};

	}

	return $hash;

}

//require '../config.php';
require_once(dirname(__FILE__)."/../config.php");
	try {
	    $DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);
	}catch(Exception $e){
		exit('链接数据库失败:'.$e->getMessage().'<hr>为什么会失败？可能没有配置或者配置账号密码错误或者数据库没有数据');
	}

$DB->exec("set names utf8");

$conf=$DB->query("select * from hgfh_set where id='1' limit 1")->fetch();

//$confpay=$DB->query("select * from auth_inte where id='1' limit 1")->fetch();

define('MCHS_Ali_ID',$confpay['alipay_id']);
define('MCHS_Ali_PUB',$confpay['alipay_public']);
define('MCHS_Ali_PRI',$confpay['alipay_private']);
define('MCHS_1sh_ID',$confpay['sub_mch_id']);
define('MCHS_1sh_KEY',$confpay['app_key']);
define('MCHS_1sh_SECRET',$confpay['app_secret']);

if(isset($_COOKIE["admin_token"]))
{
	$token=authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', SYS_KEY);
	list($user, $sid) = explode("\t", $token);
    $admin=$DB->query("select * from hgfh_admin where user='{$user}' limit 1")->fetch();
	$session=md5($admin['user'].$admin['pass'].$password_hash);
	if($session==$sid) {
		$islogin=1;
	}else{
		$islogin=2;
	}
}
//$islogin2=2;
if(isset($_COOKIE["user_token"]))
{
	$token=authcode(daddslashes($_COOKIE['user_token']), 'DECODE', SYS_KEY);
	list($pid, $sid, $expiretime) = explode("\t", $token);
	$userrow=$DB->query("SELECT * FROM hgfh_user WHERE user='{$pid}' limit 1")->fetch();
	$session=md5($pid.$userrow['pwd'].$password_hash);
	if($session==$sid && $expiretime>time()) {
	$pid=$userrow['id'];
	$islogin2=1;
	}else{
		$islogin2=2;
	}
}
function send_mail($to, $sub, $msg) {
	global $conf;
		include_once 'smtp.class.php';
		$From = $conf['mail_name'];
		$Host = $conf['mail_smtp'];
		$Port = $conf['mail_port'];
		$SMTPAuth = 1;
		$Username = $conf['mail_name'];
		$Password = $conf['mail_pwd'];
		$Nickname = $conf['web_name'];
		$SSL = $conf['mail_port']==465?1:0;
		$mail = new SMTP($Host , $Port , $SMTPAuth , $Username , $Password , $SSL);
		$mail->att = array();
		if($mail->send($to , $From , $sub , $msg, $Nickname)) {
			return true;
		} else {
			return $mail->log;
		}
}
function pay_type($type)

{
	if ($type=='wxpay') {
		return "微信支付";
	}else if ($type=='alipay') {
		return "支付宝支付";
	}else if ($type=='qqpay') {
		return "QQ钱包支付";
	}else{
		return "";
	}

}
function shorturl($input,$type){
    $base32 = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5');
    $hex = md5($input);
    $hexLen = strlen($hex);
    $subHexLen = $hexLen / 8;
    $output = array();
    for ($i = 0; $i < $subHexLen; $i++) {
        //把加密字符按照8位一组16进制与0x3FFFFFFF(30位1)进行位与运算
        $subHex = substr($hex, $i * 8, 8);
        $int = 0x3fffffff & hexdec($subHex);
        $out = '';
        for ($j = 0; $j < 6; $j++) {
            //把得到的值与0x0000001F进行位与运算，取得字符数组chars索引
            $val = 0x1f & $int;
            $out .= $base32[$val];
            $int = $int >> 5;
        }
        $output[] = $out;
    }
    return $output[1].$type;
}
// function curl_get($url){
// 	$ch=curl_init($url);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
// 	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// 	$content=curl_exec($ch);
// 	curl_close($ch);
// 	return($content);
// }
// function get_curl($url, $post=0, $referer=0, $cookie=0, $header=0, $ua=0, $nobaody=0){
// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// 	$httpheader[] = "Accept:application/json";
// 	$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
// 	$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
// 	$httpheader[] = "Connection:close";
// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
// 	if ($post) {
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// 	}
// 	if ($header) {
// 		curl_setopt($ch, CURLOPT_HEADER, true);
// 	}
// 	if ($cookie) {
// 		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
// 	}
// 	if($referer){
// 		if($referer==1){
// 			curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
// 		}else{
// 			curl_setopt($ch, CURLOPT_REFERER, $referer);
// 		}
// 	}
// 	if ($ua) {
// 		curl_setopt($ch, CURLOPT_USERAGENT, $ua);
// 	}
// 	else {
// 		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 4.0.4; es-mx; HTC_One_X Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0");
// 	}
// 	if ($nobaody) {
// 		curl_setopt($ch, CURLOPT_NOBODY, 1);
// 	}
// 	curl_setopt($ch, CURLOPT_TIMEOUT, 3);
// 	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 	$ret = curl_exec($ch);
// 	curl_close($ch);
// 	return $ret;
// }
//获取访问者系统
function get_os() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $os = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i', $os)) {
            $os = 'Windows';
        } else if (preg_match('/mac/i', $os)) {
            $os = 'MAC';
        } else if (preg_match('/Android/i', $os)) {
            $os = '安卓';
        } else if (preg_match('/iOS/i', $os)) {
            $os = 'IOS';
        }else if (preg_match('/linux/i', $os)) {
            $os = 'Linux';
        } else if (preg_match('/unix/i', $os)) {
            $os = 'Unix';
        } else if (preg_match('/bsd/i', $os)) {
            $os = 'BSD';
        } else {
            $os = 'Other';
        }
        return $os;
    } else {
        return 'unknow';
    }
}
//获取访问者浏览器
function browse_info() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $br)) {
            $br = '微软浏览器';
        } else if (preg_match('/Firefox/i', $br)) {
            $br = '火狐浏览器';
        } else if (preg_match('/Chrome/i', $br)) {
            $br = '谷歌浏览器';
        } else if (preg_match('/Safari/i', $br)) {
            $br = '苹果浏览器';
        } else if (preg_match('/Opera/i', $br)) {
            $br = 'Opera浏览器';
        }  else if (preg_match('/MicroMessenger/i', $br)) {
            $br = '微信内置浏览器';
        }else if (preg_match('/AlipayClient/i', $br)) {
            $br = '支付宝内置浏览器';
        }else if (preg_match('/QQBrowser/i', $br)) {
            $br = 'QQ浏览器';
        }else {
            $br = 'Other';
        }
        return $br;
    } else {
        return 'unknow';
    }
}

//获取访问者终端语言
function get_lang() {
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $lang = substr($lang, 0, 5);
        if (preg_match('/zh-cn/i',$lang)) {
            $lang = '简体中文';
        } else if (preg_match('/zh/i',$lang)) {
            $lang = '繁体中文';
        } else {
            $lang = 'English';
        }
        return $lang;
    } else {
        return '未知语言';
    }
}
//获取访问者省份
function getp()
{
    //$ip = getIp();
    $res1 = file_get_contents("http://ip-api.com/json/?lang=zh-CN");
    //dp($res1);
    $res1 = json_decode($res1,true);

    if ($res1[ "code"]==0)
    {
        return $res1["regionName"];
    }else{
        return "未知";
    }
}
//获取访问者国家
function getc()
{
    //$ip = getIp();
    $res1 = file_get_contents("http://ip-api.com/json/?lang=zh-CN");
    //dp($res1);
    $res1 = json_decode($res1,true);


    if ($res1[ "code"]==0)
    {
        return $res1["country"];
    }else{
        return "未知";
    }
}
function isvip($end_time){
          /*VIP倒计时*/
          $today =time();   //当前时间戳 6月7号
          //$end_time = '2018-6-9 09:00:00';  //一般由数据库查询出来的活动结束时间
          $second = strtotime($end_time)-$today; //结束时间戳减去当前时间戳
          // echo $second;
          $day = floor($second/3600/24);    //倒计时还有多少天
          $hr = floor($second/3600%24);     //倒计时还有多少小时（%取余数）
          $min = floor($second/60%60);      //倒计时还有多少分钟
          $sec = floor($second%60);         //倒计时还有多少秒          
          //$str = $day."天".$hr."小时".$min."分钟".$sec."秒";  //组合成字符串
          //echo $str;
          if($day>=0) return true;
          else return false;
    }
//require_once("../payment/alipay/alipay_core.function.php");
//require_once("../payment/alipay/alipay_md5.function.php");
?>