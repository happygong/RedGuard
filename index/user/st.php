<?php
include_once("info.php");
/**CopyRight C 2020 HappyGong Network Studio
 * 乐公网络 2020 原创编写 短链数据统计服务
 * 乱改版权死全家！
 * **/
 if(isset($_GET['geo'])){//地理分析统计
 //思考一下不用curl的方法取信息
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res['area'],$device)){
            $device[$res['area']] = $device[$res['area']] + 1;
        }else{
            $device[$res['area']] = 1;
        }
    }
    $inarr = array();
    $num = 1001;
    $cs = 0;
    header('content-type:application/json;charset=utf-8');
    foreach ($device as $j=>$j_value){
        $arr = array();
        //$arr['id'] = $num;
        $arr['name'] = $j;
        $arr['value'] = $j_value;
        $inarr[$cs] = $arr;
        $num++;
        $cs++; //卧槽，只要是0开始的数组自动转为列表！！
        
    }
 
    $mylink = array();
    //$mylink['data'] =null;
    //$a = 
    $mylink['list'] = $inarr;
    $str=json_encode($inarr);//将数组进行json编码
print $str;
exit();
}
 //用户识别服务
 if(!$userrow){
     exit('尚未登录，没有查询权限！');
 }
 if($userrow['vip']==0){
 exit('您不是VIP会员，没有查询权限！');
 }
 $url = $_GET['url'];
 $urlencode = base64_encode('http://'.$url);
 //echo $urlencode;
 $result=$DB->query("SELECT * FROM `hgfh_sc` WHERE url='{$urlencode}'and user='{$userrow['id']}' limit 1")->fetch();
 if(!$result){
     exit('当前查询的链接不属于您，没有查询权限！');
 }
if(isset($_GET['sb'])){ //浏览器数据统计服务
    header('content-type:application/json;charset=utf-8'); //重要，数据类型转换！
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res[hj],$device)){
            $device[$res[hj]] = $device[$res[hj]] + 1;
        }else{
            //$arry = array();
            $device[$res[hj]] = 1;
        }
    }
    $inarr = array();
    $num = 1001;
    $cs = 0;
    foreach ($device as $j=>$j_value){
        $arr = array();
        $arr['id'] = $num;
        $arr['sum'] = $j_value;
        $arr['type'] = $j;
        $inarr[$cs] = $arr;
        $num++;
        $cs++; //卧槽，只要是0开始的数组自动转为列表！！
        
    }
 
    $mylink = array();
    $mylink['data'] =null;
    $a = 
    $mylink['list'] = $inarr;
    $str=json_encode($mylink);//将数组进行json编码
print $str;
    
}
if(isset($_GET['system'])){//系统分析统计
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res['system'],$device)){
            $device[$res['system']] = $device[$res['system']] + 1;
        }else{
            $device[$res['system']] = 1;
        }
    }
    $inarr = array();
    $num = 1001;
    $cs = 0;
    header('content-type:application/json;charset=utf-8');
    foreach ($device as $j=>$j_value){
        $arr = array();
        $arr['id'] = $num;
        $arr['sum'] = $j_value;
        $arr['type'] = $j;
        $inarr[$cs] = $arr;
        $num++;
        $cs++; //卧槽，只要是0开始的数组自动转为列表！！
        
    }
 
    $mylink = array();
    $mylink['data'] =null;
    $a = 
    $mylink['list'] = $inarr;
    $str=json_encode($mylink);//将数组进行json编码
print $str;
}
if(isset($_GET['lan'])){//语言分析统计
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res['lan'],$device)){
            $device[$res['lan']] = $device[$res['lan']] + 1;
        }else{
            $device[$res['lan']] = 1;
        }
    }
    $inarr = array();
    $num = 1001;
    $cs = 0;
    header('content-type:application/json;charset=utf-8');
    foreach ($device as $j=>$j_value){
        $arr = array();
        $arr['id'] = $num;
        $arr['sum'] = $j_value;
        $arr['type'] = $j;
        $inarr[$cs] = $arr;
        $num++;
        $cs++; //卧槽，只要是0开始的数组自动转为列表！！
        
    }
 
    $mylink = array();
    $mylink['data'] =null;
    $a = 
    $mylink['list'] = $inarr;
    $str=json_encode($mylink);//将数组进行json编码
print $str;
}
if(isset($_GET['area'])){//区域分析统计
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res['area'],$device)){
            $device[$res['area']] = $device[$res['area']] + 1;
        }else{
            $device[$res['area']] = 1;
        }
    }
    var_dump($device);
}
if(isset($_GET['ip'])){//ip分析统计
    $url = $_GET['url'];
    $x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    while($res = $x->fetch()){
        if(array_key_exists($res['ip'],$device)){
            $device[$res['ip']] = $device[$res['ip']] + 1;
        }else{
            $device[$res['ip']] = 1;
        }
    }
    var_dump($device);
}

if(isset($_GET['seven'])){//7日分析统计
    $url = $_GET['url'];
    //$x=$DB->query("SELECT * FROM `hgfh_fwjl` WHERE url='{$url}'");
    $device = array();
    for($i=0;$i<7;$i++){
        $usercount=$DB->query("SELECT count(*) from `hgfh_fwjl` WHERE url = '{$url}' and TO_DAYS(NOW())-TO_DAYS(date) = '{$i}'")->fetchColumn();
        $device[$i]= $usercount;
    }
    // while($res = $x->fetch()){
    //     if(array_key_exists($res['lan'],$device)){
    //         $device[$res['lan']] = $device[$res['lan']] + 1;
    //     }else{
    //         $device[$res['lan']] = 1;
    //     }
    // }
    $inarr = array();
    $num = 1001;
    $cs = 0;
    header('content-type:application/json;charset=utf-8');
    foreach ($device as $j=>$j_value){
        $arr = array();
        $arr['id'] = $num;
        $arr['sum'] = $j_value;
        $arr['sum2'] = $j_value;
        $arr['sum3'] = $j_value;
        //$arr['type'] = $j;
        $inarr[$cs] = $arr;
        $num++;
        $cs++; //卧槽，只要是0开始的数组自动转为列表！！
        
    }
 
    $mylink = array();
    $mylink['data'] =null;
    $a = 
    $mylink['list'] = $inarr;
    $str=json_encode($mylink);//将数组进行json编码
print $str;
}
?>