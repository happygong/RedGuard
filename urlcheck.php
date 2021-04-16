<?php
include_once("./include/common.php");
error_reporting(0);
$poison=0;
$msg = null;
// function curl_post($header,$url){
// $ch = curl_init();
//  curl_setopt ($ch, CURLOPT_URL,$url);
//  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
//  curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//  $result = curl_exec ($ch);
//  curl_close($ch);
//  if ($result == NULL) {
//   return 0;
//  }
//  return $result;
// }
	$hostrow = $DB->query("select * from `hgfh_domain`");
	foreach($hostrow as $key => $value){
		$url = $value['url'];
		$id = $value['id'];
		$header = "Referer: https://guanjia.qq.com/online_server/result.html";
		$ret =curl_post($header,'http://cgi.urlsec.qq.com/index.php?m=check&a=check&callback=url_query&url='.$url);
		$arr=json_decode(substr($ret,10,-1));
		$ret = $arr->data->results->whitetype;
		//1未知 2报毒 3绿标 4腾讯域名
		if ($ret == 2){
			$poison =1;
			$reason = "QQ已报毒";
			$myrow = $DB->exec("INSERT INTO `hgfh_banlink` (`reason`, `date`, `link`) VALUES ('{$reason}', '{$date}','{$url}')");
			$sql = $DB->exec("UPDATE `hgfh_domain` SET `zt`=0 WHERE url='{$url}'");
			//echo $msg.'qq已报毒:'.$url.'<br>';
			echo '检测完成！';
		}else{
			//echo $msg.'qq未报毒:'.$url.'<br>';
	    	//$myrow = $DB->get_row("UPDATE `quan_host` SET `type` = '1' WHERE `quan_host`.`id` = $id");
	    	echo '检测完成！';
		}
		$api = get_headers('https://mp.weixinbridge.com/mp/wapredirect?url=http://'.$url);
		if($api[1] != 'Location: http://'.$url.''){
		    $reason = "微信已报毒";
		    $sql = $DB->exec("UPDATE `hgfh_domain` SET `zt`=0 WHERE url='{$url}'");
			$myrow = $DB->exec("INSERT INTO `hgfh_banlink` (`reason`, `date`, `link`) VALUES ('{$reason}', '{$date}','{$url}')");
  		//echo $msg.'wx已报毒:'.$url.'<br>';
  		echo '检测完成！';
	    }else{
	    //$myrow = $DB->get_row("UPDATE `quan_host` SET `wxtype` = '1' WHERE `id` = $id");
		//echo $msg.'wx未报毒:'.$url.'<br>';
		echo '检测完成！';
	    }
	  //  print_r($api);
	}
?>