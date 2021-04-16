<?php
//include('./common.php');
//$value = $_GET['longurl'];


/**function txdwz($longurl) {
    $urlsuo=suoim($longurl);
    $url_arr = parse_url($urlsuo);
   $domain = $url_arr['host'];
    $url = 'https://vip.video.qq.com/fcgi-bin/comm_cgi?name=short_url&need_short_url=1&url='.$domain.'/?https://c.pc.qq.com/middleb.html?pfurl';
    $result = curl_get($url);
    $urlcn = substr(explode('QZOutputJson=',$result)[1],0,-1);
    $urlcnarry=str_replace(array('(', ')'), '', $urlcn);
    $tempStr = json_decode($urlcnarry,true);
    $urlcn=$tempStr['short_url'];
    if (!$result) {
        return '瓦特了';
    } else {
        return ($urlcn);
    }
}**/

function suoim($longurl) {
    $url = 'http://api.suowo.cn/api.htm?format=json&url='.$longurl.'&key=5f3d1821b1b63c148b9964d4@1201305a40ae81ec385fd364a4b3f579&expireDate=2021-03-31&domain=0';
    $result = curl_get($url);
    $textInfo = json_decode($result,true);
    $data = get_curl($url);
    if (!$result) {
        return '瓦特了';
    } else {
        return ($textInfo['url']);
    }
}
function mrwso($longurl) {
    $url = 'http://api.suowo.cn/api.htm?format=json&url='.$longurl.'&key=5f3d1821b1b63c148b9964d4@1201305a40ae81ec385fd364a4b3f579&expireDate=2021-03-31&domain=1';
    $result = curl_get($url);
    $textInfo = json_decode($result,true);
    $data = get_curl($url);
    if (!$result) {
        return '瓦特了';
    } else {
        return ($textInfo['url']);
    }
}
function m6zcn($longurl) {
    $url = 'http://api.suowo.cn/api.htm?format=json&url='.$longurl.'&key=5f3d1821b1b63c148b9964d4@1201305a40ae81ec385fd364a4b3f579&expireDate=2021-03-31&domain=2';
    $result = curl_get($url);
    $textInfo = json_decode($result,true);
    $data = get_curl($url);
    if (!$result) {
        return '瓦特了';
    } else {
        return ($textInfo['url']);
    }
}

//var_dump(txdwz($value));
?>